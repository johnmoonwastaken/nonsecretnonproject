<?php

// Database access
$user = 'traininghub';
$pass = 'hubble';

try {	
	// Create access to database
	$db = new PDO('mysql:host=startyl.startlogicmysql.com;dbname=traininghub;charset=utf8', $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// echo 'TrainingHub database connection established with PDO...<br /><br />'; 
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>