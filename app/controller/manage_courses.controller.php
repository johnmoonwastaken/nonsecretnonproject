<?php
include 'session_settings.php';

if ($_SESSION['vendor_id'] == "") {
	header('Location: /signin');
	exit;
}
elseif ($_SESSION['vendor_id'] == "-1") {
	header('Location: /');
	exit;
}

$search_sql = "
		SELECT course.course_id, course.course_name, course.course_description, course.avg_rating, course.active_sessions, course.click_count, categories.category_name 
		FROM course 
		JOIN categories 
		ON course.category_id = categories.category_id 
		WHERE vendor_id = ? 
		ORDER BY course_name";
$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_SESSION['vendor_id']));

$courseList = array();

$totalResults = 0;
foreach ($get_results as $temp) {
	$courseList[$totalResults]['course_id'] = $temp['course_id'];
	$courseList[$totalResults]['course_name'] = $temp['course_name'];
	$courseList[$totalResults]['course_description'] = $temp['course_description'];
	$courseList[$totalResults]['avg_rating'] = $temp['avg_rating'];
	$courseList[$totalResults]['active_sessions'] = $temp['active_sessions'];
	$courseList[$totalResults]['click_count'] = $temp['click_count'];
	$totalResults++;
}

$templateFields = array('courseList' => $courseList, 'totalResults' => $totalResults);

displayTemplate('manage_courses', $templateFields);
displayTemplate('footer');