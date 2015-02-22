<?php

$templateFields = array();
$courseList = array();

$search_sql = "
	SELECT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
			course_session.start_date, course_session.end_date, course_session.location, course_session.metro_name, course_session.cost, course_session.currency,
			vendor.vendor_name, vendor.branding_url
	FROM course
	LEFT JOIN course_session
	ON course.course_id = course_session.course_id
	LEFT JOIN vendor
	ON course.vendor_id = vendor.vendor_id
	WHERE course_name LIKE ? and course.active = 1 and course_session.active = 1 and course_session.start_date >= ? and course_session.end_date <= ? 
		and (course_session.location LIKE ? OR course_session.metro_name LIKE ?)
	ORDER BY course_id, start_date, course.click_count";

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array("%".$_GET["keywords"]."%",$_GET["start"],$_GET["end"],"%".$_GET["location"]."%","%".$_GET["location"]."%"));

	$course_count = -1;
	$session_count = 0;
	$last_course_id = 0;
	foreach ($get_results as $temp) {
		$course_id = $temp['course_id'];
		$vendor_id = $temp['vendor_id'];
		$vendor_name = $temp['vendor_name'];
		$course_name = $temp['course_name'];
		$course_description = $temp['course_description'];
		$avg_rating = $temp['avg_rating'];
		$session_id = $temp['session_id'];
		$start_date = $temp['start_date'];
		$end_date = $temp['end_date'];
		$session_location = $temp['location'];
		$metro_name = $temp['metro_name'];
		$cost = $temp['cost'];
		$currency = $temp['currency'];
		
		if ($course_id != $last_course_id) {
			$last_course_id = $course_id;
			$course_count++;
			$courseList[$course_count]['course_id'] = $course_id;
			$courseList[$course_count]['vendor_id'] = $vendor_id;
			$courseList[$course_count]['vendor_name'] = $vendor_name;
			$courseList[$course_count]['course_name'] = $course_name;
			$courseList[$course_count]['course_description'] = $course_description;
			$courseList[$course_count]['avg_rating'] = $avg_rating;
			$session_count = 0;
		}
		$courseList[$course_count]['sessionList'][$session_count]['session_id'] = $session_id;
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

$templateFields = array('courseList' => $courseList, 'totalResults' => $course_count+1,
	'keywords' => $_GET['keywords'], 'start' => $_GET['start'], 'end' => $_GET['end'], 'location' => $_GET['location']);

displayTemplate('search', $templateFields);
displayTemplate('footer');