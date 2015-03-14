<?php include 'session_settings.php' ?>
<!DOCTYPE HTML>
<html>
<head>
<?php include 'header_required.php' ?>
	<title>trainingful: sign up</title>
	
	<link href="http://fonts.googleapis.com/css?family=Pacifico:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/signup.css">
	<style>
	.form-text {
		width: 25em;
		line-height: 2em;
		padding-left: 5px;
		padding-right: 5px;
	}
	</style>
</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container" id="main-container">
			<div id="signup-content">
				<p><h1><span style="font-family: Pacifico;">Great. Thanks for registering, <?php echo $_SESSION['first_name']; ?>!</span></h1></p>
				<div class="row 25% uniform" style="margin-top:20px;">
					<div class="6u" style="border-right:1px solid #d7d7d7;">
						<p><h3>A couple more questions...</h3></p>
						<form id="complete_registration" action="complete_registration" method="get">
						<p>May we confirm your e-mail address?</p>
						<input type="email" id="email" name="email" placeholder="abc@xyz.com" class="form-text">
						<p>Can we have your phone number if issues arise?</p>
						<input type="text" id="phone" name="phone" placeholder="1-###-###-####" class="form-text">
						<p>Invitation Code (optional):</p>
						<input type="text" id="invitation" name="invitation" placeholder="optional" class="form-text">
						<p><button type="submit" class="form-submit">Complete Registration</button></p>
						</form>

					</div>
					<div class="6u" style="padding-left:40px;">
						<div id="other-options">
							<p style="text-align:center;">You're a professional: we never post to your social networks unless you ask us to and you control when we can look up information.</p>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</section>
