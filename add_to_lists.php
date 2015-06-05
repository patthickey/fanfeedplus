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
foreach ($_POST['have_list'] as $card) {
     $query = "INSERT INTO have_list (user_id, card_id) VALUES ('$id', ".$card.")";

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
 }

 foreach ($_POST['want_list'] as $card) {
     $query = "INSERT INTO want_list (user_id, card_id) VALUES ('$id', ".$card.")";

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
 }
 header('Location:index.html');

// Execute SQL statement

// Display results


//echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">');

?>