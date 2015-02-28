<?php

	$email = $_REQUEST['email'];
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$phone = $_REQUEST['phone'];
	$session = "";
	$ipaddress = "";

	$add_sql = "INSERT INTO signups (email) VALUES (?);";
	$get_results = $GLOBALS['_db']->prepare($add_sql);
	$get_results->execute(array($email));

	echo $add_sql;

?>