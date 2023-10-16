<?php
//Класс для изменения записанных записей 
class UpdateController
{
	static public function updateGroup($pdo) {
		$group_name = $_POST['group_name'];
		$group_id = $_POST['group_id'];
		$sql = ("UPDATE groups SET group_name = ? WHERE group_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$group_name, $group_id]);
		
		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function updateSubject($pdo) {
		$subject_name = $_POST['subject_name'];
		$subject_id = $_POST['subject_id'];
		$sql = ("UPDATE subject SET subject_name = ? WHERE subject_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$subject_name, $subject_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function updateStudent($pdo) {
		$student_name = $_POST['student_name'];
		$group_id = $_POST['group_id'];
		$student_id = $_POST['student_id'];
		$sql = ("UPDATE student SET student_name = ?, group_id = ? WHERE student_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$student_name, $group_id, $student_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function updateGrades($pdo) {
		$score = $_POST['score'];
		$student_id = $_POST['student_id'];
		$subject_id = $_POST['subject_id'];
		$grades_id = $_POST['grades_id'];
		$sql = ("UPDATE grades SET score = ?, student_id = ?, subject_id = ? WHERE grades_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$score, $student_id, $subject_id, $grades_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}
}