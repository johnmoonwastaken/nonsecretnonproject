<?php
include 'session_settings.php';

$tag_sql = "SELECT * from top_tags";
$get_results = $GLOBALS['_db']->prepare($tag_sql);
$get_results->execute(array());
$tagCloud = $get_results;

$tag_sql = "SELECT MAX(total) as max, MIN(total) as min from top_tags";
$get_results = $GLOBALS['_db']->prepare($tag_sql);
$get_results->execute(array());
$course_result = $get_results->fetch(PDO::FETCH_ASSOC);
$tag_max = intval($course_result['max']);
$tag_min = intval($course_result['min']);

$functionsCategories = array();
$search_sql = "
	SELECT p.category_id, p.category_name, COUNT(course.course_id) AS course_count 
	FROM categories s
	INNER JOIN categories p
	ON p.category_id = s.parent_category_id
	LEFT JOIN course
	ON s.category_id=course.category_id
	WHERE p.type = ? and p.parent_category_id = '-1' and active_sessions > 0
	GROUP BY p.category_name
	ORDER BY p.category_name asc";
		
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

$templateFields = array('functions' => $functionsCategories, 'industries' => $industriesCategories, 'tags' => $tagCloud,
	'tag_max' => $tag_max, 'tag_min' => $tag_min);

displayTemplate('home', $templateFields);
displayTemplate('footer');