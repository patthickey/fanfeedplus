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

foreach ($_POST['trading_list'] as $card) {

	$sql = "SELECT trading FROM have_list WHERE (user_id='$id' AND card_id=".$card.")";
	$result = mysql_query($sql);
	$value = mysql_fetch_assoc($result);
	
	if($value["trading"] == "Yes") {
    	$query = "UPDATE have_list SET trading='No' WHERE (user_id='$id' AND card_id=".$card.")";
	} else {
    	$query = "UPDATE have_list SET trading='Yes' WHERE (user_id='$id' AND card_id=".$card.")";
	}

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
}

foreach ($_POST['remove_list'] as $card) {
     $query = "DELETE FROM have_list WHERE (user_id='$id' AND card_id=".$card.")";

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
}

	header('Location:have_list.php');

?>
