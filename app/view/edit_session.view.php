<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title>Trainingful: <?php if(isset($_GET['session_id'])) { echo "edit"; } else { echo "add"; } ?> session</title>
<?php include 'below_title.php' ?>
	
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

	#gmap-preview {
		margin-top:10px;
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

	#info-sessions .dates-right {
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

	#session-description {
		padding: 0px 3px 0px 3px;
	}
	
	.cancel-button {
		background-color: #666;
	}

	.category_box {
		color: #444;
		font-size: 0.8em;
	}

	.cost-input {
		width:100px;
		padding: 0px 3px 0px 3px;
		border-top: none;
		border-right: none;
		border-left: none;
		border-bottom: 2px solid #ddd;
	}
	.discount {
		color: #ff7777;
	}
	.explanation {
		color: #000;
		font-size: 0.8em;
		padding-top: 10px;
		margin-bottom: 5px;
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

	.form-date {
		width: 100px;
		border-top: none;
		border-right: none;
		border-left: none;
		border-bottom: 2px solid #ddd;
	}

	.form-text {
		padding: 0px 3px 0px 3px;
	}

	.input-left {
		float:left;
		margin-right: 10px;
    	width: 50%;
	}

	.input-left25 {
	    float:left;
	    margin-right:10px;
	    width:25%;
	}

	.input-right {
    	padding-top: 1px;
		text-align: right;
	}

	.input-row {
		margin-top:10px;
	}

	.register-input {
		width: 300px;
		padding: 0px 3px 0px 3px;
		border-top: none;
		border-right: none;
		border-left: none;
		border-bottom: 2px solid #ddd;
	}

	.register-long-input {
		width: 500px;
		padding: 0px 3px 0px 3px;
		border-top: none;
		border-right: none;
		border-left: none;
		border-bottom: 2px solid #ddd;
	}

	.select-box {
		border-left:none;
		border-top:none;
		border-right:none;
		border-bottom: 2px solid #ddd;
	}
	</style>

	<script>
	$(document).ready(function() {
		$('#primary_box').on('change', function(){
			$('#secondary_box').find('option').remove();
			$('#secondary_box').append(category_dropdown[$('#primary_box').val()]);
		});
		updateMap();
	});

	var sessioninfo = [];

	<?php if(isset($_GET['id'])): ?>
	<?php foreach($sessionList as $session): ?>
	sessioninfo[<?php echo $session['session_id']; ?>] = {session_type: "<?php echo $session['session_type']; ?>", start_date: "<?php echo $session['start_date_formatted']; ?>", start_date_time: "<?php echo $session['start_date_time']; ?>", end_date: "<?php echo $session['end_date_formatted']; ?>", end_date_time: "<?php echo $session['end_date_time']; ?>", metro_name: "<?php echo $session['metro_name']; ?>", location: "<?php echo $session['location']; ?>", location_oneline: "<?php echo $session['location_oneline']; ?>", cost: "<?php echo $session['cost']; ?>", currency: "<?php echo $session['currency']; ?>", description: "<?php echo $session['description']; ?>"};
	<?php endforeach; ?>
	<?php endif ?>

	function updateMap() {
		var sa = document.getElementById('street').value;
		if (sa) {
			if (document.getElementById('city').value != "") {
				sa = sa + ", " + document.getElementById('city').value;
			}
			document.getElementById('gmap-preview').innerHTML = '<iframe width="470" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAApnbg7k6_nPB_ofttls3VdKLl2v5Red4&zoom=15&q='+sa+'"></iframe>';
		}
		else {
			document.getElementById('gmap-preview').innerHTML = '';
		}
	}
	</script>

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
		<div class="container" id="main-container">
			<div id="query-summary-bar" class="container">
				<h1><?php echo $course_name . " > "; if(isset($_GET['session_id'])) { echo "Edit"; } else { echo "Add"; } ?> Session</h1>
				<small>(<a href="/manage_courses"><strong>Back to courses</strong></a> | <a href="/edit_course?id=<?php echo $_GET['id']; ?>"><strong>Back to <?php echo $course_name; ?></strong></a>)</small>
			</div>
			<div id="main-content">
				<div class="row 25% uniform">
					<div id="container2">
					<div id="container1">
					<div class="9u" id="col1">
						<div id="content-section">
							<form id="save_session" action="save_session" method="post">

							<h2>Session Information</h2>

							<div class="explanation">Session Type*</div>
							<select name="session_type" id="session-type-box" class="select-box" 
								onchange="if(this.value == 'Online - Self Learning') { 
									document.getElementById('dates').style.display = 'none';
									document.getElementById('searchbox-start').required = false;
									document.getElementById('searchbox-end').required = false;
								} 
								else { 
									document.getElementById('dates').style.display = 'inline'; 
									document.getElementById('searchbox-start').required = true;
									document.getElementById('searchbox-end').required = true;
								}">
					        	<option value="Classroom - Live Instructor"<?php if($session_type == "Classroom - Live Instructor") echo " selected"; ?>>Classroom - Live Instructor</option>
						        <option value="Classroom - Webcast Instructor"<?php if($session_type == "Classroom - Webcast Instructor") echo " selected"; ?>>Classroom - Webcast Instructor</option>
						        <option value="Online - Webcast Instructor"<?php if($session_type == "Online - Webcast Instructor") echo " selected"; ?>>Online - Webcast Instructor</option>
						        <option value="Online - Self Learning"<?php if($session_type == "Online - Self Learning") echo " selected"; ?>>Online - Self Learning</option>
						    </select>

						    <div id="dates">
								<div class="input-row">
									<div class="input-left">
										<div class="explanation">Start and End Date*</div>
									</div>
									<div class="input-left25">
										<div class="explanation">Start Time (optional)</div>
									</div>
									<div>
										<div class="explanation">End Time (optional)</div>
									</div>
								</div>
								<div class="input-row">
									<div class="input-left">
										<div class="inputbox">
											<input type="text" id="searchbox-start" name="start" placeholder="yyyy-mm-dd" class="form-text form-date" <?php if(isset($start_date)) { echo 'value='.$start_date; } ?> required> to
											<script type="text/javascript">
								               $(document).ready(function() {
							    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
							            	      });
								               });
						    	           	</script>
											<input type="text" id="searchbox-end" name="end" placeholder="yyyy-mm-dd" class="form-text form-date" <?php if(isset($end_date)) { echo 'value='.$end_date; } ?> required>
											<script type="text/javascript">
								               $(document).ready(function() {
							    	              $('#searchbox-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
							            	      });
								               });
						    	           	</script>
										</div>
									</div>
									<div class="input-left25">
										<select name="start_hour" id="session-start-hour-box" class="select-box">
											<option></option>
								            <option value="00" <?php if($start_hour == "00") echo "selected"; ?>>00</option>
								            <option value="01" <?php if($start_hour == "01") echo "selected"; ?>>01</option>
								            <option value="02" <?php if($start_hour == "02") echo "selected"; ?>>02</option>
								            <option value="03" <?php if($start_hour == "03") echo "selected"; ?>>03</option>
								            <option value="04" <?php if($start_hour == "04") echo "selected"; ?>>04</option>
								            <option value="05" <?php if($start_hour == "05") echo "selected"; ?>>05</option>
								            <option value="06" <?php if($start_hour == "06") echo "selected"; ?>>06</option>
								            <option value="07" <?php if($start_hour == "07") echo "selected"; ?>>07</option>
								            <option value="08" <?php if($start_hour == "08") echo "selected"; ?>>08</option>
								            <option value="09" <?php if($start_hour == "09") echo "selected"; ?>>09</option>
								            <option value="10" <?php if($start_hour == "10") echo "selected"; ?>>10</option>
								            <option value="11" <?php if($start_hour == "11") echo "selected"; ?>>11</option>
								            <option value="12" <?php if($start_hour == "12") echo "selected"; ?>>12</option>
								            <option value="13" <?php if($start_hour == "13") echo "selected"; ?>>13</option>
								            <option value="14" <?php if($start_hour == "14") echo "selected"; ?>>14</option>
								            <option value="15" <?php if($start_hour == "15") echo "selected"; ?>>15</option>
								            <option value="16" <?php if($start_hour == "16") echo "selected"; ?>>16</option>
								            <option value="17" <?php if($start_hour == "17") echo "selected"; ?>>17</option>
								            <option value="18" <?php if($start_hour == "18") echo "selected"; ?>>18</option>
								            <option value="19" <?php if($start_hour == "19") echo "selected"; ?>>19</option>
								            <option value="20" <?php if($start_hour == "20") echo "selected"; ?>>20</option>
								            <option value="21" <?php if($start_hour == "21") echo "selected"; ?>>21</option>
								            <option value="22" <?php if($start_hour == "22") echo "selected"; ?>>22</option>
								            <option value="23" <?php if($start_hour == "23") echo "selected"; ?>>23</option>
							            </select> :
							            <select name="start_minute" id="session-start-minute-box" class="select-box">
							            	<option></option>
								            <option value="00" <?php if($start_minute == "00") echo "selected"; ?>>00</option>
								            <option value="15" <?php if($start_minute == "15") echo "selected"; ?>>15</option>
								            <option value="30" <?php if($start_minute == "30") echo "selected"; ?>>30</option>
								            <option value="45" <?php if($start_minute == "45") echo "selected"; ?>>45</option>
							            </select>
									</div>
									<div>
										<select name="end_hour" id="session-end-hour-box" class="select-box">
											<option></option>
								            <option value="00" <?php if($end_hour == "00") echo "selected"; ?>>00</option>
								            <option value="01" <?php if($end_hour == "01") echo "selected"; ?>>01</option>
								            <option value="02" <?php if($end_hour == "02") echo "selected"; ?>>02</option>
								            <option value="03" <?php if($end_hour == "03") echo "selected"; ?>>03</option>
								            <option value="04" <?php if($end_hour == "04") echo "selected"; ?>>04</option>
								            <option value="05" <?php if($end_hour == "05") echo "selected"; ?>>05</option>
								            <option value="06" <?php if($end_hour == "06") echo "selected"; ?>>06</option>
								            <option value="07" <?php if($end_hour == "07") echo "selected"; ?>>07</option>
								            <option value="08" <?php if($end_hour == "08") echo "selected"; ?>>08</option>
								            <option value="09" <?php if($end_hour == "09") echo "selected"; ?>>09</option>
								            <option value="10" <?php if($end_hour == "10") echo "selected"; ?>>10</option>
								            <option value="11" <?php if($end_hour == "11") echo "selected"; ?>>11</option>
								            <option value="12" <?php if($end_hour == "12") echo "selected"; ?>>12</option>
								            <option value="13" <?php if($end_hour == "13") echo "selected"; ?>>13</option>
								            <option value="14" <?php if($end_hour == "14") echo "selected"; ?>>14</option>
								            <option value="15" <?php if($end_hour == "15") echo "selected"; ?>>15</option>
								            <option value="16" <?php if($end_hour == "16") echo "selected"; ?>>16</option>
								            <option value="17" <?php if($end_hour == "17") echo "selected"; ?>>17</option>
								            <option value="18" <?php if($end_hour == "18") echo "selected"; ?>>18</option>
								            <option value="19" <?php if($end_hour == "19") echo "selected"; ?>>19</option>
								            <option value="20" <?php if($end_hour == "20") echo "selected"; ?>>20</option>
								            <option value="21" <?php if($end_hour == "21") echo "selected"; ?>>21</option>
								            <option value="22" <?php if($end_hour == "22") echo "selected"; ?>>22</option>
								            <option value="23" <?php if($end_hour == "23") echo "selected"; ?>>23</option>
							            </select>:
							            <select name="end_minute" id="session-end-minute-box" class="select-box">
								            <option></option>
								            <option value="00" <?php if($end_minute == "00") echo "selected"; ?>>00</option>
								            <option value="15" <?php if($end_minute == "15") echo "selected"; ?>>15</option>
								            <option value="30" <?php if($end_minute == "30") echo "selected"; ?>>30</option>
								            <option value="45" <?php if($end_minute == "45") echo "selected"; ?>>45</option>
							            </select>
									</div>
								</div>
							</div>
							
							<div class="explanation">Session Registration URL (if different from or no Course URL)</div>
						          <input type="url" id="registration_url" name="registration_url" placeholder="Start with http://" class="register-long-input" 
						          value="<?php if ($registration_url != "-1" && $registration_url != "") { echo $registration_url; } else { echo $course_url; }?>" <?php if ($course_url == "-1" || $course_url == "") { echo "required"; } ?>>

							<div class="explanation">Notes/Remarks (optional)</div>
							<textarea id="session-description" name="session_description" placeholder="Session notes/remarks" rows="2" cols="65"><?php echo $description ?></textarea>

							<h2>Location</h2>
						      <div class="input-row">
						        <div class="input-left">
						          <div class="explanation">Metro Area*</div>
						        </div>
						        <div>
						          <div class="explanation">Suite #/Floor/Building (if available)</div>
						        </div>
						      </div>
						      <div class="input-row">
						        <div class="input-left">
						          <select name="metro" id="metro" class="select-box">
						            <option value="Online" <?php if($metro_name == 'Online') { echo 'selected'; } ?>>Online</option>
						            <?php if (is_array($metro_list)) { foreach($metro_list as $metro): ?>
						            	<option value="<?php echo $metro['metro']; ?>" <?php if($metro_name == $metro['metro']) { echo 'selected'; } ?>><?php echo $metro['country'] . ' - ' .$metro['metro']; ?></option>
						            <?php endforeach; } ?>
						          </select>
						        </div>
						        <div>
						          <input type="text" id="suite" name="suite" placeholder="e.g. Suite 221B, Knowledge Building" class="register-input" 
						          value="<?php echo $suite ?>">
						        </div>
						      </div>
						      <div class="input-row">
						        <div class="input-left">
						          <div class="explanation">Street Address (if available)</div>
						          <input type="text" id="street" name="street" placeholder="e.g. 100 5th Ave West" class="register-input" 
						          value="<?php echo $street_address ?>" onchange="updateMap();">
						          </div>
						        <div>
						          <div class="explanation">City Name (if available)</div>
						          <input type="text" id="city" name="city" placeholder="e.g. Vancouver" class="register-input" 
						          value="<?php echo $city_name ?>" onchange="updateMap();">
						        </div>
						      </div>
						      <div id="gmap-preview"></div>

							<h2>Cost</h2>
							<div class="input-row">
							    <div class="input-left25">
							        <div class="explanation">Currency*</div>
							    </div>
							    <div class="input-left25">
							        <div class="explanation">Normal Price*</div>
							    </div>
							    <div>
							    	<div class="explanation">&nbsp;</div>
							    </div>
							    
							</div>

					    	<div class="input-row">
					    		<div class="input-left25">
					          		<select name="currency" id="currency" class="select-box" required>
					            		<option value="USD" <?php if($currency == "USD") echo "selected"; ?>>USD</option>
					            		<option value="CAD" <?php if($currency == "CAD") echo "selected"; ?>>CAD</option>
					          		</select>
					        	</div>
					        	<div class="input-left25">
					        		<input type="number" id="cost" name="cost" placeholder="1000.00" class="cost-input" step="0.01" min="0" 
					        		value="<?php echo $cost ?>" required>
					        	</div>
					        	
					        	<div>
					        		<div>&nbsp;</div>
				        		</div>
					      	</div>

							<div class="input-row">
							    <div class="input-left25">
							        <div class="explanation">Early Discount (optional)</div>
							    </div>
							    <div class="input-left25">
							        <div class="explanation">Early Discount End (optional)</div>
							    </div>
							    <div>
							    	<div class="explanation">&nbsp;</div>
							    </div>
							    
							</div>

					    	<div class="input-row">
					    		<div class="input-left25">
					          		<input type="number" id="cost_discount" name="discount_cost" placeholder="899.99" step="0.01" min="0" class="cost-input"
					          		value="<?php echo $discount_cost ?>">
					        	</div>
					        	<div class="input-left25">
				        		<input type="text" id="searchbox-discount-end" name="discount_end_date" placeholder="yyyy-mm-dd" class="form-text form-date" <?php if(isset($discount_end_date)) { echo 'value='.$discount_end_date; } ?>>
										<script type="text/javascript">
							               $(document).ready(function() {
						    	              $('#searchbox-discount-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
						            	      });
							               });
					    	           	</script>
					        	</div>
					        	
					        	<div>
					        		<div>&nbsp;</div>
				        		</div>
					      	</div>
							<div style="clear:all;"></div><br />
							<input type="hidden" value="<?php echo $_SESSION['vendor_id']?>" name="vendor_id">
							<input type="hidden" value="<?php echo $_GET['id'] ?>" name="course_id">
							<input type="hidden" value="<?php echo $_GET['session_id'] ?>" name="session_id">

							<div class="row 25% uniform" style="float:right;margin: 0px 0px 10px 0px;">
								<div class="12u">
									<button type="button" class="form-submit cancel-button" onClick="parent.location='edit_course?id=<?php echo $_GET['id'] ?>&return=cancel'">Cancel</button>
									<button type="submit" class="form-submit">Save Changes</button>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="3u" id="col2">
						
						<ul id="info-tags">
						<!--

							<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
							30 PDU towards PMP </li>
							<li><span class="icon price-tag"></span> <strong>Filed and Tagged</strong><br />
							PMP, Project Management</li>
						-->
						<li><h2><?php echo $course_name ?></h2></li>
						</ul>

						<ul id="info-sessions">
							<div style="padding:10px 0 10px 10px;border-bottom: 5px solid #4ca166;">
								<span class="icon triangle-down"></span> <strong>Edit Sessions</strong>
							</div>
							<?php if(isset($_GET['id'])): ?>
								<span id="display-sessions">
									<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
										<li <?php if($session['session_id'] == $_GET['session']) echo 'class="selected"'; ?>  onClick="window.location.href='edit_session?id=<?php echo $_GET['id'] ?>&session_id=<?php echo $session['session_id'] ?>'">
											<div><span class="icon calendar"></span> <span class="dates-right"><?php { 
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
										<div class="location"><?php if($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></div>
										<div class="price"><?php 
													if (isset($session['discount_end_date']) && date('Y-m-d') < $session['discount_end_date']) {
														echo '<span class="discount">'.$session['discount_cost'].'</span>';
													}
													else {
														echo $session['cost'];
													}
													?> <?php echo $session['currency']; ?></div>
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
			</div>
		</div>
</section>