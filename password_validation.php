<?php
class User{
    public $username;
    public $password;
    public static $passwordLength = 8; 
    public static function getDefaultPasswordLength(){
        return self::$passwordLength;
    }
    public function setPassword($pass)
    {
        /*
            at least one upper char = '@[A-Z]@'
            at least one lowercase = '@[a-z]@'
            at least one number = '@[0-9]@'
            at least one special char = ?=.*?[#?!@$%^&*-]
            8 char length    = strlen($pass) or .{8,}$
         */
        $validate = preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',$pass);
        if($validate){
            echo "Password meets all the security requirement\n";
            $this->password = $pass;
        } else {
            echo $pass,"Validation failed\n";
        }
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
}
$User = new User;
$password = "aB@2341234";
$User->username = "Jack";
$User->setPassword($password);
echo "Pass:",$User->getPassword(),PHP_EOL;
echo "Username:",$User->getUsername(), PHP_EOL;
echo "Default Password Length:", $User::getDefaultPasswordLength();
?>

