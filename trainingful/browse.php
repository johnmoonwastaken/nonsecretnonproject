<?php 
$user = 'traininghub';
$pass = 'hubble';

function get_categories(PDO $pdo, $type) 
{
	$statement = $pdo->prepare("SELECT DISTINCT category_name FROM categories WHERE type=? ORDER BY category_name ASC");
	$statement->execute(array($type));
	return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function get_sub_categories(PDO $pdo, $type, $category_name) 
{
	$statement = $pdo->prepare("SELECT DISTINCT sub_category_name FROM categories WHERE type=? AND category_name=? ORDER BY sub_category_name ASC");
	$statement->execute(array($type, $category_name));
	return $statement->fetchAll(PDO::FETCH_ASSOC);
}

try {
	echo "<html>";
	echo "<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>";
	echo "<style>body {font-family: 'Oxygen', sans-serif;font-size: 0.75em}</style><body>";
	
	// Create access to database
	$db = new PDO('mysql:host=startyl.startlogicmysql.com;dbname=traininghub;charset=utf8', $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	echo 'TrainingHub database connection established with PDO...<br /><br />';
	
	echo '<u>Functional Categories: </u><br />';
	$rows = get_categories($db, "functional");
	foreach ($rows as $row) {
		$category_name = $row['category_name'];
		echo '<b>'.$category_name.'</b><br />';
		$rows2 = get_sub_categories($db, "functional", $category_name);
		foreach ($rows2 as $row2) {
			echo '..'.$row2['sub_category_name'].'<br />';
		}
		echo '<br />';
	}
	echo "</body></html>";
	
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?> 