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
      <div class="col-md-11 col-md-offset-1">
      
<div class="table-responsive">
<table border=1 class="table table-striped table-condensed">
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


if (isset($_GET['card_id'])) { 

    $card = $_GET['card_id']; 
	$query_other_have = "SELECT parallel, faction, in_set, card_name, color, number_in_set, rarity, sold_out, series, app_screen_name FROM have_list a, users b, cards c WHERE a.user_id!='$id' AND a.card_id=$card AND a.user_id=b.id AND c.id=$card AND a.trading='Yes' ORDER BY card_name ASC";
     if (!($result_two = @ mysql_query ($query_other_have, $connection)))
  	 showerror();

	} else { 

	$query_user_want = "SELECT * FROM want_list WHERE user_id='$id'";
	if (!($result_one = @ mysql_query ($query_user_want, $connection)))
	showerror();

	while ($row = @ mysql_fetch_array($result_one)) {
	$card = $row["card_id"];
	$query_other_have = "SELECT parallel, faction, in_set, card_name, color, number_in_set, rarity, sold_out, series, app_screen_name FROM have_list a, users b, cards c WHERE a.user_id!='$id' AND a.card_id=$card AND a.user_id=b.id AND c.id=$card AND a.trading='Yes' ORDER BY card_name ASC";
	 if (!($result_two = @ mysql_query ($query_other_have, $connection)))
		 showerror();
	}




}



//$query_user_have = "SELECT * FROM have_list WHERE user_id='$id'";
//if (!($result = @ mysql_query ($query_user_have, $connection)))
//	showerror();

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
<td>{$row["series"]}</td>";
$screen = $row["app_screen_name"];
echo '<td><a href="user_page.php?user_name='.$screen.'">'.$screen.'</a></td>';
echo "</tr>";
}
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

