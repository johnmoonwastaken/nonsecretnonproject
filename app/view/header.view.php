		<div class="overlay">
		</div>
		<div class="container" id="topnav">
			<ul class="leftnav">
				<li><a href="categories">Explore Career Training</a></li>
				<!--<li><a href="#">Explore Vendors</a></li>-->
			</ul>
			<ul class="rightnav">
				<!--
				<li><a href="#" onClick="document.getElementById('review-dialog').toggle();">Write a Review</a></li>
				-->
				<?php if(!isset($_COOKIE['trainingful_oauth']) && $_SERVER['REQUEST_URI'] != "/signin"): ?>
				<li><a href="signin">Register / Sign In</a></li>
				<?php elseif ($_SERVER['REQUEST_URI'] != "/signin"): ?>
				<li><a href="<?php if ($_SESSION['vendor_id'] > 0) { echo 'manage_courses';} else { echo 'edit_account';} ?>"><strong><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></strong></a></li>
				<li><a href="signout">Sign Out</a></li>
				<?php endif ?>
				<!--
				<li><a href="#" onClick="document.getElementById('si-dialog').toggle();">Sign In</a></li>
				-->
			</ul>
			<a href="/" id="header-logo"><img src="images/header-logo.png" alt="Trainingful: Find the top professional courses from hundreds of training vendors."></a>
		</div>
		<script src="js/util.js"></script>