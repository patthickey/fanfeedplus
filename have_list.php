<html><head><title>all cards</title></head>
<body>
<table border=1>
<tr><th>PARALLEL</th><th>FACTION</th><th>IN SET</th><th>CARD NAME</th><th>COLOR</th><th># IN SET</th><th>RARITY</th><th>SOLD OUT</th><th>SERIES</th><th>TEST</th></tr>
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
$query = "SELECT * FROM have_list";
// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results
while ($row = @ mysql_fetch_array($result)) {
echo"<tr>
<td>{$row["user_id"]}</td>
<td>{$row["card_id"]}</td>
</tr>";
}
?>
</table></body>
</html>