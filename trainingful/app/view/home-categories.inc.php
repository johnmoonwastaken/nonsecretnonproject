<?php

// Display Categories Function Call
function displayCategories($category_type) {
	$last_category = "";
	$column_count = 0;
	$search_sql = "SELECT DISTINCT category_name FROM categories WHERE type='".$category_type."' ORDER BY category_name";
	echo '<div class="container">';

	$category_count = 0;
	$category_count_sql = "SELECT COUNT(DISTINCT category_name) FROM categories where type='".$category_type."'";
	$get_results = $GLOBALS['_db']->prepare($category_count_sql);
	$get_results->execute();
	$category_count = $get_results->fetchColumn();

	$max_rows = ceil($category_count/4);
	$current_row = 1;

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute();
	echo '<div class="row">';
	foreach ($get_results as $temp) {
		$category_name = $temp['category_name'];
		//$category_id = $temp['category_id'];
		if ($current_row == 1) {
			echo '<div class="3u">';
		}
		echo "<div class='row quarter'><a href='#'>".$category_name . " (105)</a></div>";
		$current_row = $current_row+1;
		if ($current_row > $max_rows) {
			echo '</div>';
			$current_row=1;
		}
	}
	echo '</div>';
	/*
	 $get_results = $db->prepare($search_sql);
	$get_results->execute();
	foreach ($get_results as $temp) {
	$category_name = $temp['category_name'];
	$category_id = $temp['category_id'];
	if ($column_count == 0) {
	echo '<div class="row quarter">';
	}
	echo "<div class='3u'><a href='#'>".$category_name . "</a></div>";
	$column_count = $column_count+1;
	if ($column_count == 4) {
	echo '</div>';
	$column_count=0;
	}
	}
	*/

	
	if ($column_count != 0) {
		echo '</div>';
	}
	echo '</div>';
}

echo '		<!-- Features 1 -->
			<div class="wrapper">
				<div class="container">
					<h3 style="text-align:right">Explore Categories</h3>
			
					<div class="row"><h3>Functions</h3></div>';

displayCategories("Function");

echo '<div class="row"></div>
<div class="row"><h3>Industries</h3></div>';

displayCategories("Industry");

echo '
					</div>
				</div>
			</div>';
