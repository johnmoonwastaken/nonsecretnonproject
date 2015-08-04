<?php

session_start();

$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];
$category = $_POST['category'];
$length = $_POST['course_length'];
$description = $_POST['course_description'];
$benefits = $_POST['course_benefits'];
$prereqs = $_POST['course_prereqs'];
$audience = $_POST['course_audience'];
$url = $_POST['course_url'];
$designation = $_POST['course_designation'];
$vendor_id = $_POST['vendor_id'];
$video_url = $_POST['video_url'];
if ($video_url == "") $video_url == "NULL";

if ($course_id != "") {
	$course_sql = 'UPDATE course SET
		category_id = ?,
		course_name = ?,
		course_description = ?,
		days_length = ?,
		course_url = ?,
		benefits = ?,
		prereqs = ?,
		audience = ?,
		designation = ?,
		video_url = ?
		WHERE course_id = ?';
	$get_results = $GLOBALS['_db']->prepare($course_sql);
	$get_results->execute(array($category, $course_name, $description, $length, $url, $benefits, $prereqs, $audience, $designation, $video_url, $course_id));
}
else {
	$course_sql = 'INSERT INTO course (vendor_id, category_id, course_name, course_description, days_length, course_url, benefits, prereqs, audience, designation, video_url)
	VALUES (?,?,?,?,?,?,?,?,?,?,?)';
	$get_results = $GLOBALS['_db']->prepare($course_sql);
	$get_results->execute(array($vendor_id, $category, $course_name, $description, $length, $url, $benefits, $prereqs, $audience, $designation, $video_url));
	$last_id = $GLOBALS['_db']->lastInsertId();
}

if ($course_id == "") {
	header('Location: /edit_session?id='.$last_id);
	exit;
}
else {
	header('Location: /manage_courses?return=saved');
	exit;	
}

?>