<?php

session_start();

$session_id = $_POST['session_id'];
$course_id = $_POST['course_id'];
$session_type = $_POST['session_type'];
$start = $_POST['start'];
$end = $_POST['end'];
$start_hour = $_POST['start_hour'];
$start_minute = $_POST['start_minute'];
$end_hour = $_POST['end_hour'];
$end_minute = $_POST['end_minute'];
$description = $_POST['session_description'];
$metro = $_POST['metro'];
$suite = $_POST['suite'];
$street = $_POST['street'];
$city = $_POST['city'];
$currency = $_POST['currency'];
$cost = $_POST['cost'];

if ($start_hour == "" || $start_minute == "") {
	$start_date_time = "NULL";
}
else {
	$start_date_time = $start_hour . ":" . $start_minute;
}

if ($end_hour == "" || $end_minute == "") {
	$end_date_time = "NULL";
}
else {
	$end_date_time = $end_hour . ":" . $end_minute;
}


if ($session_id != "") {
	$session_sql = 'UPDATE course_session SET
		metro_name = ?,
		start_date = ?,
		end_date = ?,
		start_date_time = ?,
		end_date_time = ?,
		session_type = ?,
		description = ?,
		cost = ?,
		currency = ?,
		suite = ?,
		street_address = ?,
		city_name = ?
		WHERE session_id = ?';
	$get_results = $GLOBALS['_db']->prepare($session_sql);
	$get_results->execute(array($metro, $start, $end, $start_date_time, $end_date_time, $session_type, $description, $cost, $currency, $suite, $street_address, $city_name, $session_id));
	header('Location: /edit_course?id='.$course_id.'&return=saved');
	exit;
}
else {
	$session_sql = 'INSERT INTO course_session (metro_name, start_date, end_date, start_date_time, end_date_time, session_type, description, cost, currency, suite, street_address, city_name, timestamp, course_id, active)
	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)';
	$get_results = $GLOBALS['_db']->prepare($session_sql);
	$get_results->execute(array($metro, $start, $end, $start_date_time, $end_date_time, $session_type, $description, $cost, $currency, $suite, $street_address, $city_name, "now()", $course_id));
	header('Location: /edit_course?id='.$course_id.'&return=added');
	exit;
}

?>