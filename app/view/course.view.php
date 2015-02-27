<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title>trainingful</title>

	<link rel="import" href="../../bower_components/elements/session-action-dialog.html">

	<style>
	
	.wrapper {
    	position:relative;
	    margin:30px;
	    padding-bottom:180px;
	}

	.arc {
	    position:absolute;
	    top:0;
	    left:0;
	    width:180px;
    	height:180px;
	    border-radius:100%;
	    border:7px solid;
		}
		
	.arc_start {
    	border-color:transparent transparent transparent #ffb830;
	    transform: rotate(0deg); /* Arc from 0 degrees */
	}
	.arc_end {
    	border-color:#ffb830 #ffb830 #ffb830 transparent;
	    transform: rotate(45deg); /* to 30 degrees (clockwise) */
	}

	#average-rating {
		color:#aaa;
		font-size:0.18em;
		font-weight:400;
		margin-left:12px;
		margin-top:-5px;
	}
	
	#container2 {
		clear:left;
		float:left;
		width:100%;
		overflow:hidden;
		border-right:1px solid #d7d7d7;
	}
	#container1 {
		float:left;
		width:100%;
		position:relative;
		right:260px;
		border-right:1px solid #d7d7d7;
	}

	#col1 {
		float:left;
		width:727px;
		position:relative;
		left:260px;
		overflow:hidden;
	}
	#col2 {
		float:left;
		width:260px;
		position:relative;
		left:261px;
		overflow:hidden;
	}

	#content-section {
		position: relative;
		padding: 0 20px 0 20px;
		border-bottom: 1px solid #d7d7d7;
	}

	#info-bar {
		list-style: none;
		width: 100%;
		margin: 0;
		padding: 0 0 0 5px;

	}
	
	#info-tags {
		margin: 0px 0px 0px 0px;
		background:#f2f2f2;
		color:#999;
		font-size: 0.8em;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		list-style: none;
		padding: 0 0 0px 0px;
		border-bottom: 1px solid #d7d7d7;
	}

	#info-tags li {
		padding: 10px 10px 10px 10px;
		border-top: 1px solid #d7d7d7;
	}

	#info-sessions {
		margin:0;
		color:#999;
		font-size: 0.8em;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		list-style: none;
		padding:0;
	}

	#info-sessions li {
		padding: 20px 0 0px 10px;
		border-bottom: 1px solid #d7d7d7;
		cursor: pointer;
	}
	
	#info-sessions li:hover {
		background: #cde4d4;
	}

	#info-sessions .dates {
		font-weight: 400;
		font-size: 1.2em;
		color: #666;
		margin-left: 5px;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}

	#info-sessions .location {
		float: left;
		margin-left: 25px;
		font-size: 0.9em;
		width: 100px;
		margin-right:5px;
		color: #aaa;
	}

	#info-sessions .price {
		font-size: 0.9em;
		color: #aaa;
	}

	#info-sessions .selected {
		background-color: #cde4d4;
	}
	
	#main-content {
		overflow: hidden;
		background: #fff;
		border-top: 7px solid #4ca166;
		border-left: 1px solid #d7d7d7;
		border-bottom: 1px solid #d7d7d7;
		padding: 0px 0px 0px 0px;
	}
	
	#main-content h1 {
		margin: 0;
		padding-top:10px;
		font-size: 2.2em;
		color: #444;
		font-weight:400;
	}

	#main-content h4 {
		color:#666;
		margin-left:0.2em;
		font-weight:400;
		font-size: 0.9em;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}

	#main-content h5 {
		color:#666;
		margin-left:0.2em;
		font-weight:400;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}

	#query-summary-bar {
		background: rgba(0, 0, 0, 0.5);
		padding: 25px;
		color: #fff;
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
	
	#rating-percent {
		position:absolute;
		margin:35px 35px;
		font-size:4.5em;
		font-weight:300;
		color:#444;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}
	
	#ratings-section {
		position: relative;
	}

	#vendor-image .company-logo {
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-top: 20px;
		margin-bottom: 10px;
		max-width: 240px;
	}

	#vendor-name {
		text-align: center;
		color: #999;
	}

	.folded-corner {
		width: 0;
		height: 0;
		border-style: solid;
		border-width: 0 0 16px 16px;
		border-color: transparent transparent #4ca067 transparent;
		margin:0 0 -1px 234px;
		-webkit-transform: rotate(360deg);
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
	<script>
	
	window.addEventListener('polymer-ready', function(e) {
		console.log('polymer-ready');
		//document.getElementById('loading-sessions').style.display = "none";
		//document.getElementById('display-sessions').style.display = "inline";
	});

	var sessioninfo = [];

	<?php foreach($sessionList as $session): ?>
	sessioninfo[<?php echo $session['session_id']; ?>] = {session_type: "<?php echo $session['session_type']; ?>", start_date: "<?php echo $session['start_date_formatted']; ?>", start_date_time: "<?php echo $session['start_date_time']; ?>", end_date: "<?php echo $session['end_date_formatted']; ?>", end_date_time: "<?php echo $session['end_date_time']; ?>", metro_name: "<?php echo $session['metro_name']; ?>", location: "<?php echo $session['location']; ?>", cost: "<?php echo $session['cost']; ?>", currency: "<?php echo $session['currency']; ?>", description: "<?php echo $session['description']; ?>"};
	<?php endforeach; ?>

	function showSession(session_id) {
		/*
		if (sessioninfo[session_id].session_type != "-1") {
			document.getElementById('detailed_session_type').innerHTML = "" + sessioninfo[session_id].session_type +": ";
		}

		if (sessioninfo[session_id].description != "-1") {
			document.getElementById('detailed_description').innerHTML = "<p>" + sessioninfo[session_id].description + "</p>";
		}

		if (sessioninfo[session_id].location != "-1") {
			document.getElementById('detailed_location').innerHTML = "<p>" + sessioninfo[session_id].location + "</p>";
		}
		else if (sessioninfo[session_id].metro_name != "-1") {
			document.getElementById('detailed_location').innerHTML = "<p>" + sessioninfo[session_id].metro_name + "</p>";
		}
		else {
			document.getElementById('detailed_location').innerHTML = "";
		}
		document.getElementById('detailed_start').innerHTML = sessioninfo[session_id].start_date;
		document.getElementById('detailed_end').innerHTML = sessioninfo[session_id].end_date;
		document.getElementById('start_end_time').innerHTML = sessioninfo[session_id].start_date_time + "-" + sessioninfo[session_id].end_date_time;
		document.getElementById('detailed_cost').innerHTML = sessioninfo[session_id].cost + " " + sessioninfo[session_id].currency;
		*/
		document.querySelector('#sad').toggle();
		//document.getElementById('sad').toggle();
	}
	</script>
</head>
<body>

	<header>
<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">1
		<div class="container" id="main-container">
		
			<div id="query-summary-bar" class="container">
				<?php if ($start !=""): ?>
					<p><strong><a href="search?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Back to Results</a></strong> | In <strong><?php echo $location; ?></strong> between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong></p>
				<?php endif; ?>
			</div>
			<div id="main-content">
				<div class="row 25% uniform">
					<div id="container2">
					<div id="container1">
					<div class="9u" id="col1">
						<div id="content-section">
							<h1><?php echo $course_name; ?>
							<!-- &nbsp;&nbsp;<span class="rating s4" title="4 stars"></span> --></h1>
							<p style="margin-top:-1.3em;"><span><h5><?php if ($parent_category_name == "") { echo $category_name; } else { echo $parent_category_name." - ".$category_name; }?></h5></span></p>
							<p><h4><?php echo $course_description; ?>
							<!-- <a href="#">Read More ></a> --></h4></p>
							<div id="ratings-section">
							
								<div class="row 25% uniform" style="float:right;margin: 0px 15px 10px 0px;">
									<div class="12u">
										<button type="submit" class="form-submit" onClick="document.getElementById('review-dialog').toggle();">Write a Review</button>
									</div>
								</div>
<!--
								<p><h2 style="margin-top:30px;">15 reviews from our community</h2></p>

<div class="wrapper"><div id="rating-percent">100<span style="font-size:0.5em;">%</span><div id="average-rating">Average Rating</div></div>
    <div class="arc arc_start"></div>
    <div class="arc arc_end"></div>
</div>
								
								<p>This is test content.</p>
								<p>This is test content.</p>
							-->
							</div>
						</div>
					</div>
					<div class="3u" id="col2">
					
						<div id="vendor-image">
							<img src="images/vendors/<?php if ($course['branding_url'] == '-1' || $course['branding_url'] == "") { echo 'trainingful-branding-140.gif'; } else echo $course['branding_url']; ?>" alt="ESI International" class="company-logo">
						</div>
						<div id="vendor-name">
							<strong><?php echo $vendor_name; ?></strong>
						</div>
						<ul id="info-tags">
							<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
							30 PDU towards PMP </li>
							<li><span class="icon price-tag"></span> <strong>Filed and Tagged</strong><br />
							PMP, Project Management</li>
						</ul>
						
						<ul id="info-sessions">
							<div style="padding:10px 0 10px 10px;border-bottom: 5px solid #4ca166;">
								<span class="icon triangle-down"></span> <strong>Register & Session Information</strong>
							</div><!--
							<li id="loading-sessions">Loading course sessions... <img src="../../images/polymer-loader.gif" /></li> -->
							<!--<span id="display-sessions" style="display:none;">--><span id="display-sessions">
								<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
									<li <?php if($session['session_id'] == $_GET['session']) echo 'class="selected"'; ?>  onClick="showSession(<?php echo $session['session_id'] ?>);"><span class="icon calendar"></span> <span class="dates"><?php echo date("M j, Y", strtotime($session['start_date'])); ?> - <?php echo date("M j, Y", strtotime($session['end_date'])); ?></span>
									<div class="location"><?php echo $session['metro_name']; ?></div><div class="price"><?php echo $session['cost']; ?> <?php echo $session['currency']; ?></div>
									<!-- <img src="../../images/lower-triangle.png" style="margin: 0px 0 -5px 234px;" /> -->
									<div class="folded-corner"></div>
								</li>
								<?php endforeach; } ?>
							</span>
						</ul>
					</div>
					</div>
					</div>
				</div>

				<session-action-dialog id="sad" backdrop id="session-dialog" transition="paper-dialog-transition-bottom" style="display:none;" heading="Course Name">
				<!--
				<paper-button dismissive>Cancel</paper-button>
				<paper-button affirmative autofocus>Register</paper-button>
			-->
				</session-action-dialog>
			</div>
		</div>
</section>