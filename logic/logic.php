<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/db.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/controllers/createController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/controllers/readController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/controllers/updateController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/controllers/deleteController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/controllers/printRatingController.php';

$uri = $_SERVER['REQUEST_URI'];
$file_name = basename(parse_url($uri, PHP_URL_PATH));

$page_data = Array();
$rating_result = Array();
$sub_psdnm = array(0 => 'subject');
$group_choice = 0;

//Чтение требуемых данных из БД для отображения на определенных страницах
switch ($file_name) {
	case 'rating.php':
		$rating_array = ReadController::readRating($pdo);
		$page_data = $rating_array[0];
		$thead_data = $rating_array[1];
		break;
	case 'group.php':
		$page_data = ReadController::readGroup($pdo);
		break;
	case 'subject.php':
		$page_data = ReadController::readSubject($pdo);
		break;
	case 'students.php':
		$students_array = ReadController::readStudent($pdo);
		$page_data = $students_array[0];
		$select_data = $students_array[1];
		break;
	case 'grades.php':
		$grades_array = ReadController::readGrades($pdo);
		$page_data = $grades_array[0];
		$student_data = $grades_array[1];
		$subject_data = $grades_array[2];
		break;
	default: break;
}

//Запись данных
if (isset($_POST['add'])) {
	switch ($file_name) {
		case 'group.php':
			CreateController::createGroup($pdo);
			break;
		case 'subject.php':
			CreateController::createSubject($pdo);
			break;
		case 'students.php':
			CreateController::createStudent($pdo);
			break;
		case 'grades.php':
			CreateController::createGrades($pdo);
			break;
		default: break;
	}
}

//Обновление данных
if (isset($_POST['edit'])) {
	switch ($file_name) {
		case 'group.php':
			UpdateController::updateGroup($pdo);
			break;
		case 'subject.php':
			UpdateController::updateSubject($pdo);
			break;
		case 'students.php':
			UpdateController::updateStudent($pdo);
			break;
		case 'grades.php':
			UpdateController::updateGrades($pdo);
			break;
		default: break;
	}
}

//Удаление строк 
if (isset($_POST['delete'])) {
	switch ($file_name) {
		case 'group.php':
			DeleteController::deleteGroup($pdo);
			break;
		case 'subject.php':
			DeleteController::deleteSubject($pdo);
			break;
		case 'students.php':
			DeleteController::deleteStudent($pdo);
			break;
		case 'grades.php':
			DeleteController::deleteGrades($pdo);
			break;
		default: break;
	}
}

//Вывод рейтинга в таблице по нажатию кнопки
if (isset($_POST['rating'])) {
	$rating_result = printRatingController::printRating($pdo, $sub_psdnm, $group_choice);  
}

