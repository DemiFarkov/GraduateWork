<?php
$db_host = 'localhost';
$db_user = 'admin';
$db_pass = '123456';
$db_database = 'db_shop';

$link = new mysqli($db_host, $db_user, $db_pass, $db_database);
if (mysqli_connect_errno())
    echo "Подключение невозможно: " . mysqli_connect_error();
?>

<?php
function group_umerals($int)
{    
    $number = number_format($int, 0, ',', ' ');
    return $number;
}
?>