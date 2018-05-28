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

$q = 'SELECT * from Worker;';
$table = mysqli_query($link, $q);
echo "<h2 align='center'>Соискатель<h2>";
echo "<table border = 1 align=center><tr>
	<td>id_worker</td>
	<td>proffesion</td>
	<td>experience</td>
	<td>full_name</td>
	<td>wanted_salary</td>
	<td>level</td>
	<td>dates</td>
	<td>id_education</td>
	</tr>";

while($row = mysqli_fetch_array($table)) {
			echo "<tr>
			<td>".$row['id_worker']."</td>
			<td>".$row['proffesion']."</td>
			<td>".$row['experience']."</td>
			<td>".$row['full_name']."</td>
			<td>".$row['wanted_salary']."</td>
			<td>".$row['level']."</td>
			<td>".$row['dates']."</td>
			<td>".$row['id_education']."</td>
			</tr>";
}
	echo "</table><br>";

$q = 'SELECT * from Education;';
$table = mysqli_query($link, $q);
echo "<h2 align='center'>Образование<h2>";
echo "<table border = 1 align=center><tr>
	<td>id_education</td>
	<td>duration</td>
	<td>placement</td>
	<td>competence</td>
	<td>perspective</td>
	</tr>";

while($row = mysqli_fetch_array($table)) {
			echo "<tr>
			<td>".$row['id_education']."</td>
			<td>".$row['duration']."</td>
			<td>".$row['placement']."</td>
			<td>".$row['competence']."</td>
			<td>".$row['perspective']."</td>
			</tr>";
}
	echo "</table><br>";

if(isset($_GET['button']))
{
	$form_1 = strtr(trim($_GET['form_1']), '*', '%');
	$form_2 = strtr(trim($_GET['form_2']), '*', '%');
	$q = "SELECT Worker.full_name, Education.duration FROM Worker JOIN Education
		ON Worker.id_education = Worker.id_education
		 WHERE  Worker.full_name LIKE '%" . $form_1 . "%' ";
	if (!empty($form_2)) {
			$q .= "AND Education.duration LIKE '%" . $form_2 . "%'";
	}
	
	$table = mysqli_query($link, $q);
	echo "<table border = 1 align=center><tr><td>ФИО</td><td>Срок</td></tr>";
	
	while($row = mysqli_fetch_array($table)) {
			echo "<tr><td>" . $row['full_name'] . "</td><td>" . $row['duration'] . "</td></tr>";
	}
	echo "</table>";
	mysqli_close($link);
}
