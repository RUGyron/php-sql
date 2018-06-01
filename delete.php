<?php

include "connecting.php";

$id_worker = $_GET['id_worker'];

$q = "DELETE from Worker WHERE id_worker = '$id_worker';";
$q1 = "delete from Education where id_education = 2;";

$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q);
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

header('location: ./list.php');