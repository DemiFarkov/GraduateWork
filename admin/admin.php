<?php
session_start();
define('myshop', true);
require "db_connect.php";
$msgerror = "";
if (isset($_POST["submit_enter"])) {
    $login = $_POST["input_login"];
    $pass = $_POST["input_pass"];

    $result = mysqli_query($link, "SELECT * FROM `admins` WHERE `login` = '$login' AND `pass` = '$pass'");
    $msgerror = "";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['auth_admin'] = 'yes_auth';
        header('Location: index_admin.php');
    } else {
        $msgerror = "Не верный логин и/или пароль";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/admin.css">
    <link rel="stylesheet" href="/css/reset.css">
    <title>Document</title>
</head>

<body>
    <div class="login_container">
        
        <div class="login_container__form">
<?php
        if ($msgerror) {
            echo '<div id="msgerror">' . $msgerror . '</div>';
        }
        ?>
            <form action="" method="POST" class="form">
                <div class="form_contaner">
                    <div class="form_contaner__set_p">
                        <label class="form_contaner__set_p__label" for="">login</label>
                        <input class="form_contaner__set_p__input" type="text" id="login" name="input_login" required>
                    </div>
                    <div class="form_contaner__set_p">
                        <label class="form_contaner__set_p__label" for="password">password</label>
                        <input class="form_contaner__set_p__input" type="password" id="password" name="input_pass"
                            required>
                    </div>
                    <p><input type="submit" class="submit" value="Войти" name="submit_enter"></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>