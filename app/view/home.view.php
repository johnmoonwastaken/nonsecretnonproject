<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'header_required.php' ?>
		<title>Trainingful: Find the top professional courses from hundreds of training vendors.</title>
		<?php include 'below_title.php' ?>
		<!--
		<link rel="stylesheet" type="text/css" media="all" href="../../bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css" />
		<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../bower_components/moment/moment.js"></script>
		<script type="text/javascript" src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

		-->

		<link rel="stylesheet" href="../../css/menu_styles.css">
		<link rel="stylesheet" href="../../css/home.css">

		<script>
			function updateLocation(metro_name) {
				document.getElementById('searchbox-location').innerHTML = metro_name;
				document.getElementById('input-location').value = metro_name;
			}
		</script>
	</head>
	<body class="homepage">
		<div id="page-wrapper">
		<?php include 'header.view.php' ?>
					<!-- Hero -->
						<section id="hero" class="container">

							<!-- USE HEADER HERE????? -->
							<h1>Find courses near you</h1>


							<form id="searchbox" action="search" method="get">
								<div class="row">
									<div class="12u">
										<input type="text" id="searchbox-keywords" name="keywords" placeholder="Search course keywords or tags" required class="form-text">
									</div>
								</div>
								<div class="row 25% uniform">
									<div class="3u 6u(narrower) form-date-cell">
										<input type="text" id="searchbox-start" name="start" placeholder="Start date" class="form-text form-date" <?php if ($_GET['start']) { echo 'value='.$_GET['start']; } ?>><span class="icon calendar" style="font-size:1.2em;"></span>
										<script type="text/javascript">
						               $(document).ready(function() {
					    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
					            	      });
						               });
					    	           </script>
									</div>
									<div class="3u 6u(narrower) form-date-cell">
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


									<div class="6u 12u(narrower)">
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
									<div class="3u 12u(narrower)">
										<input type="checkbox" name="include_online" id="online-checkbox" checked><span id="checkbox-text">Include online courses</span>
									</div>
									<div class="6u 12u(narrower)">
										<button type="submit" class="form-submit">Search Training</button>
									</div>
									<!--
									<div class="3u 12u(narrower)">
									</div>
								-->
								</div>
							</form>
					</section>
				</div>

			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section class="6u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured first"><img src="images/pic01.jpg" alt="" /></a>
								</div>
								<header>
									<h2>Semper magna neque vel<br />
									adipiscing curabitur</h2>
								</header>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel
								sem sit dolor neque semper magna. Lorem ipsum dolor sit amet consectetur et sed
								adipiscing elit. Curabitur vel sem sit.</p>
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							</section>
							<section class="6u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
								</div>
								<header>
									<h2>Amet lorem ipsum dolor<br />
									sit consequat magna</h2>
								</header>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel
								sem sit dolor neque semper magna. Lorem ipsum dolor sit amet consectetur et sed
								adipiscing elit. Curabitur vel sem sit.</p>
								<ul class="actions">
									<li><a href="#" class="button">Elevate my awareness</a></li>
								</ul>
							</section>
						</div>
					</div>
				</div>

			<!-- Promo -->
				<div id="promo-wrapper">
					<section id="promo">
						<h2>Neque semper magna et lorem ipsum adipiscing</h2>
						<a href="#" class="button">Breach the thresholds</a>
					</section>
				</div>

			<!-- Features 2 -->
				<div class="wrapper">
					<section class="container">
						<header class="major">
							<h2>Sed magna consequat lorem curabitur tempus</h2>
							<p>Elit aliquam vulputate egestas euismod nunc semper vehicula lorem blandit</p>
						</header>
						<div class="row features">
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper first">
									<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
							<section class="4u 12u(narrower) feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
								vel sem sit dolor neque semper magna lorem ipsum.</p>
							</section>
						</div>
						<ul class="actions major">
							<li><a href="#" class="button">Elevate my awareness</a></li>
						</ul>
					</section>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Euismod aliquam vehicula lorem</h2>
							<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel sem sit<br />
							dolor neque semper magna lorem ipsum feugiat veroeros lorem ipsum dolore.</p>
						</header>
						<div class="row">
							<section class="6u 12u(narrower)">
								<form method="post" action="#">
									<div class="row 50%">
										<div class="6u 12u(mobile)">
											<input name="name" placeholder="Name" type="text" />
										</div>
										<div class="6u 12u(mobile)">
											<input name="email" placeholder="Email" type="text" />
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" value="Send Message" /></li>
												<li><input type="reset" value="Clear form" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section class="6u 12u(narrower)">
								<div class="row 0%">
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="icon fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="icon fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons 6u 12u(mobile)">
										<li class="icon fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
										<li class="icon fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="icon fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>

		</div>
	</body>
</html>