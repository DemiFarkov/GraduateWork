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
                        <p>\</p>
                        <a href="/admin/product.php">заказы</a>
                        <p>\</p>
                        <a>добавление товара</a>
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
                    <div class="main_contaner__content__title">Добавление товара</div>
                    <div class="main_conatnt">
                        <form action="form.php" class="form_contaner" method="POST" enctype="multipart/form-data">
                            <div class="form_contaner__set_p">
                                <label class="form_contaner__set_p__label" for="">Название</label>
                                <input class="form_contaner__set_p__input" name="form_title" type="text" required>
                            </div>
                            <div class="form_contaner__set_p">
                                <label class="form_contaner__set_p__label" for="">Страна</label>
                                <input class="form_contaner__set_p__input" name="form_country" type="text">
                            </div>
                            <div class="form_contaner__set_p">
                                <label class="form_contaner__set_p__label" for="">Цена</label>
                                <input class="form_contaner__set_p__input" name="form_price" type="number" required>
                            </div>
                            <div class="form_contaner__set_p">
                                <label class="form_contaner__set_p__label form_descriptoin__text" for="">Описание</label>
                                <textarea class="form_contaner__set_p__input form_descriptoin" name="form_description" type="text"></textarea>
                            </div>
                            <div class="form_contaner__set_p__label select_name">Вид товара</div>
                            <select name="form_category" id="">
                                <option value="1">Солнцезащитные очки</option>
                                <option value="2">Оправы для зрения</option>
                                <option value="3">Коллекционные</option>
                            </select>
                            <input type="file" class="form_contaner__file" name="up_img">
                            <input type="file" class="form_contaner__file" name="up_img2">
                            
                            <input type="submit" value="Добавить" name="add_btn" id="add_btn" class="form__submit">

                        </form>
                        <form name="form" action="" method="post">
</form>

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