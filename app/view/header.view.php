		<script src="../../bower_components/webcomponentsjs/webcomponents.js"></script>
		<link href="../../bower_components/paper-button/paper-button.html" rel="import">
		<link href="../../bower_components/paper-dialog/paper-action-dialog.html" rel="import">
		
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
				font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
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
				font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
				font-size: 0.7em;
				font-weight: 300;
				margin: 15px 0px 0px 90px;
			}
			
			#static-document {
				background: rgba(0, 0, 0, 0.5);
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


		<div class="overlay">
		</div>
		<div class="container" id="topnav">
			<ul class="leftnav">
				<li><a href="#">Explore Vendors</a></li>
				<li><a href="#">Explore Categories</a></li>
			</ul>
			<ul class="rightnav">
				<li><a href="#" onClick="document.getElementById('review-dialog').toggle();">Write a Review</a></li>
				<li><a href="signup">Register</a></li>
				<li><a href="#" onClick="document.getElementById('si-dialog').toggle();">Sign In</a></li>
			</ul>
			<a href="/" id="header-logo"><img src="images/header-logo.png" alt="Trainingful"></a>
		</div>
			
			<paper-action-dialog backdrop id="review-dialog" heading="Write a Review"
						  transition="paper-dialog-transition-bottom" style="display:none;">
				<div id="signin-content">
					<div class="row 25% uniform">
						<div class="12u" style="border-bottom:1px solid #d7d7d7">
							<!--needs a box with vendor logo, then on right course name, date/time and location --> 
							<!--paper slider for all 4 of the below ratings -->
							<p><h4>OVERALL RATING</h4></p>
							<p><h5> &nbsp;&nbsp;&nbsp; Instructor</h5></p> 
							<p><h5> &nbsp;&nbsp;&nbsp; Facility/Comfort</h5></p> 
							<p><h5> &nbsp;&nbsp;&nbsp; Materials/Handouts</h5></p> 
						</div>
						<div class="12u" style="border-bottom:1px solid #d7d7d7">
							<p><h4>Your Review</h4></p>
							<!--review box -->
							<p><h4>Add Photos/Videos of the Course (optional)</h4></p>
							<!--photo/video add box -->
						</div>
					</div>
				</div>
				<paper-button dismissive>Cancel</paper-button>
				<paper-button affirmative default>SUBMIT YOUR REVIEW</paper-button>
			</paper-action-dialog>

			<paper-action-dialog backdrop id="si-dialog" heading="Sign In"
						  transition="paper-dialog-transition-bottom" style="display:none;">
				<div id="signin-content">
					<div class="row 25% uniform">
						<div class="5u" style="border-right:1px solid #d7d7d7;padding-bottom:20px;margin-left:20px;margin-top:20px;padding-right:205px;">
							<p><button type="submit" class="button-other other-linkedin"><div class="icon linkedin other-button-icon"></div><div class="sign-up-other">Sign In with LinkedIn</div></button></p>
							<p><button type="submit" class="button-other other-facebook"><div class="icon facebook other-button-icon"></div><div class="sign-up-other">Sign In with Facebook</div></button></p>
							<p><button type="submit" class="button-other other-google"><div class="icon google other-button-icon"></div><div class="sign-up-other">Sign In with Google</div></button></p>
							<p><button type="submit" class="button-other other-twitter"><div class="icon twitter other-button-icon"></div><div class="sign-up-other">Sign In with Twitter</div></button></p>
						</div>
						<div class="5u" style="padding-left:40px;">
							<p><h4>Or sign in with your email.</h4></p>
							<!--needs a box to enter email address and a box to enter password -->
						</div>
					</div>
					<div id="other-options">
						<p style="text-align:center;">You're a professional: we never post to your social networks and you control when we can look up information.</p>
						
					</div>
				</div>
				<paper-button dismissive>Cancel</paper-button>
			</paper-action-dialog>
