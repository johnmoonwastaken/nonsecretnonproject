<?php
include 'session_settings.php';
if ($_SESSION['vendor_id'] == "") {
	header('Location: /signin');
	exit;
}

// GETS ALL CATEGORIES
$category_sql = "SELECT category_id, category_name, type, parent_category_id FROM categories ORDER BY parent_category_id, type, category_name asc";
$get_results = $GLOBALS['_db']->prepare($category_sql);
$get_results->execute(array());

$categoryList = array();
foreach ($get_results as $temp) {
	if ($temp['parent_category_id'] == "-1") {
		$categoryList[$temp['category_id']]['type'] = $temp['type'];
		$categoryList[$temp['category_id']]['category_id'] = $temp['category_id'];
		$categoryList[$temp['category_id']]['category_name'] = $temp['category_name'];
	}
	else {
		$categoryList[$temp['parent_category_id']]['subcategories'][$temp['category_id']]['category_name'] = $temp['category_name'];
		$categoryList[$temp['parent_category_id']]['subcategories'][$temp['category_id']]['category_id'] = $temp['category_id'];
	}
}

if (isset($_GET['id'])) {
	// GETS THE COURSE INFORMATION
	$search_sql = "
		SELECT course.vendor_id, course.course_name, course.course_description, course.avg_rating, course.course_url,
			categories.category_id, categories.parent_category_id, course.days_length, course.benefits,
			course.prereqs, course.audience, course.designation, course.video_url
		FROM course
		LEFT JOIN categories
		ON course.category_id = categories.category_id
		WHERE course.course_id = ? and course.vendor_id = ?";

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array($_GET["id"], $_SESSION['vendor_id']));

	if ($get_results->rowCount() == 0) {
		header('Location: /manage_courses');
		exit;
	}

	$courseInfo = array();

	$course_result = $get_results->fetch(PDO::FETCH_ASSOC);
	$course_name = $course_result['course_name'];
	$course_description_unformatted = $course_result['course_description'];
	$course_description = nl2br($course_result['course_description']);
	$course_avg_rating = $course_result['course_rating'];
	$course_length = $course_result['days_length'];
	$course_url = $course_result['course_url'];
	$course_benefits = $course_result['benefits'];
	$course_prereqs = $course_result['prereqs'];
	$course_audience = $course_result['audience'];
	$course_designation = $course_result['designation'];
	$course_video_url = $course_result['video_url'];
	$vendor_name = $course_result['vendor_name'];
	$vendor_contact_email = $course_result['contact_email'];
	$vendor_website_url = $course_result['website_url'];
	$vendor_contact_number = $course_result['contact_number'];

	$branding_url = $course_result['branding_url'];
	$category_id = $course_result['category_id'];
	$parent_category_id = $course_result['parent_category_id'];
	$parent_category_name = "";

	// GETS ALL ASSOCIATED COURSE SESSIONS
	$search_sql = "
		SELECT course_session.session_id, course_session.start_date, course_session.end_date,
			course_session.metro_name, course_session.cost, course_session.currency, course_session.session_type
		FROM course_session
		WHERE course_session.course_id = ? and course_session.active = 1 and course_session.start_date >= ?
		ORDER BY start_date, metro_name";

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array($_GET["id"], date("Y-m-d")));


	$sessionList = array();
	$session_count = 0;
	foreach ($get_results as $temp) {
		$sessionList[$session_count]['session_id'] = $temp['session_id'];
		$sessionList[$session_count]['start_date'] = $temp['start_date'];
		$sessionList[$session_count]['start_date_formatted'] = date("D, M j, Y", strtotime($temp['start_date']));
		$sessionList[$session_count]['end_date'] = $temp['end_date'];
		$sessionList[$session_count]['end_date_formatted'] = date("D, M j, Y", strtotime($temp['end_date']));
		$sessionList[$session_count]['metro_name'] = $temp['metro_name'];
		$sessionList[$session_count]['currency'] = $temp['currency'];
		$sessionList[$session_count]['session_type'] = $temp['session_type'];
		if ($currency == "USD" || "CAD" || "HKD" || "SGD") {
			$sessionList[$session_count]['cost'] = "$" . number_format((float)$temp['cost'],2,'.','');
		}
		else  {
			$sessionList[$session_count]['cost'] = number_format((float)$temp['cost'],2,'.','');
		}
		$session_count++;
	}

	$templateFields = array('course_name' => $course_name, 'course_description' =>  $course_description, 'course_description_unformatted' => $course_description_unformatted,
		'course_rating' => $course_rating, 'vendor_name' => $vendor_name, 'branding_url' => $branding_url, 'sessionList' => $sessionList, 'categoryList' => $categoryList,
		'vendor_contact_number' => $vendor_contact_number, 'vendor_contact_email' => $vendor_contact_email, 'vendor_website_url' => $vendor_website_url,
		'category_id' => $category_id, 'parent_category_id' => $parent_category_id, 'course_url' => $course_url, 'course_length' => $course_length, 'course_video_url' => $course_video_url,
		'course_benefits' => $course_benefits, 'course_prereqs' => $course_prereqs, 'course_audience' => $course_audience, 'course_designation' => $course_designation, 
		'course_id' => $_GET['id']);
}
else {
	$templateFields = array('categoryList' => $categoryList);
}

displayTemplate('edit_course', $templateFields);
displayTemplate('footer');