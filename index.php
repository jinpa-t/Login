<?php
    //if( empty(session_id()) && !headers_sent()){
    session_start();
   // }
    
    date_default_timezone_set('America/New_York');
    $user_name = "user";
    $user_pass = getenv('hashed_user_pass'); //user123
    $admin_name = "admin";
    $admin_pass = getenv('hashed_admin_pass'); //admin123
    //echo $user_pass;
    if(isset($_SESSION["user"])){
        header("location: serverstuff/welcome_user.php");
    } else if(isset($_SESSION["admin"])){
        header("location: serverstuff/welcome_admin.php");
    }
    
    if(isset($_POST["submit"]))
    {
        //echo "look a post request";
        $name = strtolower($_POST["name"]);
        if(trim(hash("sha512",$_POST["pass"])) == trim($user_pass) && trim($name) == $user_name){
            // echo "hello user";         
            $_SESSION["user"] = $name;
            $_SESSION["loggedin"] = true;
            
            header("location: serverstuff/welcome_user.php");
        } else if(trim(hash("sha512",$_POST["pass"])) == trim($admin_pass) && trim($name) == $admin_name){
            // echo "hello admin";         
            $_SESSION["admin"] = $name;
            $_SESSION["loggedin"] = true;
            header("location: serverstuff/welcome_admin.php");
            echo "what";
          
        }
    }
?>
<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" property="og:author" content="DeepNN">
    <link rel="icon" type="image/svg+xml" href="/deepnn_logo.svg">
    <title>DeepNN Login, Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .form{
        border-radius:5px;
        background-color:red;
        padding: 5px 5px;
        width: 50%;
        margin:0 auto;
    }
    label{
        font-size: 16px;
        font-weight: bold;
        color:white;
        font-family: arial;
    }
    input[type="button"]{
        padding-top:10px;
        background:none;
        color:black;
        display:inline-block;
        margin: 10px;       
    }
    .btn{
         font-weight:bolder;
    }
    input[type="text"], input[type="password"]{
        font-size: 15px;
        width: 90%;
    }
    h3{
        text-align:center;
    }
    .copyright{
        text-align:center;
    }
    #demo-tip{
        background:lightblue;
        width:50%;
        margin:0 auto;
        border-radius: 5px;
    }
    #demo-close-btn{
        position:relative;
        float:right;
        color:red;
        width:36px;
        font-weight:600;
        border-radius: 5px;
        height:36px;
        vertical-align:middle;
    }
    </style>
  </head>
  <body>
    <h3>Login below</h3>
    <div class="form ">
    <form id="form" action="" method="post">
        <div class="form-group">
        <label>Username</label><br>
        <input id="name" title="" name="name" type="text" required autofocus autocomplete="off">
        </div>
        <div class="form-group">
        <label>Password</label><br>
        <input name="pass" title="" type="password" required autocomplete="off">
        </div>
        <input class="btn btn-default" name="submit" type="submit" value="Sign In">        
    </form>
      <span>New user? <a href="signup.php"> Signup</a></span>
    </div>
    <div id="demo-tip">
        <button id="demo-close-btn">x</button>
        <div class="color-warning p-1">For demo enter the following login credentials</div>
        <table>
            <tr>
                <td>Username: user</td>
                <td>Pass: user123</td>
            </tr>
            <tr>
                <td>Username: admin</td>
                <td>Pass: admin123</td>
            </tr>
        </table>
    </div>
    <div class="copyright">   
        <a href="cookies" title="Learn about cookies">Cookies</a>
        <span>|</span>
        <a href="privacy.html" title="Learn about privacy policies">Privacy</a>
        <span>|</span>
        <a href="terms.html" title="Learn about terms & conditions">Terms</a>
        <?php include "serverstuff/copyright.php" ?>
    </div>
    <script>
        //$("#form #name").focus(); // focus input on load
        document.getElementById("demo-close-btn").onclick = function() {
            document.getElementById("demo-tip").style.display = "none";
        }
    </script>
  </body>
</html>