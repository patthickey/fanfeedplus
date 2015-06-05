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
$id = $_SESSION["login_user"];
foreach ($_POST['remove_list'] as $card) {
     $query = "DELETE FROM want_list WHERE (user_id='$id' AND card_id=".$card.")";

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
 }
	header('Location:want_list.php');
// Execute SQL statement

// Display results


//echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=have_list.php">');

?>
