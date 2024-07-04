
<header>
        <div class="brand"><a href="../index.php">Brand</a></div>
        <div class="navigation">
            <div class="shopingCart">
               <a class="act" href="./shopingCart.php">Shoping Cart  <i class="fa-lg fa-solid fa-cart-plus"></i></a>
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
                         echo "0"."+";
                     }
                 }else{
                     echo "0"."+";
                 }
                ?>
                
               </div>
            </div>
            <div class="userManagment">
                <a href="#"> <?php
               if(isset($_SESSION['email']))
               {
                    echo $_SESSION['email'];
               }else{
                echo "User Management";
               }
                ?> <i class="fa-lg fa-solid fa-user-plus"></i></a>
                <ul class="h-s">
                    <li><a href="./signin.php">Signin</a></li>
                    <li><a href="./signup.php">Signup</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <section>