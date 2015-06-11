<?php session_start(); ?>
<html><head><title>all messages</title></head>
<body>
<table border=1>
<tr><th>USER</th><th>MESSAGE</th></tr>
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
$query = "SELECT app_screen_name, message FROM users a, messages b WHERE b.message!='Null' AND a.id=b.user_id ORDER BY post_date DESC LIMIT 100";
// Execute SQL statement
if (!($result = @ mysql_query ($query, $connection)))
  showerror();
// Display results
while ($row = @ mysql_fetch_array($result)) {
echo"<tr>";
$screen = $row["app_screen_name"];
echo '<td><a href="user_page.php?user_name='.$screen.'">'.$screen.'</a></td>';
echo "<td>{$row["message"]}</td>
</tr>";
}
?>
</table></body>
</html>