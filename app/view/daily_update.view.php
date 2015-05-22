<?php

// SETS ALL COURSES TO INACTIVE
$clear_update_sql = "UPDATE course SET active_sessions=0 WHERE 1";
$get_results = $GLOBALS['_db']->prepare($clear_update_sql);
$get_results->execute();

// SETS OLD SESSIONS TO INACTIVE
$batch_update_sql = "UPDATE course_session SET active = 0 where start_date < ?";
$get_results = $GLOBALS['_db']->prepare($batch_update_sql);
$get_results->execute(array(date('Y-m-d')));

// FINDS ACTIVE SESSIONS
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

// SETS COURSES TO ACTIVE IF THEY HAVE ACTIVE SESSIONS
$where_sql = implode(',', array_keys($category_updates));
$update_sql = "UPDATE course SET active_sessions = CASE course_id" . $when_sql . " ELSE active_sessions END
	WHERE course_id IN(".$where_sql.")";

$get_results = $GLOBALS['_db']->prepare($update_sql);
$get_results->execute();

echo $update_sql;

// DROPS THE TOP TAG TABLE
$update_top_tags_sql = "DROP TABLE top_tags";
$get_results = $GLOBALS['_db']->prepare($update_top_tags_sql);
$get_results->execute();

// RECREATES THE TOP TAG TABLE
$update_top_tags_sql = "CREATE TABLE top_tags AS SELECT * FROM (SELECT tag_name, count(tag_name) as total from tag
LEFT JOIN course_tags
ON course_tags.tag_id = tag.tag_id
LEFT JOIN course
ON course_tags.course_id = course.course_id
WHERE course.active_sessions > 0
GROUP BY tag_name
ORDER BY total desc
LIMIT 0,30) as t1
ORDER BY tag_name";
$get_results = $GLOBALS['_db']->prepare($update_top_tags_sql);
$get_results->execute();

$metrics_sql = "UPDATE daily_metrics 
	SET metric_value = (SELECT count(*) as acs FROM course_session where active = 1 and start_date > ?) 
	WHERE metric_name = 'total_sessions'";
$get_results = $GLOBALS['_db']->prepare($metrics_sql);
$get_results->execute(array(date('Y-m-d')));

?>