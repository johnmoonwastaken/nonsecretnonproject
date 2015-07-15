<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<title>Top 20 Excel Courses in Vancouver - Trainingful professional training search engine</title>
	<meta name="Title" content="Trainingful: Find the professional course you're looking for, guaranteed.">
	<meta name="Keywords" content="courses, conferences, professional training, training, professional development, online courses, review, reviews, training providers">
	<meta name="Description" content="<?php echo $keywords . " courses" ?> The fastest and easiest way to search for professional courses with thousands of course sessions.">

	<?php if ($totalResults == 0) {
		echo '<link rel="import" href="../../bower_components/elements/guarantee-action-dialog.html">';
		echo '<script>window.addEventListener("polymer-ready", function(e) {
				document.querySelector("#guarantee").ip_address = "' . $_SERVER['REMOTE_ADDR'] . '";
				document.querySelector("#guarantee").query_string = "' . $_SERVER['QUERY_STRING'] . '";
				document.querySelector("#guarantee").toggle();
			});
			</script>';
	} ?>
	<style>
	#main-section {
		background: #f8f8f8;
		position: relative;
		padding-bottom: 40px;
	}
	
	#query-summary-bar {
		height: 120px;
		background: rgba(0, 0, 0, 0.5);
		padding: 25px 25px 0 25px;
		color: #fff;
		position: absolute;
		top: -180px;
	}
	
	#query-summary-bar h1 {
		margin: 0 0 0.05em;
		color: #fff;
		font-weight: 400;
		font-size: 2.2em;
	}
	
	#query-summary-bar p {
		margin: 0;
		font-weight: 300;
	}
	
	#query-summary-bar a {
		color: #fff;
		text-decoration: underline;
	}
	
	#query-summary-bar a:hover {
		text-decoration: none;
	}
	
	#search-control-bar {
		height: 60px;
		background: #4ca166;
		color: #fff;
		position: absolute;
		top: -60px;
	}
	
	#results-counter {
		display: block;
		margin: 0;
		padding-left: 20px;
		font-weight: 400;
		background: #489961;
		height: 60px;
		line-height: 60px;
		font-size: 0.8em;
	}
	
	#type-switcher {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	
	#type-switcher li {
		float: left;
		margin-left: 35px;
		position: relative;
	}
	
	#type-switcher li:first-child {
		margin-left: 0;
	}
	
	#type-switcher li a {
		line-height: 60px;
		color: #fff;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		font-size: 1.1em;
	}
	
	#type-switcher .tick {
		background: url('images/sprites.png') no-repeat 0 0;
		margin: 0 auto;
		width: 11px;
		height: 6px;
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		display: none;
	}
	
	#type-switcher li.active .tick {
		display: block;
	}
	
	#results-container {
		background: #fff;
	}
	
	#filters-accordion {
		list-style: none;
		width: 100%;
		margin: 0;
		padding: 5px 0 0;
		/*border-right: 1px solid #d7d7d7;*/
	}
	
	#filters-accordion li {
		padding: 10px 5px;
		margin: 0 10px;
		color: #585858;
		font-size: 0.85em;
		border-top: 1px solid #d7d7d7;
	}
	
	#filters-accordion li:first-child {
		border-top: 0;
	}
	
	#filters-accordion > li > a {
		color: #585858;
	}
	
	#filters-accordion > li > a:hover {
		text-decoration: none;
	}
	
	#filters-accordion > li > a > .icon {
		margin-right: 3px;
	}
	
	#results-list {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	
	#results-list > li {
		overflow: hidden;
		padding: 30px 0 0;
		border-top: 1px solid #d7d7d7;
		margin: 30px 30px 30px 0;
	}
	
	#results-list > li:first-child {
		padding: 0;
		border-top: none;
	}
	
	#results-list .result-rating {
		margin-top: 5px;
		float: right;
	}
	
	#results-list h2 {
		margin: 0 0 0.1em;
	}
	
	#results-list p {
		margin: 0.3em 0 0.8em;
		font-size: 0.85em;
		font-weight: 300;
		color: #969696;
	}
	
	#results-list p strong {
		color: #656565;
	}
	
	#results-list .company-logo {
		float: left;
		max-height: 70px;
		max-width: 70px;
	}
	.discount {
		color: #ff7777;
	}
	.form-date {
		width:82px;
		padding-left: 4px;
		padding-right: 4px;
	}
	.form-name {
		width:185px;
		padding-left: 4px;
		padding-right: 4px;
	}
	.form-price {
		width:73px;
		padding-left: 4px;
		padding-right: 4px;
	}
	.inputbox {
		margin-top:10px;
	}
	.pricebox {
		margin-left: 15px;
		font-size: 0.9em;
		margin-bottom:10px;
		color: #555;
	}
	.sessions-list {
		list-style: none;
		margin: 0 70px 0 80px;
		padding: 0;
	}
	
	.sessions-list li {
		margin: 0 0 1px 0;
		padding: 0 0 0 15px;
		background: #f2f2f2;
	}
	
	.sessions-list li > a {
		display: block;
		height: 33px;
		overflow: hidden;
	}
	
	.sessions-list li > a:hover {
		text-decoration: none;
	}
	
	.sessions-list h4 {
		color: #515151;
		font-weight: 400;
		margin: 0;
		line-height: 1em;
		font-size: 0.8em;
	}
	
	.sessions-list small {
		font-weight: 300;
	}
	
	.sessions-list .icon.calendar {
		float: left;
		color: #afafaf;
		margin-top: 15px;
	}
	
	.sessions-list .session-dates {
		margin: 3px 0 0 23px;
	}
	
	.sessions-list .session-location {
		color: #969696;
		margin: 0 0 0 23px;
		display: block;
		line-height: 1.5em;
	}
	
	.sessions-list .session-price-container {
		margin: 3px 15px 0 0;
		float: right;
		text-align: right;
		color: #969696;
	}
	
	.sessions-list .session-price-container h4 {
		color: #515151;
		line-height: 0.8em;
		font-size: 0.8em;
	}
	
	.sessions-list .session-price-container small {
		line-height: 1.5em;
	}
	
	.sessions-list .chevron-container {
		float: right;
		text-align: center;
		height: 63px;
		width: 46px;
		background: #f6c66b;
	}
	
	.sessions-list .icon.chevron-right {
		color: #fff;
		font-size: 2em;
		line-height: 34px;
	}

	.smaller-button {
		margin-top: 10px;
		margin-left: 45px;
		margin-bottom: 10px;
		height: 35px;
		width: 120px;
		padding: 5px 10px 5px 10px;
		font-size: 1em;
	}
	
	#results-list .more-sessions {
		margin: 3px 0 0 80px;
		color: #969696;
		display: block;
	}
	
	#results-list .more-sessions a {
		color: #969696;
	}
	
	#results-list .more-sessions .icon {
		font-size: 1.6em;
	}

	#searchbox-location {
		font-size: 0.8em;
	}

	#trainingful-guarantee {
		border: 2px dotted rgba(0,0,0,0.5);
		border-radius: 10px;
		padding: 6px 20px 6px 20px;
		margin: 15px 165px 15px 165px;
		width: 350px;
	}

	.description {
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		font-weight: 600;
		color: #5b5b5b;
		font-size: 0.8em;
		text-align: center;
	}

	.guarantee {
		text-align: center;
		font-family: "Pacifico";
		font-size: 1.3em;
		color: rgba(0,0,0,0.85);
		margin-bottom: 10px;
	}

	.no-results {
		font-family: "Pacifico", 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		font-size: 1.0em;
	}

	#guarantee-form {
		margin-top: 15px;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		color: rgba(0,0,0,0.85);
	}

	.guarantee-form-title {
		margin-top: 10px;
		font-size:0.9em;
	}

	.form-guarantee-input {
		width:285px;
		padding-left: 4px;
		padding-right: 4px;
	}
	</style>
	
	<!-- DATE RANGE PICKER -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="../../bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../bower_components/moment/moment.js"></script>
	<script type="text/javascript" src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- END DATE RANGE PICKER -->

