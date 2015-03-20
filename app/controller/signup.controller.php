<?php
session_start();
$fields_sql = 'SELECT email FROM user_data WHERE oauth_token = ?';
$get_results = $GLOBALS['_db']->prepare($fields_sql);
$get_results->execute(array($_SESSION['access_token']));
$field_result = $get_results->fetch(PDO::FETCH_ASSOC);
$email = $field_result['email'];

$templateFields = array('email' => $email);

displayTemplate('signup', $templateFields);
displayTemplate('footer', $templateFields);