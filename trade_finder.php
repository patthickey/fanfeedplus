<?php session_start(); ?>
<html><head><title>trading cards</title></head>
<body>
<table border=1>
<tr><th>PARALLEL</th><th>FACTION</th><th>IN SET</th><th>CARD NAME</th><th>COLOR</th><th># IN SET</th><th>RARITY</th><th>SOLD OUT</th><th>SERIES</th><th>OWNER</th></tr>
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
$id = $_SESSION["login_user"];

//$query_user_have = "SELECT * FROM have_list WHERE user_id='$id'";
//if (!($result = @ mysql_query ($query_user_have, $connection)))
//	showerror();

$query_user_want = "SELECT * FROM want_list WHERE user_id='$id'";
if (!($result_one = @ mysql_query ($query_user_want, $connection)))
	showerror();

echo "$id";
while ($row = @ mysql_fetch_array($result_one)) {
	$query_other_have = "SELECT parallel, faction, in_set, card_name, color, number_in_set, rarity, sold_out, series, app_screen_name FROM have_list a, users b, cards c WHERE a.user_id!='$id' AND a.card_id=$card AND a.user_id=b.id AND c.id=$card";
     if (!($result_two = @ mysql_query ($query_other_have, $connection)))
  	 showerror();
}

//$query_other_have = "SELECT * FROM have_list WHERE a.user_id!='$id'";
// $query_other_want = "SELECT * FROM want_list WHERE a.user_id!='$id'";

while ($row = @ mysql_fetch_array($result_two)) {
echo "<tr>
<td>{$row["parallel"]}</td>
<td>{$row["faction"]}</td>
<td>{$row["in_set"]}</td>
<td>{$row["card_name"]}</td>
<td>{$row["color"]}</td>
<td>{$row["number_in_set"]}</td>
<td>{$row["rarity"]}</td>
<td>{$row["sold_out"]}</td>
<td>{$row["series"]}</td>
<td>{$row["app_screen_name"]}</td>
</tr>";
}
?>
</table></body>
</html>

