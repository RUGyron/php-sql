<?php
include 'connecting.php';

$q = "CREATE table if not exists Courses (
level int not null,
name varchar (100) not null,
duration int not null,
points varchar(20) not null,
rating int not null,
primary key (level)
);";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q);
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Worker (
id_worker int auto_increment,
proffesion varchar (20) not null,
experience int not null,
full_name varchar (20) not null,
wanted_salary int not null,
level int not null,
dates date not null,
id_education int not null,
primary key (id_worker)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Posobie (
dates date not null,
amount int not null,
status varchar (20) not null,
points varchar(20) not null,
rating int not null,
primary key (dates)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists CV (
id_CV int auto_increment,
experience_of_jobs int not null,
achievments varchar (50) not null,
id_worker int not null,
rating int not null,
primary key (id_CV)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Vacancy (
id_vacancy int auto_increment,
status varchar (20)not null,
salary int not null,
experience int not null,
education_worker varchar (20) not null,
proffesion varchar (20) not null,
id_employee int not null,
primary key (id_vacancy)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Employee (
id_employee int auto_increment,
placement varchar (20) not null,
full_name varchar (20) not null,
phone_number bigint not null,
email varchar (20) not null,
id_activity int not null,
primary key (id_employee)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Work_in_proccess (
id_work_in_proccess int auto_increment,
id_CV int not null,
id_vacancy int not null,
status varchar(20) not null,
points varchar(20) not null,
primary key (id_work_in_proccess)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Education (
id_education int,
duration int not null,
placement varchar(20) not null,
competence varchar(20) not null,
perspective varchar(20) not null,
primary key (id_education)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}


$q = 'CREATE table if not exists Activity_employee (
id_activity int auto_increment,
describtion varchar(20) not null,
year_profit int not null,
amount_of_workers int not null,
credit_history varchar(20) not null,
primary key (id_activity)
);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table Worker add foreign key (level) references Courses (level), add foreign key (dates) references Posobie (dates), 
add foreign key (id_education) references Education (id_education);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table CV add foreign key (id_worker) references Worker (id_worker);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table Vacancy add foreign key (id_employee) references Employee (id_employee);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table Work_in_proccess add foreign key (id_CV) references CV (id_CV), add foreign key (id_vacancy) references Vacancy (id_vacancy);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = 'ALTER table Employee add foreign key (id_activity) references Activity_employee (id_activity);';
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}



$q = "insert into Courses values ('1', 'beginner', '3', 'None', '8');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Courses values ('2', 'medium', '4', 'None', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Courses values ('3', 'profi', '2', 'None', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Posobie values ('2001-03-03', '20000', 'forbidden', 'Med', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Posobie values ('2001-01-01', '10000', 'OK', 'Easy', '6');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Posobie values ('2001-02-02', '15000', 'in proccess', 'Hard', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Education values ('0', '3', 'Mocsow', 'technic', '5');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Education values ('1', '4', 'LA', 'slesar', '4');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Education values ('2', '4', 'Moscow', 'Programmer', '2');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Activity_employee values ('1', 'Some Story1', '3000', '2000', 'med');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Activity_employee values ('2', 'Some Story2', '36000', '2100', 'good');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Activity_employee values ('3', 'Some Story3', '37000', '2200', 'bad');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Worker values ('1', 'technic', '5', 'Ivanov', '15000', '1', '2001-01-01', '0');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Worker values ('2', 'Электрик', '6', 'Petrov', '10000', '2', '2001-03-03', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Worker values ('4', 'technic', '2', 'Markov', '20000', '2', '2001-03-03', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Employee values ('1', 'workplace1', 'Jobson1', '89999999991', 'work1@mail.ru', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Employee values ('2', 'workpalce2', 'Jobson2', '89999999992', 'work2@mail.ru', '2');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Employee values ('3', 'workplace3', 'Jobson3', '89999999993', 'work3@mail.ru', '3');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Vacancy values ('1', 'open', '10000', '3', 'high', 'technic', '1');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Vacancy values ('2', 'closen', '27000', '5', 'medium', 'slesar', '2');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Vacancy values ('3', 'closen', '18000', '4', 'medium', 'enginier', '3');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into CV values ('1', '4', 'won olimpiad in the school', '4', '9');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into CV values ('2', '3', 'passed the doctor work', '4', '8');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into CV values ('3', '5', 'took part in Hackaton', '2', '7');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
$q = "insert into Work_in_proccess values ('1', '1', '3', 'in proccess', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Work_in_proccess values ('2', '3', '3', 'OK', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}

$q = "insert into Work_in_proccess values ('3', '3', '3', 'forbidden', 'None');";
$res = mysqli_query($link, $q) or die('Ошибка запроса ('.mysqli_error($q).'): '.$q.'<br><br>');
if($res)
{
    echo "Выполнение запроса '$q' прошло успешно<br><br>";
}
//--------------------
mysqli_close($link);
?>
