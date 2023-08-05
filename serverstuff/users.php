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

  <p>Server List</p>
  <hr>
  <button onclick="history.back()">Back</button>
  <div id="display"> </div>
  <table id="db_table" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
        <th>Type</th>
        <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Customers</td>
        <td>400000</td>
    </tr>
    <tr>
        <td>Customer Representative</td>
        <td>250</td>
    </tr>
    <tr>
        <td>Admins</td>
        <td>50</td>
    </tr>
    <tr>
        <td>Super Admins</td>
        <td>5</td>
    </tr>
  </tbody>
  </table>
   <script type="text/javascript">
        function getRows() {
        var x = document.querySelectorAll("#db_table tbody tr").length;
        document.getElementById("display").innerHTML = "Total users: " + x;
    }
    getRows()
    </script> 
  <?php include "copyright.php"
    ?>
  </body>
</html>