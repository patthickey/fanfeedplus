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
  <div class="col-md-6 col-md-offset-3">

    <fieldset>
      <form method="post" action="update_message.php">
        Update message: </br>
        <textarea 
              onKeyDown="textCounter(this,'message_count',150);"
              onKeyUp="textCounter(this,'message_count',150)" 
              name="message" id="message"></textarea> </br>
        <input style="color:red;font-size:12pt;font-style:italic;" readonly="readonly" type="text" id='message_count' name="message_count" size="3" maxlength="3" value="150" /> characters left</i>
            <input type="submit" type="button" class="btn btn-success" />
      </form>
    </fieldset>

    <div class="table-responsive">
    <table border=1 class="table table-striped table-condensed">
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







