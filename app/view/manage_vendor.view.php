<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title>trainingful: edit courses</title>
	
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

	#filters-accordion li.selected {
		background-color: #eee;
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
	
	#edit-course-list {
		list-style: none;
		margin: 0;
		padding: 0;
		padding-top: 5px;
	}
	
	#edit-course-list > a li {
		overflow: hidden;
		margin: 0;
		font-size: 0.8em;
		border-bottom: 1px dotted #d7d7d7;
		line-height: 2em;
	}

	#edit-course-list > a li:hover {
		background: #f3f3f3;
	}

	#edit-course-list .result-rating {
		margin-top: 5px;
		float: right;
	}
	
	#edit-course-list h2 {
		margin: 0 0 0.1em;
	}
	
	#edit-course-list p {
		margin: 0.3em 0 0.3em;
		font-weight: 300;
		color: #333;
	}
	
	#edit-course-list p strong {
		color: #656565;
	}
	
	#edit-course-list .more-sessions {
		margin: 3px 0 0 80px;
		color: #969696;
		display: block;
	}
	
	#edit-course-list .more-sessions a {
		color: #969696;
	}
	
	#edit-course-list .more-sessions .icon {
		font-size: 1.6em;
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
	
	.course-row {
		border-right:1px dotted #d7d7d7;
	}
	.unpadded {
		padding-left:0;
		text-align: center;
	}
	.double-height {
		line-height: 2.8em;
	}
	</style>
	
</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container">
		
			<div id="query-summary-bar" class="container">
				<h1>Edit Courses</h1>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
					<?php  	$page = 1;
						$shown = 50;
						if ($_GET['page'] != "") {
							$page = $_GET['page'];
						}
						$upto = $page * $shown;
						if ($upto > $totalResults)
						{
							$upto = $totalResults;
						} ?>
						<h4 id="results-counter"><!--Filter--> Showing <?php echo ($page -1) * $shown + 1; ?>-<?php echo $upto; ?> of <?php echo $totalResults; ?> results</h4>
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
						<ul id="filters-accordion">
							<li>Profile</li>
							<li class="selected">Edit Courses</li>
							<li>Edit Conferences</li>
						</ul>
					</div>
					<div class="9u">
						<ul id="edit-course-list">
							<li>
								<div class="row" style="font-size:0.8em;padding-left:0;text-align:center">
									<div class="10u course-row double-height">Course Name</div>
									<div class="1u course-row unpadded">Active Sessions</div>
									<div class="1u unpadded double-height">Edit</div>
								</div>
							</li>
							<?php if (is_array($courseList) and $totalResults > 0) { for($i = ($page - 1) * $shown; $i < $upto; ++$i): ?>
							<!--
								<div class="result-rating">
									<span class="rating s4" title="4 stars"></span>
								</div>
							-->
								<a href="edit_course?id=<?php echo $courseList[$i]['course_id'] ?>">
									<li>
										<div class="row">
											<div class="10u course-row">
												<?php echo $courseList[$i]['course_name'] ?>
											</div>
											<div class="1u course-row unpadded">
												<?php echo $courseList[$i]['active_sessions'] ?>
											</div>
											<div class="1u unpadded">
												<span class="icon chevron-right"></span>
											</div>
										</div>
									</li>
								</a>
								
							<?php endfor; } else echo "<li>Sorry, no results available, please try another search.</li>";?>
						</ul>
						<div class="row">
							<div class="6u">&nbsp;
								<?php 
									if ($page > 1) { 
										if ($_GET['category'] != "") {
											echo '<a href="search?category=' . $_GET['category'] . '&page=' . ($page-1) . '">< Previous Page </a>';
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
										else echo '<a href="search?keywords=' . $keywords . '&start=' . $start . '&end=' . $end . '&location=' . $location . '&page=' . ($page+1) . '">Next Page > </a>'; 
									} ?>
								&nbsp;
							</div>
						</div>
						
							<!--
							<li>
								<div class="result-rating">
									<span class="rating s4" title="4 stars"></span>
								</div>
								<h2><a href="#">PMP Exam Power Prep</a></h2>
								<p><strong>ESI International:</strong> Immerse yourself in ESI's PMP Exam Power Prep and you'll be well on your way to passing PMI's PMP certification</p>
								<img src="images/samples/esi-international.png" alt="ESI International" class="company-logo">
								<ul class="sessions-list">
									<li>
										<a href="#">
											<div class="chevron-container">
												<span class="icon chevron-right"></span>
											</div>
											<span class="icon calendar"></span>
											<div class="session-price-container">
												<h4>$2495.00</h4>
												<small>CAD</small>
											</div>
											<h4 class="session-dates">Oct 6, 2014 - Oct 10, 2014</h4>
											<small class="session-location">Vancouver, BC</small>
										</a>
									</li>
							
									<li>
										<a href="#">
											<div class="chevron-container">
												<span class="icon chevron-right"></span>
											</div>
											<span class="icon calendar"></span>
											<div class="session-price-container">
												<h4>$2495.00</h4>
												<small>CAD</small>
											</div>
											<h4 class="session-dates">Oct 6, 2014 - Oct 10, 2014</h4>
											<small class="session-location">Vancouver, BC</small>
										</a>
									</li>

								</ul>
								<small class="more-sessions"><a href="#">4 more sessions <span class="icon triangle-down"></span></a></small>
							</li>
						-->
					</div>
				</div>
			</div>
		
		</div>
		
		
	</section>