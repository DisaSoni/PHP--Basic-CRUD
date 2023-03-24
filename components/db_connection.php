<?php 
 ini_set('display_errors', 1);
 $server_name = "sql209.epizy.com";
 $username = "epiz_33366195";
 $password = "ZJNx4zFRhOP";
 $dbname = "epiz_33366195_Assignment1";

 $conn = mysqli_connect($server_name, $username, $password, $dbname);

 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
