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
        <th>Logs</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $handle = fopen("../log_file.txt", "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {            
            // process the line read.
            $needle = "Login";
            $find1 = stripos($line, $needle);            
            if($find1 !== false){
                echo "<tr style=\"color:green\">";
            } else {
                echo "<tr style=\"color:red\">";
            }
            ?>
            
                <td>
                <?php echo $line;  ?>
                </td>
            </tr>
            <?php
        }
        fclose($handle);
    } else {
        // error opening the file.
    } 
    ?>
  </tbody>
  </table>

  <?php include "copyright.php"
    ?>
  </body>
</html>