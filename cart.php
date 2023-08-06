<?php require "db_connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/universe.css">
    <link rel="stylesheet" href="/css/cart.css">
    <title>Корзина</title>
</head>

<body>
    <?php require "parts_of_the_site/header.php" ?>
    <div class="cart_container">
        <h1 class="popup_title">Ваш заказ</h1>
        <div id="popup" class="popup">
            <div class="cart__body">
                <?php
                $price = 0;
                $resul = mysqli_query($link, query: "SELECT * FROM `cart`  WHERE '{$_SERVER['REMOTE_ADDR']}'  = `cart_ip`");
                $resul = mysqli_fetch_all($resul);
                foreach ($resul as $resul) {
                    $res = mysqli_query($link, "SELECT * FROM `table_products` WHERE `products_id` = $resul[1]");
                    $row = mysqli_fetch_array($res);
                    $price = $price + $row[4]
                        ?>

                    <div class="product_container product_container_<?= $resul[0] ?>">

                        <div class="product_container__img"><img src="/img/card/<?= $row[2] ?>" alt=""></div>
                        <div class="product_container_description">
                            <div class="product_container__name">
                                <?= $row[1] ?>
                            </div>
                            <div class="product_container__price" id="thisp<?= $resul[0] ?>" thisprice="<?= $row[4] ?>">
                                <?= group_umerals($row[4]) ?> .р
                            </div>
                        </div>
                        <p>
                            <a href="" class="product_container__del" onclick="event.preventDefault()"
                                dele="<?= $resul[0] ?>"></a href="">
                        </p>

                    </div>
                    <?php
                } ?>
                <script>
                    //Определяется переменная, которая будет доступна для 
                    // всех JavaScript, подключаемых на данной странице
                    var js_price = '<?php echo $price; ?>';
                </script>

                <div class="product_container__finish_price">
                    Итоговая стоимость:
                    <p price="<?= $price ?>" name="name"><?= group_umerals($price) ?>
                    <nav> .р</nav>

                </div>
                <form action="cart_data.php" class="form" method="POST">
                    <input type="text" placeholder="Дмитрий Фарков" class="form__text_name" name="buyer_name" required>
                    <input type="tel" placeholder="79541247756"  class="form__tel" name="buyer_tel" maxlength="11" required>
                    <input type="email" placeholder="Your_mail@mail.ru"  class="form__tel" name="buyer_tel" required>
                    <textarea placeholder="Красноярск, ул.Борисова, д.24, кв. 623" name="buyer_address" id="" cols="30" rows="10"
                        class="textarea" required></textarea>

                    <input type="submit" value="Оформить заказ" class="form__submit">


                </form>




            </div>
        </div>
    </div>
    <?php require "parts_of_the_site/footer.php" ?>
</body>
<script src="/js/jquery-3.6.4.min.js"></script>
<script src="/js/del.js"></script>

</html>