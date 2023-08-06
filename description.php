<?php
require "db_connect.php";
$id = $_GET["id"];
?>
<?php
$resu = mysqli_query($link, query: "SELECT * FROM `cart`  WHERE '{$_SERVER['REMOTE_ADDR']}'  = `cart_ip`");
$resu = mysqli_num_rows($resu);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/universe.css">
    <link rel="stylesheet" href="/css/description.css">
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/main.js"></script>
    <title>Просмотр</title>
</head>

<body>
    <a href="/cart.php" class="cart  popup-link basket">
    </a>
    <a href="javascript:history.back()" class="description__back">Назад</a>
    <div class="description">
        <?php
        $resul = mysqli_query($link, query: "SELECT * FROM `table_products` WHERE products_id='$id'");
        $resul = mysqli_fetch_all($resul);
        foreach ($resul as $resul) {
            ?>
            <div class="description__slider">

                <div class="description__slider__img_container">
                    <img class="description__slider__image description__slider__image1" src="img/card/<?= $resul[2] ?>"
                        alt="">
                </div>
                <div class="description__slider__img_container">
                    <img class="description__slider__image description__slider__image2" src="img/card/<?= $resul[3] ?>"
                        alt="">
                </div>


            </div>

            <div class="description__text">
                <div class="description__text__title">
                    <?= $resul[1] ?>
                </div>
                <div class="description__text__price">
                    <?= group_umerals($resul[4]) ?> р.
                </div>
                <!-- вывод цены не по скидке (если есть скидка) -->
                <?php if ($resul[5] != 0) { ?>
                    <div class="description__text__old_price">
                        <s>
                            <?= group_umerals($resul[5]) ?> р.
                        </s>
                    </div>
                <?php } ?>
                <button onclick="clickMe()" class="description__text__btn add_to_cart" name="add_to_cart"
                    tid="<?= $resul[0] ?>">Добавить в корзину</button>
                <div class="description__text__main">
                    <?= $resul[9] ?>
                </div>
                <div class="description__text__delivery">Бесплатная доставка по России и СНГ</div>
            </div>
            <?php
        } ?>
    </div>
    </div>
    <?php require "parts_of_the_site/footer.php" ?>
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>