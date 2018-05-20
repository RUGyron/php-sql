<html>
	<head>
		<title>Фильтр БД</title>
	</head>
	<body>
		<form action = 'search.php' method = 'get'>
		<table align = 'center'>
		<tr><td>ФИО [Соискатель]: <input name = 'form_1' type = 'text' value='<?=@$_GET['form_1']?>'></td></tr>
		<tr><td>Срок Обучения [Образование]: <input name = 'form_2' type = 'text' value='<?=@$_GET['form_2']?>'></td></tr>
		<tr><td><input type = 'submit' name = 'button' align = 'center'></td></tr>
		<br/>
		</table>
		</form>
	</body>
</html>

<?php
include 'connecting.php';

$q = 'SELECT * from Соискатель;';
$table = mysqli_query($link, $q);
echo "<h2 align='center'>Соискатель<h2>";
echo "<table border = 1 align=center><tr>
	<td>ИД_Соискателя</td>
	<td>Профессия_соискателя</td>
	<td>Опыт_работы_соискателя</td>
	<td>ФИО_соискателя</td>
	<td>желаемая_ЗП_соискателя</td>
	<td>Разряд_соискателя</td>
	<td>Даты_выплат_пособий</td>
	<td>ИД_образования</td>
	</tr>";

while($row = mysqli_fetch_array($table)) {
			echo "<tr>
			<td>".$row['ИД_соиcкателя']."</td>
			<td>".$row['Профессия_соискателя']."</td>
			<td>".$row['Опыт_работы_соискателя']."</td>
			<td>".$row['ФИО_соискателя']."</td>
			<td>".$row['Желаемая_ЗП_соискателя']."</td>
			<td>".$row['Разряд_соискателя']."</td>
			<td>".$row['Даты_выплат_пособий']."</td>
			<td>".$row['ИД_образования']."</td>
			</tr>";
}
	echo "</table><br>";

$q = 'SELECT * from Образование;';
$table = mysqli_query($link, $q);
echo "<h2 align='center'>Образование<h2>";
echo "<table border = 1 align=center><tr>
	<td>ИД_образования</td>
	<td>Срок_обучения</td>
	<td>Место_обучения</td>
	<td>Компетенция</td>
	<td>Перспектива</td>
	</tr>";

while($row = mysqli_fetch_array($table)) {
			echo "<tr>
			<td>".$row['ИД_образования']."</td>
			<td>".$row['Срок_обучения']."</td>
			<td>".$row['Место_обучения']."</td>
			<td>".$row['Компетенция']."</td>
			<td>".$row['Перспектива']."</td>
			</tr>";
}
	echo "</table><br>";

if(isset($_GET['button']))
{
	$form_1 = strtr(trim($_GET['form_1']), '*', '%');
	$form_2 = strtr(trim($_GET['form_2']), '*', '%');
	$q = "SELECT Соискатель.ФИО_соискателя, Образование.Срок_обучения FROM Соискатель JOIN Образование
		ON Соискатель.ИД_Образования = Соискатель.ИД_Образования
		 WHERE  Соискатель.ФИО_соискателя LIKE '%" . $form_1 . "%' ";
	if (!empty($form_2)) {
			$q .= "AND Образование.Срок_обучения LIKE '%" . $form_2 . "%'";
	}
	
	$table = mysqli_query($link, $q);
	echo "<table border = 1 align=center><tr><td>ФИО</td><td>Срок</td></tr>";
	
	while($row = mysqli_fetch_array($table)) {
			echo "<tr><td>" . $row['ФИО_соискателя'] . "</td><td>" . $row['Срок_обучения'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($link);
}
