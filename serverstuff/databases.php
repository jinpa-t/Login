<?php

session_start();
if(!(isset($_SESSION["loggedin"]))){
    header("location: login.php");
    exit;
}


?>
<!doctype html>
<html>  
  <head>
    <title>Databases</title>
    <meta name="author" property="og:author" content="DeepNN">
    <style>
        a{
            padding:5px 5px;
        }
        table,th,td{
            border:2px solid black;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
        }
    </style  
  </head>
  <div>

  <p>Database List</p>
  <hr>
  <button onclick="history.back()">Back</button>
  <div id="display"> </div>
  <table id="db_table" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
        <th>DB Name</th>
        <th>DB size</th>
        <th>created date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td><a href="users.php">Users</a></td>
        <td>12000</td>
        <td>Friday 22nd of October 2021 02:53:03 PM</td>
    </tr>
    <tr>
        <td><a href="friends.php">Friends</a></td>
        <td>400000</td>
        <td>Friday 22nd of October 2021 02:53:03 PM</td>
    </tr>
  </tbody>
  </table>
   <script type="text/javascript">
        function getRows() {
        var x = document.querySelectorAll("#db_table tbody tr").length;
        document.getElementById("display").innerHTML = "Total Databases: " + x;
    }
    getRows()
    </script> 
  <?php include "copyright.php"
    ?>
  </body>
</html>