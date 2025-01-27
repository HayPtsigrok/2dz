<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма Авторизации</title>
    <style>

    </style>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="avtordb.php" method="post">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Авторизироватся" >
    </form>
</body>
</html>