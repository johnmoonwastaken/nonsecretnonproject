<?php
include 'session_settings.php';
if ($_SESSION['vendor_id'] == "") {
	header('Location: /signin');
	exit;
}

if (isset($_GET['id'])) {

	$search_sql = "
		SELECT course_session.session_id, course_session.start_date, course_session.end_date,
			course_session.metro_name, course_session.cost, course_session.currency, course_session.session_type
		FROM course_session
		WHERE course_session.course_id = ? and course_session.active = 1 and (course_session.start_date >= ? OR course_session.session_type = 'Online - Self Learning')
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

	if (isset($_GET['session_id'])) {
		// GETS THE SESSION INFORMATION
		$search_sql = "
			SELECT course.course_name, course_session.instructor_id, course_session.metro_name, course_session.start_date, course_session.end_date, 
			course_session.start_date_time,	course_session.end_date_time, course_session.session_type, course_session.description, 
			course_session.cost, course_session.currency, course_session.seats_remaining, course_session.registration_url, 
			course_session.discount_cost, course_session.discount_end_date,	course_session.active, course_session.suite, 
			course_session.street_address, course_session.city_name, course_session.cost_alternate, course_session.currency_alternate
			FROM course_session
			LEFT JOIN course
			ON course.course_id = course_session.course_id
			WHERE course_session.session_id = ? and course.vendor_id = ?";

		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute(array($_GET["session_id"], $_SESSION['vendor_id']));

		if ($get_results->rowCount() == 0) {
			header('Location: /manage_courses');
			exit;
		}

		$courseInfo = array();

		$session_result = $get_results->fetch(PDO::FETCH_ASSOC);

		$course_name = $session_result['course_name'];
		$description = $session_result['description'];
		$metro_name = $session_result['metro_name'];
		$start_date = $session_result['start_date'];
		$end_date = $session_result['end_date'];
		$start_date_time = $session_result['start_date_time'];
		if ($start_date_time != "") {
			$start_hour = date("H", strtotime($start_date_time));
			$start_minute = date("i", strtotime($start_date_time));
		}
		$end_date_time = $session_result['end_date_time'];
		if ($end_date_time != "") {
			$end_hour = date("H", strtotime($end_date_time));
			$end_minute = date("i", strtotime($end_date_time));
		}
		$session_type = $session_result['session_type'];
		$cost = number_format((float)$session_result['cost'],2,'.','');
		$currency = $session_result['currency'];
		$active = $session_result['active'];
		//$discount_cost = $session_result['discount_cost'];
		//$discount_end_date = $session_result['discount_end_date'];
		//$discount_currency = $session_result['discount_currency'];
		$suite = $session_result['suite'];
		$street_address = $session_result['street_address'];
		$city_name = $session_result['city_name'];
		//$cost_alternate = $session_result['cost_alternate'];
		//$currency_alternate = $session_result['currency_alternate'];

		$templateFields = array('course_name' => $course_name, 'description' => $description, 'metro_name' => $metro_name, 'start_date' => $start_date, 'end_date' => $end_date,
			'start_date_time' => $start_date_time, 'end_date_time' => $end_date_time, 'session_type' => $session_type, 'cost' => $cost, 'currency' => $currency, 'active' => $active,
			'suite' => $suite, 'street_address' => $street_address, 'city_name' => $city_name, 'sessionList' => $sessionList, 'start_hour' => $start_hour,
			'end_hour' => $end_hour, 'start_minute' => $start_minute, 'end_minute' => $end_minute);
	}
	else {
		$search_sql = "
			SELECT course_name
			FROM course
			WHERE course.course_id = ? and course.vendor_id = ?";

		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute(array($_GET["id"], $_SESSION['vendor_id']));

		$session_result = $get_results->fetch(PDO::FETCH_ASSOC);

		$course_name = $session_result['course_name'];
		$templateFields = array('sessionList' => $sessionList, 'course_name' => $course_name);
	}
}
else {
	header('Location: /manage_courses');
	exit;
}

displayTemplate('edit_session', $templateFields);
displayTemplate('footer');