</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container">
		
			<div id="query-summary-bar" class="container">
				<?php if ($start): ?>
				<h1><?php echo $keywords; ?> courses in <?php if (empty($location)) { $location = "Everywhere"; echo "Everywhere"; } else echo $location; ?></h1>
				<p>Between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong> <small>(<a href="/?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Change Search</a>)</small></p>
				<?php elseif ($_GET['category']): ?>
					<h1>Explore Categories</h1>
					<p>In <strong><?php echo $parent_category_name . " - " . $category_name; ?></strong> <small>(<a href="/categories">Change Category</a>)</small></p>
				<?php elseif ($_GET['tag']): ?>	
					<h1><?php echo $_GET['tag']; ?> courses</h1>
					<p><!--Courses tagged with <strong><?php echo $_GET['tag']; ?></strong> <small>(<a href="/">Home</a>)</small>--></p>
				<?php endif; ?>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
					<?php  	$page = 1;
						$shown = 20;
						if ($_GET['page'] != "") {
							$page = $_GET['page'];
						}
						$upto = $page * $shown;
						if ($upto > $totalResults)
						{
							$upto = $totalResults;
						} ?>
						<h4 id="results-counter"><!--Filter--> <?php if ($upto > 1) {echo "Showing " . (($page -1) * $shown + 1) . "-" . $upto . " of " . $totalResults . " results"; } else { echo "No results found"; } ?></h4>
					</div>
					<div class="9u">
						<ul id="type-switcher">
							<!--<li class="active"><span class="tick"></span><a href="#">All Training</a></li>-->
							
							<li class="active"><span class="tick"></span><a href="#">Courses</a></li>
							<!--<li><span class="tick"></span><a href="#">Conferences</a></li>
							-->
						</ul>
						
					</div>
				</div>
			</div>
			
			<div id="results-container">
				<div class="row">
					<div class="3u">
						<form id="filterbox" action="search" method="get">
							<?php if ($_GET['category'] != '') { echo '<input type="hidden" name="category" value="' . $_GET['category'] . '">'; } ?>
						<ul id="filters-accordion">
							<li>
								<a href="#"><span class="icon triangle-down"></span>Name contains</a>
								<div class="inputbox">
									<input type="text" id="searchbox-keywords" name="keywords" placeholder="" required class="form-text form-name" <?php if ($keywords) { echo 'value="'.$keywords.'"'; } ?>>
								</div>
							</li>
							<!--
							<li>
								<a href="#"><span class="icon triangle-down"></span>Vendor</a>
							</li>
							-->
							<li>
								<a href="#"><span class="icon triangle-down"></span>Date</a>
								<div class="inputbox">
									<input type="text" id="searchbox-start" name="start" class="form-text form-date" <?php if ($start) { echo 'value='.$start; } ?>> to
									<script type="text/javascript">
						               $(document).ready(function() {
					    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
					            	      });
						               });
				    	           	</script>
									<input type="text" id="searchbox-end" name="end" class="form-text form-date" <?php if ($end) { echo 'value='.$end; } ?>>
									<script type="text/javascript">
						               $(document).ready(function() {
					    	              $('#searchbox-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
					            	      });
						               });
				    	           	</script>
								</div>
							</li>
							<li>
								<a href="#"><span class="icon triangle-down"></span>Price</a>
							</li>
								<div class="pricebox">
									$<input type="text" id="min-price" name="min" class="form-text form-price" <?php if ($_GET['min'] == '') { echo 'value="0"'; } else echo 'value="' . $_GET['min'] . '"'; ?>> to 
									$<input type="text" id="max-price" name="max" class="form-text form-price" <?php if ($_GET['max'] == '-1') { echo 'value=""'; } else echo 'value="' . $_GET['max'] . '"';?>>
								</div>
							<li>
								<a href="#"><span class="icon triangle-down"></span>Location</a>
								<div class="inputbox">
									<select id="searchbox-location" name="location" placeholder="Location">
										<option value="Everywhere" <?php if ($location == "Everywhere") echo 'selected'; ?>>Everywhere</option>
										<?php foreach ($locationList as $metro): ?>
											<option value="<?php echo $metro['metro_name']; ?>" <?php if ($location == $metro['metro_name']) echo 'selected'; ?>><?php echo $metro['country_name'] . " - " . $metro['metro_name']; ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="row 0% uniform" style="margin-top:5px;">
									<input type="checkbox" name="include_online" <?php if ($include_online == "on") echo "checked"; ?> style="width:15px;height:15px;vertical-align:bottom;margin-bottom:2px;display:inline;"><span style="font-size:0.9em;margin-left:5px;">Include online courses</span>
								</div>
							</li>
						</ul>
						<button type="submit" class="form-submit smaller-button">Filter Results</button>
						</form>
					</div>
					<div class="9u">
						<ul id="results-list">
								<?php if (is_array($courseList) and $totalResults > 0) { for($i = ($page - 1) * $shown; $i < $upto; ++$i): ?>
							<li><!--
								<div class="result-rating">
									<span class="rating s4" title="4 stars"></span>
								</div>
							-->
								<h2>
									<?php if ($start !=""): ?>
									<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>"><?php echo $courseList[$i]['course_name']; ?></a>
									<?php else: ?>
									<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>"><?php echo $courseList[$i]['course_name']; ?></a>
									<?php endif; ?>
								</h2>

								<p><strong><?php echo $courseList[$i]['vendor_name']; ?>:</strong> 
								<?php 
								$max_offset = 190;
								if (strlen($courseList[$i]['course_description']) < $max_offset) {
									echo $courseList[$i]['course_description'];
								}
								else {
									$pos=mb_strpos($courseList[$i]['course_description'], ' ', $max_offset); 
									echo mb_substr($courseList[$i]['course_description'],0,$pos) . '...';
								}
								?></p>
								<img src="images/vendors/<?php if ($courseList[$i]['branding_url'] == '-1' || $courseList[$i]['branding_url'] == "") { echo 'trainingful-branding-70.gif'; } else echo $courseList[$i]['branding_url']; ?>" alt="<?php echo $courseList[$i]['vendor_name']; ?>" class="company-logo">
								<ul class="sessions-list">
									<?php foreach($courseList[$i]['sessionList'] as $session): ?>
									<li>
										<?php if ($start !=""): ?>
										<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>&session=<?php echo $session['session_id']; ?>">
										<?php else: ?>
										<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&session=<?php echo $session['session_id']; ?>">
										<?php endif; ?>
											<div class="chevron-container">
												<span class="icon chevron-right"></span>
											</div>
											<span class="icon calendar"></span>
											<div class="session-price-container">
												<h4><?php 
													if (isset($session['discount_end_date']) && date('Y-m-d') < $session['discount_end_date']) {
														echo '<span class="discount">'.$session['discount'].'</span>';
													}
													else {
														echo $session['cost'];
													}
													?></h4>
												<small><?php echo $session['currency']; ?></small>
											</div>
											<h4 class="session-dates"><?php { 
											if ($session['session_type'] == "Online - Self Learning") {
												echo "Online";
											}
											else {
												echo date("M j, Y", strtotime($session['start_date'])); 
												if ($session['start_date'] != $session['end_date']) { 
													echo " - ".date("M j, Y", strtotime($session['end_date']));
												} 
											}
										} ?></h4>
											<small class="session-location"><?php if ($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></small>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</li>
							<?php endfor; } else echo "<li class='no-results'>Sorry, no results available. Please try another search.</li>";?>
						</ul>
						<div class="row">
							<div class="6u">&nbsp;
								<?php 
									if ($page > 1) { 
										if ($_GET['category'] != "") {
											echo '<a href="search?category=' . $_GET['category'] . '&page=' . ($page-1) . '">< Previous Page</a>';
										}
										else if ($_GET['tag'] != "") {
											echo '<a href="search?tag=' . $_GET['tag'] . '&page=' . ($page-1) . '">< Previous Page</a>';
										}
										else echo '<a href="search?keywords=' . $keywords . '&start=' . $start . '&end=' . $end . '&location=' . $location . '&page=' . ($page-1) . '">< Previous Page</a>'; 
									} ?>
							</div>
							<div class="6u" style="text-align:right;">
								<?php
									if ($totalResults > $upto) { 
										if ($_GET['category'] != "") {
											echo '<a href="search?category=' . $_GET['category'] . '&page=' . ($page+1) . '">Next Page > </a>';
										}
										else if ($_GET['tag'] != "") {
											echo '<a href="search?tag=' . $_GET['tag'] . '&page=' . ($page+1) . '">Next Page > </a>';
										}
										else echo '<a href="search?keywords=' . $keywords . '&start=' . $start . '&end=' . $end . '&location=' . $location . '&page=' . ($page+1) . '">Next Page > </a>'; 
									} ?>
								&nbsp;
							</div>
						</div>
						<div class="row 25% uniform">
							<div id="trainingful-guarantee">
								<div class="guarantee">the trainingful guarantee</div>
								<div class="description">Did you find the courses you were looking for? If not, we'll personally help find it for you.</div>
								<form id="guarantee-box" action="guarantee" method="post">
									<div id="guarantee-form">
										<div class="guarantee-form-title">Name</div>
										<input type="text" id="guarantee-box-name" name="name" placeholder="Name" class="form-text form-guarantee-input">
										<div class="guarantee-form-title">E-mail</div>
										<input type="text" id="guarantee-box-email" name="email" placeholder="abc@xyz.com" class="form-text form-guarantee-input">
										<div class="guarantee-form-title">What were you looking for?</div>
										<textarea class="form-text form-guarantee-input" rows="2" name="comments" placeholder="Type of course, location, date range, etc."></textarea>
										<input type="hidden" name="ip_address" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
										<input type="hidden" name="query_string" value="<?php echo $_SERVER['QUERY_STRING'] ?>">
									</div>
									<button type="submit" class="form-submit smaller-button" style="margin-left:90px">Let us help!</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<guarantee-action-dialog id="guarantee" backdrop transition="paper-dialog-transition-bottom" heading="<?php echo $keywords ?>"></guarantee-action-dialog>
		
	</section>