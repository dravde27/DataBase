<?php
 include (__DIR__ . '/show_salary_and_experience.php');
?>

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

		<form action="edit_salary_and_experience.php" method="POST">
                <p>Поля со * обязательные</p>
				<input type="text" name="number" placeholder="ID учителя для изменения*">
				<input type="number" name="number_of_lessons_per_week" placeholder="Количество уроков в неделю*">
				<input type="text" name="experience" placeholder="Опыт*">
				<input type="number" name="salary_per_week_uah" placeholder="Заработная плата в неделю*">
				<input type="submit" value="Send" name="Send">
		</form>

<?php
		if($_POST['Send'])
		{
		require_once(__DIR__ . '/db_connection.php');
		$id = $_POST['number'];
		$number_of_lessons_per_week = $_POST['number_of_lessons_per_week'];
        $experience = $_POST['experience'];
        $salary_per_week_uah = $_POST['salary_per_week_uah'];
            
                if(!$id || !$number_of_lessons_per_week || !$experience || !$salary_per_week_uah)
		{
			echo 'Пожалуйста введите все поля со *<br />';
			if(!$id ) echo 'Вы не ввели ID учителя <br />';
			if(!$$number_of_lessons_per_week) echo 'Вы не ввели количество уроков в неделю  <br />';
			if(!$experience ) echo 'Вы не ввели опыт работы<br />';
			if(!$salary_per_week_uah) echo 'Вы не ввели заработную плату в неделю <br />';
			die;
		}

		$edit_row = (int)$_POST['number'];		
		$sql = 'UPDATE salary_and_experience SET 
						number_of_lessons_per_week = :number_of_lessons_per_week,
                        experience = :experience,      
                        salary_per_week_uah = :salary_per_week_uah      
            WHERE teacher_id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':number_of_lessons_per_week', $number_of_lessons_per_week, PDO::PARAM_STR);
        $stmt->bindParam(':experience', $experience, PDO::PARAM_STR);     
        $stmt->bindParam(':salary_per_week_uah', $salary_per_week_uah, PDO::PARAM_STR);     
		$stmt->bindParam(':id', $id , PDO::PARAM_STR);    
		$stmt->execute();
		} 
	?>