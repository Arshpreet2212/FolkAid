<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);

   $select = " SELECT * FROM register WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO register (fname, lname, address, phone, email, password) VALUES('$fname', '$lname', '$address', '$phone','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login-css.css">
   <link rel="stylesheet" href="css/login.css">

</head>
<body>
  
<div class="back">
            <a href="index.html"><img src="image/back.png" style="width:20px; padding:35px;"></a>
        </div>
        <div class="loginwrap">
            <div class="logincontent">
                <div class="loginImg" style="background-image: url(image/loginbg.jpeg) ; background-size: cover;">

                </div>
                <div class="loginForm">
                <form action="" method="post">
                    <h3>Register now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="text" name="fname" required placeholder="enter your first name">
                    <input type="text" name="lname" required placeholder="enter your last name">
                    <input type="email" name="email" required placeholder="enter your email">
                    <input type="text" name="address" required placeholder="enter your address">
                    <input type="text" name="phone" required placeholder="enter your phone number">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="password" name="cpassword" required placeholder="confirm your password">
                    <input type="submit" name="submit" value="register now" class="form-btn">
                    <p>Already have an account? <a href="login_form.php">Login now</a></p>
                </form>
                </div>
            </div>
        </div>



</body>
</html>