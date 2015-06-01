<html><head><title>select cards</title></head>
<body>
<table border=1>
<tr><th>PARALLEL</th><th>FACTION</th><th>IN SET</th><th>CARD NAME</th><th>COLOR</th><th># IN SET</th><th>RARITY</th><th>SOLD OUT</th><th>SERIES</th></tr>
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
$parallel = $_POST['parallel'];
$faction = $_POST['faction'];
$in_set = $_POST['in_set'];
$card_name = $_POST['card_name'];
$color = $_POST['color'];
$number_in_set = $_POST['number_in_set'];
$rarity = $_POST['rarity'];
$sold_out = $_POST['sold_out'];
$series = $_POST['series'];
$order_selected = $_POST['order_selected'];

$query = "SELECT * FROM cards where 
parallel LIKE '".$parallel."'
AND faction LIKE '".$faction."'
AND in_set LIKE '".$in_set."' 
AND card_name LIKE '".$card_name."'
AND color LIKE '".$color."'
AND number_in_set LIKE '".$number_in_set."'
AND rarity LIKE '".$rarity."'
AND sold_out LIKE '".$sold_out."'
AND series LIKE '".$series."'
ORDER BY $order_selected ASC
";
// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results
while ($row = @ mysql_fetch_array($result))
  echo "<tr><td>{$row["parallel"]}</td>
<td>{$row["faction"]}</td>
<td>{$row["in_set"]}</td>
<td>{$row["card_name"]}</td>
<td>{$row["color"]}</td>
<td>{$row["number_in_set"]}</td>
<td>{$row["rarity"]}</td>
<td>{$row["sold_out"]}</td>
<td>{$row["series"]}</td>
</tr>";
?>
</table></body>
</html>