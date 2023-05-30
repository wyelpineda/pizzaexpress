<?php

    include 'config.php';
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location:login.php');
    };

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:nhome.html');
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link rel="stylesheet" href="phpstyle.css">
</head>
<body background="bgmen.jpg">

<div class="acccontainer">
    <div class="profile">
        <?php
            $select_user = mysqli_query($conn, "SELECT * FROM  `accounts` WHERE id = '$user_id'") or die ('Query Failed');
            if(mysqli_num_rows($select_user) > 0){
                $fetch_user = mysqli_fetch_assoc($select_user);
            };
        ?>
        <img src="user.png" id = "image" class="img">
        <p> Username: <span><?php echo $fetch_user['username']; ?></span> </p>
        <p> Email: <span><?php echo $fetch_user['email']; ?></span> </p>
        <p> Address: <span><?php echo $fetch_user['address']; ?></span> </p>
        
        <div class="buttons">
            <a href="index.php?logout=<?php echo $user_id?>" onclick="return confirm('Are you sure you want to logout?');" class="log-out-btn">Log Out</a>
            <a href="menu.php" class="back-btn">Back</a>
        </div>

    </div>
</div>

</body>
</html>