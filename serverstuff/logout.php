<?php
    session_start();
    if(isset($_SESSION["admin"])){
        date_default_timezone_set('America/New_York');
        $file = fopen('../log_file.txt','a');
        $text = date("l jS \of F Y h:i:s A");  
        fwrite($file,"Logout:".$text." session_id:".session_id()."\n"); 
        fclose($file);       
    }
    session_regenerate_id();
    session_destroy();
    header("location: ../index.php");
    exit;
?>
