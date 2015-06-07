<?php
session_start();
include 'db.inc';
// Connect to MySQL DBMS
if (!($connection = @ mysql_connect($hostName, $username,
  $password)))
  showerror();
// Use the cars database
if (!mysql_select_db($databaseName, $connection))
  showerror();
 
// Create SQL statement
$email_up = $_POST['email_up'];
$password1 = $_POST['password1'];
$hash = password_hash($password1, PASSWORD_DEFAULT);
$app_screen_name = $_POST['app_screen_name'];
$date = date('Y-m-d');

	$sql = "SELECT * FROM users WHERE email='$email_up'";
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0){
    	$query = "INSERT INTO users (email, password, app_screen_name, join_date) VALUES ('$email_up', '$hash', '$app_screen_name', '$date')";
    	if (!($result = @ mysql_query ($query, $connection)))
  	 	showerror();
	} else {
		echo '<script>';
		echo 'alert("Email is already registered");';
		echo 'location.href="index.html"';
		echo '</script>';
	}
	header('Location:index.html');
//echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">');

?>
