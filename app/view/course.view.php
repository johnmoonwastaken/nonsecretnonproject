<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'header_required.php' ?>
		<title><?php echo $course_name; ?></title>
		<?php include 'below_title.php' ?>
		<link rel="stylesheet" href="../../css/course.css">
		<link rel="import" href="../../bower_components/paper-dialog/paper-dialog.html">
	</head>
	<body class="homepage">
		<div id="page-wrapper">
			<?php include 'header.view.php' ?>
			<!-- Hero -->
				<section id="main-section">
					<div id="query-summary-bar">
						<?php if ($start !=""): ?>
							<p><strong><a href="search?keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>">Back to Results</a></strong> | In <strong><?php echo $location; ?></strong> between <strong><?php echo $start; ?></strong> and <strong><?php echo $end; ?></strong></p>
						<?php else: ?>
							<p><strong><a href="<?php echo $_SESSION['prevpage']; ?>">Back to Previous Page</a></strong></p>
						<?php endif; ?>
					</div>
				</section>
		</div>
		<!-- Features 1 -->
			<div class="container">
				<div id="main-content">
					<div class="row 25% uniform">
						<div id="container2">
							<div id="vendor-tags-mobile">
								<div id="vendor-image">
									<?php echo '<a href="'. $vendor_website_url .'">'; ?><img src="images/vendors/<?php if ($branding_url == '-1' || $branding_url == "") { echo 'trainingful-branding-140.gif'; } else echo $branding_url; ?>" class="company-logo"></a>
								</div>
								<div id="vendor-name">
									<strong><?php echo '<a href="'. $vendor_website_url .'">' . $vendor_name . '</a>'; ?></strong>
								</div>
								<ul id="info-tags">
								
									<?php if ($designation != "" && $designation != "-1"): ?>
									<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
									<?php echo $designation ?></li>
									<?php endif ?>
									<li><span class="icon price-tag"></span> <strong>Tags</strong><br />
									<?php
										$count = 0;
										foreach($tags as $tag) {
											if ($count != 0) {
												echo ", ";
											}
											echo "<a href='search?tag=".urlencode($tag)."'>".$tag."</a>";
											$count++;
										}
									?>
									</li>
								</ul>
							</div>
							<div id="container1">
								<div id="col1">
									<div id="content-section">
										<h1><?php echo $course_name; ?>
										<!-- &nbsp;&nbsp;<span class="rating s4" title="4 stars"></span> --></h1>
										<p><span><h5><?php if ($parent_category_name == "") { echo $category_name; } else { echo $parent_category_name." - ".$category_name; }?></h5></span></p>

										<?php if(isset($video_url) && $video_url != ""): ?>
										<iframe width="640" height="362" src="<?php echo $video_url ?>"></iframe>
										<?php endif ?>

										<p><h4><?php echo $course_description; ?>
										<!-- <a href="#">Read More ></a> --></h4></p>

										<?php if($audience):?>
										<h3>Audience</h3>
										<p><h4><?php echo $audience; ?>
										<?php endif ?>

										<?php if($prereqs):?>
										<h3>Prerequisites</h3>
										<p><h4><?php echo $prereqs; ?>
										<?php endif ?>

										<?php if($benefits):?>
										<h3>Benefits</h3>
										<p><h4><?php echo $benefits; ?>
										<?php endif ?>

										<div id="ratings-section">
										<!--
											<div class="row 25% uniform" style="float:right;margin: 0px 15px 10px 0px;">
												<div class="12u">
													<button type="submit" class="form-submit" onClick="document.querySelector('#rad').toggle();">Write a Review</button>
												</div>
											</div>
											
											<p><h2 style="margin-top:30px;">15 reviews from our community</h2></p>

			<div class="wrapper"><div id="rating-percent">100<span style="font-size:0.5em;">%</span><div id="average-rating">Average Rating</div></div>
			    <div class="arc arc_start"></div>
			    <div class="arc arc_end"></div>
			</div>
											
											<p>This is test content.</p>
											<p>This is test content.</p>
										-->
										</div>
									</div>
								</div>
								<div id="col2">
									<div id="vendor-tags-full">
										<div id="vendor-image">
											<?php echo '<a href="'. $vendor_website_url .'">'; ?><img src="images/vendors/<?php if ($branding_url == '-1' || $branding_url == "") { echo 'trainingful-branding-140.gif'; } else echo $branding_url; ?>" class="company-logo"></a>
										</div>
										<div id="vendor-name">
											<strong><?php echo '<a href="'. $vendor_website_url .'">' . $vendor_name . '</a>'; ?></strong>
										</div>
										<ul id="info-tags">
										
											<?php if ($designation != "" && $designation != "-1"): ?>
											<li><span class="icon graduation-cap"></span> <strong>Credits and Designations</strong><br />
											<?php echo $designation ?></li>
											<?php endif ?>
											<li><span class="icon price-tag"></span> <strong>Tags</strong><br />
											<?php
												$count = 0;
												foreach($tags as $tag) {
													if ($count != 0) {
														echo ", ";
													}
													echo "<a href='search?tag=".urlencode($tag)."'>".$tag."</a>";
													$count++;
												}
											?>
											</li>
										</ul>
									</div>
									<ul id="info-sessions">
										<div id="register-session">
											<span class="icon triangle-down"></span><strong>Register & Session Information</strong>
										</div><!--
										<li id="loading-sessions">Loading course sessions... <img src="../../images/polymer-loader.gif" /></li>
										-->
										<section onclick="clickHandler(event)">
											<span data-dialog="modal">modal dialog</span>
										</section>
											<span id="display-sessions">
												<?php if (is_array($sessionList)) { foreach($sessionList as $session): ?>
													<li <?php if($session['session_id'] == $_GET['session']) echo 'class="selected"'; ?>  onClick="showSession(<?php echo $session['session_id'] ?>);">
														<div><span class="icon calendar"></span> <span class="dates"><?php { 
															if ($session['session_type'] == "Online - Self Learning") {
																echo "Online";
															}
															else {
																echo date("M j, Y", strtotime($session['start_date'])); 
																if ($session['start_date'] != $session['end_date']) { 
																	echo " - ".date("M j, Y", strtotime($session['end_date']));
																} 
															}
														} ?></span></div>
													<div class="location"><?php if($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></div><div class="price"><?php 
													if (isset($session['discount_end_date']) && date('Y-m-d') < $session['discount_end_date']) {
																		echo '<span class="discount">'.$session['discount'].'</span>';
																	}
																	else {
																		echo $session['cost'];
																	} ?> <?php echo $session['currency']; ?></div>
													<div class="folded-corner"></div>
												</li>
												<?php endforeach; } ?>
											</span>

									</ul>
								</div>
								</div>
							</div>
						</div>
						<paper-dialog id="modal" modal>
					    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				    		<div class="buttons">
				    			<paper-button dialog-confirm autofocus>Tap me to close</paper-button>
				    		</div>
					    </paper-dialog>
					    <script>
					    function clickHandler(e) {
					      var button = e.target;
					      while (!button.hasAttribute('data-dialog') && button !== document.body) {
					        button = button.parentElement;
					      }
					      if (!button.hasAttribute('data-dialog')) {
					        return;
					      }
					      var id = button.getAttribute('data-dialog');
					      var dialog = document.getElementById(id);
					      if (dialog) {
					        dialog.open();
					      }
					    }
					  </script>
					</div>
				</div>
			</div>
		</div>
		