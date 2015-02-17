<?php

	$type = $_REQUEST['type'];
	$page = $_REQUEST['page'];
	$limit = $_REQUEST['rows'];
	$sidx = $_REQUEST['sidx'];
	$sord = $_REQUEST['sord'];
	if (!$sidx) $sidx = "2,3";
	if (!$sord) $sord = "asc";
	if (!$limit) $limit = "50";
	if (!$page) $page = "1";
	$start = $limit * $page - $limit;
	
	if ($type == "category") {
	
		$sql = "SELECT count(*) FROM categories WHERE parent_category_id != -1"; 
		$result = $GLOBALS['_db']->prepare($sql); 
		$result->execute(); 
		$count = $result->fetchColumn();
		
		$search_sql = "
			SELECT c1.category_id, c0.category_name as parent_name, c1.category_name, c1.description
			FROM categories AS c1
			JOIN categories AS c0 ON c0.category_id = c1.parent_category_id
			ORDER BY " . $sidx . " " . $sord . " LIMIT " . $start . " , " . $limit . "";
		
		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute();
			
		$response->page = $page;
		$response->total = (string) ceil($count/$limit);
		$response->records = (string) $count;
		
		$row_count = 0;
		foreach ($get_results as $temp) {
			$category_id = $temp['category_id'];
			$parent_name = $temp['parent_name'];
			$category_name = $temp['category_name'];
			$description = $temp['description'];
			
			$response->rows[$row_count]['id']=$category_id;
			$response->rows[$row_count]['cell']=array($category_id,$parent_name,$category_name,$description);
			$row_count++;
		}
		
		echo json_encode($response);
	}

	elseif ($type == "category_save") {
		$table_name = "categories";
		$secondary_category_id = "";
		$secondary_category_name = "";
		$description = "";
		$operation = "";
		$primary_category_id = "";
		$file_text = "";
		foreach ($_POST as $key=>$value){
			if ($key == "category_name") {
				$category_name = $value;
			}
			elseif ($key == "id") {
				$category_id = $value;
			}
			elseif ($key == "description") {
				$description = $value;
			}
			elseif ($key == "oper") {
				$operation = $value;
			}
			elseif ($key == "parent_category_id") {
				$parent_category_id = $value;
			}
			$file_text = $file_text . $key . ": " . $value . " // ";
		}
		if ($operation == "edit") {
			$update_sql = "UPDATE " . $table_name . " SET parent_category_id = ?, category_name = ?, description = ? WHERE category_id = ?";
			$result = $GLOBALS['_db']->prepare($update_sql); 
			$result->execute(array($parent_category_id, mysql_escape_string($category_name), mysql_escape_string($description), $category_id));
		}
		else if ($operation == "add") {
			$add_sql = "INSERT INTO " . $table_name . " (parent_category_id, category_name, description) 
				VALUES (?, ?, ?)";
			$result = $GLOBALS['_db']->prepare($add_sql);
			$result->execute(array($parent_category_id, mysql_escape_string($category_name), mysql_escape_string($description)));
		}
		else if ($operation == "del") {
			$delete_sql = "DELETE FROM " . $table_name . " WHERE category_id = ?"; 
			$result = $GLOBALS['_db']->prepare($delete_sql);
			$result->execute(array($category_id));
		}
		//$myFile = "testFile.txt";
		//$fh = fopen($myFile, 'w') or die("can't open file");
		//fwrite($fh, $file_text);
		//fclose($fh);
	}

	elseif ($type == "courses") {
	
		$sql = "SELECT count(*) FROM course"; 
		$result = $GLOBALS['_db']->prepare($sql); 
		$result->execute(); 
		$count = $result->fetchColumn();
		
		$search_sql = "
			SELECT course_id, vendor_id, category_id, course_name, course_url, registration_url, active, course_description
			FROM course
			ORDER BY " . $sidx . " " . $sord . " LIMIT " . $start . " , " . $limit . "";
		
		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute();
			
		$response->page = $page;
		$response->total = (string) ceil($count/$limit);
		$response->records = (string) $count;
		
		$row_count = 0;
		foreach ($get_results as $temp) {
			$course_id = $temp['course_id'];
			$vendor_id = $temp['vendor_id'];
			$category_id = $temp['category_id'];
			$course_name = $temp['course_name'];
			$course_url = $temp['course_url'];
			$registration_url = $temp['registration_url'];
			$active = $temp['active'];
			$course_description = $temp['course_description'];
			
			$response->rows[$row_count]['id']=$course_id;
			$response->rows[$row_count]['cell']=array($course_id,$vendor_id,$category_id,$course_name,$course_url,$active,$course_description);
			$row_count++;
		}
		
		echo json_encode($response);
	}

	elseif ($type == "courses_save") {
		$table_name = "course";
		$file_text = "";
		foreach ($_POST as $key=>$value){
			if ($key == "id") {
				$course_id = $value;
			}
			elseif ($key == "vendor_id") {
				$vendor_id = $value;
			}
			elseif ($key == "category_id") {
				$category_id = $value;
			}
			elseif ($key == "course_name") {
				$course_name = $value;
			}
			elseif ($key == "course_url") {
				$course_url = $value;
			}
			elseif ($key == "active") {
				$active = $value;
			}
			elseif ($key == "course_description") {
				$course_description = $value;
			}
			elseif ($key == "oper") {
				$operation = $value;
			}
			$file_text = $file_text . $key . ": " . $value . " // ";
		}
		if ($operation == "edit") {
			$update_sql = "UPDATE " . $table_name . " SET vendor_id = ?, category_id = ?, course_name = ?, course_url = ?, active = ?, course_description = ? WHERE course_id = ?";
			$result = $GLOBALS['_db']->prepare($update_sql); 
			$result->execute(array($vendor_id, $category_id, mysql_escape_string($course_name), mysql_escape_string($course_url), $active, $course_description, $course_id));
		}
		else if ($operation == "add") {
			$add_sql = "INSERT INTO " . $table_name . " (vendor_id, category_id, course_name, course_url, active, course_description) 
				VALUES (?, ?, ?, ?, ?, ?)";
			$result = $GLOBALS['_db']->prepare($add_sql);
			$result->execute(array($vendor_id, $category_id, mysql_escape_string($course_name), mysql_escape_string($course_url), 1, $course_description));
		}
		else if ($operation == "del") {
			$delete_sql = "DELETE FROM " . $table_name . " WHERE course_id = ?"; 
			$result = $GLOBALS['_db']->prepare($delete_sql);
			$result->execute(array($course_id));
		}
		//$myFile = "testFile.txt";
		//$fh = fopen($myFile, 'w') or die("can't open file");
		//fwrite($fh, $file_text);
		//fclose($fh);
	}

	elseif ($type == "vendor") {
	
		$sql = "SELECT count(*) FROM vendor"; 
		$result = $GLOBALS['_db']->prepare($sql); 
		$result->execute(); 
		$count = $result->fetchColumn();
		
		$search_sql = "
			SELECT vendor_id, vendor_name, contact_email, description, website_url, branding_url
			FROM vendor
			ORDER BY " . $sidx . " " . $sord . " LIMIT " . $start . " , " . $limit . "";
		
		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute();
			
		$response->page = $page;
		$response->total = (string) ceil($count/$limit);
		$response->records = (string) $count;
		
		$row_count = 0;
		foreach ($get_results as $temp) {
			$vendor_id = $temp['vendor_id'];
			$vendor_name = $temp['vendor_name'];
			$contact_email = $temp['contact_email'];
			$description = $temp['description'];
			$website_url = $temp['website_url'];
			$branding_url = $temp['branding_url'];
			
			$response->rows[$row_count]['id']=$vendor_id;
			$response->rows[$row_count]['cell']=array($vendor_id,$vendor_name,$contact_email,$description,$website_url,$branding_url);
			$row_count++;
		}
		
		echo json_encode($response);
	}

	elseif ($type == "vendor_save") {
		$table_name = "vendor";
		$file_text = "";
		foreach ($_POST as $key=>$value){
			if ($key == "id") {
				$vendor_id = $value;
			}
			elseif ($key == "contact_email") {
				$contact_email = $value;
			}
			elseif ($key == "vendor_name") {
				$vendor_name = $value;
			}
			elseif ($key == "website_url") {
				$website_url = $value;
			}
			elseif ($key == "branding_url") {
				$branding_url = $value;
			}
			elseif ($key == "description") {
				$description = $value;
			}
			elseif ($key == "oper") {
				$operation = $value;
			}
			$file_text = $file_text . $key . ": " . $value . " // ";
		}
		if ($operation == "edit") {
			$update_sql = "UPDATE " . $table_name . " SET vendor_name = ?, contact_email = ?, website_url = ?, branding_url = ?, description = ? WHERE vendor_id = ?";
			$result = $GLOBALS['_db']->prepare($update_sql); 
			$result->execute(array($vendor_name, $contact_email, $website_url, $branding_url, $description, $vendor_id));
		}
		else if ($operation == "add") {
			$add_sql = "INSERT INTO " . $table_name . " (vendor_name, contact_email, website_url, branding_url, description) 
				VALUES (?, ?, ?, ?, ?)";
			$result = $GLOBALS['_db']->prepare($add_sql);
			$result->execute(array($vendor_name, $contact_email, $website_url, $branding_url, $description));
		}
		else if ($operation == "del") {
			$delete_sql = "DELETE FROM " . $table_name . " WHERE vendor_id = ?"; 
			$result = $GLOBALS['_db']->prepare($delete_sql);
			$result->execute(array($vendor_id));
		}
		//$myFile = "testFile.txt";
		//$fh = fopen($myFile, 'w') or die("can't open file");
		//fwrite($fh, $file_text);
		//fclose($fh);
	}

	elseif ($type == "session") {
	
		$sql = "SELECT count(*) FROM course_session"; 
		$result = $GLOBALS['_db']->prepare($sql); 
		$result->execute(); 
		$count = $result->fetchColumn();
		
		$search_sql = "
			SELECT session_id, course_id, metro_name, location, start_date, start_date_time, end_date, end_date_time, session_type, description, cost, currency, registration_url, session_remark, active
			FROM course_session
			ORDER BY " . $sidx . " " . $sord . " LIMIT " . $start . " , " . $limit . "";
		
		$get_results = $GLOBALS['_db']->prepare($search_sql);
		$get_results->execute();
			
		$response->page = $page;
		$response->total = (string) ceil($count/$limit);
		$response->records = (string) $count;
		
		$row_count = 0;
		foreach ($get_results as $temp) {
			$session_id = $temp['session_id'];
			$course_id = $temp['course_id'];
			$metro_name = $temp['metro_name'];
			$location = $temp['location'];
			$start_date = $temp['start_date'];
			$start_date_time = $temp['start_date_time'];
			$end_date = $temp['end_date'];
			$end_date_time = $temp['end_date_time'];
			$session_type = $temp['session_type'];
			$cost = $temp['cost'];
			$description = $temp['description'];
			$currency = $temp['currency'];
			$registration_url = $temp['registration_url'];
			$active = $temp['active'];
			$session_remark = $temp['session_remark'];
			
			$response->rows[$row_count]['id']=$session_id;
			$response->rows[$row_count]['cell']=array($session_id,$course_id,$metro_name,$location,$start_date,$start_date_time,$end_date,$end_date_time,$session_type,$description,$cost,$currency,$registration_url,$session_remark,$active);
			$row_count++;
		}
		
		echo json_encode($response);
	}

	elseif ($type == "session_save") {
		$table_name = "course_session";
		$file_text = "";
		foreach ($_POST as $key=>$value){
			
			switch ($key) {
				case "id":
					$session_id = $value;
					break;
				case "course_id":
					$course_id = $value;
					break;
				case "metro_name":
					$metro_name = $value;
					break;
				case "location":
					$location = $value;
					break;
				case "start_date":
					$start_date = $value;
					break;
				case "start_date_time":
					$start_date_time = $value;
					break;
				case "end_date":
					$end_date = $value;
					break;
				case "end_date_time":
					$end_date_time = $value;
					break;
				case "session_type":
					$session_type = $value;
					break;
				case "description":
					$description = $value;
					break;
				case "cost":
					$cost = $value;
					break;
				case "currency":
					$currency = $value;
					break;
				case "registration_url":
					$registration_url = $value;
					break;
				case "session_remark":
					$session_remark = $value;
					break;
				case "active":
					$active = $value;
					break;
				case "oper":
					$operation = $value;
					break;
			}
			$file_text = $file_text . $key . ": " . $value . " // ";
		}
		if ($operation == "edit") {
			$update_sql = "UPDATE " . $table_name . " SET course_id = ?, metro_name = ?, location = ?, start_date = ?, start_date_time = ?, end_date = ?, end_date_time = ?, session_type = ?, description = ?, cost = ?, currency = ?, registration_url = ?, session_remark = ?, active = ? WHERE session_id = ?";
			$result = $GLOBALS['_db']->prepare($update_sql); 
			$result->execute(array($course_id,$metro_name,$location,$start_date,$start_date_time,$end_date,$end_date_time,$session_type,$description,$cost,$currency,$registration_url,$session_remark,$active,$session_id));
		}
		else if ($operation == "add") {
			$add_sql = "INSERT INTO " . $table_name . " (course_id, metro_name, location, start_date, start_date_time, end_date, end_date_time, session_type, description, cost, currency, registration_url, session_remark, active) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			//$add_sql = "INSERT INTO " . $table_name . " (course_id, metro_name, location, start_date, start_date_time, end_date, end_date_time, session_type, description, cost, currency, registration_url, session_remark, active) 
			//	VALUES (" . $course_id . "," . $metro_name . "," . $location . "," . $start_date . "," . $start_date_time . "," . $end_date . "," . $end_date_time . "," . $session_type . "," . $description . "," . $cost . "," . $currency . "," . $registration_url . "," . $session_remark . ",1)";
			$file_text = $file_text . $add_sql . " // ";
			$myFile = "testFile.txt";
			$fh = fopen($myFile, 'w') or die("can't open file");
			fwrite($fh, $file_text);
			fclose($fh);
			$result = $GLOBALS['_db']->prepare($add_sql);
			$result->execute(array($course_id,$metro_name,$location,$start_date,$start_date_time,$end_date,$end_date_time,$session_type,$description,$cost,$currency,$registration_url,$session_remark,1));
		}
		else if ($operation == "del") {
			$delete_sql = "DELETE FROM " . $table_name . " WHERE session_id = ?"; 
			$result = $GLOBALS['_db']->prepare($delete_sql);
			$result->execute(array($session_id));
		}
		$myFile = "testFile.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $file_text);
		fclose($fh);
	}

?>