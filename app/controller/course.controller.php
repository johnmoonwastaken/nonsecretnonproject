<?php
include 'session_settings.php';
$search_sql = "
	SELECT course.vendor_id, course.course_name, course.course_description, course.avg_rating, 
		categories.category_name, categories.parent_category_id, course.benefits, course.prereqs,
		course.designation, course.video_url, course.audience, course.course_url, course.registration_url, 
		vendor.vendor_name, vendor.branding_url, vendor.contact_email, vendor.website_url, vendor.contact_number
	FROM course
	LEFT JOIN categories
	ON course.category_id = categories.category_id
	LEFT JOIN vendor
	ON course.vendor_id = vendor.vendor_id
	WHERE course.course_id = ?";

$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_GET["id"]));
$courseInfo = array();

$click_count_sql = "UPDATE course SET click_count = click_count + 1 WHERE course_id = ?";
$query = $GLOBALS['_db']->prepare($click_count_sql);
$query->execute(array($_GET["id"]));

$course_result = $get_results->fetch(PDO::FETCH_ASSOC);
$course_name = $course_result['course_name'];
$course_description = nl2br($course_result['course_description']);
$course_avg_rating = $course_result['course_rating'];
if (isset($course_result['course_registration_url']) && $course_result['course_registration_url'] != "-1") {
	$course_url = $course_result['course_registration_url'];
}
else {
	$course_url = $course_result['course_url'];
}
if ($course_result['benefits'] != "-1") {
	$benefits = $course_result['benefits'];
}
else {
	$benefits = "";
}
if ($course_result['prereqs'] != "-1") {
	$prereqs = $course_result['prereqs'];
}
else {
	$prereqs = "";
}
if ($course_result['designation'] != "-1") {
	$designation = $course_result['designation'];
}
else {
	$designation = "";
}
if ($course_result['audience'] != "-1") {
	$audience = $course_result['audience'];
}
else {
	$audience = "";
}
if ($course_result['video_url'] != "-1") {
	$video_url = $course_result['video_url'];
}
else {
	$video_url = "";
} 
$vendor_name = $course_result['vendor_name'];
$vendor_contact_email = $course_result['contact_email'];
$vendor_website_url = $course_result['website_url'];
$vendor_contact_number = $course_result['contact_number'];

$branding_url = $course_result['branding_url'];
$category_name = $course_result['category_name'];
$parent_category_id = $course_result['parent_category_id'];
$parent_category_name = "";

$tags = array();
$tags_sql = "SELECT tag_name
	FROM tag
	LEFT JOIN course_tags
	ON course_tags.tag_id = tag.tag_id
	WHERE course_tags.course_id = ?
	ORDER BY tag_name asc";
$get_results = $GLOBALS['_db']->prepare($tags_sql);
$get_results->execute(array($_GET["id"]));
foreach ($get_results as $temp) {
	array_push($tags, $temp['tag_name']);
}

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
	SELECT course_session.session_id, course_session.start_date, course_session.end_date, course_session.suite, course_session.street_address, course_session.city_name,
		course_session.metro_name, course_session.cost, course_session.currency, course_session.start_date_time, course_session.end_date_time,
		course_session.description, course_session.registration_url, course_session.session_type
	FROM course_session
	WHERE (course_session.course_id = ? and course_session.active = 1 and course_session.start_date >= ? and course_session.session_type != 'Online - Self Learning')
		OR (course_session.course_id = ? and course_session.active = 1 and course_session.session_type = 'Online - Self Learning')
	ORDER BY start_date, metro_name";

$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute(array($_GET["id"], date("Y-m-d"), $_GET["id"]));


$sessionList = array();
$session_count = 0;
foreach ($get_results as $temp) {
	$sessionList[$session_count]['session_id'] = $temp['session_id'];
	$sessionList[$session_count]['start_date'] = $temp['start_date'];
	$sessionList[$session_count]['start_date_formatted'] = date("D, M j, Y", strtotime($temp['start_date']));
	if ($temp['start_date_time'] > 0) {
		$sessionList[$session_count]['start_date_time'] = date("G:i", strtotime($temp['start_date_time']));
	}
	else {
		$sessionList[$session_count]['start_date_time'] = "";
	}
	$sessionList[$session_count]['end_date'] = $temp['end_date'];
	$sessionList[$session_count]['end_date_formatted'] = date("D, M j, Y", strtotime($temp['end_date']));
	if ($temp['end_date_time'] > 0) {
		$sessionList[$session_count]['end_date_time'] = date("G:i", strtotime($temp['end_date_time']));
	}
	else {
		$sessionList[$session_count]['end_date_time'] = "";
	}
	$sessionList[$session_count]['suite'] = $temp['suite'];
	$sessionList[$session_count]['street_address'] = $temp['street_address'];
	$sessionList[$session_count]['city_name'] = $temp['city_name'];
	$sessionList[$session_count]['metro_name'] = $temp['metro_name'];
	$sessionList[$session_count]['currency'] = $temp['currency'];
	$sessionList[$session_count]['registration_url'] = $temp['registration_url'];
	$sessionList[$session_count]['description'] = preg_replace( "/\r\n|\r|\n/", "<br />", $temp['description']);
	$sessionList[$session_count]['session_type'] = $temp['session_type'];
	if ($currency == "USD" || "CAD" || "HKD" || "SGD") {
		$sessionList[$session_count]['cost'] = "$" . number_format((float)$temp['cost'],2,'.','');
	}
	else  {
		$sessionList[$session_count]['cost'] = number_format((float)$temp['cost'],2,'.','');
	}
	$session_count++;
}

$templateFields = array('course_name' => $course_name, 'course_description' =>  $course_description, 'course_url' => $course_url, 'tags' => $tags,
	'course_rating' => $course_rating, 'vendor_name' => $vendor_name, 'branding_url' => $branding_url, 'sessionList' => $sessionList, 
	'vendor_contact_number' => $vendor_contact_number, 'vendor_contact_email' => $vendor_contact_email, 'vendor_website_url' => $vendor_website_url,
	'category_name' => $category_name, 'parent_category_name' => $parent_category_name, 'video_url' => $video_url,
	'benefits' => $benefits, 'prereqs' => $prereqs, 'audience' => $audience, 'suite' => $_GET['suite'], 'street_address' => $_GET['street_address'],
	'city_name' => $_GET['city_name'], 'course_id' => $_GET['id'], 'keywords' => $_GET['keywords'], 'start' => $_GET['start'], 'end' => $_GET['end']);

displayTemplate('course', $templateFields);
displayTemplate('footer');