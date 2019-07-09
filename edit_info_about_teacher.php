<?php
 include (__DIR__ . '/show_info_about_teacher.php');
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

		<form action="edit_info_about_teacher.php" method="POST">
                <p>Поля со * обязательные</p>
				<input type="text" name="number" placeholder="ID учителя для изменения*">
				<input type="text" name="full_name" placeholder="Полное имя*">
				<input type="date" name="date_of_birth" placeholder="Дата рождения*">
				<input type="text" name="subjects" placeholder="Предметы*">
				<input type="text" name="university" placeholder="ВУЗ*">
				<input type="submit" value="Send" name="Send">
		</form>

<?php
		if($_POST['Send'])
		{
		require_once(__DIR__ . '/db_connection.php');
		$id = $_POST['number'];
		$full_name = $_POST['full_name'];
        $date_of_birth= $_POST['date_of_birth'];
        $subjects = $_POST['subjects'];
        $university = $_POST['university'];
            
            if(!$id || !$full_name || !$date_of_birth || !$subjects || !$university )
		{
			echo 'Пожалуйста введите все поля со *<br />';
			if(!$id ) echo 'Вы не ввели ID учителя <br />';
			if(!$full_name) echo 'Вы не ввели ФИО <br />';
			if(!$date_of_birth ) echo 'Вы не ввели дату рождени<br />';
			if(!$subjects) echo 'Вы не ввели предметы <br />';
            if(!$university) echo 'Вы не ввели ВУЗ <br />';
			die;
		}


		$edit_row = (int)$_POST['number'];		
		$sql = 'UPDATE info_about_teacher SET 
						full_name = :full_name,
                        date_of_birth = :date_of_birth,      
                        subjects = :subjects,  
                        university = :university
            WHERE teacher_id = :id';
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':full_name', $full_name , PDO::PARAM_STR);
        $stmt->bindParam(':date_of_birth', $date_of_birth, PDO::PARAM_STR);     
        $stmt->bindParam(':subjects', $subjects, PDO::PARAM_STR);
        $stmt->bindParam(':university', $university, PDO::PARAM_STR); 
		$stmt->bindParam(':id', $id , PDO::PARAM_STR);    
		$stmt->execute();
		} 
	?>