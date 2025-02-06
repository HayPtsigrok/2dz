<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода данных</title>
    <script>
       function validateAndSubmit() {
    // Получаем значения из полей формы
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const specialty = document.getElementById('specialty').value;
    const experience = document.getElementById('experience').value;

    // Проверяем, заполнены ли все поля
    if (!name || !email || !age || !specialty || !experience) {
        alert('Пожалуйста, заполните все поля.'); // Если нет, выводим предупреждение
        return; // Прерываем выполнение функции
    }

    // Проверяем возраст
    if (age < 30) {
        alert('Возраст должен быть более 30 лет.'); // Если возраст меньше 30, выводим предупреждение
        return; // Прерываем выполнение функции
    }

    // Создаем новый XMLHttpRequest для отправки данных на сервер
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit.php', true); // Указываем метод и URL для запроса
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Устанавливаем заголовок

    // Обрабатываем ответ от сервера
    xhr.onload = function() {
        if (xhr.status === 200) { // Если запрос успешен
            loadData(); // Загружаем данные заново
            document.getElementById('form').reset(); // Очищаем форму
        } else {
            alert('Произошла ошибка при отправке данных.'); // Если произошла ошибка, выводим предупреждение
        }
    };

    // Формируем данные для отправки на сервер
    const data = name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&age=${encodeURIComponent(age)}&specialty=${encodeURIComponent(specialty)}&experience=${encodeURIComponent(experience)};
    
    // Отправляем данные на сервер
    xhr.send(data);
}

function loadData() {
    // Создаем новый XMLHttpRequest для загрузки данных
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'data.txt', true); // Указываем метод и URL для запроса

    // Обрабатываем ответ от сервера
    xhr.onload = function() {
        if (xhr.status === 200) { // Если запрос успешен
            document.getElementById('data-table').innerHTML = xhr.responseText; // Обновляем содержимое таблицы данными из ответа
        } else {
            alert('Не удалось загрузить данные.'); // Если произошла ошибка, выводим предупреждение
        }
    };

    // Отправляем запрос на сервер
    xhr.send();
}

// Загружаем данные при загрузке страницы
window.onload = loadData;
</body>
</html>
