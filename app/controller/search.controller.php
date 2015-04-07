<?php
include 'session_settings.php';
$courseList = array();

if ($_GET['min'] != "") {
	$min_sql = " and course_session.cost >= " . $_GET['min'];
}
if ($_GET['max'] != "") {
	$max_sql = " and course_session.cost <= " . $_GET['max'];
}


if ($_GET['category']) {
	$search_sql = "
		SELECT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
				course_session.start_date, course_session.end_date, course_session.city_name, course_session.metro_name, course_session.cost, course_session.currency,
				vendor.vendor_name, vendor.branding_url, vendor.verified, course_session.session_type
		FROM course
		LEFT JOIN course_session
		ON course.course_id = course_session.course_id
		LEFT JOIN vendor
		ON course.vendor_id = vendor.vendor_id
		LEFT JOIN categories
		ON course.category_id = categories.category_id
		WHERE course.category_id = ? and course_session.active = 1 and (course_session.start_date > ?  OR course_session.session_type = 'Online - Self Learning') " . $min_sql . $max_sql . "
		ORDER BY verified, course_name, course_id, start_date, course.click_count";
	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array($_GET['category'], date('Y-m-d')));
}
else {
	$search_sql = "
		SELECT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
				course_session.start_date, course_session.end_date, course_session.city_name, course_session.metro_name, course_session.cost, course_session.currency,
				vendor.vendor_name, vendor.branding_url, vendor.verified, course_session.session_type
		FROM course
		LEFT JOIN course_session
		ON course.course_id = course_session.course_id
		LEFT JOIN vendor
		ON course.vendor_id = vendor.vendor_id
		WHERE course_name LIKE ? and course_session.active = 1 and ((course_session.start_date >= ? and course_session.end_date <= ?)  OR course_session.session_type = 'Online - Self Learning')
			and (course_session.city_name LIKE ? OR course_session.metro_name LIKE ?)" . $min_sql . $max_sql . "
		ORDER BY verified, course_name, course_id, start_date, course.click_count";

	$search_location = $_GET['location'];
	if ($_GET['page'] == "") {
		$page = 1;
	}
	else $page = $_GET['page'];
	$get_results = $GLOBALS['_db']->prepare($search_sql);
	if ($_GET['location'] == "Everywhere" || $_GET['location'] == "everywhere") {
		$search_location = '';
	}

	$get_results->execute(array("%".$_GET["keywords"]."%",$_GET["start"],$_GET["end"],"%".$search_location."%","%".$search_location."%"));

	$save_search_sql = "
		INSERT INTO searches (search_term, ip_address, min_date, max_date, metro_name) VALUES (?, ?, ?, ?, ?)";
	$query = $GLOBALS['_db']->prepare($save_search_sql);
	$query->execute(array($_GET["keywords"],$_SERVER['REMOTE_ADDR'],$_GET["start"],$_GET["end"],$search_location));
}
$course_count = -1;
$session_count = 0;
$last_course_id = 0;

foreach ($get_results as $temp) {
	$course_id = $temp['course_id'];
	$vendor_id = $temp['vendor_id'];
	$vendor_name = $temp['vendor_name'];
	$verified = $temp['verified'];
	$course_name = $temp['course_name'];
	$course_description = $temp['course_description'];
	$branding_url = $temp['branding_url'];
	$avg_rating = $temp['avg_rating'];
	$session_id = $temp['session_id'];
	$session_type = $temp['session_type'];
	$start_date = $temp['start_date'];
	$end_date = $temp['end_date'];
	$session_location = $temp['city_name'];
	$metro_name = $temp['metro_name'];
	$cost = $temp['cost'];
	$currency = $temp['currency'];
	
	if ($course_id != $last_course_id) {
		$last_course_id = $course_id;
		$course_count++;
		$courseList[$course_count]['course_id'] = $course_id;
		$courseList[$course_count]['vendor_id'] = $vendor_id;
		$courseList[$course_count]['vendor_name'] = $vendor_name;
		$courseList[$course_count]['verified'] = $verified;
		$courseList[$course_count]['course_name'] = $course_name;
		$courseList[$course_count]['course_description'] = $course_description;
		$courseList[$course_count]['branding_url'] = $branding_url;
		$courseList[$course_count]['avg_rating'] = $avg_rating;
		$session_count = 0;
	}
	$courseList[$course_count]['sessionList'][$session_count]['session_id'] = $session_id;
	$courseList[$course_count]['sessionList'][$session_count]['session_type'] = $session_type;
	$courseList[$course_count]['sessionList'][$session_count]['start_date'] = $start_date;
	$courseList[$course_count]['sessionList'][$session_count]['end_date'] = $end_date;
	$courseList[$course_count]['sessionList'][$session_count]['location'] = $session_location;
	$courseList[$course_count]['sessionList'][$session_count]['metro_name'] = $metro_name;
	if ($currency == "USD" || "CAD" || "HKD" || "SGD") {
		$courseList[$course_count]['sessionList'][$session_count]['cost'] = "$" . number_format((float)$cost,2,'.','');
	}
	$courseList[$course_count]['sessionList'][$session_count]['currency'] = $currency;
	$session_count++;
}

if ($_GET['category']) {
	$search_sql = "
			SELECT p.category_name as primary_name, c.category_name as secondary_name from categories c
			INNER JOIN categories p
			ON p.category_id = c.parent_category_id
			WHERE c.category_id = ?";	
		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute(array($_GET['category']));
		$category_result = $get_results->fetch(PDO::FETCH_ASSOC);
		$parent_category_name = $category_result['primary_name'];
		$category_name = $category_result['secondary_name'];
		
	$templateFields = array('courseList' => $courseList, 'totalResults' => $course_count + 1,
		'category_id' => $_GET['category'], 'parent_category_name' => $parent_category_name, 'category_name' => $category_name);
}
else {
	$templateFields = array('courseList' => $courseList, 'totalResults' => $course_count + 1,
		'keywords' => $_GET['keywords'], 'start' => $_GET['start'], 'end' => $_GET['end'], 'location' => $_GET['location']);
}
displayTemplate('search', $templateFields);
displayTemplate('footer');