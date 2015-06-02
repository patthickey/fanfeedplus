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
$email_in = $_POST['email_in'];
$password3 = $_POST['password3'];
$query = mysql_query("SELECT * FROM users WHERE email = '$email_in'");
$row = mysql_fetch_array($query);
$hash = $row["password"];  


if (password_verify($password3, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>
</body>
</html>