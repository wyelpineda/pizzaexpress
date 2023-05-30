<?php
	include 'config.php';
    
    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
        $select = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email = '$email' AND 
        password = '$password'") or die ('Query Failed');
        
        if(mysqli_num_rows($select) > 0){
            echo "<script> alert('User Already Exist!'); </script>";
            header('location:register.php');
        }elseif ($password !== $cpassword){
            echo "<script> alert('Password does not match!'); </script>";
        }else{
            mysqli_query($conn, "INSERT INTO `accounts` (username, email, address, password) VALUES('$name', '$email', '$address', '$password')") or die ('Query Failed');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="phpstyle.css">
</head>
<body background="bg5.jpg">

    <div class="container2">
    <form action="" method="post">
        <h3>Register Now!</h3>
        <input type="text" name="username" placeholder="Enter username" class="box">
        <input type="email" name="email" placeholder="Enter email" class="box">
        <input type="address" name="address" placeholder="Enter address" class="box">
        <input type="password" name="password" placeholder="Enter password" class="box">
        <input type="password" name="cpassword" placeholder="Confirm password" class="box">
        <input type="submit" name="submit" class="btn" value="Register">
        <p>Already have an account? <a href="login.php">Login Now!</a></p>
    </form>
    </div>
</body>
</html>