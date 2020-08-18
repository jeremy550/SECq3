<?php
session_start();    
require_once "db.php";

        if(isset($_POST['submit'])){
        
        if(isset($_POST['email']) & isset($_POST['password'])){
        
            $email = $_POST['email'];
            $_SESSION['email']= $_POST['email'];
            $password =$_POST['password'];
            

            $random_number = mt_rand(100000, 999999);

           $sql1="INSERT INTO users VALUES ('".$email."','".$password."','".$random_number."')";
           $user=mysqli_query($link,$sql1);

          
        
        


           $receiver_email = $email;
           $subject        = 'Verification code';
           $message        = 'Your verification code is: '.$random_number;
           $headers        = 'From: noreplye76@gmail.com';
               
           if(mail($receiver_email,$subject,$message,$headers))
           {
                           header('location: receive_code.html');
           }

        
    }
        else {
            echo "<script>
					 alert('Email or Password cannot be empty ');
					</script>";

            }

        }

?>


<html>
<head>
</head>
<body>

        <h3>Create Account</h3>
    <form action="registration.php" method="post">
         <h3>Email</h3>
        <input type="email" id="email" name="email" required>
        <br>
        <h3>Password</h3>
        <input type="password" id="password" name="password" required>
        <br></br>
        <input type="submit" name="submit" value="Register">
    </form>
        
</body>
</html>