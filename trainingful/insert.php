<?php 
/*
$link = mysql_connect('startyl.startlogicmysql.com', 'traininghub', 'hubble'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'TrainingHub database connection established...'; 
mysql_select_db(traininghub);
*/

$user = 'traininghub';
$pass = 'hubble';
try {
	$dbh = new PDO('mysql:host=startyl.startlogicmysql.com;dbname=traininghub;charset=utf8', $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	echo 'TrainingHub database connection established with PDO...<br />'; 
	echo $_GET["city_name"];
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?> 