<?php
//Класс для чтения данных при открытии требуемой страницы
class ReadController {
	static public function readRating($pdo) {
		$sql = $pdo->prepare("SELECT * FROM groups");

		$thead_data = $pdo->prepare("SELECT * FROM subject");
		$thead_data->execute();
		$thead_result = $thead_data->fetchALL(PDO::FETCH_OBJ);

		$sql->execute();
		$result = $sql->fetchALL(PDO::FETCH_OBJ);

		return array($result, $thead_result);
	}

	static public function readGroup($pdo) {
		$sql = $pdo->prepare("SELECT * FROM groups");
		$sql->execute();
		$result = $sql->fetchALL(PDO::FETCH_OBJ);

		return $result;
	}

	static public function readSubject($pdo) {
		$sql = $pdo->prepare("SELECT * FROM subject");
		$sql->execute();
		$result = $sql->fetchALL(PDO::FETCH_OBJ);

		return $result;
	}

	static public function readStudent($pdo) {
		$sql = $pdo->prepare("SELECT student_id, student_name, student.group_id, 
							groups.group_name FROM student INNER JOIN groups on 
							student.group_id=groups.group_id ORDER BY student_id");

		$select_data = $pdo->prepare("SELECT * FROM groups");
		$select_data->execute();
		$select_result = $select_data->fetchALL(PDO::FETCH_OBJ);

		$sql->execute();
		$result = $sql->fetchALL(PDO::FETCH_OBJ);

		return array($result, $select_result);
	}

	static public function readGrades($pdo) {
		$sql = $pdo->prepare("SELECT grades_id, score, grades.student_id, grades.subject_id, 
							student.student_name, subject.subject_name FROM grades 
							INNER JOIN student ON grades.student_id = student.student_id
							INNER JOIN subject on grades.subject_id = subject.subject_id ORDER BY grades_id");

		$student_data = $pdo->prepare("SELECT * FROM student");
		$student_data->execute();
		$student_result = $student_data->fetchALL(PDO::FETCH_OBJ);

		$subject_data = $pdo->prepare("SELECT * FROM subject");
		$subject_data->execute();
		$subject_result = $subject_data->fetchALL(PDO::FETCH_OBJ);

		$sql->execute();
		$result = $sql->fetchALL(PDO::FETCH_OBJ);

		return array($result, $student_result, $subject_result);
	}
}