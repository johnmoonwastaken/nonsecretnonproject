<?php

$templateFields = array();

$search_sql = "
	SELECT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
			course_session.start_date, course_session.end_date, course_session.location, course_session.cost, course_session.currency
	FROM course
	LEFT JOIN course_session
	ON course.course_id = course_session.course_id
	WHERE course_name LIKE ? and course.active = 1 and course_session.active = 1 and course_session.start_date > ? and course_session.end_date < ? and location LIKE ?
	ORDER BY course_id, start_date, click_count";

/*$search_sql = "
	SELECT course.course_id, course.vendor_id, course.course_name, course.course_description, course.avg_rating, course_session.session_id,
			course_session.start_date, course_session.end_date, course_session.location, course_session.cost, course_session.currency
	FROM course
	LEFT JOIN course_session
	ON course.course_id = course_session.course_id
	WHERE course_name LIKE '%" . $_GET["keywords"] . "%' and course.active = 1 and course_session.active = 1 and course_session.start_date > '". $_GET["start"] ."' and course_session.end_date < '". $_GET["end"] ."' and location LIKE '%" . $_GET["location"] ."%'
	ORDER BY course_id, start_date, click_count";

	echo $search_sql;*/
	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute(array("%".$_GET["keywords"]."%",$_GET["start"],$_GET["end"],"%".$_GET["location"]."%"));

	foreach ($get_results as $temp) {

		$course_id = $temp['course_id'];
		$vendor_id = $temp['vendor_id'];
		$course_name = $temp['course_name'];
		$course_description = $temp['course_description'];
		$avg_rating = $temp['avg_rating'];
		$session_id = $temp['session_id'];
		$start_date = $temp['start_date'];
		$end_date = $temp['end_date'];
		$location = $temp['location'];
		$cost = $temp['cost'];
		$currency = $temp['currency'];
		
		echo $course_id . " " . $session_id . "<br />";
/*				
		if ($course_count > 0) {
			$functionsCategories[$row_count]['id']=$category_id;
			$functionsCategories[$row_count]['name']=$category_name;
			$functionsCategories[$row_count]['course_count']=$course_count;
			$row_count++;
			}
	*/	
	}

displayTemplate('search', $templateFields);
displayTemplate('footer');