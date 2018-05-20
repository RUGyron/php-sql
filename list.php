<?php
include 'connecting.php';

$q = "SELECT new_table.ФИО_Соискателя, new_table.Компетенция, new_table.Название_разряда 
from (select Курсы.Название_разряда, Соискатель.ФИО_Соискателя, Образование.Компетенция
from Курсы inner join Соискатель
on Курсы.Разряд_соискателя=Соискатель.Разряд_соискателя
inner join Образование on Соискатель.ИД_образования=Образование.ИД_Образования) as new_table
where new_table.Название_разряда='Опытный';";

$table = mysqli_query($link, $q);
echo "<table border = 1 align=center> <tr> <th> ФИО_Соискателя </th> <th> Компетенция </th> <th> Название_разряда </th> </tr>";
while($row = mysqli_fetch_array($table)) {
	echo "<tr><td>" . $row['ФИО_Соискателя']. "</td><td>" . $row['Компетенция'] . "</td><td>" . $row['Название_разряда'] . "</td></tr>";
}
echo "</table>";
mysqli_close($link);