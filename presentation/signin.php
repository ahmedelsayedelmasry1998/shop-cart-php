<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
?>
<div class="signed">
    <form action="" method="post">
        <span>Email : </span>
        <input type="email" placeholder="Please enter your email ..." name="email" id="">
        <span>Password : </span>
        <input type="password" placeholder="Please enter your password ..." name="password" id="">
        <input type="submit" value="Signin" class="btnBuy sign">
    </form>
    <?php
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
         $email = $_POST['email'] ;
         $password = $_POST['password'] ;
         if(empty($email) || empty($password))
         {
             echo "<div class='error'>Please Enter All Data ...</div>";
         }else{
             $stmt = $conn -> query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->fetchAll(PDO::FETCH_ASSOC);
             if(count($stmt) > 0)
             {
              $_SESSION['userId'] = $stmt[0]['userId'];
              $_SESSION['email'] = $stmt[0]['email'];
              $_SESSION['password'] = $stmt[0]['password'];
              header("location:../index.php");
             }else{
                echo "<div class='error'>This User Is Not Found ...</div>";
             }
             {}
         }
     }
     ?>
</div>
<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>