<!DOCTYPE HTML>
<html>
<head>
	<?php include 'header_required.php' ?>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<title>Trainingful: Find courses in Vancouver</title>
	<meta name="Title" content="Trainingful: Find the professional course you're looking for, guaranteed.">
	<meta name="Keywords" content="courses, conferences, professional training, training, professional development, online course, review, reviews, training providers, course">
	<meta name="Description" content="The fastest and easiest way to search for professional courses with thousands of course sessions. Find the course you're looking for, guaranteed.">

	<style>
	header {
		height: 505px;
	}
	
	header h1 {
		color: #fff;
		font-size: 2.5em;
		font-weight: 400;
		width: 783px;
		margin: 85px auto 5px;
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

	#tags-container {
		text-align: justify;
		padding-bottom: 40px;
		margin-bottom: 0px;
	}

	#tag-section {
		background: #fff;
		padding: 40px 0;
	}

	#trainingful-guarantee {
		border: 2px dotted rgba(0,0,0,0.5);
		border-radius: 10px;
		padding: 6px 20px 6px 20px;
		margin: 15px 50px 0px 50px;
		font-family: "Pacifico";
		font-size: 1em;
		color: rgba(0,0,0,0.85);
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

	.description {
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		font-weight: 600;
		color: #5b5b5b;
		font-size: 0.8em;
	}

	.tag {
		margin-right:18px;
		white-space: nowrap;
	}


	</style>
	
	<script src="js/skel.min.js"></script>
	<script src="js/countUp.min.js"></script>
	<script>
	skel.init({
		containers: '990px'
	});

	$( document ).ready(function() {
		var options = {
		  useEasing : true, 
		  useGrouping : true, 
		  separator : ',', 
		  decimal : '.', 
		  prefix : '', 
		  suffix : '' 
		};
		var demo = new countUp("myTargetElement", 0, <?php echo $total_sessions ?>, -1, 2.0, options);
		demo.start();
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
					<input type="text" id="searchbox-keywords" name="keywords" placeholder="Search courses, tags" class="form-text" <?php if ($_GET['keywords']) { echo 'value='.$_GET['keywords']; } ?>>
				</div>
			</div>
			<div class="row 25% uniform">
				<div class="3u form-date-cell">
					<input type="text" id="searchbox-start" name="start" placeholder="Start date" class="form-text form-date" <?php if ($_GET['start']) { echo 'value='.$_GET['start']; } ?>><span class="icon calendar" style="font-size:1.2em;"></span>
					<script type="text/javascript">
	               $(document).ready(function() {
    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
            	      });
	               });
    	           </script>

				</div>
				<div class="3u form-date-cell">
					<input type="text" id="searchbox-end" name="end" placeholder="End date" class="form-text form-date" <?php if ($_GET['end']) { echo 'value='.$_GET['end']; } ?>><span class="icon calendar" style="font-size:1.2em;"></span>
				</div>
					<script>
						if (document.getElementById('searchbox-end').value == '') {
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
						}

						if (document.getElementById('searchbox-start').value == '') {
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
						}
					</script>
						
					</script>
					<script type="text/javascript">
    	           $(document).ready(function() {
        	          $('#searchbox-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
                	  });
	               });
    	           </script>
				<div class="6u">
					<!--<input type="text" id="searchbox-location" name="location" placeholder="Location" class="form-text"  <?php // if ($_GET['location']) { echo 'value='.$_GET['location']; } else echo 'value="Vancouver"'; ?>>-->
					<select id="searchbox-location" name="location" placeholder="Location" style="font-size:1.3em;height:51px;padding:9px 9px 10px 9px;border: 1px solid #aaa;border-radius:0;color: #555555;width:366px;">
						<option value="Vancouver">Vancouver</option>
						<option value="Everywhere" <?php if ($_GET['location'] == "Everywhere") echo 'selected'; ?>>Everywhere</option>
					</select>
				</div>
			</div>
			<div class="row 25% uniform">
				<div class="12u">
					<button type="submit" class="form-submit" style="margin-left:260px">Search Training</button>
				</div>
			</div>
			<div class="row 25% uniform">
				<div id="trainingful-guarantee">
					the trainingful guarantee: <span class="description">If you can't find the course you're looking for, we'll personally find it for you.</span>
				</div>
			</div>
		</form>
	</header>

	<section id="tag-section">
		<h1 style="text-align:center;font-size:3em;padding-left:100px;padding-right:100px;"><span id="myTargetElement"></span> course sessions in Vancouver to further your career</h1>
		<!--<h1 style="text-align:center">+ our trainingful guarantee to help you find courses you're looking for.</h1>-->
		<h2 style="text-align:center">Our most popular course tags:</h2>
		<div class="container">
			<div id="tags-container">
			<?php foreach($tags as $tag) {
				$tag_name = str_replace(' ', '&nbsp;', $tag['tag_name']);
				$textsize = 0.7 + round((intval($tag['total'])-$tag_min)*0.8/($tag_max-$tag_min),1);
				echo '<a href="search?tag='.urlencode($tag['tag_name']).'" style="font-size:'.$textsize.'em;" class="tag">'.$tag_name."</a> ";
			}
			?>
			</div>
		</div>
	</section>

	<section id="main-section">
		<div class="container">
			<h3>Explore Courses by Function</h3>
			<div id="functions-container">
				<div class="row">
					<?php
					$total_columns = 3;
					$functionslist[0] = array();
					$functionslist[1] = array();
					$functionslist[2] = array();
					// We check to make sure we have an array of $functions (this is to avoid unnecessary warnings)
					if (isset($functions) && is_array($functions) && count($functions) > 0) {
						// Divide the array of $functions into three (one for each column)
						//$functionslist = array_chunk($functions, count($functions) % $total_columns == 0 ? count($functions) / $total_columns : count($functions) / $total_columns + 1);
						$column_counter = 0;
						foreach ($functions as $function) {
							array_push($functionslist[$column_counter],$function);
							$column_counter = ($column_counter+1) % $total_columns;
						}
					} else {
						$functionslist = array();
					}
					?>
					<ul class="4u category-list">
					<?php if (is_array($functionslist[0])) { foreach($functionslist[0] as $function): ?>
						<li><a href="categories#p<?php echo $function['id']; ?>"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>
					
					<ul class="4u category-list">
					<?php if (is_array($functionslist[1])) { foreach($functionslist[1] as $function): ?>
						<li><a href="categories#p<?php echo $function['id']; ?>"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>
					
					<ul class="4u category-list">
					<?php if (is_array($functionslist[2])) { foreach($functionslist[2] as $function): ?>
						<li><a href="categories#p<?php echo $function['id']; ?>"><?php echo $function['name']; ?> <span style="font-weight:bold">(<?php echo $function['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>
				</div>
			</div>
			<h3>Explore Courses by Industry</h3>
			<div id="industries-container">
				<div class="row">
					<?php
					$total_columns = 3;
					$industrieslist[0] = array();
					$industrieslist[1] = array();
					$industrieslist[2] = array();
					// We check to make sure we have an array of $functions (this is to avoid unnecessary warnings)
					if (isset($industries) && is_array($industries) && count($industries) > 0) {
						// Divide the array of $functions into three (one for each column)
						$column_counter = 0;
						foreach ($industries as $industry) {
							array_push($industrieslist[$column_counter],$industry);
							$column_counter = ($column_counter+1) % $total_columns;
						}
					} else {
						$industrieslist = array();
					}
					?>
					<ul class="4u category-list">
					<?php if (is_array($industrieslist[0])) { foreach($industrieslist[0] as $industries): ?>
						<li><a href="categories#p<?php echo $industries['id']; ?>"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>

					<ul class="4u category-list">
					<?php if (is_array($industrieslist[1])) { foreach($industrieslist[1] as $industries): ?>
						<li><a href="categories#p<?php echo $industries['id']; ?>"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>

					<ul class="4u category-list">
					<?php if (is_array($industrieslist[2])) { foreach($industrieslist[2] as $industries): ?>
						<li><a href="categories#p<?php echo $industries['id']; ?>"><?php echo $industries['name']; ?> <span style="font-weight:bold">(<?php echo $industries['course_count']; ?>)</span></a></li>
					<?php endforeach; }?>
					</ul>
				</div>
			</div>			
		</div>
	</section>