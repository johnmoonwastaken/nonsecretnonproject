<!DOCTYPE HTML>
<html>
<head>
	<?php include 'header_required.php' ?>
	<title>Trainingful: Find the top professional courses from hundreds of training vendors.</title>
	<?php include 'below_title.php' ?>

	<script src="js/skel.min.js"></script>
	<script>
	skel.init({
		containers: '990px'
	});
	</script>

	<link rel="stylesheet" type="text/css" media="all" href="../../bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../bower_components/moment/moment.js"></script>
	<script type="text/javascript" src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

	<link rel="stylesheet" href="../../css/menu_styles.css">
	<link rel="stylesheet" href="../../css/home_style.css">

	<script>
		function updateLocation(metro_name) {
			document.getElementById('searchbox-location').innerHTML = metro_name;
			document.getElementById('input-location').value = metro_name;
		}
	</script>

</head>
<body>
	<header>
		<?php include 'header.view.php' ?>

		<h1>Find courses near you</h1>
		<form id="searchbox" action="search" method="get">
			<div class="row">
				<div class="12u">
					<input type="text" id="searchbox-keywords" name="keywords" placeholder="Search course names or course tags" required class="form-text" <?php if ($_GET['keywords']) { echo 'value="'.$_GET['keywords'].'"'; } ?>>
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
					<input type="hidden" id="input-location" name="location">
					<ul id="menu">
					    <li><a href="#" class="drop" id="searchbox-location">Everywhere</a>
					        <div class="dropdown_4columns">
					        	<div class="col_4" style="cursor:pointer;" onClick="updateLocation('Everywhere');">
					            <strong><p>Everywhere</p></strong>
					            </div>
					        	<?php 
					        	$country = "";
					        	foreach ($locationList as $metro) {
					        		if ($metro['country_name'] != $country) {
					        			echo '<div class="col_5"><p><strong>'. $metro['country_name'] .'</strong></p></div>';
					        			$country = $metro['country_name'];
					        		}
					        		echo '<div class="col_1" style="cursor:pointer;" onClick="updateLocation(\''.$metro['metro_name'].'\');"><p>'. $metro['metro_name'].'</p></div>';
					        	}
					        	?>
					        </div>
					    </li>
					</ul>

				</div>
			</div>
			<div class="row 25% uniform">
				<div class="3u">
					&nbsp;
				</div>
				<div class="6u">
					<button type="submit" class="form-submit" style="margin-left:60px">Search Training</button>
				</div>
				<div class="3u">
					<input type="checkbox" name="include_online" checked style="width:15px;height:15px;vertical-align:bottom;margin-bottom:2px;display:inline;"><span style="font-size:0.9em;margin-left:5px;">Include online courses</span>
				</div>
			</div>
			<!--
			<div class="row 25% uniform">
				<div id="trainingful-guarantee">
					the trainingful guarantee: <span class="description">If you can't find the course you're looking for, we'll personally find it for you.</span>
				</div>
			</div>
		-->
		</form>
	</header>

	<section id="tag-section">
		<h1 style="text-align:center;font-size:3em;padding-left:100px;padding-right:100px;">Find courses from leading vendors to advance your career</h1>
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
			<!--
			<h2 style="text-align:center">A few upcoming courses:</h2>
			<div class="row 25% uniform">
				<div class="4u">
					<h5 style="text-align:center">Computing, Applications and IT</h5>
					<div></div>
				</div>
				<div class="4u"><h5 style="text-align:center">Management and Leadership</h5></div>
				<div class="4u"><h5 style="text-align:center"s>Project Management</h5></div>
			</div>
			-->
		</div>
	</section>

	<section id="main-section">
		<div class="container">
			<h2>Training providers from around North America:</h2>
			<div style="text-align:justify;">
				<?php foreach($vendorList as $branding_url): ?>
					<img src="images/vendors/<?php echo $branding_url ?>" class="grey-logo" />
				<?php endforeach ?>
			</div>
<!--
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
		-->
		</div>
	</section>

	<section id="social-section">
		<div class="container">
			<h1>Follow Us:</h1>
			<a data-pin-do="embedBoard" href="http://www.pinterest.com/trainingful/advance-your-career/" data-pin-scale-width="190" data-pin-scale-height="600" data-pin-board-width="980"></a>
			<!-- Please call pinit.js only once per page -->
			<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
		</div>
	</section>