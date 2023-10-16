<?php
//Класс для иудаления записанных записей по id 
class DeleteController {
	static public function deleteGroup($pdo) {
		$group_id = $_POST['group_id'];
		$sql = ("DELETE FROM groups WHERE group_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$group_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function deleteSubject($pdo) {
		$subject_id = $_POST['subject_id'];
		$sql = ("DELETE FROM subject WHERE subject_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$subject_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function deleteStudent($pdo) {
		$student_id = $_POST['student_id'];
		$sql = ("DELETE FROM student WHERE student_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$student_id]);

		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	static public function deleteGrades($pdo) {
		$grades_id = $_POST['grades_id'];
		$sql = ("DELETE FROM grades WHERE grades_id = ?");
		$query = $pdo->prepare($sql);
		$query->execute([$grades_id]);
		
		if ($query) {
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}
}