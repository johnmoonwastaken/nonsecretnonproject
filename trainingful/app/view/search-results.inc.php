<div class="8u skel-cell-important">

<?php
$search_term = $_GET["search"];

echo '							<!-- Content -->
								<article id="content">
									<header>
										<h2>Training about "'.$search_term.'"</h2>
									</header>';

	// Retrieve HTTP GET statement for country_name
	if ($search_term != "") {
		$search_min_date = $_GET["from"];
		$search_max_date = $_GET["to"];
		$search_metro = $_GET["near"];
		// Insert search record into database
		$sql_statement = "INSERT INTO searches(search_term,ip_address,search_time,min_date,max_date,metro_name) VALUES('".$search_term."','".$_SERVER['REMOTE_ADDR']."',now(),".$search_min_date.",".$search_max_date.",'".$search_metro."')";
		$result = $GLOBALS['_db']->exec($sql_statement);
		$insertId = $GLOBALS['_db']->lastInsertId();
		$added_sql = "";
		if ($search_metro != "Anywhere" and $search_metro != "") {
			$added_sql = " AND course_session.metro_name LIKE '%".$search_metro."%'";
		}
		$search_sql = "
			SELECT categories.category_name, categories.sub_category_name, 
				course_session.cost, course_session.currency, 
				vendor.vendor_name, course.course_id, course.course_name, course.avg_rating,
				course_session.start_date, course_session.end_date, course_session.metro_name 
				FROM course
				JOIN course_session 
					ON course.course_id=course_session.course_id 
				JOIN vendor 
					ON course.vendor_id=vendor.vendor_id 
				JOIN categories
					ON course.category_id=categories.category_id
				WHERE course.course_name LIKE '%".$search_term."%' AND course_session.start_date >= '".$search_min_date."' AND course_session.end_date <= '".$search_max_date."'".$added_sql." 
				ORDER BY course.click_count, course.course_id, course.vendor_id";
	}
	else {
		$category_id = $_GET["category_id"];
		$search_min_date = date("Y-m-d");
		$search_sql = "
		SELECT categories.category_name, categories.sub_category_name, 
			course_session.cost, course_session.currency, 
			vendor.vendor_name, course.course_id, course.course_name, course.avg_rating,
			course_session.start_date, course_session.end_date, course_session.metro_name 
			FROM course
			JOIN course_session 
				ON course.course_id=course_session.course_id
			JOIN vendor 
				ON course.vendor_id=vendor.vendor_id
			JOIN categories
				ON course.category_id=categories.category_id
			WHERE course.category_id = ".$category_id." AND course_session.start_date >= '".$search_min_date."'
			ORDER BY course.click_count, course.course_id, course.vendor_id";
	}
	
	$get_results = $GLOBALS['_db']->prepare($search_sql);
    $get_results->execute();

	$last_course_id = 0;
	echo '	<div class="container">';
    foreach ($get_results as $temp) {
    	$course_id = $temp['course_id'];
        $course_name = $temp['course_name'];
        $course_start = date("M-j",strtotime($temp['start_date']));
        $course_end = date("M-j",strtotime($temp['end_date']));
        $metro_name = $temp['metro_name'];
        $vendor_name = $temp['vendor_name'];
        $currency = $temp['currency'];
        $category = $temp['category_name'];
        $sub_category = $temp['sub_category_name'];
        $avg_rating = $temp['avg_rating'];
        $cost = substr($temp['cost'],0,-6);
        //echo "Course Name: <a href='course.php?course_id=".$course_id."'>" . $course_name . "</a> " . $course_start . " " . $course_end ." " . $metro_name . "<br />";

		if ($course_id != $last_course_id and $last_course_id != 0) {
			echo '
	        				</div>
						</div>';
		}
        if ($course_id != $last_course_id) {
        	echo '
        				<div class="row half">
        					<div class="7u">
        						<a href="course?course_id='.$course_id.'"><h4>'.$course_name.'</h4></a>
        					</div>
        					<div class="2u">6/6</div>
        					<div class="2u">Review</div>
        					<div class="1u"></div>
    					</div>
						<div class="row quarter">
							<div class="1u">&nbsp;</div>
							<div class="2u">
								<div class="row 12u">LOGO</div>
								<div class="row 12u">'.$vendor_name.'</div>
							</div>
							<div class="4u">
								<div class="row">DESCRIPTION</div>
								<div class="row">'.$category.' > '.$sub_category.'</div>
							</div>
							<div class="5u">';
        }
   		echo '<div class="row flush"><a href="">'.$metro_name.' '.$course_start.' to '.$course_end.' [$'.$cost. ' '.$currency.']</a></div>';
		$last_course_id = $course_id;
    }
    echo '
							</div>
						</div>';


echo '							</article>
						</div>
					</div>';

?>

</div>
