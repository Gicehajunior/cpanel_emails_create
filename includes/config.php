<?php
// error reporting for any function deprecation
error_reporting(E_ALL ^ E_DEPRECATED);

$database_host = "127.0.0.1";
$database_port = "8000";
$database_name = "email_registered_users";
$database_username = "root";
$database_password = "";

$connection =  mysqli_connect($database_host, $database_username, $database_password, $database_name) or die("Connection failed. Kindly Check your Internet Connection or Contact Customer Care.");
mysqli_select_db($connection, $database_name) or die("Query Connection failed. Kindly Check your Internet Connection or Contact Customer Care.");



