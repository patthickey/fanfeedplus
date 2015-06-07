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

	$sql = "SELECT * FROM have_list WHERE (user_id='$id' AND card_id=".$card.")";
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0){
    	$query = "INSERT INTO have_list (user_id, card_id, trading) VALUES ('$id', ".$card.", 'No')";
    	if (!($result = @ mysql_query ($query, $connection)))
  	 	showerror();
	}
 }

 foreach ($_POST['want_list'] as $card) {

	$sql = "SELECT * FROM want_list WHERE (user_id='$id' AND card_id=".$card.")";
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);

	if($num_rows == 0){
    	$query = "INSERT INTO want_list (user_id, card_id) VALUES ('$id', ".$card.")";
    	if (!($result = @ mysql_query ($query, $connection)))
  		showerror();
	}
 }
 header('Location:main_page.html');

?>