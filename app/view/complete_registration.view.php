<?php

session_start();

$email = $_GET['email'];
$phone = $_GET['phone'];
$invitation = $_GET['invitation'];

if (isset($invitation)) {
	// FETCH INVITATION CODE - vendor_id

	// IF IT EXISTS, UPDATE IT TO BE USED

	// SET THE vendor_id BASED ON INVITATION CODE
}
else {
	$vendor_id = -1;
}

$update_sql = "UPDATE user_data
	SET email = ?,
	phone = ?,
	registration_complete = true,
	vendor_id = ?
	WHERE oauth_token = ?";

$get_results = $GLOBALS['_db']->prepare($update_sql);
$get_results->execute(array($email, $phone, $vendor_id, $_SESSION['access_token']));

$access_token = $_SESSION['access_token'];
$expires_in = $_SESSION['expires_in'];

setcookie("trainingful_oauth", $access_token, time() + $expires_in - 86400, "/");

header("Location: /");
die();

?>