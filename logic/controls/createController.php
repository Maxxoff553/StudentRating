<?php
//Класс для создания новых записей 
class CreateController
{
    static public function createGroup($pdo)
	{
		$group_name = @$_POST['group_name'];
		$sql = ("INSERT INTO groups (group_name) VALUES (?)");
		$query = $pdo->prepare($sql);
		$query->execute([$group_name]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
	}

	static public function createSubject($pdo)
	{
		$subject_name = @$_POST['subject_name'];
		$sql = ("INSERT INTO subject (subject_name) VALUES (?)");
		$query = $pdo->prepare($sql);
		$query->execute([$subject_name]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
	}

	static public function createStudent($pdo)
	{
		$student_name = @$_POST['student_name'];
		$group_id = @$_POST['group_id'];
		$sql = ("INSERT INTO student (student_name, group_id) VALUES (?,?)");
		$query = $pdo->prepare($sql);
		$query->execute([$student_name, $group_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
	}

	static public function createGrades($pdo)
	{
		$score = @$_POST['score'];
		$student_id = @$_POST['student_id'];
		$subject_id = @$_POST['subject_id'];
		$sql = ("INSERT INTO grades (score, student_id, subject_id) VALUES (?,?,?)");
		$query = $pdo->prepare($sql);
		$query->execute([$score, $student_id, $subject_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
	}
}