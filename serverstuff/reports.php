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

  <p>Report and Issues List</p>
  <hr>
  <button onclick="history.back()">Back</button>
  <div id="display"> </div>
  <table id="db_table" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
        <th>Priority</th>
        <th>Title</th>
        <th>Status</th>
        <th>Creation Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>1</td>
        <td>Login is broken on mobile app</td>
        <td>In progress</td>
        <td>6/24/2022</td>
    </tr>
  </tbody>
  </table>
   <script type="text/javascript">
        function getRows() {
        var x = document.querySelectorAll("#db_table tbody tr").length;
        document.getElementById("display").innerHTML = "Total reports: " + x;
    }
    getRows()
    </script> 
  <?php include "copyright.php"
    ?>
  </body>
</html>