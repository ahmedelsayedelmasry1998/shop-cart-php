<?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");
if(!isset($_SESSION["userId"]))
{
    header("location:../index.php");
}
?>

<div class="table">
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Delete Product</th>
        </tr>
        <?php
        $userId = $_SESSION['userId'];
        $allOrders = $conn->query("SELECT orderId,orderPrice,productName FROM (
        orders INNER JOIN products USING(productId)
        ) WHERE orders.userId = $userId AND ordeActive = 1"); 
        $allPrice = 0;
        while($row = $allOrders->fetch()):
            $allPrice = $allPrice += $row['orderPrice'];
        ?>
        <tr>
            <td><?php echo $row['orderId'] ?></td>
            <td><?php echo $row['productName'] ?></td>
            <td>1</td>
            <td><?php echo $row['orderPrice'] ?> LE</td>
            <td><a class="btnBuy" href="./deleteOrder.php?orderId=<?php echo $row['orderId']; ?>">Delete <i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php endwhile; ?>
        
        <tr>
            <td colspan="4">Total Price :</td>
            <td><?php  echo $allPrice; ?> LE</td>
        </tr>
    </table>
</div>
<div class="check">
<a href="./checkOut.php?totalPrice=<?php echo $allPrice; ?>" class="btnCheck">Chechout</a>
</div>

<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>