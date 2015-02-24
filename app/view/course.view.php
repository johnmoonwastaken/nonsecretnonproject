<!DOCTYPE HTML>
<html>
<head>
	<?php include 'favicon.php' ?>
	<title>trainingful</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/style.css">
	
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
	
	#content-section {
		position: relative;
		border-right: 1px solid #d7d7d7;
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
		padding: 0 0 10px 10px;
	}

	#info-tags li {
		padding-top:10px;
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
		padding: 20px 0 20px 10px;
		border-top: 1px solid #d7d7d7;
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
	
	#main-section {
		background: #f8f8f8;
		position: relative;
		padding-bottom: 40px;
	}
	
	#main-container {
		position: relative;
		top: -160px;
		margin-bottom: -160px;
	}
	
	#main-content {
		overflow: hidden;
		background: #fff;
		border-top: 7px solid #4ca166;
		border-left: 1px solid #d7d7d7;
		border-right: 1px solid #d7d7d7;
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
	
	<section id="main-section">1
		<div class="container" id="main-container">
		
			<div id="query-summary-bar" class="container">
				<?php if ($start !=""): ?>
					<p><strong><a href="search?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Back to Results</a></strong> | In <strong><?php echo $location; ?></strong> between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong></p>
				<?php endif; ?>
			</div>
			<div id="main-content">
				<div class="row 25% uniform">
					<div class="9u">
						<div id="content-section">
							<h1><?php echo $course_name; ?>
							<!-- &nbsp;&nbsp;<span class="rating s4" title="4 stars"></span> --></h1>
							<p style="margin-top:-1.3em;"><span><h5><?php if ($parent_category_name == "") { echo $category_name; } else { echo $parent_category_name." - ".$category_name; }?></h5></span></p>
							<p><h4><?php echo $course_description; ?>
							<!-- <a href="#">Read More ></a> --></h4></p>
							<div id="ratings-section">
							
								<div class="row 25% uniform" style="float:right;margin: 0px 15px 0px 0px;">
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
					<div class="3u" style="padding:0;margin-left:0px;border-left:1px solid #d7d7d7;">
					
						<div id="vendor-image">
							<img src="images/vendors/<?php if ($course['branding_url'] == '-1' || $course['branding_url'] == "") { echo 'trainingful-branding-140.gif'; } else echo $course['branding_url']; ?>" alt="ESI International" class="company-logo">
						</div>
						
						<ul id="info-tags">
							<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
							30 PDU towards PMP </li><br />
							<li><span class="icon price-tag"></span> <strong>Filed and Tagged</strong><br />
							PMP, Project Management</li>
						</ul>
						
						<ul id="info-sessions">
							<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
								<li><span class="icon calendar"></span> <span class="dates"><?php echo date("M j, Y", strtotime($session['start_date'])); ?> - <?php echo date("M j, Y", strtotime($session['end_date'])); ?></span>
								<div class="location"><?php echo $session['metro_name']; ?></div><div class="price"><?php echo $session['cost']; ?> <?php echo $session['currency']; ?></div></li>
							<?php endforeach; } ?>
						</ul>
					</div>
				</div>
			</div>
		
		</div>
		
</section>