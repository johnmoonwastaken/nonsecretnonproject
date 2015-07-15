<?php 
$user = 'traininghub';
$pass = 'hubble';
try {
	echo "<html>";
	echo "<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>";
	echo "<style>body {font-family: 'Oxygen', sans-serif;font-size: 0.75em}</style><body>";
	
	// Create access to database
	$db = new PDO('mysql:host=startyl.startlogicmysql.com;dbname=traininghub;charset=utf8', $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	echo 'TrainingHub database connection established with PDO...<br /><br />'; 
	
	// Retrieve HTTP GET statement for country_name
	$insert_country = $_GET["country_name"];
	echo "Inserted Country: ", $insert_country, "<br /><br />";
	
	// Insert into database
	$result = $db->exec("INSERT INTO country(country_name) VALUES('".$insert_country."')");
	$insertId = $db->lastInsertId();
	
	// Display all records in the database
	echo 'Current Database:<br />';
	foreach($db->query('SELECT * FROM country') as $row) {
		echo $row['country_id'].' '.$row['country_name'].'<br />';
	}
	
	echo "</body></html>";
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?> 