<?php include 'session_settings.php' ?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include 'header_required.php' ?>
	<title>trainingful</title>
		
	<style>
	#main-section {
		background: #f8f8f8;
		position: relative;
		padding-bottom: 40px;
	}
	
	#query-summary-bar {
		height: 120px;
		background: rgba(0, 0, 0, 0.5);
		padding: 25px 25px 0 25px;
		color: #fff;
		position: absolute;
		top: -180px;
	}
	
	#query-summary-bar h1 {
		margin: 0 0 0.05em;
		color: #fff;
		font-weight: 400;
		font-size: 2.2em;
	}
	
	#query-summary-bar p {
		margin: 0;
		font-weight: 300;
	}
	
	#query-summary-bar a {
		color: #fff;
		text-decoration: underline;
	}
	
	#query-summary-bar a:hover {
		text-decoration: none;
	}
	
	#search-control-bar {
		height: 60px;
		background: #4ca166;
		color: #fff;
		position: absolute;
		top: -60px;
	}
	
	#results-counter {
		display: block;
		margin: 0;
		padding-left: 20px;
		font-weight: 400;
		background: #489961;
		height: 60px;
		line-height: 60px;
		font-size: 1.1em;
	}
	
	#type-switcher {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	
	#type-switcher li {
		float: left;
		margin-left: 35px;
		position: relative;
	}
	
	#type-switcher li:first-child {
		margin-left: 0;
	}
	
	#type-switcher li a {
		line-height: 60px;
		color: #fff;
		font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, Sans Serif;
		font-size: 1.1em;
	}
	
	#type-switcher .tick {
		background: url('images/sprites.png') no-repeat 0 0;
		margin: 0 auto;
		width: 11px;
		height: 6px;
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		display: none;
	}
	
	#type-switcher li.active .tick {
		display: block;
	}
	
	#results-container {
		background: #fff;
	}
	
	#filters-accordion {
		list-style: none;
		width: 100%;
		margin: 0;
		padding: 5px 0 0;
		/*border-right: 1px solid #d7d7d7;*/
	}
	
	#filters-accordion li {
		padding: 10px 5px;
		margin: 0 10px;
		color: #585858;
		font-size: 0.85em;
		border-top: 1px solid #d7d7d7;
	}
	
	#filters-accordion li:first-child {
		border-top: 0;
	}
	
	#filters-accordion > li > a {
		color: #585858;
	}
	
	#filters-accordion > li > a:hover {
		text-decoration: none;
	}
	
	#filters-accordion > li > a > .icon {
		margin-right: 3px;
	}

	.explore-list {
		list-style: none;
	}

	.explore-list a {
		color: #555;
		text-decoration: none;
	}
	
	.explore-list a:hover {
		text-decoration: underline;
	}
	
	#results-list {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	
	#results-list > li {
		overflow: hidden;
		padding: 0px 0 0;
		margin: 20px 30px 30px 0;
	}
	
	#results-list > li:first-child {
		padding: 0;
		border-top: none;
	}
	
	#results-list .result-rating {
		margin-top: 5px;
		float: right;
	}
	
	#results-list h2 {
		margin: 0 0 0.1em;
	}
	
	#results-list p {
		margin: 0.3em 0 0.8em;
		font-size: 0.85em;
		font-weight: 300;
		color: #969696;
	}
	
	#results-list p strong {
		color: #656565;
	}
	
	#results-list .company-logo {
		float: left;
		max-height: 70px;
		max-width: 70px;
	}
	
	.sessions-list {
		list-style: none;
		margin: 0 70px 0 80px;
		padding: 0;
	}
	
	.sessions-list li {
		margin: 0 0 1px 0;
		padding: 0 0 0 15px;
		background: #f2f2f2;
	}
	
	.sessions-list li > a {
		display: block;
		height: 33px;
		overflow: hidden;
	}
	
	.sessions-list li > a:hover {
		text-decoration: none;
	}
	
	.sessions-list h4 {
		color: #515151;
		font-weight: 400;
		margin: 0;
		line-height: 1em;
		font-size: 0.8em;
	}
	
	.sessions-list small {
		font-weight: 300;
	}
	
	.sessions-list .icon.calendar {
		float: left;
		color: #afafaf;
		margin-top: 15px;
	}
	
	.sessions-list .session-dates {
		margin: 3px 0 0 23px;
	}
	
	.sessions-list .session-location {
		color: #969696;
		margin: 0 0 0 23px;
		display: block;
		line-height: 1.5em;
	}
	
	.sessions-list .session-price-container {
		margin: 3px 15px 0 0;
		float: right;
		text-align: right;
		color: #969696;
	}
	
	.sessions-list .session-price-container h4 {
		color: #515151;
		line-height: 0.8em;
		font-size: 0.8em;
	}
	
	.sessions-list .session-price-container small {
		line-height: 1.5em;
	}
	
	.sessions-list .chevron-container {
		float: right;
		text-align: center;
		height: 63px;
		width: 46px;
		background: #f6c66b;
	}
	
	.sessions-list .icon.chevron-right {
		color: #fff;
		font-size: 2em;
		line-height: 34px;
	}

	</style>
	
