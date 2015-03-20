<?php
include 'session_settings.php';
$client_id_sql = "SELECT * FROM `configuration` WHERE `type` IN ('facebook_api_key', 'google_client_id','linkedin_api_key')";
$get_results = $GLOBALS['_db']->prepare($client_id_sql);
$get_results->execute(array());

$results = $get_results->fetch(PDO::FETCH_ASSOC);
$facebook_api_key = $results['value'];
$results = $get_results->fetch(PDO::FETCH_ASSOC);
$google_client_id = $results['value'];
$results = $get_results->fetch(PDO::FETCH_ASSOC);
$linkedin_api_key = $results['value'];

$templateFields = array('facebook_api_key' => $facebook_api_key, 'google_client_id' => $google_client_id, 'linkedin_api_key' => $linkedin_api_key);

displayTemplate('signin', $templateFields);
displayTemplate('footer', $templateFields);