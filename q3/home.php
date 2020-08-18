<?php
require_once "db.php";
session_start();

$code=$_POST["code"];

$sql = "SELECT code FROM users where email = '".$_SESSION['email']."'";

if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      if($row['code']==$code){

    echo"<h1>You have entered 2FA code correctly.Login Successful</h1>";
  }
     
else{
    echo"<h1>You have entered wrong 2FA secret code.Login Failed!</h1>";
}
}
?>
<html>
<body>
  Click here to <a href="logout.php">Logout</a>
</body>
  </html>