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


$data = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc>http://www.trainingful.com/</loc>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>http://www.trainingful.com/categories</loc>
  <changefreq>weekly</changefreq>
</url>
';

$count = 2;

$tags_sql = "SELECT tag.tag_name FROM tag WHERE 1 ORDER BY tag.tag_name";
$get_results = $GLOBALS['_db']->prepare($tags_sql);
$get_results->execute();

foreach ($get_results as $temp) {
	$data = $data . '<url>
	<loc>http://www.trainingful.com/search?tag=' . urlencode($temp['tag_name']) .'</loc>
	<changefreq>weekly</changefreq>
	</url>
	';
	$count++;
}

$search_results_sql = 'SELECT tag.tag_name, course_session.metro_name, count(course_session.metro_name) as mncount
FROM tag
LEFT JOIN course_tags
ON tag.tag_id = course_tags.tag_id
LEFT JOIN course_session
ON course_tags.course_id = course_session.course_id
WHERE course_session.start_date > "2015-06-10" and course_session.metro_name != "Online"
GROUP BY tag_name, metro_name
ORDER BY mncount desc';

$get_results = $GLOBALS['_db']->prepare($search_results_sql);
$get_results->execute();

foreach ($get_results as $temp) {
	$tomorrow = new DateTime('today');
	$tomorrow->modify('+1 day');

	$end_date = new DateTime('today');
	$end_date->modify('+1 year');

	$data = $data . '<url>
	<loc>http://www.trainingful.com/search?keywords=' . urlencode($temp['tag_name']) . '&amp;start=' . $tomorrow->format('Y-m-d') . '&amp;end=' . $end_date->format('Y-m-d') . '&amp;location=' . urlencode($temp['metro_name']) . '&amp;include_online=on</loc>
	<changefreq>daily</changefreq>
	</url>
	';
	$count++;
}

echo "Total Locations: " . $count;

$data = $data . "</urlset>";

file_put_contents("sitemap.xml", $data);

?>