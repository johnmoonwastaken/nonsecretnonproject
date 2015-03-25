<!DOCTYPE HTML>
<html>
<head>
<link rel="import" href="../../bower_components/paper-toast/paper-toast.html">
<?php include 'header_required.php' ?>
	<title>trainingful: provider account</title>
	
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

	.edit-course-input {
		padding-left: 5px;
		margin: 0;
		font-size: 0.9em;
		color: #666;
		font-weight: 400;
		width: 49em;
		max-width: 700px;
		border-top: none;
		border-left: none;
		border-right: none;
		border-bottom: 2px solid #ddd;
	}
	.description {
		max-width: 700px;
	}
	.explanation {
		color: #000;
		font-size: 0.8em;
		padding-top: 10px;
		padding-bottom: 5px;
	}
	.textbox {
		padding: 0px 3px 0px 3px;
		color: #444;
	}

	</style>
	<script>
	window.addEventListener('polymer-ready', function(e) {
		console.log('polymer-ready');
		var toast_action = <?php echo "\"" . $_GET['return'] . "\""; ?>;
		if (toast_action == "saved") {
			document.querySelector('#toast').text = "Your account changes have been saved.";
			document.querySelector('#toast').show()
			}
		else if (toast_action == "cancel") {
			document.querySelector('#toast').text = "Your account changes have been discarded.";
			document.querySelector('#toast').show()
		}
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
				<h1>Provider Account</h1>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
						<h4 id="results-counter"><?php echo $vendor_name ?></h4>
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
							<?php include 'user_menu.php' ?>
						</ul>
					</div>
					<div class="9u">
						<h2>Provider Profile</h2>
						<form id="save_account" action="save_provider" method="post">
							<div class="explanation">Provider Name*</div>
							<input type="text" id="name" name="vendor_name" placeholder="Name" class="edit-course-input" value="<?php echo $vendor_name; ?>" maxlength="255" required>

							<div class="explanation">E-mail*</div>
							<input type="email" id="email" name="contact_email" placeholder="abc@xyz.com" class="edit-course-input" value="<?php echo $contact_email; ?>" maxlength="255" required>

							<div class="explanation">Phone Number*</div>
							<input type="text" id="phone" name="contact_number" placeholder="1-234-567-8900" class="edit-course-input" value="<?php echo $contact_number; ?>" maxlength="32" required>

							<div class="explanation">Website (optional)</div>
							<input type="text" id="url" name="website_url" placeholder="Name" class="edit-course-input" value="<?php echo $website_url; ?>" maxlength="255">

							<div class="explanation">Description (optional)</div>
							<textarea id="description" name="description" placeholder="Session notes/remarks" rows="6" cols="85" class="textbox description"><?php echo $description ?></textarea>

							<div class="explanation">Mailing Address (optional)</div>
							<textarea id="mailing-address" name="mailing_address" placeholder="Session notes/remarks" rows="4" cols="35" class="textbox"><?php echo $mailing_address ?></textarea>
							<div class="row 25% uniform" style="text-align:right;margin: 0px 32px 10px 0px;">
								<div class="12u">
									<button type="submit" class="form-submit">Save Changes</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<paper-toast id="toast" text=""></paper-toast>
	</section>