<?php

$functionsCategories = array();
$search_sql = "
	SELECT categories.category_id, categories.category_name, COUNT(course.course_id) AS course_count 
	FROM categories
	LEFT JOIN course
	ON categories.category_id=course.category_id
	WHERE type = ? and parent_category_id = '-1' and active = 1
	GROUP BY category_name
	ORDER BY category_name asc";
		
	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array('Function'));

	$row_count = 0;
	foreach ($get_results as $temp) {
		$category_id = $temp['category_id'];
		$category_name = $temp['category_name'];
		$course_count = $temp['course_count'];
		
		if ($course_count > 0) {
			$functionsCategories[$row_count]['id']=$category_id;
			$functionsCategories[$row_count]['name']=$category_name;
			$functionsCategories[$row_count]['course_count']=$course_count;
			$row_count++;
			}
	}

$industriesCategories = array();

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array('Industry'));

	$row_count = 0;
	foreach ($get_results as $temp) {
		$category_id = $temp['category_id'];
		$category_name = $temp['category_name'];
		$course_count = $temp['course_count'];
		
		if ($course_count > 0) {
			$industriesCategories[$row_count]['id']=$category_id;
			$industriesCategories[$row_count]['name']=$category_name;
			$industriesCategories[$row_count]['course_count']=$course_count;
			$row_count++;
			}
	}

$templateFields = array('functions' => $functionsCategories,
						'industries' => $industriesCategories);

displayTemplate('home', $templateFields);
displayTemplate('footer');