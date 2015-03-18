<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title>trainingful: edit course</title>

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

	#content-section > h1 {
		padding: 0;
		margin: 0;
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

	.cancel-button {
		background-color: #666;
	}

	.category_box {
		color: #444;
		font-size: 0.8em;
	}

	.edit-course-input {
		padding: 0;
		margin: 0;
		font-size: 0.9em;
		color: #666;
		font-weight: 400;
		width: 49em;
	}

	.edit-course-name {
		font-size: 2.2em;
		width: 15em;
		color: #444;
		padding-left:5px;
	}

	.edit-course-short {
		padding: 0;
		margin: 0;
		font-size: 0.9em;
		color: #666;
		font-weight: 400;
		width: 5em;
	}

	.edit-course-text {
		padding: 0;
		margin: 0;
		font-size: 0.9em;
		color: #666;
		font-weight: 400;
		padding-left:5px;
	}

	.explanation {
		color: #000;
		font-size: 0.8em;
		padding-top:10px;
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
		console.log('polymer-ready');
		document.getElementById('loading-sessions').style.display = "none";
		document.getElementById('display-sessions').style.display = "inline";
	});

	<?php 
		echo "var category_dropdown = [];";
		foreach ($categoryList as $category) {
			$sub_options = "";
			foreach ($category['subcategories'] as $subcategory) {
				$sub_options .= "<option value='" . $subcategory['category_id'] . "'";
				if ($subcategory['category_name'] == "General") {
					$sub_options .= " selected";
				}
				$sub_options .= ">" . $subcategory['category_name'] . "</option>";
			}
			$sub_options = "\"" . $sub_options . "\"";
			echo "category_dropdown[" . $category['category_id'] . "] = " . $sub_options . ";";
		}
	?>

	$(document).ready(function() {
		$('#primary_box').on('change', function(){
			$('#secondary_box').find('option').remove();
			$('#secondary_box').append(category_dropdown[$('#primary_box').val()]);
		});
	});

	var sessioninfo = [];

	<?php if(isset($_GET['id'])): ?>
	<?php foreach($sessionList as $session): ?>
	sessioninfo[<?php echo $session['session_id']; ?>] = {session_type: "<?php echo $session['session_type']; ?>", start_date: "<?php echo $session['start_date_formatted']; ?>", start_date_time: "<?php echo $session['start_date_time']; ?>", end_date: "<?php echo $session['end_date_formatted']; ?>", end_date_time: "<?php echo $session['end_date_time']; ?>", metro_name: "<?php echo $session['metro_name']; ?>", location: "<?php echo $session['location']; ?>", location_oneline: "<?php echo $session['location_oneline']; ?>", cost: "<?php echo $session['cost']; ?>", currency: "<?php echo $session['currency']; ?>", description: "<?php echo $session['description']; ?>"};
	<?php endforeach; ?>
	<?php endif ?>

	function showSession(session_id) {
		if (sessioninfo[session_id].session_type != "-1") {
			document.querySelector('#sad').classroom = sessioninfo[session_id].session_type +": ";
		}

		if (sessioninfo[session_id].description != "-1" && sessioninfo[session_id].description != "") {
			document.querySelector('#sad').description = "<p>" + sessioninfo[session_id].description + "</p>";
		}

		if (sessioninfo[session_id].location != "-1" && sessioninfo[session_id].location != "") {
			document.querySelector('#sad').location = "<p>" + sessioninfo[session_id].location + "</p>";
		}
		else if (sessioninfo[session_id].metro_name != "-1") {
			document.querySelector('#sad').location = "<p>" + sessioninfo[session_id].metro_name + "</p>";
		}
		else {
			document.querySelector('#sad').location = "";
		}

		if (sessioninfo[session_id].start_date != sessioninfo[session_id].end_date) {
			document.querySelector('#sad').dates = "<strong>" + sessioninfo[session_id].start_date + "</strong> to <strong>" + sessioninfo[session_id].end_date + "</strong>";
		}
		else {
			document.querySelector('#sad').dates = "<strong>" + sessioninfo[session_id].start_date + "</strong>";
		}

		if (sessioninfo[session_id].start_date_time != "" && sessioninfo[session_id].end_date_time != "") {
			document.querySelector('#sad').startendtime = "<strong>(" + sessioninfo[session_id].start_date_time + " - " + sessioninfo[session_id].end_date_time + ")</strong>";
			}
		document.querySelector('#sad').cost = sessioninfo[session_id].cost + " " + sessioninfo[session_id].currency;
		
		document.querySelector('#sad').vendorname = "<?php echo $vendor_name; ?>";
		document.querySelector('#sad').vendorurl = "<?php if ($vendor_website_url != '-1' && $vendor_website_url != '') { echo '<a href=\"http://'.$vendor_website_url.'\" target=\"_blank\">'.$vendor_website_url.'</a>'; } ?>";
		document.querySelector('#sad').vendoremail = "<?php if ($vendor_contact_email != '-1' && $vendor_contact_email != '') { echo '<br />'.$vendor_contact_email; } ?>";
		document.querySelector('#sad').vendorcontact = "<?php if ($vendor_contact_number != '-1' && $vendor_contact_number != '') { echo '<br />'.$vendor_contact_number; } ?>";
		
		document.querySelector('#sad').sessionid = session_id;
		document.querySelector('#sad').ipaddress = "<?php echo $_SERVER['REMOTE_ADDR'] ?>";

		document.querySelector('#sad').toggle();
		if (sessioninfo[session_id].location_oneline != "-1" && sessioninfo[session_id].location_oneline != "" && sessioninfo[session_id].location_oneline != "+") {
			document.querySelector('#sad').gmap = '<iframe width="470" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAApnbg7k6_nPB_ofttls3VdKLl2v5Red4&q='+sessioninfo[session_id].location_oneline+'"></iframe>';
		}
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
				<h1>Edit Course Details</h1>
				<a href="/manage_courses"><small>(<strong>Back to courses</strong>)</small></a>
			</div>
			<div id="main-content">
				<div class="row 25% uniform">
					<div id="container2">
					<div id="container1">
					<div class="9u" id="col1">
						<div id="content-section">
							<form id="save_course" action="save_course" method="post">
							<h2>Core Description</h2>
							<div class="explanation">Course Name*</div>
							<input type="text" id="course_name" name="course_name" placeholder="Course Name" class="edit-course-name" value="<?php echo $course_name; ?>" maxlength="255" required></h1>
							
							<div class="explanation">Category*</div>

							<div class="row">
								<div class="6u">
									<select class="category_box" id="primary_box">
									<?php if(!isset($parent_category_id)) {
										$parent_category_id = 2;
										$category_id = 0;
									} ?>
									<?php foreach ($categoryList as $category): ?>
										<option value="<?php echo $category['category_id']; ?>"<?php if ($category['category_id'] == $parent_category_id) { echo ' selected'; } ?>><?php echo $category['type'] . ": " . $category['category_name']; ?></option>
									<?php endforeach ?>
									</select>
								</div>
								<div class="6u">
									<select class="category_box" id="secondary_box" style="max-width:320px;" name="category" form="save_course">
									<?php foreach ($categoryList[$parent_category_id]['subcategories'] as $category): ?>
										<option value="<?php echo $category['category_id']; ?>" <?php if ($category['category_id'] == $category_id) { echo 'selected'; } ?>><?php echo $category['category_name']; ?></option>
									<?php endforeach ?>
									</select>
								</div>
							</div>

							<p style="margin-top:-1.3em;"><span><h5><?php if ($parent_category_name == "") { echo $category_name; } else { echo $parent_category_name." - ".$category_name; }?></h5></span></p>

							<div class="explanation">Course Length*</div>
							<input type="number" id="course_length" name="course_length" step="0.5" placeholder="# Days" class="edit-course-short" value="<?php echo $course_length; ?>"> days

							<div class="explanation">Course Description / Outline*</div>
							<textarea id="course_description" name="course_description" placeholder="Description of the course" class="edit-course-text" rows="15" cols="85" required><?php echo $course_description_unformatted; ?></textarea>

							<h2>Optional Description</h2>
							<div class="explanation">Benefits / Learning Outcomes (optional)</div>
							<textarea id="course_benefits" name="course_benefits" placeholder="OPTIONAL: Expect benefits or what students will learn" class="edit-course-text" rows="3" cols="85"><?php echo $course_benefits; ?></textarea>

							<div class="explanation">Prerequisites (optional)</div>
							<textarea id="course_prereqs" name="course_prereqs" placeholder="OPTIONAL: Knowledge required or level of course" class="edit-course-text" rows="3" cols="85"><?php echo $course_prereqs; ?></textarea>

							<div class="explanation">Target Audience (optional)</div>
							<textarea id="course_audience" name="course_audience" placeholder="OPTIONAL: Target audience or who should take this" class="edit-course-text" rows="3" cols="85"><?php echo $course_audience; ?></textarea>

							<div class="explanation">Credits / Designations (optional, 60 chars max)</div>
							<textarea id="course_designation" name="course_designation" placeholder="OPTIONAL: Upon successfully completing this course, a student will receive these credits or this designation. If the designation requires an exam, the exam fee must be included in the course fee. Example: 30 PDUs or PMP" class="edit-course-text" rows="5" cols="40" maxlength="60"><?php echo $course_designation; ?></textarea>

							<h2>Media and Links</h2>
							<div class="explanation">Video URL (optional, e.g. https://www.youtube.com/embed/XYZ123XYZ123)</div>
							<input type="text" id="video_url" name="video_url" placeholder="Embed URL of video or direct URL to video file" class="edit-course-input" value="<?php echo $course_video_url; ?>" maxlength="255">

							<div class="explanation">Course URL (optional)</div>
							<input type="text" id="course_url" name="course_url" placeholder="Direct URL to Course Info on Your Website" class="edit-course-input" value="<?php echo $course_url; ?>" maxlength="255">

							<div style="clear:all;"></div><br />
							<input type="hidden" value="<?php echo $_SESSION['vendor_id']?>" name="vendor_id">
							<input type="hidden" value="<?php echo $course_id ?>" name="course_id">

							<div class="row 25% uniform" style="float:right;margin: 0px 0px 10px 0px;">
								<div class="12u">
									<button type="button" class="form-submit cancel-button" onClick="parent.location='manage_courses?return=cancel'">Cancel</button>
									<button type="submit" class="form-submit">Save Changes</button>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="3u" id="col2">
					
						<div id="vendor-image">
							<img src="images/vendors/<?php if ($branding_url == '-1' || $branding_url == "") { echo 'trainingful-branding-140.gif'; } else echo $branding_url; ?>" class="company-logo">
						</div>
						<div id="vendor-name">
							<strong><?php echo $vendor_name; ?></strong>
						</div>
						<ul id="info-tags">
						<!--

							<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
							30 PDU towards PMP </li>
							<li><span class="icon price-tag"></span> <strong>Filed and Tagged</strong><br />
							PMP, Project Management</li>
						-->
						</ul>

						<ul id="info-sessions">
							<div style="padding:10px 0 10px 10px;border-bottom: 5px solid #4ca166;">
								<span class="icon triangle-down"></span> <strong>Sessions</strong>
							</div>
							<?php if(isset($_GET['id'])): ?>
								<li id="loading-sessions">Loading course sessions... <img src="../../images/polymer-loader.gif" /></li>
								<span id="display-sessions" style="display:none;">
									<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
										<li <?php if($session['session_id'] == $_GET['session']) echo 'class="selected"'; ?>  onClick="showSession(<?php echo $session['session_id'] ?>);">
											<div><span class="icon calendar"></span> <span class="dates"><?php { echo date("M j, Y", strtotime($session['start_date'])); if ($session['start_date'] != $session['end_date']) { echo " - ".date("M j, Y", strtotime($session['end_date']));} } ?></span></div>
										<div class="location"><?php if($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></div><div class="price"><?php echo $session['cost']; ?> <?php echo $session['currency']; ?></div>
										<!-- <img src="../../images/lower-triangle.png" style="margin: 0px 0 -5px 234px;" /> -->
										<div class="folded-corner"></div>
									</li>
									<?php endforeach; } ?>
								</span>
							<?php endif ?>
						</ul>
					</div>
					</div>
					</div>
				</div>
				<session-action-dialog id="sad" backdrop transition="paper-dialog-transition-bottom" heading="<?php echo $course_name ?>"></session-action-dialog>
			</div>
		</div>
</section>