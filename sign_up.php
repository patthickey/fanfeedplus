<html><head><title>sign up</title></head>
<body>
<?php
include 'db.inc';
// Connect to MySQL DBMS
if (!($connection = @ mysql_connect($hostName, $username,
  $password)))
  showerror();
// Use the cars database
if (!mysql_select_db($databaseName, $connection))
  showerror();
 
// Create SQL statement
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$app_screen_name = $_POST['app_screen_name'];
$date = date('Y-m-d');

$query = "INSERT INTO users (email, password, app_screen_name, join_date) VALUES ('$email', '$hash', '$app_screen_name', '$date')";

// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results


echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">');

?>
</body>
</html>