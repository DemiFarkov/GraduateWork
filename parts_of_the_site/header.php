<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/header.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div class="header_container">
            <div class="header_logo">
                <a href="/index.php" class="header_logo_link">
                    Glasses-Motive
                </a>
            </div>
            <div class="header_container__burger"> <a class="header_container__burger__button" href="" onclick="event.preventDefault()" ><span id="menu_an"></span></a></div>
            <div class="header_menu" id="menu">
                <ul class="header_menu_list">
                    
                    <li> <a href="/store.php"> Каталог </a></li>
                    <li> <a href="/about.php"> О бренде </a></li>
                    <li> <a href="/ambassador.php"> Амбассадорство </a></li>
                    <li> <a href="/refund.php"> Гарантии и возврат </a></li>
                    <li> <a href="/faq.php"> FAQ </a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/js/header_menu.js"></script>
</body>

</html>