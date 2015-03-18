<?php
session_start();
$_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
?>