<html><head><title>want cards</title></head>
<body>
<table border=1>
<tr><th>PARALLEL</th><th>FACTION</th><th>IN SET</th><th>CARD NAME</th><th>COLOR</th><th># IN SET</th><th>RARITY</th><th>SOLD OUT</th><th>SERIES</th><th>REMOVE</th></tr>
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
$value = $_SESSION["login_user"];

$query = "SELECT id, parallel, faction, in_set, card_name, color, number_in_set, rarity, sold_out, series FROM want_list a, cards b WHERE a.user_id='$value' AND b.id=a.card_id";
// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results
echo'<form action="remove_from_want.php" method="post">';
while ($row = @ mysql_fetch_array($result)) {
echo"<tr>";
echo"
<td>{$row["parallel"]}</td>
<td>{$row["faction"]}</td>
<td>{$row["in_set"]}</td>
<td>{$row["card_name"]}</td>
<td>{$row["color"]}</td>
<td>{$row["number_in_set"]}</td>
<td>{$row["rarity"]}</td>
<td>{$row["sold_out"]}</td>
<td>{$row["series"]}</td>
";
echo'<td><input type="checkbox" name="remove_list[]" value='.$row["id"].'></td>';
echo"</tr>";
}
echo'<input type="submit" value="remove from list"> </form>';
?>
</table></body>
</html>