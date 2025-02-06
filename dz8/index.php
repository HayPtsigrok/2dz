<?php
require_once("db.php"); // Подключаем файл с настройками базы данных

// Выполняем SQL-запрос для получения всех регионов из таблицы regions
$regions = $conn->query("SELECT * FROM regions");

$cities = []; // Инициализируем пустой массив для хранения городов

// Проверяем, был ли отправлен POST-запрос с параметром 'region_id'
if (isset($_POST['region_id'])) {
    // Приводим 'region_id' к целочисленному типу
    $region_id = intval($_POST['region_id']);
    
    // Выполняем SQL-запрос для получения городов, относящихся к выбранному региону
    $cities = $conn->query("SELECT * FROM cities WHERE region_id = $region_id");
}

// Закрываем соединение с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru"> <!-- Указываем язык документа -->
<head>
    <meta charset="UTF-8"> <!-- Устанавливаем кодировку символов -->
    <title>Динамические выпадающие списки</title> <!-- Заголовок страницы -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Подключаем библиотеку jQuery -->
</head>
<body>

<h2>Выберите регион и город</h2> <!-- Заголовок для выбора региона и города -->

<label for="regions">Регион:</label> <!-- Метка для выпадающего списка регионов -->
<select id="regions"> <!-- Выпадающий список для выбора региона -->
    <option value="0">-выберите регион-</option> <!-- Опция по умолчанию -->
    <?php while ($row = $regions->fetch_assoc()): ?> <!-- Цикл для генерации опций для каждого региона -->
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option> <!-- Опция с ID и названием региона -->
    <?php endwhile; ?>
</select>

<label for="cities" style="display:none;">Город:</label> <!-- Метка для выпадающего списка городов, скрыта по умолчанию -->
<select id="cities" style="display:none;"> <!-- Выпадающий список для выбора города, скрыт по умолчанию -->
    <option value="0">-выберите город-</option> <!-- Опция по умолчанию -->
</select>

<script>
$(document).ready(function() { // Ждем, пока документ будет готов
    $('#regions').change(function() { // Обработчик события изменения для выпадающего списка регионов
        var regionId = $(this).val(); // Получаем выбранное значение региона
        
        if (regionId != 0) { // Если выбранный регион не равен 0 (т.е. выбран)
            $.ajax({ // Выполняем AJAX-запрос
                url: 'cities.php', // URL для запроса
                type: 'POST', // Метод запроса
                data: { region_id: regionId }, // Данные, отправляемые на сервер
                dataType: 'json', // Ожидаемый тип данных от сервера
                success: function(data) { // Функция, выполняемая при успешном ответе
                    $('#cities').empty().append('<option value="0">-выберите город-</option>'); // Очищаем список городов и добавляем опцию по умолчанию
                    $.each(data, function(index, city) { // Перебираем полученные данные (города)
                        $('#cities').append('<option value="' + city.id + '">' + city.name + '</option>'); // Добавляем каждую опцию города в список
                    });
                    $('#cities').show(); // Показываем выпадающий список городов
                    $('label[for="cities"]').show(); // Показываем метку для списка городов
                }
            });
        } else { // Если выбранный регион равен 0 (т.е. не выбран)
            $('#cities').hide(); // Скрываем список городов
            $('label[for="cities"]').hide(); // Скрываем метку для списка городов
        }
    });
});
</script>

</body>
</html>
