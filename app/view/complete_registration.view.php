<?php

session_start();

$email = $_GET['email'];
$phone = $_GET['phone'];
$invitation = $_GET['invitation'];

if (isset($invitation)) {
	// FETCH INVITATION CODE - vendor_id
	$vendor_sql = "SELECT vendor_id FROM vendor_invitation WHERE invitation_code = ? AND used = 0";
	$get_results = $GLOBALS['_db']->prepare($vendor_sql);
	$get_results->execute(array($invitation));

	// IF IT EXISTS, UPDATE IT TO BE USED
	$invite_count = $get_results->rowCount();
	if ($invite_count > 0) {
		$vendor_result = $get_results->fetch(PDO::FETCH_ASSOC);
		$vendor_id = $vendor_result['vendor_id'];
		$update_sql = "UPDATE vendor_invitation SET used = 1 WHERE invitation_code = ?";
		$get_results = $GLOBALS['_db']->prepare($update_sql);
		$get_results->execute(array($invitation));
	}
	else $vendor_id = -1;
	
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

// IF IT IS A VENDOR, GO TO A DIFFERENT PAGE
if ($vendor_id != -1) {
	header("Location: manage_vendor");
	die();
}
else {
	header("Location: /");
	die();
}

?>