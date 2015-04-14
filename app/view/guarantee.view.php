<?php

	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	$comments = $_REQUEST['comments'];
	$ip_address = $_REQUEST['ip_address'];
	$query_string = $_REQUEST['query_string'];

	$add_sql = "INSERT INTO guarantee (email, name, comments, ip_address, query_string, time) VALUES (?,?,?,?,?,now());";
	$get_results = $GLOBALS['_db']->prepare($add_sql);
	$get_results->execute(array($email,$name,$comments,$ip_address,$query_string));

	$mail_message = "E-mail: " . $email . "\nName: " . $name . "\nComments: " . $comments . "\nQuery String: " . $query_string;

	$to = "john@trainingful.com";
	$subject = "The Trainingful Guarantee";
	mail($to, $subject, $mail_message);

	header("Location: /trainingful_guarantee?return=sent");
	die();

?>