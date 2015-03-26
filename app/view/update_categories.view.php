<?php

$clear_update_sql = "UPDATE course SET active_sessions=0 WHERE 1";
$get_results = $GLOBALS['_db']->prepare($clear_update_sql);
$get_results->execute();

$batch_update_sql = "SELECT course_id, COUNT(course_id) AS course_count 
	FROM course_session 
	WHERE active = 1 and (start_date > ? OR session_type = 'Online - Self Learning')
	GROUP BY course_id";
$get_results = $GLOBALS['_db']->prepare($batch_update_sql);
$get_results->execute(array(date('Y-m-d')));

$when_sql = "";
$category_updates = array();

foreach ($get_results as $temp) {
	$category_updates[$temp['course_id']] = $temp['course_count'];
	$when_sql .= " WHEN " . $temp['course_id'] . " THEN ". $temp['course_count'];
	$where_sql .= $temp['course_id'].",";
}

$where_sql = implode(',', array_keys($category_updates));
$update_sql = "UPDATE course SET active_sessions = CASE course_id" . $when_sql . " ELSE active_sessions END
	WHERE course_id IN(".$where_sql.")";

$get_results = $GLOBALS['_db']->prepare($update_sql);
$get_results->execute();

echo $update_sql;
?>