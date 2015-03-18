<style>
	#main-section {
		background: #f8f8f8;
		position: relative;
		padding-bottom: 40px;
	}
	
	#main-container {
		position: relative;
		top: -260px;
		margin-bottom: -160px;
	}
	
	#other-options {
		color:#aaa;
		font-weight: 400;
		font-size: 0.8em;
	}

</style>

		<div class="overlay">
		</div>
		<div class="container" id="topnav">
			<ul class="leftnav">
				<!--
				<li><a href="#">Explore Vendors</a></li>-->
				<li><a href="categories">Explore Categories</a></li>
			
			</ul>
			<ul class="rightnav">
				<!--
				<li><a href="#" onClick="document.getElementById('review-dialog').toggle();">Write a Review</a></li>
				-->
				<?php if(!isset($_COOKIE['trainingful_oauth']) && $_SERVER['REQUEST_URI'] != "/signin"): ?>
				<li><a href="signin">Register / Sign In</a></li>
				<?php elseif ($_SERVER['REQUEST_URI'] != "/signin"): ?>
				<li><a href="<?php if ($_SESSION['vendor_id'] > 0) { echo 'manage_courses';} else { echo 'edit_profile';} ?>"><strong><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></strong></a></li>
				<li><a href="signout">Sign Out</a></li>
				<?php endif ?>
				<!--
				<li><a href="#" onClick="document.getElementById('si-dialog').toggle();">Sign In</a></li>
				-->
			</ul>
			<a href="/" id="header-logo"><img src="images/header-logo.png" alt="Trainingful"></a>
		</div>

		<paper-action-dialog backdrop id="si-dialog" transition="paper-dialog-transition-bottom" style="display:none;">
			<style>
				#signin-content {
					overflow: hidden;
					background: #fff;
				}

				#signin-content h1 {
					margin: 0 0 0;
					font-size: 2.2em;
					color: #666;
				}

				#signin-content h2 {
					font-weight:300;
				}
				
				#signin-content h3 {
					font-weight: 300;
					font-size: 1.4em;
				}

				#signin-content h4 {
					color:#666;
					font-weight: 400;
					font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
				}

				#signin-content h5 {
					color:#666;
					margin-left: 0.2em;
					font-weight: 400;
					font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
				}

				#signin-content .recommended {
					font-size: 0.7em;
					font-weight: 600;
					color: #4ca166;
				}
				
				#signin-content .benefits {
					list-style: none;
					font-weight: 400;
					font-size: 0.85em;
					color: #666;
				}

				#signin-content .benefits li:before {
					content:"- ";
				}
				
				#signin-content .benefits li {
					margin-top: 2px;
				}

				#signin-content .button-other {
					height: 40px;
					width: 250px;
					text-align: left;
					border-radius: 3px;
					border: 0;
					color: #fff;
					font-size: 1.2em;
					box-shadow: 1px 1px 5px #888888;
				}

				#signin-content .other-linkedin {
					background: #007bb6;
				}
				#signin-content .other-linkedin:hover {
					background: #1086be;
				}
				#signin-content .other-facebook {
					background: #3b579d;
				}
				#signin-content .other-facebook:hover {
					background: #4c68af;
				}

				#signin-content .other-google {
					background: #dd4b39;
				}
				#signin-content .other-google:hover {
					background: #ef5f4d;
				}

				#signin-content .other-twitter {
					background: #00b0ed;
				}
				#signin-content .other-twitter:hover {
					background: #14bffb;
				}

				#signin-content .other-button-icon {
					padding-top: 20px;
					height: 40px;
					width: 30px;
					border-right: 1px solid rgba(0, 0, 0, .05);
					float:left;
					margin-left: 5px;
				}

				#signin-content .sign-up-other {
					font-family: 'Lato', Helvetica, Arial, Sans Serif;
					font-size: 0.8em;
					font-weight: 300;
					margin: 10px 0px 0px 50px;
				}

				#signin-content .button-linkedin {
					margin: 20px 0px 50px 80px;
					height: 60px;
					width: 350px;
					text-align: left;
					background: #007bb6;
					border-radius: 3px;
					border: 0;
					color: #fff;
					font-size: 2em;
					box-shadow: 1px 1px 5px #888888;
				}

				#signin-content .button-linkedin:hover {
					background: #1086be;
				}
				
				#signin-content .linkedin-button-icon {
					padding-top: 30px;
					height: 60px;
					width: 50px;
					border-right: 1px solid rgba(0, 0, 0, .05);
					float:left;
					margin-left: 5px;
				}
				
				#signin-content .sign-up-linkedin {
					font-family: 'Lato', Helvetica, Arial, Sans Serif;
					font-size: 0.7em;
					font-weight: 300;
					margin: 15px 0px 0px 90px;
				}

				#signin-content .header {
					font-size:1.5em;
					font-family: 'Lato', 'Open Sans', Helvetica, Arial, Sans Serif;
					font-weight: 300;
				}

				@font-face {
					font-family: 'icomoon';
					src:url('../fonts/icomoon.eot?-bg0dkl');
					src:url('../fonts/icomoon.eot?#iefix-bg0dkl') format('embedded-opentype'),
						url('../fonts/icomoon.woff?-bg0dkl') format('woff'),
						url('../fonts/icomoon.ttf?-bg0dkl') format('truetype'),
						url('../fonts/icomoon.svg?-bg0dkl#icomoon') format('svg');
					font-weight: normal;
					font-style: normal;
				}

				.icon {
					font-family: 'icomoon';
					speak: none;
					font-size: 1.2em;
					line-height: 0;
					font-style: normal;
					font-weight: normal;
					font-variant: normal;
					text-transform: none;

					-webkit-font-smoothing: antialiased;
					-moz-osx-font-smoothing: grayscale;
				}
				.icon.facebook:before {
					content: "\e608";
				}
				.icon.google:before {
					content: "\e609";
				}
				.icon.linkedin:before {
					content: "\e60a";
				}
				.icon.twitter:before {
					content: "\e60b";
				}
				.left-side-buttons {
					border-right:1px solid #d7d7d7;
					padding-bottom:10px;
					margin-left:20px;
					margin-top:20px;
					padding-right:65px;
					float:left;
				}
				.right-side-buttons {
					padding-left:350px;
					padding-bottom:10px;
					padding-top:10px;
				}
				.clear {
					clear: both;
				}
				.fine-print {
					padding-top: 10px;
					text-align:center;
					font-size: 13px;
					color: #aaaaaa;
				}
			</style>

			<div id="signin-content"><span class="header">Sign In</span>
				<div>
					<div class="left-side-buttons">
						<p><button type="submit" class="button-other other-linkedin"><div class="icon linkedin other-button-icon"></div><div class="sign-up-other">Sign In with LinkedIn</div></button></p>
						<p><button type="submit" class="button-other other-facebook"><div class="icon facebook other-button-icon"></div><div class="sign-up-other">Sign In with Facebook</div></button></p>
						<p><button type="submit" class="button-other other-google"><div class="icon google other-button-icon"></div><div class="sign-up-other">Sign In with Google</div></button></p>
						<p><button type="submit" class="button-other other-twitter"><div class="icon twitter other-button-icon"></div><div class="sign-up-other">Sign In with Twitter</div></button></p>
					</div>
					<div class="right-side-buttons">
						<p><h4>Or sign in with your email:</h4></p>
						<!--needs a box to enter email address and a box to enter password -->
					</div>
				</div>
				<div id="other-options" class="clear">
					<p class="fine-print">You're a professional: we never post to your social networks and you control when we can look up information.</p>
				</div>
			</div>
			<paper-button dismissive>Cancel</paper-button>
		</paper-action-dialog>