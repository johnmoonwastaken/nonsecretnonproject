<!DOCTYPE HTML>
<html>
<head>
	<title>trainingful</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/style.css">
	
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
		border-right: 1px solid #d7d7d7;
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
		line-height: 1em;
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
				<h1>Training about "PMP"</h1>
				<p>In <strong>Vancouver, BC</strong> between <strong>09/30/2014</strong> and <strong>10/31/2014</strong> <small>(<a href="#">Change Search</a>)</small></p>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
						<h4 id="results-counter">Filter 245 results:</h4>
					</div>
					<div class="9u">
						<ul id="type-switcher">
							<li class="active"><span class="tick"></span><a href="#">All Training</a></li>
							<li><span class="tick"></span><a href="#">Courses</a></li>
							<li><span class="tick"></span><a href="#">Conferences</a></li>
						</ul>
						
					</div>
				</div>
			</div>
			
			<div id="results-container">
				<div class="row">
					<div class="3u">
						<ul id="filters-accordion">
							<li>
								<a href="#"><span class="icon triangle-down"></span>Name contains</a>
							</li>
							<li>
								<a href="#"><span class="icon triangle-down"></span>Vendor</a>
							</li>
						</ul>
					</div>
					<div class="9u">
						<ul id="results-list">
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
							
							<li>
								<div class="result-rating">
									<span class="rating s4" title="4 stars"></span>
								</div>
								<h2><a href="#">PMP Exam Power Prep</a></h2>
								<p>Immerse yourself in ESI's PMP Exam Power Prep and you'll be well on your way to passing PMI's PMPcertification</p>
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
								</ul>
								<small class="more-sessions"><a href="#">4 more sessions <span class="icon triangle-down"></span></a></small>
							</li>
						</ul>
					</div>
				</div>
			</div>
		
		</div>
		
		
	</section>