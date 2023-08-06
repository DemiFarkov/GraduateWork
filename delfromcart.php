<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("db_connect.php");
    
    $result = mysqli_query($link,"SELECT * FROM `cart` WHERE `cart_ip` = '{$_SERVER['REMOTE_ADDR']}'");    
    $result = mysqli_query($link,"DELETE FROM cart WHERE `cart`.`cart_id` = $_POST[id]");

}?>