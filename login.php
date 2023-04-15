<?php

@include 'config.php';
@include 'index.php';
session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);

   $select = " SELECT * FROM register WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $_SESSION['admin_name'] = $row['fname'];
    
    echo '<script type="text/javascript">'; 
    echo 'alert("Welcome '. $_SESSION['admin_name'] .'");'; 
    echo 'window.location.href = "index.html";';
    echo '</script>';
   }
  

   else{
      $error[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

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
                        <h3>Login now</h3>
                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                        ?>

                        <input type="email" name="email" required placeholder="enter your email">
                        <input type="password" name="password" required placeholder="enter your password">
                        <input type="submit" name="submit" value="login now" class="form-btn">
                        <p>Don't have an account? <a href="registration.php">Register now</a></p>
                        <p> <a href="index.html">Back to home</a></p>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>