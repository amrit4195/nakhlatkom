<?php
	error_reporting(E_ERROR);
	$username = "amrit4195";	
	$password = "amrit4195";
	$database = "sydneynakhlatkom";
	$host = "sydneynakhlatkom.ccx7gtfezsye.ap-southeast-2.rds.amazonaws.com";
	$port = "3306";
		
	$connection=mysql_connect ($host, $username, $password);
	if (!$connection) { die('Error1: ' . mysql_error()); }
	
	$db_selected = mysql_select_db($database, $connection);
	if (!$db_selected) { die ('Error2: ' . mysql_error()); }	
	
	function hasRows($res) { return (mysql_num_rows($res) != 0); }
?>