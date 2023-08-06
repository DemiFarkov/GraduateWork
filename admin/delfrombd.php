<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("db_connect.php");
    
    $result = mysqli_query($link,"SELECT * FROM `table_products`");    
    $result = mysqli_query($link,"DELETE FROM `table_products` WHERE `table_products`.`products_id` = $_POST[num]");

    
}?>


