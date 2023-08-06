<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {


    define('myshop', true);
    if (isset($_GET["logout"])) {
        unset($_SESSION['auth_admin']);
        header("Location: admin.php");
    }
    require "db_connect.php";
    $all_count = mysqli_query($link, "SELECT * FROM `table_products`");
    $all_count_res = mysqli_num_rows($all_count);
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
                        <p>\</p>
                        <a href="/admin/product.php">заказы</a>
                    </div>
                </div>
                <div class="header__out"> <a class="header__out__btn" href="?logout">Выход</a></div>
            </header>
            <div class="main_contaner">
                <div class="main_contaner__menu">
                    <ul>
                        <li><a href="">Товары</a></li>
                    </ul>
                </div>
                <div class="main_contaner__content">
                    <div class="main_contaner__content__title">Товары</div>
                    <div class="score">
                        <div class="score_count">Всего товаров - <b>
                                <?php echo $all_count_res ?>
                            </b>                            
                        </div>
                        <div class="score__add"><a href="/admin/add_product.php"> Добавить товар</a></div>
                        
                    </div>
                    <div class="main_content">
                        <?php
                        $resul = mysqli_query($link, query: "SELECT * FROM `table_products`");
                        $resul = mysqli_fetch_all($resul);
                        foreach ($resul as $resul) {
                            ?>
                            <div class="product">
                                <div class="product__name">
                                    <?= $resul[1] ?>
                                </div>
                                <div class="product__img">
                                    <img src="../img/card/<?= $resul[2] ?>" alt="">
                                </div>
                                <a class="btn_product delite" href=""
                                    rel="product.php?<?php $url ?>id=<?php $row[$resul[0]] ?>&action=delite"
                                    num="<?= $resul[0] ?>" onclick="event.preventDefault()">Удалить</a>

                            </div>


                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="../js/jquery-3.6.4.min.js"></script>
    <script src="/admin/js/delite.js"></script>

    </html>
    <?php
} else {
    header("Location: admin.php");
}
?>