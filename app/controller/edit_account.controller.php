<?php
include 'session_settings.php';

if ($_SESSION['vendor_id'] == "") {
	header('Location: /signin');
	exit;
}

$search_sql = "
		SELECT user_id, metro_id, last_login, email, phone
		FROM user_data
		WHERE oauth_token = ?";
$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_SESSION['access_token']));
$account_result = $get_results->fetch(PDO::FETCH_ASSOC);
$user_id = $account_result['user_id'];
$metro_id = $account_result['metro_id'];
$last_login = $account_result['last_login'];
$email = $account_result['email'];
$phone = $account_result['phone'];

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$templateFields = array('user_id' => $user_id, 'metro_id' => $metro_id, 'last_login' => $last_login, 'email' => $email, 'phone' => $phone);

displayTemplate('edit_account', $templateFields);
displayTemplate('footer');