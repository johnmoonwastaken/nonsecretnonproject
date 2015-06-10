<?php

	$email = $_POST['email'];
	$name = $_POST['name'];
	$comments = $_POST['comments'];
	$ip_address = $_POST['ip_address'];
	$query_string = $_POST['query_string'];

	if (isset($email)) {
		$add_sql = "INSERT INTO guarantee (email, name, comments, ip_address, query_string, time) VALUES (?,?,?,?,?,now());";
		$get_results = $GLOBALS['_db']->prepare($add_sql);
		$get_results->execute(array($email,$name,$comments,$ip_address,$query_string));

		$mail_message = "E-mail: " . $email . "\nName: " . $name . "\nComments: " . $comments . "\nQuery String: " . $query_string;

		$to = "support@trainingful.com";
		$subject = "The Trainingful Guarantee";
		mail($to, $subject, $mail_message);

		header("Location: /trainingful_guarantee?return=sent");
	}
	else {
		header("Location: /trainingful_guarantee");
	}
	die();

?>