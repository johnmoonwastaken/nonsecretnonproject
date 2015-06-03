<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title><?php echo $course_name; ?></title>
	<meta name="Title" content="Trainingful: Find the professional course you're looking for, guaranteed.">
	<meta name="Keywords" content="courses, conferences, professional training, training, professional development, online courses, review, reviews, training providers">
	<meta name="Description" content="The fastest and easiest way to search for professional courses with thousands of course sessions. Find the course you're looking for, guaranteed.">

	<link rel="import" href="../../bower_components/elements/session-action-dialog.html">
	<link rel="import" href="../../bower_components/elements/review-action-dialog.html">

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
	.discount {
		color: #ff7777;
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

	<script>
	
	window.addEventListener('polymer-ready', function(e) {
		//console.log('polymer-ready');
		document.getElementById('loading-sessions').style.display = "none";
		document.getElementById('display-sessions').style.display = "inline";
	});

	window.addEventListener('core-overlay-open-completed', function(e) {
		//console.log('opened');
	});

	var sessioninfo = [];

	<?php foreach($sessionList as $session): ?>
	sessioninfo[<?php echo $session['session_id']; ?>] = {session_type: "<?php echo $session['session_type']; ?>", 
	start_date: "<?php echo $session['start_date_formatted']; ?>", 
	start_date_time: "<?php echo $session['start_date_time']; ?>", 
	end_date: "<?php echo $session['end_date_formatted']; ?>", 
	end_date_time: "<?php echo $session['end_date_time']; ?>", 
	metro_name: "<?php echo $session['metro_name']; ?>", 
	city_name: "<?php echo $session['city_name']; ?>", 
	suite: "<?php echo $session['suite']; ?>", 
	street_address: "<?php echo $session['street_address']; ?>", 
	cost: "<?php echo $session['cost']; ?>", 
	currency: "<?php echo $session['currency']; ?>",
	discount: "<?php echo $session['discount']; ?>",
	discount_applicable: "<?php echo $session['discount_applicable']; ?>",
	discount_end_date: "<?php echo $session['discount_end_date']; ?>",
	registration_url: "<?php echo $session['registration_url']; ?>",
	description: "<?php echo $session['description']; ?>"};
	<?php endforeach; ?>

	function showSession(session_id) {
		if (sessioninfo[session_id].session_type != "-1") {
			document.querySelector('#sad').classroom = sessioninfo[session_id].session_type +": ";
		}

		if (sessioninfo[session_id].description != "-1" && sessioninfo[session_id].description != "") {
			document.querySelector('#sad').description = "<p>" + sessioninfo[session_id].description + "</p>";
		}

		if (sessioninfo[session_id].session_type != "Online - Self Learning") {
			if (sessioninfo[session_id].start_date != sessioninfo[session_id].end_date) {
				document.querySelector('#sad').dates = "<strong>" + sessioninfo[session_id].start_date + "</strong> to <strong>" + sessioninfo[session_id].end_date + "</strong>";
			}
			else {
				document.querySelector('#sad').dates = "<strong>" + sessioninfo[session_id].start_date + "</strong>";
			}
			if (sessioninfo[session_id].start_date_time != "" && sessioninfo[session_id].end_date_time != "") {
			document.querySelector('#sad').startendtime = "<strong>(" + sessioninfo[session_id].start_date_time + " - " + sessioninfo[session_id].end_date_time + ")</strong>";
			}

			var location_string = "<p>";
			if (sessioninfo[session_id].city_name != "-1" && sessioninfo[session_id].city_name != "") {
				var location_oneline = "";
				if (sessioninfo[session_id].suite != "-1" && sessioninfo[session_id].suite != "") {
					location_string = location_string + sessioninfo[session_id].suite + "<br />";
				}
				if (sessioninfo[session_id].street_address != "-1" && sessioninfo[session_id].street_address != "") {
					location_string = location_string + sessioninfo[session_id].street_address + "<br />";
					location_oneline = sessioninfo[session_id].street_address + ", ";
				}
				location_string = location_string + sessioninfo[session_id].city_name + "</p>";
				location_oneline = location_oneline + sessioninfo[session_id].city_name;
				document.querySelector('#sad').gmap = '<iframe width="470" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBZuowUYP1cfjqsi6VjI3Jj5ygHGFtpgeI&zoom=15&q='+location_oneline+'"></iframe>';
			}
			else {
				location_string = location_string + sessioninfo[session_id].metro_name + "</p>";
			}
			document.querySelector('#sad').location = location_string;
		}

		if (sessioninfo[session_id].registration_url != "-1" && sessioninfo[session_id].registration_url != "") {
			document.querySelector('#sad').courseurl = "<img src='/images/extlink.png' height='10' width='10' style='margin-right:5px;'><a href='/external_redirect?url="+sessioninfo[session_id].registration_url+"&session_id="+session_id+"' target='_blank'>External Website</a>";
			document.querySelector('#sad').externalurl = '/external_redirect?url='+sessioninfo[session_id].registration_url+'&session_id='+session_id;
		}
		else {
			document.querySelector('#sad').courseurl = "<img src='/images/extlink.png' height='10' width='10' style='margin-right:5px;'><a href='/external_redirect?url="+"<?php echo $course_url; ?>"+"&session_id="+session_id+"' target='_blank'>External Website</a>";
			document.querySelector('#sad').externalurl = '/external_redirect?url='+'<?php echo $course_url; ?>'+'&session_id='+session_id+'';
		}

		if (sessioninfo[session_id].discount_applicable == "1") {
			document.querySelector('#sad').discount = "Discount: " + sessioninfo[session_id].discount + " " + sessioninfo[session_id].currency 
			+ " (until " + sessioninfo[session_id].discount_end_date + ")";
			document.querySelector('#sad').cost = "Regular price: " + sessioninfo[session_id].cost + " " + sessioninfo[session_id].currency;
		}
		else {
			document.querySelector('#sad').cost = sessioninfo[session_id].cost + " " + sessioninfo[session_id].currency;
		}
		
		document.querySelector('#sad').vendorname = "<?php echo $vendor_name; ?>";
		document.querySelector('#sad').vendorurl = "<?php if ($vendor_website_url != '-1' && $vendor_website_url != '') { echo '<a href=\"'.$vendor_website_url.'\" target=\"_blank\">'.$vendor_website_url.'</a>'; } ?>";
		document.querySelector('#sad').vendoremail = "<?php if ($vendor_contact_email != '-1' && $vendor_contact_email != '') { echo '<br />'.$vendor_contact_email; } ?>";
		document.querySelector('#sad').vendorcontact = "<?php if ($vendor_contact_number != '-1' && $vendor_contact_number != '') { echo '<br />'.$vendor_contact_number; } ?>";
		
		document.querySelector('#sad').sessionid = session_id;
		document.querySelector('#sad').ipaddress = "<?php echo $_SERVER['REMOTE_ADDR'] ?>";

		document.querySelector('#sad').toggle();
	}
	</script>
</head>
<body>

	<header>
<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container" id="main-container">
			<div id="query-summary-bar" class="container">
				<?php if ($start !=""): ?>
					<p><strong><a href="search?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Back to Results</a></strong> | In <strong><?php echo $location; ?></strong> between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong></p>
				<?php else: ?>
					<p><strong><a href="<?php echo $_SESSION['prevpage']; ?>">Back to Previous Page</a></strong></p>
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

							<?php if(isset($video_url) && $video_url != ""): ?>
							<iframe width="640" height="362" src="<?php echo $video_url ?>"></iframe>
							<?php endif ?>

							<p><h4><?php echo $course_description; ?>
							<!-- <a href="#">Read More ></a> --></h4></p>

							<?php if($audience):?>
							<h3>Audience</h3>
							<p><h4><?php echo $audience; ?>
							<?php endif ?>

							<?php if($prereqs):?>
							<h3>Pre-Requisites</h3>
							<p><h4><?php echo $prereqs; ?>
							<?php endif ?>

							<?php if($benefits):?>
							<h3>Benefits</h3>
							<p><h4><?php echo $benefits; ?>
							<?php endif ?>

							<div id="ratings-section">
							<!--
								<div class="row 25% uniform" style="float:right;margin: 0px 15px 10px 0px;">
									<div class="12u">
										<button type="submit" class="form-submit" onClick="document.querySelector('#rad').toggle();">Write a Review</button>
									</div>
								</div>
								
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
							<?php echo '<a href="'. $vendor_website_url .'">'; ?><img src="images/vendors/<?php if ($branding_url == '-1' || $branding_url == "") { echo 'trainingful-branding-140.gif'; } else echo $branding_url; ?>" class="company-logo"></a>
						</div>
						<div id="vendor-name">
							<strong><?php echo '<a href="'. $vendor_website_url .'">' . $vendor_name . '</a>'; ?></strong>
						</div>
						<ul id="info-tags">
						
							<?php if ($designation != "" && $designation != "-1"): ?>
							<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
							<?php echo $designation ?></li>
							<?php endif ?>
							<li><span class="icon price-tag"></span> <strong>Tags</strong><br />
							<?php
								$count = 0;
								foreach($tags as $tag) {
									if ($count != 0) {
										echo ", ";
									}
									echo "<a href='search?tag=".urlencode($tag)."'>".$tag."</a>";
									$count++;
								}
							?>
							</li>
						</ul>

						<ul id="info-sessions">
							<div style="padding:10px 0 10px 10px;border-bottom: 5px solid #4ca166;">
								<span class="icon triangle-down"></span> <strong>Register & Session Information</strong>
							</div>
							<li id="loading-sessions">Loading course sessions... <img src="../../images/polymer-loader.gif" /></li>
							<span id="display-sessions" style="display:none;">
								<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
									<li <?php if($session['session_id'] == $_GET['session']) echo 'class="selected"'; ?>  onClick="showSession(<?php echo $session['session_id'] ?>);">
										<div><span class="icon calendar"></span> <span class="dates"><?php { 
											if ($session['session_type'] == "Online - Self Learning") {
												echo "Online";
											}
											else {
												echo date("M j, Y", strtotime($session['start_date'])); 
												if ($session['start_date'] != $session['end_date']) { 
													echo " - ".date("M j, Y", strtotime($session['end_date']));
												} 
											}
										} ?></span></div>
									<div class="location"><?php if($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></div><div class="price"><?php 
									if (isset($session['discount_end_date']) && date('Y-m-d') < $session['discount_end_date']) {
														echo '<span class="discount">'.$session['discount'].'</span>';
													}
													else {
														echo $session['cost'];
													} ?> <?php echo $session['currency']; ?></div>
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
				<session-action-dialog id="sad" backdrop transition="paper-dialog-transition-bottom" heading="<?php echo $course_name ?>"></session-action-dialog>
				<review-action-dialog id="rad" backdrop transition="paper-dialog-transition-bottom" ?></review-action-dialog>

			</div>
		</div>
</section>