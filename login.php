<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style8.css">
        <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("config.php");
            if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'") or die("select error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['age'] = $row['age'];
                    $_SESSION['Id'] = $row['Id'];
                }else{
                    echo"<div class='message' style= 'color: red; text-align: center; background: #f9eded; padding: 15px 0px;  border: 1px solid #699053; border-radius: 5px; margin-bottom: 10px;'>
                             <p>wrong username or password</p>
                      </div> <br>";
                echo "<a href='login.php'> <button class='btn'>Go Back</button>
            </a>";
                }
                if(isset($_SESSION['valid'])){
                    header("location: home2.php");
                }
            }else{
            ?>
            <header>Login</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>

                
                <div class="field input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class= "field">
                    <input type="submit" class="btn" name="submit" value="login" required>
                </div>
                <div class="links">
                    don't have account? <a href="register2.php">sign up</a>
                
            </form>
            <?php } ?>

</body>
</html>