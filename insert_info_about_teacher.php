<?php
	require_once(__DIR__ . '/db_connection.php');

	$teacher_id   = (int) $_POST['teacher_id'];
	$full_name  = $_POST['full_name'];
	$date_of_birth  =  $_POST['date_of_birth'];
	$subjects = $_POST['subjects'];
	$university = $_POST['university'];

	if(!$full_name || !$date_of_birth || !$subjects || !$university)
		{
			echo 'Пожалуйста, заполните все поля со *<br />';
			if(!$full_name) echo 'Вы не ввели ФИО <br />';
			if(!$date_of_birth) echo 'Вы не ввели дату рождения <br />';
			if(!$subjects ) echo 'Вы не ввели предметы <br />';
			if(!$university) echo 'Вы не ввели ВУЗ <br />';
			die;
		}
		
	$sql_insert = 'INSERT INTO info_about_teacher (teacher_id,full_name,date_of_birth,subjects,university   ) 
								 VALUES (:teacher_id,:full_name,:date_of_birth,:subjects,:university)';
	$sth = $pdo->prepare($sql_insert);
	$sth->execute([':teacher_id' => $teacher_id,':full_name' => $full_name,':date_of_birth' => $date_of_birth,':subjects' => $subjects,':university' => $university]);
	echo 'Информация успешно передана в базу данных';
?>