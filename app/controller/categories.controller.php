<?php
include 'session_settings.php';
$parentCategoriesList = array();
$subCategoriesList = array();

$search_sql = "
	SELECT categories.category_id, categories.category_name, categories.type
	FROM categories
	WHERE parent_category_id = '-1'
	ORDER BY type, category_name asc";
		
$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute();

foreach ($get_results as $temp) {
	$category_id = $temp['category_id'];
	$category_name = $temp['category_name'];
	$type = $temp['type'];
	$parentCategoriesList[$category_id]['category_id'] = $category_id;
	$parentCategoriesList[$category_id]['category_name'] = $category_name;
	$parentCategoriesList[$category_id]['type'] = $type;
	$parentCategoriesList[$category_id]['total_courses'] = 0;
}

$totalCategories = 0;
$search_sql = "
	SELECT categories.category_id, categories.category_name, categories.parent_category_id, COUNT(course.course_id) AS course_count 
	FROM categories
	LEFT JOIN course
	ON categories.category_id=course.category_id
	WHERE parent_category_id != '-1' and active_sessions > 0
	GROUP BY category_id
	ORDER BY type, parent_category_id, category_name asc";
		
$get_results = $GLOBALS['_db']->prepare($search_sql);
$get_results->execute();

foreach ($get_results as $temp) {
	$category_id = $temp['category_id'];
	$category_name = $temp['category_name'];
	$course_count = $temp['course_count'];
	$parent_category_id = $temp['parent_category_id'];

	$parentCategoriesList[$parent_category_id]['sub_categories'][$category_id]['id'] = $category_id;
	$parentCategoriesList[$parent_category_id]['sub_categories'][$category_id]['category_name'] = $category_name;
	$parentCategoriesList[$parent_category_id]['sub_categories'][$category_id]['course_count'] = $course_count;
	$parentCategoriesList[$parent_category_id]['total_courses'] = $parentCategoriesList[$parent_category_id]['total_courses'] + $course_count;
	$totalCategories++;
}

$templateFields = array('parentCategoriesList' => $parentCategoriesList, 'totalCategories' => $totalCategories);

displayTemplate('categories', $templateFields);
displayTemplate('footer');