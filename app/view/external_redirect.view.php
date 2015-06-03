<?php

session_start();

$url = $_GET['url'];
$session_id = $_GET['session_id'];

$insert_sql = 'INSERT INTO redirect_record (session_id, redirect_url, timestamp, ip_address) 
	VALUES (?,?,now(),?)';

$get_results = $GLOBALS['_db']->prepare($insert_sql);
$get_results->execute(array($session_id, $url, $_SERVER['REMOTE_ADDR']));

header('Location: '.$url);

die();
exit;
?>