<!DOCTYPE HTML>
<html>
<head>
	<title>trainingful: the contact info</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Pacifico:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		
	<link rel="stylesheet" href="css/style.css">
				
	<style>
	#info-bar {
		list-style: none;
		width: 100%;
		margin: 0;
		padding: 0 0 0 5px;
		border-left: 1px solid #d7d7d7;
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
	
	#static-content {
		overflow: hidden;
		background: #fff;
		border-top: 7px solid #4ca166;
		border-left: 1px solid #d7d7d7;
		border-right: 1px solid #d7d7d7;
		border-bottom: 1px solid #d7d7d7;
		padding: 30px;
	}
	
	#static-content h1 {
		margin: 0 0 0;
		font-size: 2.2em;
		color: #444;
		font-weight:400;
	}

	#static-content h3 {
		color: #000;
		font-weight:400;
		font-family: 'Pacifico';
	}

	#static-content h4 {
		color:#666;
		font-weight:300;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}

	#static-content h5 {
		color:#666;
		margin-left:0.2em;
		font-weight:300;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
	}
	
	#static-document {
		background: rgba(0, 0, 0, 0.5);
		padding: 25px;
		color: #fff;
	}
	
	#static-document h1 {
		margin: 0 0 0.05em;
		color: #fff;
		font-weight: 300;
		font-size: 2.2em;
		font-family: 'Pacifico';
	}
	
	#static-document p {
		margin: 0;
		font-weight: 300;
	}
	
	#static-document a {
		color: #fff;
		text-decoration: underline;
	}
	
	#static-document a:hover {
		text-decoration: none;
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
	
	<section id="main-section">
		<div class="container" id="main-container">
		
			<div id="static-document" class="container">
				<p><h1>the contact info</h1></p>
			</div>
			<div id="static-content">
				<p>
					<h4>Trainingful is headquartered at [address]. <br /><br />
					Find us on your favorite social media websites!
					<a href="https://www.linkedin.com/company/trainingful-com/">LinkedIn</a>
					<a href="https://www.facebook.com/trainingful">Facebook</a>
					<a href="https://twitter.com/trainingful">Twitter</a>
					<a href="https://plus.google.com/u/0/103971240408505697822">Google+</a><br /><br />
					We love getting your feedback! Contact us directly by telephone at [phone number] or by email at <a href="mailto:support@trainingful.com">support@trainingful.com</a>.</h4>
				</p>
			</div>
<script>


  var scope = document.querySelector('template[is=auto-binding]');

  scope.toggleDialog1 = function(e) {
    if (e.target.localName != 'button') {
      return;
    }
    var d = e.target.nextElementSibling;
    if (!d) {
      return;
    }
    d.toggle();
  };

  scope.transitions = [
    'core-transition-center',
    'core-transition-top',
    'core-transition-bottom',
    'core-transition-left',
    'core-transition-right'
  ];

  scope.toggleDialog2 = function(e) {
    if (e.target.localName != 'button') {
      return;
    }
    scope.transition = e.target.getAttribute('transition');
    document.getElementById('dialog2').toggle();
  };

</script>

		</div>
	</section>