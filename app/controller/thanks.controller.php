<?php

$email = $_REQUEST['email'];

$add_sql = "INSERT INTO signups (email) VALUES (?)";
$result = $GLOBALS['_db']->prepare($add_sql);
$result->execute(array(mysql_escape_string($email)));


$templateFields = array();


displayTemplate('thanks', $templateFields);