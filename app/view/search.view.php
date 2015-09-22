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
			<!-- Hero -->
				<section id="main-section">
					<div id="query-summary-bar">
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
					<div id="search-control-bar">
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
				</section>
		</div>
		<!-- Features 1 -->
			<div class="container">
				<div id="results-container">
					<div class="row">
						<div class="3u" id="left-box">
							<form id="filterbox" action="search" method="get">
								<?php if ($_GET['category'] != '') { echo '<input type="hidden" name="category" value="' . $_GET['category'] . '">'; } ?>
							<ul id="filters-accordion">
								<li>
									<a href="#"><span class="icon triangle-down"></span>Name contains</a>
									<div class="inputbox">
										<input type="text" id="searchbox-keywords" name="keywords" placeholder="" required class="form-text form-name" <?php if ($_GET['keywords']) { echo 'value="'.$_GET['keywords'].'"'; } ?>>
									</div>
								</li>
								<!--
								<li>
									<a href="#"><span class="icon triangle-down"></span>Vendor</a>
								</li>
								-->
								<li>
									<a href="#"><span class="icon triangle-down"></span>Date</a>
									<div class="inputbox">
										<input type="text" id="searchbox-start" name="start" class="form-text form-date" <?php if ($_GET['start']) { echo 'value='.$_GET['start']; } ?>> to
										<script type="text/javascript">
							               $(document).ready(function() {
						    	              $('#searchbox-start').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
						            	      });
							               });
					    	           	</script>
										<input type="text" id="searchbox-end" name="end" class="form-text form-date" <?php if ($_GET['end']) { echo 'value='.$_GET['end']; } ?>>
										<script type="text/javascript">
							               $(document).ready(function() {
						    	              $('#searchbox-end').daterangepicker({ singleDatePicker: true, format: 'YYYY-MM-DD' }, function(start, end, label) {
						            	      });
							               });
					    	           	</script>
									</div>
								</li>
								<li>
									<a href="#"><span class="icon triangle-down"></span>Price</a>
								</li>
									<div class="pricebox">
									 	<span class="pricedollarbox">$<input type="text" id="min-price" name="min" class="form-text form-price" <?php if ($_GET['min'] == '') { echo 'value="0"'; } else echo 'value="' . $_GET['min'] . '"'; ?>></span> to 
										<span class="pricedollarbox">$<input type="text" id="max-price" name="max" class="form-text form-price" <?php if ($_GET['max'] == '-1') { echo 'value=""'; } else echo 'value="' . $_GET['max'] . '"';?>></span>
									</div>
								<li>
									<a href="#"><span class="icon triangle-down"></span>Location</a>
									<div class="inputbox">
										<select id="searchbox-location" name="location" placeholder="Location">
											<option value="Everywhere" <?php if ($_GET['location'] == "Everywhere") echo 'selected'; ?>>Everywhere</option>
											<?php foreach ($locationList as $metro): ?>
												<option value="<?php echo $metro['metro_name']; ?>" <?php if ($_GET['location'] == $metro['metro_name']) echo 'selected'; ?>><?php echo $metro['country_name'] . " - " . $metro['metro_name']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="row 0% uniform" id="online-span";>
										<input id="checkbox" type="checkbox" name="include_online" <?php if ($_GET['include_online'] == on) echo "checked"; ?> <span id="online-span">Include online courses</span>
									</div>
								</li>
							</ul>
							<button type="submit" class="form-submit smaller-button">Filter Results</button>
							</form>
						</div>
						<div class="9u 12u(mobile)">
							<ul id="results-list">
									<?php if (is_array($courseList) and $totalResults > 0) { for($i = ($page - 1) * $shown; $i < $upto; ++$i): ?>
								<li><!--
									<div class="result-rating">
										<span class="rating s4" title="4 stars"></span>
									</div>
								-->
									<h2>
										<?php if ($start !=""): ?>
										<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>"><?php echo $courseList[$i]['course_name']; ?></a>
										<?php else: ?>
										<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>"><?php echo $courseList[$i]['course_name']; ?></a>
										<?php endif; ?>
									</h2>

									<p><strong><?php echo $courseList[$i]['vendor_name']; ?>:</strong> 
									<?php 
									$max_offset = 190;
									if (strlen($courseList[$i]['course_description']) < $max_offset) {
										echo $courseList[$i]['course_description'];
									}
									else {
										$pos=mb_strpos($courseList[$i]['course_description'], ' ', $max_offset); 
										echo mb_substr($courseList[$i]['course_description'],0,$pos) . '...';
									}
									?></p>
									<img src="images/vendors/<?php if ($courseList[$i]['branding_url'] == '-1' || $courseList[$i]['branding_url'] == "") { echo 'trainingful-branding-70.gif'; } else echo $courseList[$i]['branding_url']; ?>" alt="<?php echo $courseList[$i]['vendor_name']; ?>" class="company-logo">
									<ul class="sessions-list">
										<?php foreach($courseList[$i]['sessionList'] as $session): ?>
										<li>
											<?php if ($start !=""): ?>
											<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&keywords=<?php echo $keywords; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&location=<?php echo $location; ?>&session=<?php echo $session['session_id']; ?>">
											<?php else: ?>
											<a href="course?id=<?php echo $courseList[$i]['course_id']; ?>&session=<?php echo $session['session_id']; ?>">
											<?php endif; ?>
												<div class="chevron-container">
													<span class="icon chevron-right"></span>
												</div>
												<span class="icon calendar"></span>
												<div class="session-price-container">
													<h4><?php 
														if (isset($session['discount_end_date']) && date('Y-m-d') < $session['discount_end_date']) {
															echo '<span class="discount">'.$session['discount'].'</span>';
														}
														else {
															echo $session['cost'];
														}
														?></h4>
													<small><?php echo $session['currency']; ?></small>
												</div>
												<h4 class="session-dates"><?php { 
												if ($session['session_type'] == "Online - Self Learning") {
													echo "Online";
												}
												else {
													echo date("M j, Y", strtotime($session['start_date'])); 
													if ($session['start_date'] != $session['end_date']) { 
														echo " - ".date("M j, Y", strtotime($session['end_date']));
													} 
												}
											} ?></h4>
												<small class="session-location"><?php if ($session['metro_name'] != "-1") { echo $session['metro_name']; } else echo "Inquire"; ?></small>
											</a>
										</li>
										<?php endforeach; ?>
									</ul>
									<ul class="tags-list">
										<li>Tags: <?php $tag_count = 0; foreach($courseList[$i]['tags'] as $tag): ?><?php if($tag_count>0) { echo ", ";} else { $tag_count++; } ?><a href="search?tag=<?php echo urlencode($tag); ?>"><?php echo $tag;?></a><?php endforeach ?>
										</li>
									</ul>
								</li>
								<?php endfor; } else echo "<li class='no-results'>Sorry, no results available. Please try another search.</li>";?>
							</ul>
							<div class="row">
								<div class="6u">&nbsp;
									<?php 
										if ($page > 1) { 
											if ($_GET['category'] != "") {
												echo '<a href="search?category=' . $_GET['category'] . '&page=' . ($page-1) . '">< Previous Page</a>';
											}
											else if ($_GET['tag'] != "") {
												echo '<a href="search?tag=' . $_GET['tag'] . '&page=' . ($page-1) . '">< Previous Page</a>';
											}
											else echo '<a href="search?keywords=' . $keywords . '&start=' . $start . '&end=' . $end . '&location=' . $location . '&page=' . ($page-1) . '">< Previous Page</a>'; 
										} ?>
								</div>
								<div class="6u" id="next-page">
									<?php
										if ($totalResults > $upto) { 
											if ($_GET['category'] != "") {
												echo '<a href="search?category=' . $_GET['category'] . '&page=' . ($page+1) . '">Next Page > </a>';
											}
											else if ($_GET['tag'] != "") {
												echo '<a href="search?tag=' . $_GET['tag'] . '&page=' . ($page+1) . '">Next Page > </a>';
											}
											else echo '<a href="search?keywords=' . $keywords . '&start=' . $start . '&end=' . $end . '&location=' . $location . '&page=' . ($page+1) . '">Next Page > </a>'; 
										} ?>
									&nbsp;
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>