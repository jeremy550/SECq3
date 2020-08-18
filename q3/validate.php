<?php
session_start();    
require_once "db.php";
 
$email = $_POST["email"];
$password = $_POST["password"];

    if(isset($_POST['submit'])){

        $sql = "SELECT * FROM users where email = '".$email."' and password = '".$password."'";
            if ($result = mysqli_query($link, $sql)) {
	        $count = mysqli_num_rows($result);
	        if($count >=1){
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$_SESSION["password"] = $row['password'];
        $_SESSION["email"] =  $row['email'];       


            
       //generate random 6 digit number         
        $random_number = mt_rand(100000, 999999);
        
        $sql2="UPDATE users SET code = '".$random_number."'  WHERE email ='".$email."'";
        $code_update=mysqli_query($link,$sql2);
        
        
        $receiver_email = $email;
        $subject        = 'Verification code';
        $message        = 'Your verification code is: '.$random_number;
        $headers        = 'From: noreplye76@gmail.com';
            
        if(mail($receiver_email,$subject,$message,$headers))
        {
                        header('location: receive_code.html');
        }

        

        
    }
    else{
        echo "<script>
              alert('Invalid password or email ');
              </script>";

              header('location: index.html');
    
    }
}
    }
?>