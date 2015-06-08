<?php session_start(); 
include 'db.inc';
// Connect to MySQL DBMS
if (!($connection = @ mysql_connect($hostName, $username,
  $password)))
  showerror();
// Use the cars database
if (!mysql_select_db($databaseName, $connection))
  showerror();
 

// Create SQL statement
$value = $_SESSION["login_user"];
$message = $_POST['message'];

$query = "UPDATE users SET message='$message' WHERE id='$value'";
// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();

echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=main_page.html">');
?>
