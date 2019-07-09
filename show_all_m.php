<meta charset="utf-8">
<?php

	require_once(__DIR__ . '/db_connection.php');

	$select_all = 'SELECT `info_about_teacher_m`.teacher_id,
												`info_about_teacher_m`.full_name,
												`info_about_teacher_m`.date_of_birth,
												`info_about_teacher_m`.subjects,
												`info_about_teacher_m`.university,
												`salary_and_experience_m`.number_of_lessons_per_week,
                                                `salary_and_experience_m`.experience,
                                                `salary_and_experience_m`.salary_per_week_uah
								 FROM `info_about_teacher_m`
								 LEFT JOIN `salary_and_experience_m` 
								 ON `info_about_teacher_m`.teacher_id = `salary_and_experience_m`.teacher_id';
	
$special_select1 = ' SELECT `salary_and_experience_m`.teacher_id,
                            `info_about_teacher_m`.full_name, 
                            `salary_and_experience_m`.experience,
                            `salary_and_experience_m`.salary_per_week_uah
                                FROM `salary_and_experience_m` 
                                LEFT JOIN `info_about_teacher_m` 
								ON `salary_and_experience_m`.teacher_id = `info_about_teacher_m`.teacher_id  ORDER BY `salary_per_week_uah`	DESC 	
								';
$special_select2 = ' SELECT                     `info_about_teacher_m`.teacher_id,
												`info_about_teacher_m`.full_name,
												`info_about_teacher_m`.date_of_birth,
  (
    (YEAR(CURRENT_DATE) - YEAR(`date_of_birth`)) -                           
    (DATE_FORMAT(CURRENT_DATE, "%m%d") < DATE_FORMAT(`date_of_birth`, "%m%d")) 
  ) AS age
FROM `info_about_teacher_m`';

$special_select3 = ' SELECT `salary_and_experience_m`.teacher_id,
                            `info_about_teacher_m`.full_name, 
                            `salary_and_experience_m`.number_of_lessons_per_week
                                FROM `salary_and_experience_m`
                                LEFT JOIN `info_about_teacher_m` 
								ON `salary_and_experience_m`.teacher_id = `info_about_teacher_m`.teacher_id 
                                WHERE `number_of_lessons_per_week`=(SELECT MAX(`number_of_lessons_per_week`)
                                FROM `salary_and_experience_m`)
								';
	$result = $pdo->query($select_all,PDO::FETCH_ASSOC);
	$special_result1 = $pdo->query($special_select1,PDO::FETCH_ASSOC);
    $special_result2 = $pdo->query($special_select2,PDO::FETCH_ASSOC);
    $special_result3 = $pdo->query($special_select3,PDO::FETCH_ASSOC);
	$array = $result->fetchAll();
	$special_array1 = $special_result1->fetchAll();
	$special_array2 = $special_result2->fetchAll();
    $special_array3 = $special_result3->fetchAll();


    echo "<h1 style='text-align:center;'>Объединенные таблицы</h1>";

	echo '<table border="1" cellpadding="5" style="border-collapse:collapse;border:1px solid black;margin:10px 0;">';
    echo '<tr>';
    echo "<th>ID учителя</th>";
    echo "<th>ФИО учителя</th>";
    echo "<th>Год рождения учителя</th>";
    echo "<th>Предметы</th>";
    echo "<th>ВУЗ</th>";
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
    echo "<h2 style='text-align:center;'>Запросы</h2>";
	echo 'Сортировка по зарплате';

	echo '<table border="1" cellpadding="5" style="border-collapse:collapse;border:1px solid black;margin:10px 0;">';
    echo '<tr>';
    echo "<th>ID учителя</th>";
    echo "<th>ФИО учителя</th>";
    echo "<th>Стаж работы</th>";
    echo "<th>Зарплата в неделю (грн)</th>";
	foreach($special_array1 as $row)
	{
		echo '<tr>';
		foreach($row as $row_2)
		{
			echo "<td>$row_2</td>";
		}
		echo '</tr>';
	}

	echo '</table>';
echo 'Определение возраста по дате рождения';

	echo '<table border="1" cellpadding="5" style="border-collapse:collapse;border:1px solid black;margin:10px 0;">';
    echo '<tr>';
    echo "<th>ID учителя</th>";
    echo "<th>ФИО учителя</th>";
    echo "<th>Год рождения</th>";
    echo "<th>Возраст</th>";
	foreach($special_array2 as $row)
	{
		echo '<tr>';
		foreach($row as $row_2)
		{
			echo "<td>$row_2</td>";
		}
		echo '</tr>';
	}

	echo '</table>';
echo '</table>';

echo 'Преподаватель у  которого наибольшее количество уроков в неделю ';

	echo '<table border="1" cellpadding="5" style="border-collapse:collapse;border:1px solid black;margin:10px 0;">';
    echo '<tr>';
    echo "<th>ID учителя</th>";
    echo "<th>ФИО учителя</th>";
    echo "<th>Количество уроков в неделю</th>";
	foreach($special_array3 as $row)
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