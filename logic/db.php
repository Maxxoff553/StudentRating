<?php

$host = '127.0.0.1';
$db = 'student_rating';
$user = 'root';
$pass = '';
$port = '3307';

try {
	$pdo = new PDO("mysql:host=$host; port=$port; dbname=$db", $user, $pass);
} catch (PDOException $exception) {
	echo "Ошибка соединения" . $exception->getMessage();
}