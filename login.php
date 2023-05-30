<?php
	include 'config.php';
    if(isset($_POST['submit'])){

        
        $email = mysqli_real_escape_string($conn, $_POST['text']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
    
        $select = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email = '$email' or username = '$email' AND 
        password = '$password'") or die ('Query Failed');
    
        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id'];
            header('location:menu.php');
        }else{
            echo "<script> alert('Incorrect Password or Email!'); </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="phpstyle.css">
    <script src="https://kit.fontawesome.com/d603123ec6.js" crossorigin="anonymous"></script>
</head>
<body background="bg5.jpg">

    <div class="container">
        <div class="logoacc">
            <img src="user.png" alt="">
        </div>
    <form action="" method="post">
        <h3>Get Started</h3>
        <input type="text" name="text" placeholder="Enter email or username" class="box">
        <input type="password" name="password" placeholder="Enter password" class="box">
        <input type="submit" name="submit" class="btn" value="Login">
        <p>Don't have an account? <a href="register.php">Register Now!</a></p>
    </form>
    </div>
</body>
</html>