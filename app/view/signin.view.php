<?php
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$state = '';
 for ($i = 0; $i < 16; $i++) {
      $state .= $characters[rand(0, strlen($characters) - 1)];
 }
$_SESSION['state'] = $state;
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="import" href="../../bower_components/paper-toast/paper-toast.html">
<?php include 'header_required.php' ?>
	<title>Trainingful: log in</title>
<?php include 'below_title.php' ?>
	
	<link rel="stylesheet" href="css/signup.css">
	<script>
	window.addEventListener('polymer-ready', function(e) {
		//console.log('polymer-ready');
		var toast_action = <?php echo "\"" . $_GET['return'] . "\""; ?>;
		if (toast_action == "cancelled") {
			document.querySelector('#toast').text = "Sign in cancelled.";
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
		<div class="container" id="main-container">
			<div id="signup-content">
				<p><h1><span style="font-family: Pacifico;">Log in to trainingful</span></h1></p>
				<div class="row 25% uniform" style="margin-top:20px;">
					<div class="7u" style="border-right:1px solid #d7d7d7;">
						<p><h3>Use your LinkedIn account <span class="recommended">(Recommended)</span></h3></p>
						<ul class="benefits">
							<li>The easiest way to sign up and sign in
							<!-- <li>LinkedIn ratings are given <strong>5x</strong> more weight than ratings from standard users -->
							<li>Exclusive designation as a verified professional within Trainingful community
						</ul>
						<form action="https://www.linkedin.com/uas/oauth2/authorization" method="get">
							<input type="hidden" name="response_type" value="code">
							<input type="hidden" name="client_id" value="<?php echo $linkedin_api_key; ?>">
							<input type="hidden" name="redirect_uri" value="<?php echo $GLOBALS['_serverpath']; ?>/auth_linkedin_redirect">
							<input type="hidden" name="state" value="<?php echo $_SESSION['state']; ?>">
							<input type="hidden" name="scope" value="r_basicprofile,r_emailaddress">
							<button type="submit" class="button-linkedin"><div class="icon linkedin linkedin-button-icon"></div><div class="sign-up-linkedin">Log in with LinkedIn</div></button>
						</form>

					</div>
					<div class="5u" style="padding-left:40px;">
						<p><h3>Or use your favourite social network</h3></p>
						<p>
							<form action="https://www.facebook.com/dialog/oauth" method="get">
							<input type="hidden" name="client_id" value="<?php echo $facebook_api_key; ?>">
							<input type="hidden" name="redirect_uri" value="<?php echo $GLOBALS['_serverpath']; ?>/auth_facebook_redirect">
							<input type="hidden" name="response_type" value="code">
							<input type="hidden" name="state" value="<?php echo $_SESSION['state']; ?>">
							<input type="hidden" name="scope" value="public_profile,email">
							<button type="submit" class="button-other other-facebook"><div class="icon facebook other-button-icon"></div><div class="sign-up-other">Log in with Facebook</div></button></p>
							</form>
							<!--
						<p>
							<form action="https://accounts.google.com/o/oauth2/auth" method="get">
							<input type="hidden" name="scope" value="https://www.googleapis.com/auth/plus.login">
							<input type="hidden" name="state" value="<?php echo $_SESSION['state']; ?>">
							<input type="hidden" name="redirect_uri" value="http://localhost/auth_google_redirect">
							<input type="hidden" name="response_type" value="code">
							<input type="hidden" name="client_id" value="<?php echo $google_client_id; ?>">
							<input type="hidden" name="access_type" value="offline">														
							<button type="submit" class="button-other other-google"><div class="icon google other-button-icon"></div><div class="sign-up-other">Log in with Google</div></button>
							</form>
						</p>
						<p><button type="submit" class="button-other other-twitter"><div class="icon twitter other-button-icon"></div><div class="sign-up-other">Log in with Twitter</div></button></p>
					-->
					</div>
				</div>
				<div id="other-options">
					<p style="text-align:center;">You're a professional: we never post to your social networks and you control when we can look up information.</p>
					<!--<p>Don't want to use your social network? <strong>Sign up for a standard account.</strong></p>-->
				</div>
			</div>
		</div>
		<paper-toast id="toast" text=""></paper-toast>
	</section>
