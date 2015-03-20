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

function curl_get_contents_header($url, $header)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-li-format: json', $header));
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$configuration_sql = 'SELECT * FROM `configuration` WHERE type LIKE "linkedin%" ORDER BY type asc';
$get_results = $GLOBALS['_db']->prepare($configuration_sql);
$get_results->execute(array());
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$api_key = $configuration_result['value'];
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$secret_key = $configuration_result['value'];
$state = $_SESSION['state'];
$redirect_uri = $GLOBALS['_serverpath'] . '/auth_linkedin_redirect';

if($_GET['state'] == $state) {
	if ($_GET['error'] == "access_denied") {
		header("Location: signin");
		die();
	}
	elseif ($_GET['code'] != '') {
		$data = array(
			'grant_type' => 'authorization_code',
			'code' => $_GET['code'],
			'redirect_uri' => $redirect_uri,
			'client_id' => $api_key,
			'client_secret' => $secret_key
			);
		$postString = http_build_query($data, '', '&');
		//echo $postString;

		$url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . $postString;
		$result = curl_get_contents($url);
		if ($result == false) {
			header("Location: signin");
			die();
		}
		else {
			$access_json = json_decode($result, true);
			$access_token = $access_json['access_token'];
			$expires_in = $access_json['expires_in'];
			$c_header = 'Authorization: Bearer ' . $access_token;
			$url = 'https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,location,industry,picture-url,public-profile-url)';
			$result = curl_get_contents_header($url, $c_header);
			if ($result == false) {
				header("Location: signup");
				die();
			}
			else {
				$array = json_decode($result,TRUE);
				if (isset($array[errorCode])) {
					header("Location: signin");
					die();
				}
				$linkedin_id = $array['id'];
				$first_name = $array['firstName'];
				$last_name = $array['lastName'];
				$headline = $array['headline'];
				$country = $array['location']['name'];
				$industry = $array['industry'];
				$picture_url = $array['pictureUrl'];
				$linkedin_url = $array['publicProfileUrl'];
				$check_sql = "SELECT registration_complete, vendor_id FROM user_data WHERE oauth_type = 'linkedin' and oauth_id = ?";

				// Checks whether the user already exists in database
				$get_results = $GLOBALS['_db']->prepare($check_sql);
				$get_results->execute(array($linkedin_id));
				$result_count = $get_results->rowCount();
				if ($result_count > 0) {
					$result = $get_results->fetch(PDO::FETCH_ASSOC);
					$registration_complete = $result['registration_complete'];
					$_SESSION['vendor_id'] = $result['vendor_id'];
				}

				$user_sql = 'INSERT INTO user_data (oauth_type, oauth_id, first_name, last_name, headline, linkedin_url, country, industry, picture_url, oauth_token)
					VALUES (?,?,?,?,?,?,?,?,?,?)
					ON DUPLICATE KEY UPDATE 
					first_name = ?,
					last_name = ?,
					headline = ?, 
					linkedin_url = ?,
					country = ?, 
					industry = ?, 
					picture_url = ?, 
					oauth_token = ?,
					last_login = CURRENT_TIMESTAMP';
				$get_results = $GLOBALS['_db']->prepare($user_sql);
				$get_results->execute(array("linkedin",$linkedin_id,$first_name,$last_name,$headline,$linkedin_url,$country, $industry, $picture_url,$access_token,$first_name,$last_name,$headline,$linkedin_url,$country, $industry, $picture_url,$access_token));

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
					/*
					header('Location: ' . $_SESSION['lastpage']);
					*/
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