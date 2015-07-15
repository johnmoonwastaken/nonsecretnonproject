<?php include('page-head.inc.php'); ?>
	
	<body class="left-sidebar">
	
		<?php include('header-start.inc.php'); ?>
		<?php include('header-end.inc.php'); ?>
		
		<!-- Main -->
		<div class="wrapper">
			<div class="container" id="main">
				<?php
				// Retrieve HTTP GET statement for country_name
				$course_id = $_GET["course_id"];
				//echo "Course ID: ", $course_id, "<br />";
				
				// Adds a view count to the course
				$sql_statement = "UPDATE course SET click_count = click_count + 1 WHERE course_id = '".$course_id."'";
				$result = $GLOBALS['_db']->exec($sql_statement);
				
				// Course Data SQL
				$search_sql = "SELECT vendor_id, category_id, course_name, course_description, days_length, avg_rating, course_url, active, click_count FROM course WHERE course_id = ".$course_id;
				//echo $search_sql . "<br /><br />";
				
				$get_results = $GLOBALS['_db']->prepare($search_sql);
			    $get_results->execute();
			    
			    // Fetch course data
			    $course_result = $get_results->fetch();
			    $course_name = $course_result['course_name'];
			    $vendor_id = $course_result['vendor_id'];
			    $category_id = $course_result['category_id'];
			    $course_description = $course_result['course_description'];
			    $days_length = $course_result['course_length'];
			    $avg_rating = $course_result['avg_rating'];
			    $course_url = $course_result['course_url'];
			    $active = $course_result['active'];
			    $click_count = $course_result['course_count'];
			    
			    // Category Data
			    $search_sql = "SELECT category_name, sub_category_name FROM categories WHERE category_id = ".$category_id;
			    $get_results = $GLOBALS['_db']->prepare($search_sql);
			    $get_results->execute();
			    $category_result = $get_results->fetch();
			    $category_name = $category_result['category_name'];
			    $sub_category_name = $category_result['sub_category_name'];
			    echo '<div class="row half">';
			    echo '<div class="12u">' . $category_name," > ". $sub_category_name ."</div></div>";
			    
			    echo '<div class="row half">';
			    echo '<div class="1u">LOGO</div>';
			    echo '<div class="11u">';
			    echo '<div class="row flush"><div class="12u"><h3>';
			    echo $course_name;
			    echo '</h3></div></div>';
			    
			    // Gather vendor data
			    $search_sql = "SELECT vendor_name, contact_number, contact_email, avg_rating, website_url, branding_url FROM vendor WHERE vendor_id = ".$vendor_id;
			    $get_results = $GLOBALS['_db']->prepare($search_sql);
			    $get_results->execute();
			    
			    $vendor_result = $get_results->fetch();
			    $vendor_name = $vendor_result['vendor_name'];
			    $vendor_contact_number = $vendor_result['contact_number'];
			    $vendor_contact_email = $vendor_result['contact_email'];
			    $vendor_rating = $vendor_result['avg_rating'];
			    $vendor_url = $vendor_result['website_url'];
			    $vendor_logo = $vendor_result['branding_url'];
			    
			    echo '<div class="row flush"><div class="12u">';
			    echo $vendor_name;
			    echo '</div></div>';
			    echo '</div></div>';
			    
			    
			    // Session Data
			    $today_date = date("Y-m-d");
			    $search_sql = "SELECT session_id, metro_name, start_date, end_date, session_type, cost, currency, session_remark, seats_remaining, registration_url, discount_cost FROM course_session WHERE course_id = ".$course_id." AND start_date > '".$today_date."' ORDER BY start_date";
			    //echo $search_sql."<br />";
			    $get_results = $GLOBALS['_db']->prepare($search_sql);
			    $get_results->execute();
			    
			    foreach ($get_results as $temp) {
				// print_r(array_keys($temp));
				$session_id = $temp['session_id'];
				$session_metro = $temp['metro_name'];
				$session_start = $temp['start_date'];
				$session_end = $temp['end_date'];
				$session_type = $temp['session_type'];
				$session_cost = substr($temp['cost'],0,-6);
				$session_currency = $temp['currency'];
				$session_remark = $temp['session_remark'];
				$session_seats = $temp['seats_remaining'];
				$session_discount_cost = $temp['discount_cost'];
				$session_registration_url = $temp['registration_url'];
			    echo "<a href='session.php?session_id=".$session_id."'>" . $session_start . " " . $session_end . " " . $session_metro ." " . $session_cost . " ". $session_currency ."</a> <a href='".$session_registration_url."'>Register</a><br />";
			    }
			    echo "<br />";
			    
			    // Remainder of Course Data
			    echo '<div class="row"><div class="12u"><h4>Course Description</h4></div></div>';
			    echo '<div class="row quarter"><div class="12u"><pre class="wrap">', $course_description,'</pre></div></div>';
			    
			    echo "Length: ", $days_length,"<br />";
			    echo "Rating: ", $avg_rating,"<br />";
			    echo "Link: ", $course_url,"<br />";
			    echo "Visited: ", $click_count,"<br />";
			    
			    
			    echo '<div class="row"><div class="12u"><h4>Provider Information</h4></div></div>';
			    echo "Vendor Number:", $vendor_contact_number, "<br />";
			    echo "Vendor E-mail:", $vendor_contact_email, "<br />";
			    echo "Vendor Rating:", $vendor_rating, "<br />";
			    echo "Vendor Website:", $vendor_url, "<br />";
			    echo "<br />";
			    
			    echo '<div class="row"><div class="12u"><h4>Ratings</h4></div></div>';
			    
			    ?>
			</div>
		</div>
		
		
		<?php include('footer-start.inc.php'); ?>
		<?php include('footer-end.inc.php'); ?>
	</body>
	
<?php include('page-foot.inc.php'); ?>
