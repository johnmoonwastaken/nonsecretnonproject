<?php
include 'database.php';
echo '<div>Categories:</div><br />';

// ********** LONG TERM, CATEGORIES SHOULD NOT BE DATABASE CALLS, BUT RATHER STATIC

// Display Categories Function Call
function displayCategories($category_type, $db) {
	$last_category = "";
	$search_sql = "SELECT category_id, category_name, sub_category_name FROM categories WHERE type='".$category_type."' ORDER BY category_name, sub_category_name";
	try {	
		$get_results = $db->prepare($search_sql);
		$get_results->execute();
		foreach ($get_results as $temp) {
			$category_name = $temp['category_name'];
			$sub_category_name = $temp['sub_category_name'];
			$category_id = $temp['category_id'];
			if ($category_name != $last_category) {
				echo "<br />".$category_name.": <small><a href='search.php?category_id=".$category_id."'>".$sub_category_name . "</a></small>";
				$last_category = $category_name;
			}
		    else echo " <small><a href='search.php?category_id=".$category_id."'>".$sub_category_name . "</a></small>";
		}
	} catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
    die();
	}
}

// List Functions
echo "<strong>Function</strong>";
displayCategories("function",$db);

// List Industries
echo "<br /><br /><strong>Industry</strong>";
displayCategories("industry",$db);

echo "<br /><br />";

?>