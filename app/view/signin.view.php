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
<?php include 'header_required.php' ?>
	<title>trainingful: sign up</title>
	
	<link href="http://fonts.googleapis.com/css?family=Pacifico:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		
	<link rel="stylesheet" href="css/signup.css">
</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container" id="main-container">
			<div id="signup-content">
				<p><h1><span style="font-family: Pacifico;">Sign in or sign up for trainingful</span></h1></p>
				<div class="row 25% uniform" style="margin-top:20px;">
					<div class="7u" style="border-right:1px solid #d7d7d7;">
						<p><h3>Use your LinkedIn account <span class="recommended">(Recommended)</span></h3></p>
						<ul class="benefits">
							<li>The easiest way to sign up and sign in
							<li>LinkedIn ratings are given <strong>5x</strong> more weight than ratings from standard users
							<li>Exclusive designation as a verified professional within Trainingful community
						</ul>
						<form action="https://www.linkedin.com/uas/oauth2/authorization" method="get">
							<input type="hidden" name="response_type" value="code">
							<input type="hidden" name="client_id" value="<?php echo $linkedin_api_key; ?>">
							<input type="hidden" name="redirect_uri" value="<?php echo $GLOBALS['_serverpath']; ?>/auth_linkedin_redirect">
							<input type="hidden" name="state" value="<?php echo $_SESSION['state']; ?>">
							<input type="hidden" name="scope" value="r_basicprofile">
							<button type="submit" class="button-linkedin"><div class="icon linkedin linkedin-button-icon"></div><div class="sign-up-linkedin">Log in with LinkedIn</div></button>
						</form>

					</div>
					<div class="5u" style="padding-left:40px;">
						<p><h3>Or use your favourite social network</h2></p>
						<p><button type="submit" class="button-other other-facebook"><div class="icon facebook other-button-icon"></div><div class="sign-up-other">Log in with Facebook</div></button></p>
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
					</div>
				</div>
				<div id="other-options">
					<p style="text-align:center;">You're a professional: we never post to your social networks and you control when we can look up information.</p>
					<!--<p>Don't want to use your social network? <strong>Sign up for a standard account.</strong></p>-->
				</div>
			</div>
		
		</div>
	</section>
