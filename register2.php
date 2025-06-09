<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,  $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, ($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, ($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password= '$pass' ");

    if(mysqli_num_rows($select) > 0){
        $message[] = "user already exist";
    }else{
        mysqli_query($conn, "INSERT INTO `users`(name, email, password) 
        VALUES('$name', '$email', '$pass')") or die('query failed');
        $message[] = "registration successful";
        header('location:login5.php');
        

    }
}

?>

<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta  name = "viewport" content = "width=device width, initial-scale=1.0">


    <link rel="stylesheet" href="style5.css">

</head>
<body>
 <?php
 
 if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
 }
 
 ?>
    <div class ="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="name" required placeholder="enter your username" class="box">
            <input type="email" name="email" required placeholder="enter your email address" class="box">
            <input type="password" name="password" required placeholder="enter your password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm your password" class="box">
            <input type="submit" name="submit" class="btn" value="register now">
            <p>already have an account? <a href="login5.php">login now</a></p>


        </form>
    </div>
</body>
</html>