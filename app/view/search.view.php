<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'header_required.php' ?>
		<title><?php 
		if ($_GET['tag']) { 
			echo "Top " . $_GET['tag'] . " courses - Find the top professional courses from hundreds of training vendors.";
			$keywords = $_GET['tag'];
		}
		elseif ($_GET['category']) { 
			echo /*$parent_category_name . " - " .*/ $category_name . " courses - Find the top professional courses from hundreds of training vendors.";
			$keywords = $category_name;
		}
		else 
		{	
			if ($location == "") {
				echo "Top " . $keywords . " courses - Find the top professional courses from hundreds of training vendors.";
			}
			else {
				echo "Top " . $keywords . " courses in " . $location . " - Find the top professional courses from hundreds of training vendors.";	
			}
		} ?></title>
		<?php include 'below_title.php' ?>
		<link rel="stylesheet" href="../../css/menu_styles.css">
		<link rel="stylesheet" href="../../css/search.css">

		<?php /*if ($totalResults == 0) {
			echo '<link rel="import" href="../../bower_components/elements/guarantee-action-dialog.html">';
			echo '<script>window.addEventListener("polymer-ready", function(e) {
					document.querySelector("#guarantee").ip_address = "' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . '";
					document.querySelector("#guarantee").query_string = "' . $_SERVER['QUERY_STRING'] . '";
					document.querySelector("#guarantee").toggle();
				});
				</script>';
		} */ ?>

	</head>
	<body class="homepage">
		<div id="page-wrapper">
			<?php include 'header.view.php' ?>
				<div class="container">
					<!-- Hero -->
						<section id="hero" class="container">
							<section id="main-section" style="width:400px;">
								<div id="query-summary-bar" class="container">
									<?php if ($_GET['tag']): ?>	
										<h1><?php echo $_GET['tag']; ?> courses</h1>
										<p><!--Courses tagged with <strong><?php echo $_GET['tag']; ?></strong> <small>(<a href="/">Home</a>)</small>--></p>
									<?php elseif ($_GET['category']): ?>
										<h1>Explore Categories</h1>
										<p>In <strong><?php echo $parent_category_name . " - " . $category_name; ?></strong> <small>(<a href="/categories">Change Category</a>)</small></p>
									<?php else: ?>
									<?php 
									if ($_GET['start'] == "" || $_GET['end'] == "") {
										$start = date('Y-m-d',strtotime(date("Y-m-d", mktime())));
										$end = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
									}
									?>
									<h1><?php echo $keywords; ?> courses in <?php if (empty($location)) { $location = "Everywhere"; echo "Everywhere"; } else echo $location; ?></h1>
									<p>Between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong> <small>(<a href="/?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Change Search</a>)</small></p>
									<?php endif; ?>
								</div>
								<div id="search-control-bar" class="container">
									<div class="row">
										<div class="3u">
										<?php  	$page = 1;
											$shown = 20;
											if ($_GET['page'] != "") {
												$page = $_GET['page'];
											}
											$upto = $page * $shown;
											if ($upto > $totalResults)
											{
												$upto = $totalResults;
											} ?>
											<h4 id="results-counter"><!--Filter--> <?php if ($upto > 1) {echo "Showing " . (($page -1) * $shown + 1) . "-" . $upto . " of " . $totalResults . " results"; } else { echo "No results found"; } ?></h4>
										</div>
										<div class="9u">
											<ul id="type-switcher">
												<!--<li class="active"><span class="tick"></span><a href="#">All Training</a></li>-->
												
												<li class="active"><span class="tick"></span><a href="#">Courses</a></li>
												<!--<li><span class="tick"></span><a href="#">Conferences</a></li>
												-->
											</ul>
										</div>
									</div>
								</div>
							</section>
						</section>
					</div>
				</div>

			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							
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