<?php

include "connecting.php";

if(isset($_GET['button']))
{
	$proffesion = $_GET['proffesion'];
	$experience = $_GET['experience'];
	$full_name = $_GET['full_name'];
	$wanted_salary = $_GET['wanted_salary'];
	$level = $_GET['level'];
	$dates = $_GET['dates'];
	$id_education = $_GET['id_education'];

	$q = "INSERT INTO Worker (proffesion, experience, full_name, wanted_salary, level, dates, id_education) 
	VALUES ('$proffesion', $experience, '$full_name', $wanted_salary, $level, '$dates', $id_education);";
	
	$res = mysqli_query($link, $q);
	header("location: ./list.php");
}
?>

<html><head><title>Добавление записи в БД</title></head>
<body>
<form action = 'add.php' method = 'get'>
	<h2><i> Добавить запись </i></h2>
	<P> ФИО: <input name = 'full_name' type = 'text'>
	<P> Опыт работы: <input name = 'experience' type = 'text'>
	<P> Профессия: <input name = 'proffesion' type = 'text'>
	<P> Предпочитаемая зар. плата: <input name = 'wanted_salary' type = 'text'>
	<P> Разряд: <select name="level">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
	<P> Даты выплат пособий: <select name="dates">
								<option value="2001-01-01">2001-01-01</option>
								<option value="2001-02-02">2001-02-02</option>
								<option value="2001-03-03">2001-03-03</option>
							</select>
	<P> Ид образования: <select name="id_education">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
	<p><input name = 'button' type = 'submit'>
</form>
</body>