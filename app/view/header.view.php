<!-- Header -->
				<div id="header-wrapper">
					<div id="nav-overlay"></div>
					<div id="header" class="container">

						<!-- Logo -->
							<!--<h1 id="logo"><a href="index.html">trainingful</a></h1>-->
							<div id="logo"><a href="/" id="header-logo"><img src="images/header-logo.png" alt="Trainingful: Find the top professional courses from hundreds of training vendors."></a></div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<!-- <li>
										<a href="#">Dropdown</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Lorem ipsum dolor</a></li>
													<li><a href="#">Phasellus consequat</a></li>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>-->
									<li><a href="left-sidebar.html">Explore Career Training</a></li>
									<!--<li><a href="left-sidebar.html">Explore Vendors</a></li>-->
									<?php if(!isset($_COOKIE['trainingful_oauth']) && $_SERVER['REQUEST_URI'] != "/signin"): ?>
									<li class="break"><a href="right-sidebar.html">Register / Sign In</a></li>
									<?php elseif ($_SERVER['REQUEST_URI'] != "/signin"): ?>
									<li class="break"><a href="<?php if ($_SESSION['vendor_id'] > 0) { echo 'manage_courses';} else { echo 'edit_account';} ?>"><strong><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></strong></a></li>
										<ul>
											<li><a href="signout">Sign Out</a></li>
										</ul>
									<?php endif ?>
									<!--<li><a href="no-sidebar.html">Register / Sign In</a></li>-->
								</ul>
							</nav>
					</div>