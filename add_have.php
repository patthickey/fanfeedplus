<html><head><title>add have</title></head>
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
foreach ($_POST['have_list'] as $card) {
	 echo "$card";
     $query = "INSERT INTO have_list (user_id, card_id) VALUES (6, ".$card.")";
     echo "$query";

     if (!($result = @ mysql_query ($query, $connection)))
  	 showerror();
 }

// Execute SQL statement

// Display results


//echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">');

?>
</body>
</html>