<?php
session_start();
include_once("./master/sections/contact.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Cart</title>
    <!-- <link rel="stylesheet" href="./master/css/all.css"> -->
    <link rel="stylesheet" href="./master/css/main.css">
</head>
<body>
<div class="container">
    <header>
        <div class="brand"><a href="./index.php">Brand</a></div>
        <div class="navigation">
            <div class="shopingCart">
               <a  class="act activeAnchor" href="./presentation/shopingCart.php"> Shoping Cart  <i class="fa-lg fa-solid fa-cart-plus"></i></a>
               <div class="basket">
                <?php
                if(isset($_SESSION['userId']))
                {
                    $userId = $_SESSION['userId'];
                    $stmt = $conn->query("SELECT COUNT(userId) FROM orders WHERE userId = $userId AND ordeActive = 1")->fetchAll(PDO::FETCH_COLUMN); 
                    if(count($stmt) > 0)
                    {
                        echo $stmt[0]."+";
                    }else{
                        echo "0+";
                    }
                }else{
                    echo "0+";
                }
               
                ?>
                
               </div>
            </div>
            <div class="userManagment">
                <a href="#" class="activeAnchor"><?php
               if(isset($_SESSION['email']))
               {
                    echo $_SESSION['email'];
               }else{
                echo "User Management";
               }
                ?> 
                 <i class="fa-lg fa-solid fa-user-plus"></i></a>
                <ul class="h-s">
                    <li><a href="./presentation/signin.php">Signin</a></li>
                    <li><a href="./presentation/signup.php">Signup</a></li>
                    <li><a href="./presentation/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <section>
        <?php 
        $allProducts = $conn-> query("SELECT * FROM products");
        while($row = $allProducts->fetch() ):
        ?>
        <div class="component">
            <img src="<?php echo $row['imagePath'] ?>" alt="">
            <h2><?php echo $row['productName'] ?></h2>
            <h3>Storage Capacity : <?php echo $row['storageCapacity']; ?></h3>
            <h3>Number Of Sim : <?php echo $row['numberOfSim']; ?></h3>
            <h3>Real Comara Resaluation : <?php echo $row['realComaraResaluation']; ?></h3>
            <h3>Dual Size ( Inch ) : <?php echo $row['dualSize']; ?></h3>
            <div class="actions">
                <div><?php echo $row['price']; ?> LE</div>
                <a href="./presentation/addCart.php?price=<?php echo $row['price']; ?>&productId= <?php echo $row['productId']; ?>" class="btnBuy">Buy</a>
            </div>
        </div>
        <?php endwhile; ?>
    </section>
    <footer>
        This website created with ahmed elmasry
</footer>
</div>
<script src="./master/js/all.js"></script>
<script src="./master/js/main.js"></script>
</body>
</html>