<?php

	$email = $_REQUEST['email'];

	$add_sql = "INSERT INTO signups (email) VALUES (?);";
	$get_results = $GLOBALS['_db']->prepare($add_sql);
	$get_results->execute(array($email));

	echo $add_sql;

?>