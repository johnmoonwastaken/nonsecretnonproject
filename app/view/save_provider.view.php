<?php

session_start();

$vendor_name = $_POST['vendor_name'];
$contact_email = $_POST['contact_email'];
$contact_number = $_POST['contact_number'];
$website_url = $_POST['website_url'];
$description = $_POST['description'];
$mailing_address = $_POST['mailing_address'];

$update_sql = 'UPDATE vendor SET
	vendor_name = ?,
	contact_email = ?,
	contact_number = ?,
	website_url = ?,
	description = ?,
	mailing_address = ?
	WHERE vendor_id = ?';

$get_results = $GLOBALS['_db']->prepare($update_sql);
$get_results->execute(array($vendor_name, $contact_email, $contact_number, $website_url, $description, $mailing_address, $_SESSION['vendor_id']));

header('Location: /edit_provider?return=saved');
exit;
?>