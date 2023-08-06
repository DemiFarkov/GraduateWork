<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
    include("db_connect.php");
$form_category = $_POST['form_category'];
$result = mysqli_query($link, "SELECT * FROM `category` WHERE id=$form_category");
$row = mysqli_fetch_array($result);
$selectcat = $row[1];
$form_title = $_POST['form_title'];
$form_price = $_POST['form_price'];
$form_country = $_POST['form_country'];
$form_description = $_POST['form_description'];

mysqli_query($link, "INSERT INTO `table_products`(title,price,country,main_description,category_product)
    VALUES (
        '$form_title',
        '$form_price',
        '$form_country',
        '$form_description',
        '$selectcat'      
    ) ");
$id = mysqli_insert_id($link);

$uploadaddir = '../img/';
$newfilename = $_POST["form_title"] . $id . rand(1, 100) . ".jpg";
$newfilename_2 = $_POST["form_title"] . $id . rand(1, 100) . ".jpg";
$uploadfile = $uploadaddir . $newfilename;
$uploadfile_2 = $uploadaddir . $newfilename_2;


if (move_uploaded_file($_FILES['up_img']['tmp_name'], $uploadfile)) {
    $update = mysqli_query($link, "UPDATE `table_products` SET image_1='$uploadfile' WHERE `table_products`.`products_id` = '$id'");
}
if (move_uploaded_file($_FILES['up_img2']['tmp_name'], $uploadfile_2)) {
    $update = mysqli_query($link, "UPDATE `table_products` SET image_2='$uploadfile_2' WHERE `table_products`.`products_id` = '$id'");
}
echo 'Товар успешно добавлен';
?>