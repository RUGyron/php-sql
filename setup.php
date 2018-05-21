<?php
include 'connecting.php';

$q = "CREATE table if not exists `Курсы` (
`Разряд_соискателя` int not null,
`Название_разряда` varchar (100) not null,
`Срок_получения` int not null,
`Особенности` varchar(20) not null,
`Рейтинг` int not null,
primary key (`Разряд_соискателя`)
);";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q);
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Соискатель` (
`ИД_соискателя` int auto_increment,
`Профессия_соискателя` varchar (20) not null,
`Опыт_работы_соискателя` int not null,
`ФИО_соискателя` varchar (20) not null,
`Желаемая_ЗП_соискателя` int not null,
`Разряд_соискателя` int not null,
`Даты_выплат_пособий` date not null,
`ИД_образования` int not null,
primary key (`ИД_соискателя`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Пособие` (
`Даты_выплат_пособий` date not null,
`Размер_пособия` int not null,
`Статус_пособия` varchar (20) not null,
`Особенности` varchar(20) not null,
`Рейтинг` int not null,
primary key (`Даты_выплат_пособий`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Резюме` (
`ИД_резюме` int auto_increment,
`Опыт_работы` int not null,
`Достижения_соискателя` varchar (50) not null,
`ИД_соискателя` int not null,
`Рейтинг` int not null,
primary key (`ИД_резюме`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Вакансия` (
`ИД_вакансии` int auto_increment,
`Состояние_вакансии` varchar (20)not null,
`Предоставляемая_ЗП_по_вакансии` int not null,
`Опыт_работы_соискателя` int not null,
`Образование_соискателя` varchar (20) not null,
`Профессия_соискателя` varchar (20) not null,
`ИД_работодателя` int not null,
primary key (`ИД_вакансии`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Работодатель` (
`ИД_работодателя` int auto_increment,
`Место_работы` varchar (20) not null,
`Контактное_лицо_работодателя` varchar (20) not null,
`Телефон_работодателя` bigint not null,
`Эл_адрес_работодателя` varchar (20) not null,
`ИД_описания` int not null,
primary key (`ИД_работодателя`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Трудоустройство` (
`ИД_трудоустройства` int auto_increment,
`ИД_резюме` int not null,
`ИД_вакансии` int not null,
`Статус` varchar(20) not null,
`Особенности` varchar(20) not null,
primary key (`ИД_трудоустройства`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Образование` (
`ИД_образования` int,
`Срок_обучения` int not null,
`Место_обучения` varchar(20) not null,
`Компетенция` varchar(20) not null,
`Перспектива` varchar(20) not null,
primary key (`ИД_образования`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists `Деятельность_работодателя` (
`ИД_описания` int auto_increment,
`Карткое_описание` varchar(20) not null,
`Годовой_доход` int not null,
`Колво_сотрудников` int not null,
`Кредитная_история` varchar(20) not null,
primary key (`ИД_описания`)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table `Соискатель` add foreign key (`Разряд_соискателя`) references `Курсы` (`Разряд_соискателя`), add foreign key (`Даты_выплат_пособий`) references `Пособие` (`Даты_выплат_пособий`), 
add foreign key (`ИД_образования`) references `Образование` (`ИД_образования`);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table `Резюме` add foreign key (`ИД_соискателя`) references `Соискатель` (`ИД_соискателя`);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table `Вакансия` add foreign key (`ИД_работодателя`) references `Работодатель` (`ИД_работодателя`);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table `Трудоустройство` add foreign key (`ИД_резюме`) references `Резюме` (`ИД_резюме`), add foreign key (`ИД_вакансии`) references `Вакансия` (`ИД_вакансии`);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table `Работодатель` add foreign key (`ИД_описания`) references `Деятельность_работодателя` (`ИД_описания`);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}



$q = "insert into `Курсы` values ('1', 'Начинающий', '3', 'None', '8');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Курсы` values ('2', 'Опытный', '4', 'None', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Курсы` values ('3', 'Профи', '2', 'None', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Пособие` values ('2001-03-03', '20000', 'Отказано', 'Med', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Пособие` values ('2001-01-01', '10000', 'Утверждено', 'Easy', '6');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Пособие` values ('2001-02-02', '15000', 'В процессе', 'Hard', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Образование` values ('0', '3', 'Mocsow', 'Техник', '5 лет');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Образование` values ('1', '4', 'LA', 'Слесарь', '4 года');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Образование` values ('2', '4', 'Moscow', 'Программист', '2 года');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Деятельность_работодателя` values ('1', 'Some Story1', '3000', '2000', 'med');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Деятельность_работодателя` values ('2', 'Some Story2', '36000', '2100', 'good');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Деятельность_работодателя` values ('3', 'Some Story3', '37000', '2200', 'bad');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Соискатель` values ('1', 'Техник', '5', 'Иванов В. Д.', '15000', '1', '2001-01-01', '0');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Соискатель` values ('2', 'Электрик', '6', 'Петров Д. И.', '10000', '2', '2001-03-03', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Соискатель` values ('4', 'Техник', '2', 'Марков М. М.', '20000', '2', '2001-03-03', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Работодатель` values ('1', 'workplace1', 'Jobson1', '89999999991', 'work1@mail.ru', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Работодатель` values ('2', 'workpalce2', 'Jobson2', '89999999992', 'work2@mail.ru', '2');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Работодатель` values ('3', 'workplace3', 'Jobson3', '89999999993', 'work3@mail.ru', '3');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Вакансия` values ('1', 'Открыта', '10000', '3', 'Высшее', 'Техник', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Вакансия` values ('2', 'Закрыта', '27000', '5', 'Среднее', 'Слесарь', '2');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Вакансия` values ('3', 'Закрыта', '18000', '4', 'Среднее', 'Инженер', '3');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Резюме` values ('1', '4', 'Выиграл олимпиаду в школе', '4', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Резюме` values ('2', '3', 'Защитил докторскую', '4', '8');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Резюме` values ('3', '5', 'Участвовал в хакатоне', '2', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into `Трудоустройство` values ('1', '1', '3', 'В процессе', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Трудоустройство` values ('2', '3', '3', 'Одобрено', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into `Трудоустройство` values ('3', '3', '3', 'Отказано', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_connect_errno($link).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
mysqli_close($link);
?>
