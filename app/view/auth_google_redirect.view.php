<?php

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_PlusService.php';

session_start();

if (isset($_GET['state']) && $_SESSION['state'] != $_GET['state']) {
  header('HTTP/ 401 Invalid state parameter');
  exit;
}

$client = new Google_Client();
$client->setApplicationName('Google+ server-side flow');
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('http://localhost:8080/oauth2callback');
$client->setDeveloperKey('YOUR_SIMPLE_API_KEY');
$plus = new Google_PlusService($client);

if (isset($_GET['code'])) {
  $client->authenticate();
  // Get your access and refresh tokens, which are both contained in the
  // following response, which is in a JSON structure:
  $jsonTokens = $client->getAccessToken();
  $_SESSION['token'] = $jsonTokens;

  // Store the tokens or otherwise handle the behavior now that you have
  // successfully connected the user and exchanged the code for tokens. You
  // will likely redirect to a different location in your app at thsi point.
  $redirect = 'http://example.com/myaccount';
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

?>