<?php

$client_id_sql = "SELECT * FROM `configuration` WHERE `type` IN ('google_client_id','linkedin_api_key')";
$get_results = $GLOBALS['_db']->prepare($client_id_sql);
$get_results->execute(array());

$results = $get_results->fetch(PDO::FETCH_ASSOC);
$google_client_id = $results['value'];
$results = $get_results->fetch(PDO::FETCH_ASSOC);
$linkedin_api_key = $results['value'];

$templateFields = array('google_client_id' => $google_client_id, 'linkedin_api_key' => $linkedin_api_key);

displayTemplate('signup', $templateFields);
displayTemplate('footer', $templateFields);