<?php
	require_once(__DIR__ . '/db_connection.php');

	$teacher_id   = (int) $_POST['teacher_id'];
	$number_of_lessons_per_week  = (int) $_POST['number_of_lessons_per_week'];
	$experience  =  $_POST['experience'];
	$salary_per_week_uah = (int) $_POST['salary_per_week'];


	if(!$number_of_lessons_per_week || !$experience|| !$salary_per_week_uah)
		{
			echo 'Please fulfill all fieds with *<br />';
			if(!$number_of_lessons_per_week) echo 'Вы не ввели количество уроков в неделю <br />';
			if(!$experience) echo 'Вы не ввели опыт работы <br />';
			if(!$salary_per_week_uah) echo 'Вы не ввели зарплату в неделю <br />';
			die;
		}
		
	$sql_insert = 'INSERT INTO salary_and_experience_m (teacher_id,number_of_lessons_per_week,experience,salary_per_week_uah) 
								 VALUES (:teacher_id,:number_of_lessons_per_week,:experience,:salary_per_week_uah)';
	$sth = $pdo->prepare($sql_insert);
	$sth->execute([':teacher_id' => $teacher_id,':number_of_lessons_per_week' => $number_of_lessons_per_week,':experience' => $experience,':salary_per_week_uah' => $salary_per_week_uah]);
	echo 'Информация успешно передана в базу данных';
?>