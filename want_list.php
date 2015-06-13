<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Patt Hickey">  
    <title>fan feed +</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="headerfile"></div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

<div class="table-responsive">
<table border=1 class="table table-striped table-condensed">
<tr><th>PARALLEL</th><th>FACTION</th><th>IN SET</th><th>CARD NAME</th><th>COLOR</th><th># IN SET</th><th>RARITY</th><th>SOLD OUT</th><th>SERIES</th><th>FIND TRADE</th><th>REMOVE</th></tr>
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
$card_id = $row["id"];
echo '<td><a href="trade_finder.php?card_id='.$card_id.'">TRADE</a></td>';
echo'<td><input type="checkbox" name="remove_list[]" value='.$row["id"].'></td>';
echo"</tr>";
}
echo'<input type="submit" value="remove from list"> </form>';
?>
</table>  
</div> 


 
      </div>
    </div>
    <div id="footerfile"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/JavaScript" src="fan_feed_plus.js"></script> 
    <script> 
      $(function(){
        $("#headerfile").load("header.html"); 
        $("#footerfile").load("footer.html"); 
      });
    </script>
  </body>
</html>