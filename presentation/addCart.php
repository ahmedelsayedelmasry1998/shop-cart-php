<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
if(! isset($_SESSION['email']))
{
    header("location:../index.php");
}else{
 $stmt = $conn->prepare("INSERT INTO orders(orderPrice,userId,productId) VALUES (?,?,?)");
$userId     =  $_SESSION['userId'];
$orderPrice = $_GET['price'];
$productId  =  $_GET['productId'];
$stmt->execute([$orderPrice,$userId,$productId]);
header("location:../index.php");
}
?>
<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>