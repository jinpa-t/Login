<?php

session_start();
if(!(isset($_SESSION["loggedin"]))){
    header("location: ../index.php");
    exit;
}

// cookies
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // one day

?>
<!doctype html>
<html lang="en-US">  
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" property="og:author" content="DeepNN">
    <title>Home Page</title>
    <link rel="icon" type="image/svg+xml" href="/deepnn_logo.svg">
    <style>
        a{
            background-color:green;
            color:white;
            text-decoration:none;
            padding:5px 5px;
            width: 100px;
            display:inline-block;
            text-align:center;
        }
        a img{
            
            float:left;
        }
    </style  
  </head>
  <div>

  <?php include "menu.php"
    ?>
    <a style="background:red;" href="logout.php"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/OOjs_UI_icon_logOut-ltr.svg/1200px-OOjs_UI_icon_logOut-ltr.svg.png" height="23px" width="23px"/>Logout</a>
  </div>
  <p>Hello, <?php echo $cookie_value;?></p>
 
  <?php
    if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
    } else {
    echo "Cookies are disabled.";
    }
   
    if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    }
  ?>
  <hr>
  <?php include "copyright.php"
    ?>
  </body>
</html>