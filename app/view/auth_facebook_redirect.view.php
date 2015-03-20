<?php

session_start();

function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$configuration_sql = 'SELECT * FROM `configuration` WHERE type LIKE "facebook%" ORDER BY type asc';
$get_results = $GLOBALS['_db']->prepare($configuration_sql);
$get_results->execute(array());
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$api_key = $configuration_result['value'];
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$secret_key = $configuration_result['value'];
$state = $_SESSION['state'];
$redirect_uri = $GLOBALS['_serverpath'] . '/auth_facebook_redirect';


if($_GET['state'] == $state) {
	if ($_GET['error'] == "access_denied") {
		header("Location: signin?return=cancelled");
		die();
	}
	elseif ($_GET['code'] != '') {
		
		$data = array(
			'code' => $_GET['code'],
			'redirect_uri' => $redirect_uri,
			'client_id' => $api_key,
			'client_secret' => $secret_key
			);
		$postString = http_build_query($data, '', '&');
		//echo $postString;

		$url = 'https://graph.facebook.com/oauth/access_token?' . $postString;
		$result = curl_get_contents($url);
		$get_array = array();
		parse_str($result, $get_array);
		if ($result == false || !isset($get_array['access_token'])) {
			header("Location: signin?return=cancelled");
			die();
		}
		else {
			$get_array = array();
			parse_str($result, $get_array);
			$access_token = $get_array['access_token'];
			$expires_in = $get_array['expires'];
			$appsecret_proof= hash_hmac('sha256', $access_token, $secret_key);

			$data = array(
				'access_token' => $access_token,
				'appsecret_proof' => $appsecret_proof,
				'fields' => 'id,first_name,last_name,locale,link,email'
				);
			$postString = http_build_query($data, '', '&');

			//$c_header = 'Authorization: Bearer ' . $access_token;
			$url = 'https://graph.facebook.com/me?' . $postString;
			$result = curl_get_contents($url);
			if ($result == false) {
				header("Location: signin?return=cancelled");
				die();
			}
			else {
				$array = json_decode($result,TRUE);

				if (isset($array[error])) {
					header("Location: signin");
					die();
				}
				$facebook_id = $array['id'];
				$first_name = $array['first_name'];
				$last_name = $array['last_name'];
				$email = $array['email'];
				$picture_url = 'http://graph.facebook.com/' . $facebook_id . '/picture?type=small';
				$facebook_url = $array['link'];
				$check_sql = "SELECT registration_complete, vendor_id FROM user_data WHERE oauth_type = 'facebook' and oauth_id = ?";

				// Checks whether the user already exists in database
				$get_results = $GLOBALS['_db']->prepare($check_sql);
				$get_results->execute(array($facebook_id));
				$result_count = $get_results->rowCount();
				if ($result_count > 0) {
					$result = $get_results->fetch(PDO::FETCH_ASSOC);
					$registration_complete = $result['registration_complete'];
					$_SESSION['vendor_id'] = $result['vendor_id'];
				}

				$user_sql = 'INSERT INTO user_data (oauth_type, oauth_id, email, first_name, last_name, url, picture_url, oauth_token, last_login)
					VALUES (?,?,?,?,?,?,?,?,?)
					ON DUPLICATE KEY UPDATE 
					first_name = ?,
					last_name = ?,
					url = ?,
					oauth_token = ?,
					last_login = now()';
				$get_results = $GLOBALS['_db']->prepare($user_sql);
				$get_results->execute(array("facebook",$facebook_id, $email, $first_name, $last_name, $facebook_url, $picture_url, $access_token, "now()", $first_name, $last_name, $facebook_url, $access_token));

				$_SESSION['first_name'] = $first_name;
				$_SESSION['last_name'] = $last_name;
				$_SESSION['access_token'] = $access_token;
				$_SESSION['expires_in'] = $expires_in;

				if ($result_count == 0 || !$registration_complete) {
					header('Location: /signup');
					exit;
				}
				elseif ($_SESSION['lastpage'] == "/signin") {
					// Set cookie with authentication setcookie
					setcookie("trainingful_oauth", $access_token, time() + $expires_in - 86400, "/");
					if ($_SESSION['vendor_id'] > 0) {
						header('Location: /manage_courses');
						exit;
					}
					else {
						header('Location: /');
						exit;
					}
				}
				else {
					// Set cookie with authentication setcookie
					setcookie("trainingful_oauth", $access_token, time() + $expires_in - 86400, "/");
					header('Location: ' . $_SESSION['lastpage']);
				}
			}
		}
	}
}
else {
	header("Location: /");
	die();
}
?>