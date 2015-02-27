<!DOCTYPE HTML>
<html>
<head>
	<?php include 'header_required.php' ?>
	<title>trainingful</title>
	
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
		font-size: 1.1em;
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
	</style>
	
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script>
	skel.init({
		containers: '990px'
	});
	</script>
</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container">
		
			<div id="query-summary-bar" class="container">
				<?php if ($_GET['start']): ?>
				<h1>Training about "<?php echo $keywords; ?>"</h1>
				<p>In <strong><?php if (empty($location)) { $location = "Everywhere"; echo "Everywhere"; } else echo $location; ?></strong> between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong> <small>(<a href="/?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Change Search</a>)</small></p>
				<?php else: ?>
					<h1>Explore Categories</h1>
				<?php endif; ?>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
						<h4 id="results-counter"><!--Filter--> Showing <?php echo $totalResults; ?> results:</h4>
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
							<!--
							<li>
								<a href="#"><span class="icon triangle-down"></span>Name contains</a>
							</li>
							<li>
								<a href="#"><span class="icon triangle-down"></span>Vendor</a>
							</li>
						-->
						</ul>
					</div>
					<div class="9u">
						<ul id="results-list">
							<?php if (is_array($courseList) and $totalResults > 0) { foreach($courseList as $course): ?>
							<li><!--
								<div class="result-rating">
									<span class="rating s4" title="4 stars"></span>
								</div>
							-->
								<h2><a href="course?id=<?php echo $course['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>"><?php echo $course['course_name']; ?></a></h2>
								<p><strong><?php echo $course['vendor_name']; ?>:</strong> <?php $pos=mb_strpos($course['course_description'], ' ', 190); echo mb_substr($course['course_description'],0,$pos) . '...';?></p>
								<img src="images/vendors/<?php if ($course['branding_url'] == '-1' || $course['branding_url'] == "") { echo 'trainingful-branding-70.gif'; } else echo $course['branding_url']; ?>" alt="<?php echo $course['vendor_name']; ?>" class="company-logo">
								<ul class="sessions-list">
									<?php foreach($course['sessionList'] as $session): ?>
									<li>
										<a href="course?id=<?php echo $course['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>&session=<?php echo $session['session_id']; ?>">
											<div class="chevron-container">
												<span class="icon chevron-right"></span>
											</div>
											<span class="icon calendar"></span>
											<div class="session-price-container">
												<h4><?php echo $session['cost']; ?></h4>
												<small><?php echo $session['currency']; ?></small>
											</div>
											<h4 class="session-dates"><?php echo date("M j, Y", strtotime($session['start_date'])); ?> - <?php echo date("M j, Y", strtotime($session['end_date'])); ?></h4>
											<small class="session-location"><?php echo $session['metro_name']; ?></small>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</li>
							<?php endforeach; } else echo "<li>Sorry, no results available, please try another search.</li>";?>
						</ul>
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