  <?php
    session_start();
    
    date_default_timezone_set('America/New_York');
    $admin = "admin";
    $admin_pass = getenv('hashed_admin_pass'); //admin123
    //echo $admin_pass;
    if(isset($_SESSION["name"])){
        header("location: serverstuff/welcome.php");
    }
    function getVisIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER
            ['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    
    $ip = getVisIpAddr();
    $ip = "111.0.11.111";
    if(isset($_POST["submit"]))
    {
        echo "look a post request";
        $name = strtolower($_POST["name"]);
        if(trim(hash("sha512",$_POST["pass"])) == trim($admin_pass) && trim($name) == $admin){
            //echo "Hello, Admin\n";
            $file = fopen('log_file.txt','a');
            $text = date("l jS \of F Y h:i:s A");  
            fwrite($file,"Login:".$text.", session_id:".session_id().",From-ip:".$ip."\n"); 
            fclose($file);         
            $_SESSION["name"] = $name;
            $_SESSION["loggedin"] = true;
           
            header("location: serverstuff/welcome.php");
        }
    }
  ?>
<!doctype html>
<html lang="en-US">
  <head>
    <title>Admin Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    </style>
  </head>
  <body>
    <h3>Are you admin? Login below</h3>
    <div class="form ">
    <form id="form" action="" method="post">
        <div class="form-group">
        <label>Username</label><br>
        <input id="name" name="name" type="text" required autofocus>
        </div>
        <div class="form-group">
        <label>Password</label><br>
        <input name="pass" type="password" required>
        </div>
        <input class="btn btn-default" name="submit" type="submit" value="Sign In">        
    </form>
    </div>
    <div class="copyright">
    <?php include "serverstuff/copyright.php" ?>
    </div>
    <div style="text-align:center;">For demo enter the following login credentials<mark><br/>username: admin <br>pass: admin123</mark></div>
    <script>
        //$("#form #name").focus(); // focus input on load
    </script>
  </body>
</html>