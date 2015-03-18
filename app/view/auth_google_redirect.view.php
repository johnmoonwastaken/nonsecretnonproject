<?php

require_once '../../bower_components/google-api-php-client/src/Google/Client.php';
require_once '../../bower_components/google-api-php-client/src/contrib/Google_PlusService.php';

session_start();

if (isset($_GET['state']) && $_SESSION['state'] != $_GET['state']) {
  header('HTTP/ 401 Invalid state parameter');
  exit;
}

$google_sql = "SELECT * FROM `configuration` WHERE `type` IN ('google_api_key','google_client_id','google_secret_key')";
$get_results = $GLOBALS['_db']->prepare($google_sql);
$get_results->execute(array());

$results = $get_results->fetch(PDO::FETCH_ASSOC);
$google_api_key = $results['value'];
$results = $get_results->fetch(PDO::FETCH_ASSOC);
$google_client_id = $results['value'];
$results = $get_results->fetch(PDO::FETCH_ASSOC);
$google_secret_key = $results['value'];

$client = new Google_Client();
$client->setApplicationName('Trainingful');
$client->setClientId($google_client_id);
$client->setClientSecret($google_secret_key);
$client->setRedirectUri($GLOBALS['_serverpath'].'/auth_google_redirect');
$client->setDeveloperKey($google_api_key);
$plus = new Google_PlusService($client);

if (isset($_GET['code'])) {
  $client->authenticate();
  // Get your access and refresh tokens, which are both contained in the
  // following response, which is in a JSON structure:
  $jsonTokens = $client->getAccessToken();
  $_SESSION['token'] = $jsonTokens;

  $redirect = '/';
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

?>