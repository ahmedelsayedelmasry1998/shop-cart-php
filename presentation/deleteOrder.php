<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
if(! isset($_SESSION['email']))
{
    header("location:../index.php");
}else{
$userId     =  $_SESSION['userId'];
$orderId = $_GET['orderId'];
$stmt = $conn->prepare("UPDATE orders SET ordeActive = 0 WHERE userId = $userId AND orderId = $orderId");
$stmt->execute([]);
header("location:./shopingCart.php");
}
?>
<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>