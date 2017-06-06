<?php
  /* Set oracle user login and password info */
  $dbuser = "miaoj";  /* your deakin login */
  $dbpass = "mj1234";  /* your deakin password */
  $dbname = "SSID"; 
  $connection = oci_connect($dbuser, $dbpass, $dbname); 

  if (!$connection)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }

?>