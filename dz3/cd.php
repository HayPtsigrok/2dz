<?php 
require_once "db.php"; // Подключение файла db.php, который, предположительно, содержит код для подключения к базе данных.

$marka = $_POST["marka"]; // Получение значения поля "marka" из POST-запроса и сохранение его в переменной $marka.
$model = $_POST["model"]; // Получение значения поля "model" из POST-запроса и сохранение его в переменной $model.
$god = $_POST["god"]; // Получение значения поля "god" из POST-запроса и сохранение его в переменной $god.
$vidrabot = $_POST["vidrabot"]; // Получение значения поля "vidrabot" из POST-запроса и сохранение его в переменной $vidrabot.
$opisanie = $_POST["opisanie"]; // Получение значения поля "opisanie" из POST-запроса и сохранение его в переменной $opisanie.

$sql = "INSERT INTO zaivka (marka, model, god, vidrabot, opisanie) VALUES ('$marka', '$model', '$god', '$vidrabot','$opisanie')"; // Формирование SQL-запроса для вставки данных в таблицу "zaivka". Значения берутся из переменных.

$conn->query($sql); // Выполнение сформированного SQL-запроса на вставку данных в базу данных.

$conn->close(); // Закрытие соединения с базой данных.

header("Location: index.php"); // Перенаправление пользователя на страницу index.php после выполнения запроса.
?>
