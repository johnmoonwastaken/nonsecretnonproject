<!DOCTYPE HTML>
<html>
<head>
	<title>trainingful: the contact info</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Pacifico:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/static-style.css">

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>

	<script>
	skel.init({
		containers: '990px'
	});
	</script>

</head>
<style>
	#contact-content {
		overflow: hidden;
		background: #fff;
		border-top: 7px solid #4ca166;
		border-left: 1px solid #d7d7d7;
		border-right: 1px solid #d7d7d7;
		border-bottom: 1px solid #d7d7d7;
		padding: 30px;
	}
	
	#contact-content h1 {
		margin: 0 0 0;
		font-size: 2.2em;
		color: #444;
		font-weight:400;
	}

	#contact-content h3 {
		color: #000;
		font-weight:400;
		font-family: 'Pacifico';
	}

	#contact-content h4 {
		color:#666;
		font-weight:300;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}

	#contact-content h5 {
		color:#666;
		margin-left:0.2em;
		font-weight:300;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}
	
	#contact-document {
		background: rgba(0, 0, 0, 0.5);
		padding: 25px;
		color: #fff;
	}
	
	#contact-document h1 {
		margin: 0 0 0.05em;
		color: #fff;
		font-weight: 300;
		font-size: 2.2em;
		font-family: 'Pacifico';
	}
	
	#contact-document p {
		margin: 0;
		font-weight: 300;
	}
	
	#contact-document a {
		color: #fff;
		text-decoration: underline;
	}
	
	#contact-document a:hover {
		text-decoration: none;
	}

	#contact-content .button-other {
		height: 40px;
		width: 40px;
		text-align: left;
		border-radius: 3px;
		border: 0;
		color: #fff;
		font-size: 1.2em;
		box-shadow: 1px 1px 5px #888888;
	}

	#contact-content .other-linkedin {
		background: #007bb6;
	}
	#contact-content .other-linkedin:hover {
		background: #1086be;
	}
	#contact-content .other-facebook {
		background: #3b579d;
	}
	#contact-content .other-facebook:hover {
		background: #4c68af;
	}

	#contact-content .other-google {
		background: #dd4b39;
	}
	#contact-content .other-google:hover {
		background: #ef5f4d;
	}

	#contact-content .other-twitter {
		background: #00b0ed;
	}
	#contact-content .other-twitter:hover {
		background: #14bffb;
	}

	#contact-content .other-button-icon {
		padding-top: 20px;
		height: 40px;
		width: 30px;
		border-right: 1px solid rgba(0, 0, 0, .05);
		float:left;
		margin-left: 5px;
	}
</style>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container" id="main-container">
		
			<div id="static-document" class="container">
				<p><h1>the contact info</h1></p>
			</div>
			<div id="contact-content">
				<p>
					<h4>trainingful is headquartered in Vancouver, BC, Canada. <br /><br />
					Find us on your favorite social media websites!<br /><br />
					<p><button type="submit" class="button-other other-linkedin"><div class="icon linkedin other-button-icon"></div><div class="sign-up-other">Sign In with LinkedIn</div></button></p><h5><a href="https://www.linkedin.com/company/trainingful-com/">trainingful on LinkedIn</a></h5><br /><br />
					<p><button type="submit" class="button-other other-facebook"><div class="icon facebook other-button-icon"></div><div class="sign-up-other">Sign In with Facebook</div></button></p><h5><a href="https://www.facebook.com/trainingful">trainingful on Facebook</a></h5><br /><br />
					<p><button type="submit" class="button-other other-google"><div class="icon google other-button-icon"></div><div class="sign-up-other">Sign In with Google</div></button></p><h5><a href="https://plus.google.com/u/0/103971240408505697822">trainingful on Google+</a></h5><br /><br />
					<p><button type="submit" class="button-other other-twitter"><div class="icon twitter other-button-icon"></div><div class="sign-up-other">Sign In with Twitter</div></button></p><h5><a href="https://twitter.com/trainingful">trainingful on Twitter</a></h5><br /><br />
					We love getting your feedback! Contact us at <a href="mailto:support@trainingful.com">support@trainingful.com</a>.</h4>
				</p>
			</div>
		</div>
	</section>