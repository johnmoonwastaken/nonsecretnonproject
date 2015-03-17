<?php

session_start();

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
$course_id = $_POST['course_id'];

if (isset($course_id)) {
	$course_sql = 'UPDATE course SET
		category_id = ?,
		course_name = ?,
		course_description = ?,
		days_length = ?,
		course_url = ?,
		benefits = ?,
		prereqs = ?,
		audience = ?,
		designation = ?
		WHERE course_id = ?';
	$get_results = $GLOBALS['_db']->prepare($course_sql);
	$get_results->execute(array($category, $course_name, $description, $length, $url, $benefits, $prereqs, $audience, $designation, $course_id));

}
else {
	$course_sql = 'INSERT INTO course (vendor_id, category_id, course_name, course_description, days_length, course_url, benefits, prereqs, audience, designation)
	VALUES (?,?,?,?,?,?,?,?,?,?)';
	$get_results = $GLOBALS['_db']->prepare($course_sql);
	$get_results->execute(array($vendor_id, $category, $course_name, $description, $length, $url, $benefits, $prereqs, $audience, $designation));
}

header('Location: /manage_vendor');
exit;

?>