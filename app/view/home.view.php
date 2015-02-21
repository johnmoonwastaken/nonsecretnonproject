<!DOCTYPE HTML>
<html>
<head>
	<title>trainingful</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
	
	<!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="css/style.css">
	
	<style>
	header {
		height: 505px;
	}
	
	header h1 {
		color: #fff;
		font-size: 2.5em;
		font-weight: 400;
		width: 783px;
		margin: 105px auto 5px;
	}
	
	#searchbox {
		width: 783px;
		margin: 0 auto;
		background-color: rgba(237, 237, 237, 0.9);
		border-radius: 3px;
		border: 1px solid #ededed;
		box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
		padding: 20px;
	}
	
	#searchbox input {
		padding: 11px;
		font-size: 1.2em;
		border: 1px solid #acacac;
		width: 100%;
		display: block;
	}
	
	#searchbox input:focus {
		padding: 10px;
		border: 2px solid #4ca166;
	}
	
	#searchbox-keywords {
		
	}
	
	#main-section {
		background: #f8f8f8;
		padding: 40px 0;
	}
	
	#functions-container {
		border-bottom: 1px solid #d7d7d7;
		padding-bottom: 40px;
		margin-bottom: 40px;
	}
	
	#industries-container {
		margin-bottom: 40px;
	}
	
	.category-list {
		list-style: none;
		padding: 0;
		margin: 0;
		font-size: 0.85em;
		line-height: 1.5em;
		font-weight: 300;
	}
	
	.category-list li a {
		color: #6e6e6e;
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

	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="../../bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../bower_components/moment/moment.js"></script>
	<script type="text/javascript" src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

</head>
<body>

	<header>
		<?php include 'header.view.php' ?>

		<h1>Find courses and conferences</h1>
		<form id="searchbox" action="search" method="get">
			<div class="row">
				<div class="12u">
					<input type="text" id="searchbox-keywords" name="keywords" placeholder="Search courses, vendor, description" class="form-text">
				</div>
			</div>
			<div class="row 25% uniform">
				<div class="3u form-date-cell">
					<input type="text" id="searchbox-start" name="start" placeholder="Start date" class="form-text form-date"><span class="icon calendar" style="font-size:1.2em;"></span>
					<script type="text/javascript">
	               $(document).ready(function() {
    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
        	            console.log(start.toISOString(), end.toISOString(), label);
            	      });
	               });
    	           </script>

				</div>
				<div class="3u form-date-cell">
					<input type="text" id="searchbox-end" name="end" placeholder="End date" class="form-text form-date"><span class="icon calendar" style="font-size:1.2em;"></span>
				</div>
					<script>
						var curDate = new Date();
						var dd = curDate.getDate();
						var mm = curDate.getMonth()+1;
						var yyyy = curDate.getFullYear();
						if(dd<10) {
							dd='0'+dd
							} 
						if(mm<10) {
						    mm='0'+mm
						    } 
						yyyy = yyyy+1;
						document.getElementById('searchbox-end').value = yyyy+'-'+mm+'-'+dd;

						curDate.setDate(curDate.getDate()+1);
						dd = curDate.getDate();
						mm = curDate.getMonth()+1;
						yyyy = curDate.getFullYear();
						if(dd<10) {
							dd='0'+dd
							} 
						if(mm<10) {
						    mm='0'+mm
						    } 
						document.getElementById('searchbox-start').value = yyyy+'-'+mm+'-'+dd;
					</script>
						
					</script>
					<script type="text/javascript">
    	           $(document).ready(function() {
        	          $('#searchbox-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
            	        console.log(start.toISOString(), end.toISOString(), label);
                	  });
	               });
    	           </script>
				<div class="6u">
					<input type="text" id="searchbox-location" name="location" placeholder="Location" class="form-text" value="Vancouver">
				</div>
			</div>
			<div class="row 25% uniform">
				<div class="6u">
					<button type="submit" class="form-submit">Search Training</button>
				</div>
			</div>
		
		</form>
	</header>
	
	<section id="main-section">
		<div class="container">
			<h3>Explore Functions</h3>
			<div id="functions-container">
				<div class="row">
					<?php
					$total_columns = 3;
					// We check to make sure we have an array of $functions (this is to avoid unnecessary warnings)
					if (isset($functions) && is_array($functions)) {
						// Divide the array of $functions into three (one for each column)
						$functionslist = array_chunk($functions, count($functions) % $total_columns == 0 ? count($functions) / $total_columns : count($functions) / $total_columns + 1);
					} else {
						$functionslist = array();
					}				
					?>
					<ul class="4u category-list">
					<?php foreach($functionslist[0] as $function): ?>
						<li><a href="#"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>
					
					<ul class="4u category-list">
					<?php foreach($functionslist[1] as $function): ?>
						<li><a href="#"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>
					
					<ul class="4u category-list">
					<?php foreach($functionslist[2] as $function): ?>
						<li><a href="#"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>
			<h3>Explore Industries</h3>
			<div id="industries-container">
				<div class="row">
					<?php
					$total_columns = 3;
					// We check to make sure we have an array of $functions (this is to avoid unnecessary warnings)
					if (isset($industries) && is_array($industries)) {
						// Divide the array of $functions into three (one for each column)
						$industrieslist = array_chunk($industries, count($industries) % $total_columns == 0 ? count($industries) / $total_columns : count($industries) / $total_columns + 1);
					} else {
						$industrieslist = array();
					}				
					?>
					<ul class="4u category-list">
					<?php foreach($industrieslist[0] as $industries): ?>
						<li><a href="#"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>

					<ul class="4u category-list">
					<?php foreach($industrieslist[1] as $industries): ?>
						<li><a href="#"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>

					<ul class="4u category-list">
					<?php foreach($industrieslist[2] as $industries): ?>
						<li><a href="#"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach;?>
					</ul>
				</div>
			</div>			
		</div>
	</section>