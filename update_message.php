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
$e_message = mysql_escape_string($message );
$date = date('Y-m-d H:i:s');

$test = "SELECT * FROM messages WHERE user_id='$value'";
	$test_result = mysql_query($test);
	$num_rows = mysql_num_rows($test_result);

	if($num_rows == 0){
		$query = "INSERT INTO messages (user_id, message, post_date) VALUES ('$value', '$e_message', '$date')";
	} else {
		$query = "UPDATE messages SET message='$e_message', post_date='$date' WHERE user_id='$value'";
	}

// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();

echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=display_messages.php">');
?>
