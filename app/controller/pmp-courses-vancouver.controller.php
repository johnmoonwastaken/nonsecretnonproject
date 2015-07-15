<?php
include 'session_settings.php';
$courseList = array();
$keywords = htmlspecialchars("pmp");
$start = date('Y-m-d',strtotime(date("Y-m-d", mktime())));
$end = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
$min_max_sql = "";

$include_online_sql = "OR course_session.metro_name = 'Online'";
$include_online_bool = true;
$search_sql = "
	SELECT DISTINCT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
			course_session.start_date, course_session.end_date, course_session.city_name, course_session.metro_name, course_session.cost, course_session.currency,
			vendor.vendor_name, vendor.branding_url, vendor.verified, course_session.session_type, course_session.discount_cost, course_session.discount_end_date,
			IF(discount_end_date >= ?, discount_cost, cost) as cost_min,
			(MATCH (course_name) AGAINST (? IN NATURAL LANGUAGE MODE)) as title_relevance,
			(MATCH (tag_name) AGAINST (? IN NATURAL LANGUAGE MODE)) as tag_relevance
	FROM course
	LEFT JOIN course_session
	ON course.course_id = course_session.course_id
	LEFT JOIN vendor
	ON course.vendor_id = vendor.vendor_id
	LEFT JOIN course_tags
	ON course.course_id = course_tags.course_id
	LEFT JOIN tag
	ON tag.tag_id = course_tags.tag_id
	WHERE ((MATCH (course_name) AGAINST (? IN NATURAL LANGUAGE MODE))
	OR (MATCH (tag_name) AGAINST (? IN NATURAL LANGUAGE MODE)))
	AND course_session.active = 1 and course.active_sessions > 0 
	AND ((course_session.start_date >= ? AND course_session.end_date <= ? AND (course_session.city_name LIKE ? OR course_session.metro_name LIKE ?))
		" . $include_online_sql . ")
	GROUP BY course_session.session_id" . $min_max_sql . "
	ORDER BY title_relevance desc, tag_relevance desc, verified, course_name, course_id, start_date, course.click_count";

$search_location = "Vancouver";
$page = 1;
$get_results = $GLOBALS['_db']->prepare($search_sql);

$get_results->execute(array(date("Y-m-d"),$keywords,$keywords,$keywords,$keywords,$start,$end,"%".$search_location."%","%".$search_location."%"));

$save_search_sql = "
	INSERT INTO searches (search_term, ip_address, min_date, max_date, metro_name, include_online, session_results, referrer) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$query = $GLOBALS['_db']->prepare($save_search_sql);
$query->execute(array($keywords,gethostbyaddr($_SERVER['REMOTE_ADDR']),$start,$end,$search_location,$include_online_bool,$get_results->rowCount(), $_SERVER["HTTP_REFERER"]));

$course_count = -1;
$session_count = 0;
$last_course_id = 0;

foreach ($get_results as $temp) {
	$course_id = $temp['course_id'];
	$vendor_id = $temp['vendor_id'];
	$vendor_name = trim($temp['vendor_name']);
	$verified = $temp['verified'];
	$course_name = $temp['course_name'];
	$course_description = $temp['course_description'];
	$branding_url = $temp['branding_url'];
	$avg_rating = $temp['avg_rating'];
	$session_id = $temp['session_id'];
	$session_type = $temp['session_type'];
	$discount = $temp['discount_cost'];
	$discount_end_date = $temp['discount_end_date'];
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
		$courseList[$course_count]['sessionList'][$session_count]['discount'] = "$" . number_format((float)$discount,2,'.','');
	}
	$courseList[$course_count]['sessionList'][$session_count]['currency'] = $currency;
	$courseList[$course_count]['sessionList'][$session_count]['discount_end_date'] = $discount_end_date;
	$session_count++;
}

$locationList = array();
$search_sql = "
	SELECT country_name, metro_name 
	FROM metro 
	WHERE country_name = 'Canada' or country_name = 'United States'
	ORDER BY country_name, metro_name asc";

$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute();

$row_count = 0;
foreach ($get_results as $temp) {
	$locationList[$row_count]['country_name'] = $temp['country_name'];
	$locationList[$row_count]['metro_name'] = $temp['metro_name'];
	$row_count++;
}

$templateFields = array('courseList' => $courseList, 'totalResults' => $course_count + 1, 'locationList' => $locationList, 
	'keywords' => $keywords, 'start' => $start, 'end' => $end, 'location' => $search_location, 'include_online' => "on");
displayTemplate('pmp-courses-vancouver', $templateFields);
displayTemplate('footer');