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
$query = mysql_query("SELECT * FROM users WHERE email = '$email'");
$row = mysql_fetch_array($query);
$hash = $row["password"];  


if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>
</body>
</html>