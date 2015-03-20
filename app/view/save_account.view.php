<?php

session_start();

$email = $_POST['email'];
$phone = $_POST['phone'];

$update_sql = 'UPDATE user_data SET
	email = ?,
	phone = ?
	WHERE oauth_token = ?';

$get_results = $GLOBALS['_db']->prepare($update_sql);
$get_results->execute(array($email, $phone, $_SESSION['access_token']));

header('Location: /edit_account?return=saved');
exit;
?>