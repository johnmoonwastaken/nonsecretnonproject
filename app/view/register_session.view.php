<?php

	$email = $_REQUEST['email'];
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$phone = $_REQUEST['phone'];
	$session = $_REQUEST['session_id'];
	$ip_address = $_REQUEST['ip_address'];
	$action_time = $_REQUEST['action_time'];

	$add_sql = "INSERT INTO registration_record (email, first_name, last_name, phone, session_id, ip_address) VALUES (?,?,?,?,?,?);";
	$get_results = $GLOBALS['_db']->prepare($add_sql);
	$get_results->execute(array($email,$first_name,$last_name,$phone,$session,$ip_address));

	$mail_message = "E-mail: " . $email . "\nFirst Name: " . $first_name . "\nLast Name: " . $last_name . "\nPhone: " 
		. $phone . "\nSession ID: " . $session . "\nTime: " . $action_time;

	$to = "john@trainingful.com";
	$subject = "New Registration";
	mail($to, $subject, $mail_message);

?>