<?php
include 'session_settings.php';

if ($_SESSION['vendor_id'] == "") {
	header('Location: /signin');
	exit;
}

$search_sql = "SELECT vendor_name, contact_number, contact_email, mailing_address, description, website_url, branding_url
		FROM vendor
		WHERE vendor_id = ?";
$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_SESSION['vendor_id']));
$account_result = $get_results->fetch(PDO::FETCH_ASSOC);

$vendor_name = $account_result['vendor_name'];
$contact_number = $account_result['contact_number'];
$contact_email = $account_result['contact_email'];
$mailing_address = $account_result['mailing_address'];
$description = $account_result['description'];
$website_url = $account_result['website_url'];
$branding_url = $account_result['branding_url'];

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$templateFields = array('vendor_name' => $vendor_name, 'contact_number' => $contact_number, 'contact_email' => $contact_email, 
	'mailing_address' => $mailing_address, 'description' => $description, 'website_url' => $website_url, 'branding_url' => $branding_url);

displayTemplate('edit_provider', $templateFields);
displayTemplate('footer');