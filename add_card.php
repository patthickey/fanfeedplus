<html><head><title>add card</title></head>
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
$parallel = $_POST['parallel_add'];
$faction = $_POST['faction_add'];
$in_set = $_POST['in_set_add'];
$card_name = $_POST['card_name_add'];
$color = $_POST['color_add'];
$number_in_set = $_POST['number_in_set_add'];
$rarity = $_POST['rarity_add'];
$sold_out = $_POST['sold_out_add'];
$series = $_POST['series_add'];

$query = "INSERT INTO cards (parallel, faction, in_set, card_name, color, number_in_set, rarity, sold_out, series) 
	VALUES ('$parallel', '$faction', '$in_set', '$card_name', '$color', '$number_in_set', '$rarity', '$sold_out', '$series')";

// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results


echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">');

?>
</body>
</html>