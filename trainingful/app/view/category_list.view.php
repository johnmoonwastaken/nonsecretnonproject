<?php

	$type = $_REQUEST['type'];
	$page = $_REQUEST['page'];
	$limit = $_REQUEST['rows'];
	$sidx = $_REQUEST['sidx'];
	$sord = $_REQUEST['sord'];
	if (!$sidx) $sidx = "1";
	if (!$sord) $sord = "asc";
	if (!$limit) $limit = "50";
	if (!$page) $page = "1";
	$start = $limit * $page - $limit;
	
	if ($type == "category") {
	
		$sql = "SELECT count(*) FROM categories_secondary"; 
		$result = $GLOBALS['_db']->prepare($sql); 
		$result->execute(); 
		$count = $result->fetchColumn();		
		$search_sql = "
			SELECT categories_secondary.secondary_category_id, categories_primary.category_name,
			categories_secondary.secondary_category_name, categories_secondary.description
			FROM categories_secondary
			JOIN categories_primary
				ON categories_secondary.primary_category_id = categories_primary.primary_category_id
			ORDER BY " . $sidx . " " . $sord . " LIMIT " . $start . " , " . $limit . "";
	}

	if ($type == "category_save") {
		$table_name = "categories_secondary";
		$secondary_category_id = "";
		$secondary_category_name = "";
		$description = "";
		$operation = "";
		foreach ($_POST as $key=>$value){
			if ($key == "secondary_category_name") {
				$secondary_category_name = $value;
			}
			elseif ($key == "id") {
				$secondary_category_id = $value;
			}
			elseif ($key == "description") {
				$description = $value;
			}
			elseif ($key == "oper") {
				$operation = $value;
			}
		}
		if ($operation == "edit") {
			$update_sql = "UPDATE " . $table_name . " SET secondary_category_name = ?, description = ? WHERE secondary_category_id = ?";
			$result = $GLOBALS['_db']->prepare($update_sql); 
			$result->execute(array(mysql_escape_string($secondary_category_name), mysql_escape_string($description), $secondary_category_id));
		}
		$myFile = "testFile.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $update_sql);
		fclose($fh);
	}

	$get_results = $GLOBALS['_db']->prepare($search_sql);
	$get_results->execute();
		
	//$count = $get_results->rowCount();
	
	$response->page = $page;
	$response->total = (string) ceil($count/$limit);
	$response->records = (string) $count;
	
	$row_count = 0;
	foreach ($get_results as $temp) {
		$category_id = $temp['secondary_category_id'];
		$primary_name = $temp['category_name'];
		$secondary_name = $temp['secondary_category_name'];
		$description = $temp['description'];
		
		$response->rows[$row_count]['id']=$category_id;
		$response->rows[$row_count]['cell']=array($category_id,$primary_name,$secondary_name,$description);
		$row_count++;
	}
	
	echo json_encode($response);

?>