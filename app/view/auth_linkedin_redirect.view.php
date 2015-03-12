<?php

session_start();

$configuration_sql = 'SELECT * FROM `configuration` WHERE type LIKE "linkedin%" ORDER BY type asc';
$get_results = $GLOBALS['_db']->prepare($configuration_sql);
$get_results->execute(array());
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$api_key = $configuration_result['value'];
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$secret_key = $configuration_result['value'];
$configuration_result = $get_results->fetch(PDO::FETCH_ASSOC);
$state = $configuration_result['value'];

if($_GET['state'] == $state) {
	if ($_GET['error'] == "access_denied") {
		header("Location: signup");
		die();
	}
	elseif ($_GET['code'] != '') {
		$data = array(
			'grant_type' => 'authorization_code',
			'code' => $_GET['code'],
			'redirect_uri' => 'http://localhost/auth_linkedin_redirect',
			'client_id' => $api_key,
			'client_secret' => $secret_key
			);
		$postString = http_build_query($data, '', '&');
		//echo $postString;
		$opts = array('http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postString,
			'request_fulluri' => True));
		$url = 'https://www.linkedin.com/uas/oauth2/accessToken';
		$context = stream_context_create($opts);
		$result = @file_get_contents($url, false, $context);
		if ($result == false) {
			header("Location: signup");
			die();
		}
		else {
			$access_json = json_decode($result, true);
			$access_token = $access_json['access_token'];
			$expires_in = $access_json['expires_in'];

			// Set cookie with authentication token
			setcookie("trainingful_oauth", $access_token, time() + $expires_in - 86400, "/");
			/*
			if(!isset($_COOKIE["trainingful_linkedin"])) {
			    //echo "Cookie named '" . "trainingful_linkedin" . "' is not set!";
			} else {
			    //echo "Cookie '" . "trainingful_linkedin" . "' is set!<br>";
			    //echo "Value is: " . $_COOKIE["trainingful_linkedin"];
			}
			$data = array(
				'format' => 'json'
			);
			$postString = http_build_query($data, '', '&');
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				//CURLOPT_SSL_VERIFYPEER => FALSE,
				CURLOPT_URL => 'https://api.linkedin.com/v1/people/~',
				CURLOPT_HEADER => 'Authorization: Bearer ' . $access_token,
				CURLOPT_POSTFIELDS => array(
					'format' => 'json'
					)));
			$result = curl_exec($curl);
			if(!$result){
			    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
			}
			curl_close($curl);
			echo $result;
			*/
			$opts = array('http' => array(
				'method' => 'GET',
				'header' => 'Authorization: Bearer ' . $access_token,
				'content' => ''));
			$url = 'https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,location,industry,picture-url,public-profile-url)';
			$context = stream_context_create($opts);
			$result = @file_get_contents($url, false, $context);
			if ($result == false) {
				header("Location: signup");
				die();
			}
			else {
				$xml = simplexml_load_string($result);
				$json = json_encode($xml);
				$array = json_decode($json,TRUE);
				$linkedin_id = $array['id'];
				$first_name = $array['first-name'];
				$last_name = $array['last-name'];
				$headline = $array['headline'];
				$country = $array['location']['name'];
				$industry = $array['industry'];
				$picture_url = $array['picture-url'];
				$linkedin_url = $array['public-profile-url'];
				$user_sql = 'INSERT INTO user_data (oauth_type, oauth_id, first_name, last_name, headline, linkedin_url, country, industry, picture_url, linkedin_token)
					VALUES (?,?,?,?,?,?,?,?,?,?)
					ON DUPLICATE KEY UPDATE 
					first_name = ?,
					last_name = ?,
					headline = ?, 
					linkedin_url = ?,
					country = ?, 
					industry = ?, 
					picture_url = ?, 
					linkedin_token = ?,
					last_login = CURRENT_TIMESTAMP';
				echo $_SESSION['lastpage'];
				$get_results = $GLOBALS['_db']->prepare($user_sql);
				$get_results->execute(array("linkedin",$linkedin_id,$first_name,$last_name,$headline,$linkedin_url,$country, $industry, $picture_url,$access_token,$first_name,$last_name,$headline,$linkedin_url,$country, $industry, $picture_url,$access_token));
				echo $_SESSION['lastpage'];

				if ($_SESSION['lastpage'] == "/signup") {
					header('Location: /');
					exit;
				}
				else header('Location: ' . $_SESSION['lastpage']);
			}
		}
	}
}
else {
	header("Location: /");
	die();
}

?>