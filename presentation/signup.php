<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
?>
<div class="signed">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <span>Email : </span>
        <input type="email" placeholder="Please enter your email ..." name="email" id="">
        <span>Password : </span>
        <input type="password" placeholder="Please enter your password ..." name="password" id="">
        <span>Confirm Password : </span>
        <input type="password" placeholder="Please enter your confirm password ..." name="confirmPassword" id="">
        <input type="submit" value="Signin" class="btnBuy sign">
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        $confirmPassword = $_POST['confirmPassword'] ;
        if(empty($email) || empty($password) || empty($confirmPassword))
        {
            echo "<div class='error'>Please Enter All Data ...</div>";
        }else{
            if($password == $confirmPassword)
            {
                $stmt = $conn -> prepare("INSERT INTO users (email,password) VALUES (?,?)");
                $stmt->execute([$email,$password]);
                header("location:./signin.php");
            }else{
                echo "<div class='error'>Please Enter Matched Data ...</div>";
            }
        }
    }
    ?>
</div>
<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>