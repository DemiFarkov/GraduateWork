<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("db_connect.php");
    $result = mysqli_query($link,"SELECT * FROM `cart` WHERE `cart_ip` = '{$_SERVER['REMOTE_ADDR']}' AND `cart_id_products` = $_POST[id]");
    if (mysqli_num_rows($result) == 0)
    {
        $result = mysqli_query($link,"SELECT * FROM `table_products` WHERE `products_id` = $_POST[id]");
        $row = mysqli_fetch_array($result);
        $ip = $_SERVER['REMOTE_ADDR'];
            mysqli_query($link,"INSERT INTO cart(cart_id_products,cart_price,cart_ip) VALUES($row[0],$row[4],'$ip')");
            

            
    }
}
?>