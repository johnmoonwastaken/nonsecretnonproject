<?php

$search_sql = "
	SELECT course.vendor_id, course.course_name, course.course_description, course.avg_rating, 
		categories.category_name, categories.parent_category_id, 
		vendor.vendor_name, vendor.branding_url
	FROM course
	LEFT JOIN categories
	ON course.category_id = categories.category_id
	LEFT JOIN vendor
	ON course.vendor_id = vendor.vendor_id
	WHERE course.course_id = ?";

$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_GET["id"]));
$courseInfo = array();

$course_result = $get_results->fetch(PDO::FETCH_ASSOC);
$course_name = $course_result['course_name'];
$course_description = $course_result['course_description'];
$course_avg_rating = $course_result['course_rating'];
$vendor_name = $course_result['vendor_name'];
$branding_url = $course_result['branding_url'];
$category_name = $course_result['category_name'];
$parent_category_id = $course_result['parent_category_id'];
$parent_category_name = "";

if ($parent_category_id != -1) {
	$search_sql = "
		SELECT category_name
		FROM categories
		WHERE category_id = ?";	
	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array($parent_category_id));
	$category_result = $get_results->fetch(PDO::FETCH_ASSOC);
	$parent_category_name = $category_result['category_name'];
}

$search_sql = "
	SELECT course_session.session_id, course_session.start_date, course_session.end_date, course_session.location, 
		course_session.metro_name, course_session.cost, course_session.currency
	FROM course_session
	WHERE course_session.course_id = ? and course_session.active = 1
	ORDER BY start_date, metro_name";

$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_GET["id"]));

$sessionList = array();

$session_count = 0;
foreach ($get_results as $temp) {
	$sessionList[$session_count]['session_id'] = $temp['session_id'];
	$sessionList[$session_count]['start_date'] = $temp['start_date'];
	$sessionList[$session_count]['end_date'] = $temp['end_date'];
	$sessionList[$session_count]['location'] = $temp['location'];
	$sessionList[$session_count]['metro_name'] = $temp['metro_name'];
	$sessionList[$session_count]['currency'] = $temp['currency'];
	if ($currency == "USD" || "CAD" || "HKD" || "SGD") {
		$sessionList[$session_count]['cost'] = "$" . number_format((float)$temp['cost'],2,'.','');
	}
	else  {
		$sessionList[$session_count]['cost'] = number_format((float)$temp['cost'],2,'.','');
	}
	$session_count++;
}

$templateFields = array('course_name' => $course_name, 'course_description' =>  $course_description, 
	'course_rating' => $course_rating, 'vendor_name' => $vendor_name, 'branding_url' => $branding_url, 'sessionList' => $sessionList, 
	'category_name' => $category_name, 'parent_category_name' => $parent_category_name, 
	'course_id' => $_GET['id'], 'keywords' => $_GET['keywords'], 'start' => $_GET['start'], 'end' => $_GET['end'], 'location' => $_GET['location']);

displayTemplate('course', $templateFields);
displayTemplate('footer');