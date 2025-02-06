<?php
require_once("db.php"); // Подключаем файл с настройками базы данных

// Проверяем, был ли отправлен POST-запрос с параметром 'region_id'
if (isset($_POST['region_id'])) {
    // Приводим 'region_id' к целочисленному типу
    $region_id = intval($_POST['region_id']);
    
    // Выполняем SQL-запрос для получения городов по идентификатору региона
    $result = $conn->query("SELECT * FROM cities WHERE region_id = $region_id");
    
    $cities = []; // Массив для хранения городов
    
    // Извлекаем данные из результата запроса и добавляем их в массив
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row; // Добавляем каждую строку результата в массив
    }
    
    // Возвращаем массив городов в формате JSON
    echo json_encode($cities);
}

// Закрываем соединение с базой данных
$conn->close();
?>