</head>
<body>

	<header>
		<?php include 'header.view.php' ?>
	</header>
	
	<section id="main-section">
		<div class="container">
		
			<div id="query-summary-bar" class="container">
				<h1>Explore Categories</h1>
			</div>
			
			<div id="search-control-bar" class="container">
				<div class="row">
					<div class="3u">
						<h4 id="results-counter"><!--Filter--> Showing <?php echo $totalCategories; ?> categories:</h4>
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
			
			<div id="results-container">
				<div class="row">
					<div class="3u">
						<ul id="filters-accordion">
							<!--
							<li>
								<a href="#"><span class="icon triangle-down"></span>Name contains</a>
							</li>
							<li>
								<a href="#"><span class="icon triangle-down"></span>Vendor</a>
							</li>
						-->
						</ul>
					</div>
					<div class="9u">
						<ul id="results-list">
							<?php $lastType = ""; if (is_array($parentCategoriesList) and $totalCategories > 0) { foreach($parentCategoriesList as $parentCategories): ?>
								<?php if($parentCategories['total_courses'] > 0): ?>
									<li>
										<?php if($parentCategories['type'] != $lastType) { $lastType = $parentCategories['type']; echo '<div style="margin-bottom:15px;"><h2>'.$parentCategories['type'].'</h2></div>';} ?>
										<div>
											<div id="p<?php echo $parentCategories['category_id']; ?>"><h5><?php echo $parentCategories['category_name']; ?></h5></div>
											<div class="row" style="font-size:0.7em;">
												<?php
												$total_columns = 3;
												$sub_categoryList[0] = array();
												$sub_categoryList[1] = array();
												$sub_categoryList[2] = array();
												// We check to make sure we have an array of $functions (this is to avoid unnecessary warnings)
												if (isset($parentCategories['sub_categories']) && is_array($parentCategories['sub_categories']) && count($parentCategories['sub_categories']) > 0) {
													// Divide the array of $functions into three (one for each column)
													//$sub_categoryList = array_chunk($parentCategories['sub_categories'], count($parentCategories['sub_categories']) % $total_columns == 0 ? count($parentCategories['sub_categories']) / $total_columns : count($parentCategories['sub_categories']) / $total_columns + 1);
													$column_counter = 0;
													foreach ($parentCategories['sub_categories'] as $subs) {
														array_push($sub_categoryList[$column_counter],$subs);
														$column_counter = ($column_counter+1) % $total_columns;
													}
												} else {
													$sub_categoryList = array();
												}				
												?>
												<ul class="4u explore-list">
												<?php if (is_array($sub_categoryList[0])) { foreach($sub_categoryList[0] as $sub): ?>
													<li><a href="search?category=<?php echo $sub['id']; ?>"><?php echo $sub['category_name']; ?> <strong>(<?php echo $sub['course_count']; ?>)</strong></a></li>
												<?php endforeach; }?>
												</ul>
												
												<ul class="4u explore-list">
												<?php if (is_array($sub_categoryList[1])) { foreach($sub_categoryList[1] as $sub): ?>
													<li><a href="search?category=<?php echo $sub['id']; ?>"><?php echo $sub['category_name']; ?> <strong>(<?php echo $sub['course_count']; ?>)</strong></a></li>
												<?php endforeach; }?>
												</ul>
												
												<ul class="4u explore-list">
												<?php if (is_array($sub_categoryList[2])) { foreach($sub_categoryList[2] as $sub): ?>
													<li><a href="search?category=<?php echo $sub['id']; ?>"><?php echo $sub['category_name']; ?> <strong>(<?php echo $sub['course_count']; ?>)</strong></a></li>
												<?php endforeach; }?>
												</ul>
											</div>
										</div>
									</li>
								<?php endif; ?>
							<?php endforeach; } ?>
						</ul>
					</div>
				</div>
			</div>
		
		</div>
		
		
	</section>