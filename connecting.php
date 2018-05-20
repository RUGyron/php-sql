<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'k3140_pvd';

$link = mysqli_connect($host, $user, $password, $db) or die('Ошибка соединения: '.mysqli_connect_errno());
if ($link) {echo 'Успешное подключение<br><br>';}

$q = 'use k3140_pvd;';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}