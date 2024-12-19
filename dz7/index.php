<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода данных</title>
    <script>
        function validateAndSubmit() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const age = document.getElementById('age').value;
            const specialty = document.getElementById('specialty').value;
            const experience = document.getElementById('experience').value;

           
            if (!name || !email || !age || !specialty || !experience) {
                alert('Пожалуйста, заполните все поля.');
                return;
            }

            if (age < 30) {
                alert('Возраст должен быть более 30 лет.');
                return;
            }

           
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'submit.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    loadData();
                    document.getElementById('form').reset(); 
                } else {
                    alert('Произошла ошибка при отправке данных.');
                }
            };

            const data = name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&age=${encodeURIComponent(age)}&specialty=${encodeURIComponent(specialty)}&experience=${encodeURIComponent(experience)};
            xhr.send(data);
        }

        function loadData() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'data.txt', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('data-table').innerHTML = xhr.responseText;
                } else {
                    alert('Не удалось загрузить данные.');
                }
            };
            xhr.send();
        }

        window.onload = loadData;
    </script>
</head>
<body>
    <h1>Форма ввода данных</h1>
    <form id="form" onsubmit="event.preventDefault(); validateAndSubmit();">
        <label for="name">Имя:</label>
        <input type="text" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" required><br>

        <label for="age">Возраст:</label>
        <input type="number" id="age" required><br>

        <label for="specialty">Специальность:</label>
        <input type="text" id="specialty" required><br>

        <label for="experience">Стаж работы (лет):</label>
        <input type="number" id="experience" required><br>

        <button type="submit">Отправить</button>
    </form>

    <h2>Данные пользователей</h2>
    <table border="1" id="data-table">
        <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Возраст</th>
            <th>Специальность</th>
            <th>Стаж работы</th>
        </tr>
     
    </table>
</body>
</html>
