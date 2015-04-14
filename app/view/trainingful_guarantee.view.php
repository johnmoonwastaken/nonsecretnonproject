<!DOCTYPE HTML>
<html>
<head>
	<?php include 'header_required.php' ?>
	<link rel="import" href="../../bower_components/paper-toast/paper-toast.html">
	<title>Trainingful: trainingful guarantee</title>
	<meta name="Title" content="Trainingful: Find the professional course you're looking for, guaranteed.">
	<meta name="Keywords" content="courses, conferences, professional training, training, professional development, online courses, review, reviews, training providers">
	<meta name="Description" content="The fastest and easiest way to search for professional courses with thousands of course sessions. Find the course you're looking for, guaranteed.">
	
	<link href="http://fonts.googleapis.com/css?family=Pacifico:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/static-style.css">
	
	<script>
	window.addEventListener('polymer-ready', function(e) {
		//console.log('polymer-ready');
		var toast_action = <?php echo "\"" . $_GET['return'] . "\""; ?>;
		if (toast_action == "sent") {
			document.querySelector('#toast').text = "We're going take a look and contact you by email!";
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
		
			<div id="static-document" class="container">
				<p><h1>the trainingful guarantee</h1></p>
			</div>
			<div id="static-content">
						<p><h4>Trainingful is here to help you find the courses you need for your career.<br /><br />
If you cannot find the course you're looking for on our search engine, fill out the trainingful guarantee form and we'll do searches, talk to our vendors and contact you back.</h4></p>
			</div>
		</div>
		
	</section>
	<paper-toast id="toast" text=""></paper-toast>