<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<style>
		input{
			display:block;
			margin:20px 0;
			height:40px;
			width:230px;
			border-radius:7px;
			border-color:blue;
			font-size:14px;
		}
		input[type="submit"]{
			margin-left:65px;
			display:block;
			width:100px;
			height:40px;
			font-size:14px;
			border-radius:5px;
		}
	</style>
	<?php
		include (__DIR__ . '/show_salary_and_experience.php');
	?>
	<div>
		<p>Поля со * обязательные</p>
			<form action="insert_salary_and_experience.php" method="POST">
				<input type="number" name="teacher_id" placeholder="ID учителя*">
				<input type="number" name="number_of_lessons_per_week" placeholder="Количество уроков в неделю*">
				<input type="text" name="experience" placeholder="Опыт работы*">
				<input type="number" name="salary_per_week" placeholder="Зарплата в неделю*">
				<input type="submit" value="Send">
			</form>
	<div>
</body>
</html>