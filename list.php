<?php
include 'connecting.php';

$q = "SELECT *
from (select Courses.name, Worker.full_name, Education.competence, Worker.id_worker
from Courses inner join Worker
on Courses.level=Worker.level
inner join Education on Worker.id_education=Education.id_education) as new_table
where new_table.name='medium';";

$table = mysqli_query($link, $q);

echo "<table border = 1 align=center> <tr> <th> ФИО_Соискателя </th> <th> Компетенция </th> <th> Название_разряда </th> <th>Редактировать</th> <th>Удалить</th> </tr>";
while($row = mysqli_fetch_array($table)) {
	echo "<tr>
	<td>" . $row['full_name']. "</td>
	<td>" . $row['competence'] . "</td>
	<td>" . $row['name'] . "</td>
	<td align='center'><a href = '/edit.php?=". $row['id_worker'] . "'><img src='https://www.download3k.ru/icons/Notepad-192284.png?v=1'></a></td>
	<td align='center'><a href = '/delete.php?id_worker=". $row['id_worker'] . "'><img src='http://www.advanceduninstaller.com/a6072e1ef2e728097ebd0a4695ab3132-icon.ico'></a></td>
	</tr>";
}
echo "</table>";
mysqli_close($link);
