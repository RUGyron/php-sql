<html>
<body>
	<form action = 'edit.php' method = 'get'>
	<table>
	<tr><th><i>Значение:</i></th></tr>
	<tr><td><b>id_worker:</b></td><td><input name = 'id' type = 'hidden' value='<?=$_GET['id_worker']?>'></td></tr>
	<tr><td><b>ФИО_Соискателя:</b></td><td><input name = 'form_1' type = 'text' value='<?=$_GET['form_1']?>'></td></tr>
	<tr><td><b>Компетенция:</b></td><td><input name = 'form_2' type = 'text' value='<?=$_GET['form_2']?>'></td></tr>
	<tr><td><b>Название_разряда:</b></td><td><input name = 'form_3' type = 'text' value='<?=$_GET['form_3']?>'></td></tr>
	</table>
	<br/>
	<input type = 'submit' name = 'button'>
	</form>
</body>
</html>

<?php
include 'connecting.php';

$form_1 = strtr(trim(@$_GET['form_1']), '*', '%');
$form_2 = strtr(trim(@$_GET['form_2']), '*', '%');
$form_3 = strtr(trim(@$_GET['form_3']), '*', '%');
$id_worker = strtr(trim(@$_GET['id']), '*', '%');

if(isset($_GET['button']))
{
	if (!empty($form_1)){
		$query = "UPDATE Worker
		SET Worker.full_name ='$form_1'
		WHERE Worker.id_worker ='$id_worker';";
		$result = mysqli_query($link, $query) or die("form_1: ".mysqli_error($query));
	}
	if (!empty($form_2)){	
		$query = "UPDATE Education
		SET Education.competence ='$form_2'
		where Education.id_education = (select Worker.id_education from Worker WHERE Worker.id_worker ='$id_worker');";
		$result = mysqli_query($link, $query) or die("form_2: ".mysqli_error($query));
	}
	if (!empty($form_3)){
		$query = "UPDATE Courses
		SET Courses.name ='$form_3'
		where Courses.level = (select Worker.level from Worker WHERE Worker.id_worker ='$id_worker');";
		$result = mysqli_query($link, $query) or die("form_3: ".mysqli_error($query));
	}
	header('location: ./list.php'); 
}
?>