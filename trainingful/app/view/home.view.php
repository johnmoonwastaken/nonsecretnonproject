<?php include('page-head.inc.php'); ?>
	
	<body class="homepage">
	
		<?php include('header-start.inc.php'); ?>
			
			<!-- Hero -->
			<section id="hero" class="container">
				<header>
					<h3 style="text-align:left;color: #ffffff;">Find courses and conferences</h3>
					<form class="form-wrapper cf" method="get" action="search">
						
						<script>
							$(function() {
								$( "#from" ).datepicker({
									changeMonth: false,
									dateFormat: "yy-mm-dd",
									defaultDate: "+1d",
									numberOfMonths: 2,
									onClose: function( selectedDate ) {
										$( "#to" ).datepicker( "option", "minDate", selectedDate );
									}
								});
								$( "#to" ).datepicker({
									changeMonth: false,
									numberOfMonths: 2,
									dateFormat: "yy-mm-dd",
									defaultDate: "+4m",
									onClose: function( selectedDate ) {
										$( "#from" ).datepicker( "option", "maxDate", selectedDate );
									}
								});
							});
						</script>
						<input name="search" type="text" placeholder="Search courses, vendors, description..." required>
						<div class="row collapse-at-2 half">
							<div class="3u">
								From <input type="text" id="from" name="from" value="<?php echo date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y"))) ?>" required>
							</div>
							<div class="3u">
								To <input type="text" id="to" name="to" value="<?php echo date("Y-m-d",mktime(0,0,0,date("m")+4,date("d"),date("Y"))) ?>" required>
							</div>
							<div class="6u">
								Located in <input type="text" id="near" name="near" placeholder="Anywhere, Vancouver, online...">
							</div>
						</div>
						<div class="row">&nbsp;<br /><br /></div>
						<button type="submit" class="button">Search</button>
						<!--
						<div class="row">
							&nbsp;<br /><br />[] Advanced Search <br />
							<br />Price Min - Price Max | Min Length - Max Length | Min Rating | [x] exclude online courses/conferences<br />
						</div>
						-->
					</form>
				</header>
			</section>
			
		<?php include('header-end.inc.php'); ?>
		
		
		<?php include('home-categories.inc.php'); ?>
		
		<?php include('home-ratings.inc.php'); ?>
		
		
		
		<?php include('footer-start.inc.php'); ?>
			<div id="footer" class="container">
				<header class="major">
					<h2>Euismod aliquam vehicula lorem</h2>
					<p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel sem sit<br />
					dolor neque semper magna lorem ipsum feugiat veroeros lorem ipsum dolore.</p>
				</header>
				<div class="row">
					<section class="6u">
						<form method="post" action="#">
							<div class="row collapse-at-2 half">
								<div class="6u">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="6u">
									<input name="email" placeholder="Email" type="text" />
								</div>
							</div>
							<div class="row half">
								<div class="12u">
									<textarea name="message" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="row half">
								<div class="12u">
									<ul class="actions">
										<li><input type="submit" value="Send Message" /></li>
										<li><input type="reset" value="Clear form" /></li>
									</ul>
								</div>
							</div>
						</form>
					</section>
					<section class="6u">
						<div class="row collapse-at-2 flush">
							<ul class="divided icons 6u">
								<li class="icon fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
								<li class="icon fa-facebook"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
								<li class="icon fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
							</ul>
							<ul class="divided icons 6u">
								<li class="icon fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
								<li class="icon fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
								<li class="icon fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
							</ul>
						</div>
					</section>
					
				</div>
				
			</div>
		
		<?php include('footer-end.inc.php'); ?>
	</body>
	
<?php include('page-foot.inc.php'); ?>
		
		