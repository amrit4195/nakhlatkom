<?php
	error_reporting(E_ERROR);
	$username = "amrit4195";	
	$password = "amrit4195";
	$database = "nakhlatkomdb";
	$host = "nakhlatkomdb.cprfc4zdvxkh.us-east-2.rds.amazonaws.com";
	$port = "3306";
		
	$connection=mysql_connect ($host, $username, $password);
	if (!$connection) { die('Error: ' . mysql_error()); }
	
	$db_selected = mysql_select_db($database, $connection);
	if (!$db_selected) { die ('Error: ' . mysql_error()); }	
	
	function hasRows($res) { return (mysql_num_rows($res) != 0); }
?>