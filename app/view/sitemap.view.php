<?php

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
	<loc>http://www.trainingful.com/search?keywords=' . urlencode($temp['tag_name']) . '&start=' . $tomorrow->format('Y-m-d') . '&end=' . $end_date->format('Y-m-d') . '&location=' . urlencode($temp['metro_name']) . '&include_online=on</loc>
	<changefreq>daily</changefreq>
	</url>
	';
	$count++;
}

echo "Total Locations: " . $count;
file_put_contents("sitemap.xml", $data);

?>