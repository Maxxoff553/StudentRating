<?php
//Вывод баллов студентов выбранной группы
class printRatingController {
	static public function printRating($pdo, &$sub_psdnm, &$group_choice) {
		$group_choice = $_POST['group_id'];
		$group_id = $_POST['group_id'];
		$i = 0;

		$sub_ids = $pdo->prepare('SELECT subject_id FROM subject');
		$sub_ids->execute();
		$subject_array = $sub_ids->fetchAll(PDO::FETCH_COLUMN);
		$select_subject = '';

		foreach ($subject_array as $sub_arr) {
			$sub_psdnm[$i] = "{$sub_psdnm[0]}{$i}";
			$i++;
			$select_subject = "{$select_subject}, 
							(SELECT MAX(if (grades.subject_id = '{$sub_arr}', grades.score, '')) 
							FROM grades WHERE grades.student_id = st.student_id)
							as {$sub_psdnm[$i - 1]}";
		}

		$test = "SELECT st.student_name {$select_subject} 
				FROM student st 
				WHERE group_id = ?";

		$sqlrating = $pdo->prepare("$test");
		$sqlrating->execute([$group_id]);
		$rating_result = $sqlrating->fetchALL(PDO::FETCH_OBJ);
		return $rating_result;
	}
}