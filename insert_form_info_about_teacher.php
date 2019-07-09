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
		include (__DIR__ . '/show_info_about_teacher.php');
	?>
	<div>
		<p>Поля со * обязательные</p>
			<form action="insert_info_about_teacher.php" method="POST">
				<input type="number" name="teacher_id" placeholder="ID учителя">
				<input type="text" name="full_name" placeholder="ФИО*">
				<input type="date" name="date_of_birth" placeholder="Дата рождения*">
				<input type="text" name="subjects" placeholder="Предметы*">
				<input type="text" name="university" placeholder="Университет*">
				<input type="submit" value="Send">
			</form>
	<div>
</body>
</html>