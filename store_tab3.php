<?php require "db_connect.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/universe.css">
    <link rel="stylesheet" href="/css/store.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Каталог</title>
</head>

<body>
    <div class="main_container">


        <a href="/cart.php" class="cart  popup-link basket"></a>
        <?php require "parts_of_the_site/header.php" ?>
        <div class="parallax_1">
            <div class="parallax_1__image">
                <h1>
                    Когда Бог создавал человека, очки ещё не были изобретены, но посмотрите, где он поместил наши уши!
                </h1>
                <div class="mask_1"></div>
            </div>
        </div>
        <div class="title_site">
            <h1 class="title_site__title store_title">
                Каталог
            </h1>
            <h3 class="title_site__subtitle">
                Каждая модель представлена в единственном экземпляре
            </h3>
        </div>
        <div class="select_menu">
            <div class="sort_select"> <a class="sort_select__button" href="" id="sort_select"
                    onclick="event.preventDefault()"><span id="sort_an">Солнцезащитные очки</span></a></div>
            <div class="sort" id="sort">
                <a class="sort__container__text" >Солнцезащитные очки</a>
                <a href="/store_tab2.php" class="sort__container__text">Оправы для зрения</a>
                <a href="/store_tab3.php" class="sort__container__text" style="background: #d7afaf;">Коллекционные</a>
            </div>
        </div>
        <div class="grid_store">
            <?php
            $resul = mysqli_query($link, query: "SELECT * FROM `table_products`");
            $resul = mysqli_fetch_all($resul);
            foreach ($resul as $resul) {
                if ($resul[11] == "collectible") {
                    ?>
                    <div class="grid_store__card grid_store__card1">
                        <a href="description.php?id=<?= $resul[0] ?>">
                            <div class="grid_store__card__image1">
                                <img class="grid_store__card__image grid_store__card__image1" src="img/card/<?= $resul[2] ?>"
                                    alt="">
                                <img class="grid_store__card__image grid_store__card__image2" src="img/card/<?= $resul[3] ?>"
                                    alt="">
                            </div>

                            <div class="grid_store__card_name"><b>
                                    <?= $resul[1] ?>
                                </b></div>
                            <div class="grid_store__card_country">
                                <?= $resul[6] ?>
                            </div>
                            <div class="grid_store__card_price">
                                <?= group_umerals($resul[4]) ?> р.
                            </div>
                            <?php if ($resul[5] != 0) { ?>
                                <div class="description__text__old_price">
                                    <s>
                                        <?= group_umerals($resul[5]) ?> р.
                                    </s>
                                </div>
                            <?php } ?>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
        <?php require "parts_of_the_site/footer.php" ?>
    </div>

    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/store_menu.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>

