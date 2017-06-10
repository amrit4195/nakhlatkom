<?php
require_once 'dbconnect/db.php';						
$sql = "INSERT into test(testID, Name) VALUES ('1', 'Amritpal Singh' )";
echo($sql);
mysql_query($sql);
echo("Entry inserted");
?>