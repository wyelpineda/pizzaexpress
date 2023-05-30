<?php

    include 'config.php';
    $pizza = "SELECT * FROM menu_pizza";
    $burger = "SELECT * FROM menu_burger";
    $sides = "SELECT * FROM menu_sides";
    $drinks = "SELECT * FROM menu_drinks";
    $all_pizza = $conn->query($pizza);
    $all_burger = $conn->query($burger);
    $all_sides = $conn->query($sides);
    $all_drinks = $conn->query($drinks);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Express Menu</title>

    <link rel="stylesheet" href="menu.css">
    <script src="https://kit.fontawesome.com/d603123ec6.js" crossorigin="anonymous"></script>

</head>
<body background="bgmen.jpg">
    <!--- Home --->
    <div class="container">
            
    <div class="header">
        <div class="logo">
            <img src="logo.png">
        </div>
        <div class="title">PIZZA EXPRESS</div>
            <div class="navbar">
                <nav>
                    <ul>
                        <li><a href="nhome.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="index.php"><i class="fa-solid fa-user"></i></a></li>
                        <li><i class="fa-solid fa-basket-shopping"  id="cart-icon"></i></li>
                            
                    </ul>
                </nav>
                
            </div>
            <button class="btn-menu" onclick="menutoggle()"><i class="fa-solid fa-bars"></i></button>
            <div class="cart">
                <h2 class="cart-title">Basket</h2> 
                                
                <div class="ccontent">

                </div>
                            
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">₱0</div>
                </div>
                <button type="button" class="btn-buy">Order Now</button>
                <i class="fa-solid fa-xmark" id="cart-close"></i>
                            
            </div>

        </div> 
        </div>
        <!-- Product Menu
    <div class="category">
        <div class="ccat">
            <a href="#pizza">
                <img src="img/pizza.jpg" alt="">
                <p>Pizza</p>
            </a>
        </div>
        <div class="ccat">
            <a href="#burger">
                <img src="img/burger.jpg" alt="">
                <p>Burger</p>
            </a>
        </div>
        <div class="ccat">
            <a href="#sides">
                <img src="img/fries.jpg" alt="">
                <p>Sides</p>
            </a>

        </div>
        <div class="ccat">
            <a href="#drinks">
                <img src="img/drinks.jpg" alt="">
                <p>Drinks</p>
            </a>

        </div>
            </div>   -->

    <!-- Menu-->
    <div class="content">
        
    <div class="categories" id="pizza"><h1><span>12 inch</span> PIZZA </h1></div>
    <div class="menu">
        <?php
            while($row = mysqli_fetch_assoc($all_pizza)){
               
        ?>
        <div class="product">
                <img src="<?php echo $row ["food_image"];?>" class="prodimg">
                <h3 class="prodtitle"><?php echo $row ["food_name"];?></h3>
                <p class="description"><?php echo $row ["food_info"];?></p>
                <span class="product-price">₱<?php echo $row ["food_price"];?></span>
            <button class="add1"><i class="fa-solid fa-basket-shopping"></i></button>
        </div>
        <?php
                 
            }
        ?>
    </div>
    <div class="categories" id="burger"><h1>BURGERS</h1></div>
    <div class="menu">
        <?php
            while($row = mysqli_fetch_assoc($all_burger)){
               
        ?>
        <div class="product">
                <img src="<?php echo $row ["food_image"];?>" class="prodimg">
                <h3 class="prodtitle"><?php echo $row ["food_name"];?></h3>
                <p class="description"><?php echo $row ["food_info"];?></p>
                <span class="product-price">₱<?php echo $row ["food_price"];?></span>
            <button class="add1"><i class="fa-solid fa-basket-shopping"></i></button>
        </div>
        <?php
                 
            }
        ?>
    </div>
    <div class="categories" id="sides"><h1>SIDES</h1></div>
    <div class="menu">
        <?php
            while($row = mysqli_fetch_assoc($all_sides)){
               
        ?>
        <div class="product">
                <img src="<?php echo $row ["food_image"];?>" class="prodimg">
                <h3 class="prodtitle"><?php echo $row ["food_name"];?></h3>
                <span class="product-price">₱<?php echo $row ["food_price"];?></span>
            <button class="add1"><i class="fa-solid fa-basket-shopping"></i></button>
        </div>
        <?php
                 
            }
        ?>
    </div>
    <div class="categories" id="drinks"><h1>DRINKS</h1></div>
    <div class="menu">
        <?php
            while($row = mysqli_fetch_assoc($all_drinks)){
               
        ?>
        <div class="product">
                <img src="<?php echo $row ["food_image"];?>" class="prodimg">
                <h3 class="prodtitle"><?php echo $row ["food_name"];?></h3>
                <span class="product-price">₱<?php echo $row ["food_price"];?></span>
            <button class="add1"><i class="fa-solid fa-basket-shopping"></i></button>
        </div>
        <?php
                 
            }
        ?>
    </div>
    <script src="menu.js"></script>
</body>
</html>