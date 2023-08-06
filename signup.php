<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

	} 
 //  else  {
	// 	echo "<b>Warning: Invalid Access!</b><br>";
	// 	echo "<a href='index.html'>Goto Signup Page</a>";
	// 	exit;
	// }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Signup</title>
    <link href="signup_style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h3 class="text-center">Sign up</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="firstname">First Name</label><star> *</star><br>
      <input type="text" pattern="[A-Za-z .-']{1,32}" name="firstname" value="Sherpa" placeholder="First name" required>
      <br>
      <label for="lastname">Last Name</label><star> *</star><br>
      <input type="text" pattern="[A-Za-z]{1,32}" name="lastname" value="Sherpa" placeholder="Last name" required>
      <br>
      <label for="birthdate">Birth Date</label><star> *</star><br>
      <input type="text" name="birthdate" value="12/05/1997" placeholder="mm/dd/yyyy" maxlength="10" required>
      <br>
      <label for="email">Email</label><star> *</star><br>
      <input type="email" name="email" value="abc@gmail.com" placeholder="example@domain.com" required>
      <br>
      <label for="phone">Phone</label><br>
      <input type="tel" name="phone" value="123-46-7890" placeholder="123-46-7890" pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}">
      <br><br>
      <p id="agreement">By clicking Sign Up, you are agreeing to the <a href="">Terms of Use</a> and acknowledging the <a href="">Privacy Policy</a></p>
      <input type="submit" value="Signup" name="submit">
    </form>
    <div>
		
		<?php
			if (isset( $_POST['submit'] ) ) {				
			    $firstname = trim($_POST['firstname']); 
			    $lastname = $_POST['lastname'];	
          echo "<h4>Your account have not been created yet. Please check your email to finish setting up your account.</h4>";
			    echo "<p>An email has been sent to <b>".$_POST['email']."</b></p>";	
			    /*
				    echo '<p>Your name is ' . $lastname . ' ' .htmlspecialchars($_POST['firstname']); 				
				    $time=strtotime($_POST['birthdate']);
					$month=date("F",$time); // returns month in full Letter
					$year=date("Y",$time); // returns full year
					$day = date("d",$time);
					$age = date("Y") - $year;
					echo "<br>Your date of birth is ".$month . " " . $day . "," . $year .".<br>";
					echo "You are ". $age." years old.</p><br>";
				*/
			}
		?>
    </div>
  </body>
</html>