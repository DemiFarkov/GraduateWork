<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {


    define('myshop', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: admin.php");
    }
    require "db_connect.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/admin/css/index_admin.css">
        <link rel="stylesheet" href="/css/reset.css">
        <title>Document</title>
    </head>

    <body>
        <div class="admin_container">
            <header class="header">
                <div class="set_header">
                    <div class="set_header__logo">Glasses-Motive. Панель управления</div>
                    <div class="set_header__main">
                        <a class="header__main__btn" href="index_admin.php">Главная</a>
                        <p>/</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="header__out"> <a class="header__out__btn" href="?logout">Выход</a></div>
            </header>
            <div class="main_contaner">
                <div class="main_contaner__menu">
                    <ul>
                        <li><a href="/admin/product.php">Товары</a></li>
                    </ul>
                </div>
                <div class="main_contaner__content">
                    <div class="main_contaner__content__title">Общая статистика</div>
                    <div class="main_conatnt">
                        <div class="main_conatnt__title">Статистика продаж</div>
                        <?php
                        $resul = mysqli_query($link, query: "SELECT * FROM `buyer`");
                        $resul = mysqli_fetch_all($resul);
                        foreach ($resul as $resul) {
                            $price = 0;
                            ?>
                            <div class="buyer_container">
                                <div class="buyer_container__name"> Имя:
                                    <?= $resul[1] ?>
                                </div>
                                <div class="buyer_container__tel"> Телефон:
                                    <?= $resul[2] ?>
                                </div>
                                <div class="buyer_container__address">Адрес:
                                    <?= $resul[3] ?>
                                </div>
                            </div>
                            <?php
                            $i = $resul[0];
                            $res = mysqli_query($link, query: "SELECT * FROM `buy_products` WHERE `buyer_id` = $i");
                            $res = mysqli_fetch_all($res);
                            foreach ($res as $res) {

                                $pro_id = $res[2];
                                $re = mysqli_query($link, query: "SELECT * FROM `table_products` WHERE `products_id` = $pro_id");
                                $re = mysqli_fetch_all($re);
                                foreach ($re as $re) {
                                    $price = $price + $re[4];
                                    ?>

                                    <div class="products_container">
                                        <div class="products_container__img">
                                            <img src="../img/card/<?= $re[2] ?>" alt="">
                                        </div>
                                        <div class="products_container__name">
                                            <?= $re[1] ?>
                                        </div>
                                        <div class="products_container__price">
                                            <?= group_umerals($re[4]) ?> .р
                                        </div>
                                    </div>
                                    
                                    <?php
                                }

                            } ?>
                            <div class="finish_price">
                                
                                <p price="<?= $price ?>" name="name">Итоговая стоимость: <?= group_umerals($price) ?> .р</p>                                
                            </div>
                            <?php
                        } ?>


                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header("Location: admin.php");
}
?>