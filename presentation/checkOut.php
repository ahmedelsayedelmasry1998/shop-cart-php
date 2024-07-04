 <?php
session_start();
include_once("../master/sections/contact.php");
include_once("../master/sections/start.php");
include_once("../master/sections/mid.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $totalQuantity = 1;
    $totalPrice= $_POST['totalPrice'];
    $createdAt = date('Y-m-d H-i-s');
    $userId = $_SESSION['userId'];
    $ordersData = $conn->query("SELECT orders.orderId,orders.orderPrice,orders.userId,orders.productId,products.price,products.productId FROM (orders INNER JOIN products USING(productId)) WHERE orders.userId = $userId AND ordeActive = 1")->fetchAll(PDO::FETCH_ASSOC);
    for($x = 0 ; $x < count($ordersData) ; $x++)
    {
        $stmt = $conn->prepare("INSERT INTO carts (totalQuanatity,totalPrice,createdAt,userId,productId,orderId) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$totalQuantity,$ordersData[$x]['price'],$createdAt,$userId,$ordersData[$x]['productId'],$ordersData[$x]['orderId']]);
    }
     $deleteOrder = $conn->prepare("UPDATE orders SET ordeActive = 0 WHERE userId = $userId ");
     $deleteOrder->execute([]);
    header("location:../index.php");
}
if($_GET['totalPrice'])
{
    $totalPrice = $_GET['totalPrice'];
    $userId = $_SESSION['userId'];
    $user = $conn->query("SELECT * FROM users WHERE userId = $userId")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="shopCartContainer">
    <h1>Check Out</h1>
    <div class="contents">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name : </label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    value="<?php echo $user[0]['userName'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Address : </label>
                <input name="address" type="text" class="form-control" id="exampleFormControlInput2"
                    value="<?php echo $user[0]['address'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput10" class="form-label">Contact : </label>
                <input name="contact" type="text" class="form-control" id="exampleFormControlInput10"
                    value="<?php echo $user[0]['contact'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Credit Cart Name : </label>
                <input name="creditCartName" type="text" class="form-control" id="exampleFormControlInput3"
                    placeholder="Please Enter Your Credit Cart Name ....">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">Credit Cart Number : </label>
                <input name="creditCartNumber" type="number" class="form-control" id="exampleFormControlInput4"
                    placeholder="Please Enter Your Credit Cart Number ....">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">Expiration Month : </label>
                <input name="expirationMonth" type="number" class="form-control" id="exampleFormControlInput5"
                    placeholder="Please Enter Your Credit Cart Expiration Month ....">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput6" class="form-label">Expiration Year : </label>
                <input name="expirationYear" type="number" class="form-control" id="exampleFormControlInput6"
                    placeholder="Please Enter Your Credit Cart Expiration Year ....">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput7" class="form-label">CVC : </label>
                <input name="cvc" type="number" class="form-control" id="exampleFormControlInput7"
                    placeholder="Please Enter Your Credit Cart CVC ....">
            </div>
            <div class="mb-3">
            <input type="hidden"  value="<?php echo $totalPrice ?>" name="totalPrice">
                <input type="submit" style="width: 30%;" class="btn btnBuy" value="Checkout <?php echo $totalPrice ?> L.E">
            </div>
        </form>
    </div>
</div>
<?php
include_once("../master/sections/foot.php");
include_once("../master/sections/end.php");
?>