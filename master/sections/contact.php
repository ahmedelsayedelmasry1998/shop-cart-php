<?php
try{
    $dbname = "shop-cart";
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
echo $e->getMessage();
}
?>