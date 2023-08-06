<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")

    include("db_connect.php");


$buyer_name = $_POST['buyer_name'];
$buyer_tel = $_POST['buyer_tel'];
$buyer_address = $_POST['buyer_address'];



mysqli_query($link, "INSERT INTO `buyer`(name,tel,address,date)
    VALUES (
        '$buyer_name',
        '$buyer_tel',
        '$buyer_address',
        NOW() 
    ) ");
$_SESSION["buyer_id"] = mysqli_insert_id($link);
$result = mysqli_query($link, "SELECT * FROM `cart` WHERE `cart_ip` ='{$_SERVER['REMOTE_ADDR']}'");
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);
    do{ 
        $id_product = $row[1];
        
        mysqli_query($link, "INSERT INTO `buy_products`(buyer_id,products_id)
    VALUES (
        '$_SESSION[buyer_id]',
        '$id_product' 
    ) ");
    } while($row = mysqli_fetch_array($result));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/universe.css">
    <link rel="stylesheet" href="/css/cart_data.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="text">Заказ успешно оформлен</div>
    <div class="back"><a href="/store.php">Вернуться в магазин</a></div>
</div>
</body>
</html>