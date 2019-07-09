<meta charset="utf-8">
<?php
require_once(__DIR__ . '/db_connection.php');
	echo "<h1 style='text-align:center;'>Зарплата и опыт</h1>";
	$select_all = 'SELECT * FROM `salary_and_experience`';

	$result = $pdo->query($select_all,PDO::FETCH_ASSOC);
	$array = $result->fetchAll();
	echo '<table border="1" cellpadding="5" style="border-collapse:collapse;border:1px solid black;margin:10px 0;">';
echo '<tr>';
echo "<th>ID учителя</th>";
echo "<th>Количество уроков в неделю</th>";
echo "<th>Стаж работы</th>";
echo "<th>Зарплата в неделю (грн)</th>";
	foreach($array as $row)
	{
		echo '<tr>';
		foreach($row as $row_2)
		{
			echo "<td>$row_2</td>";
		}
		echo '</tr>';
	}

	echo '</table>';
	?>