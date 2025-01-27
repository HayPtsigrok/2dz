<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.js">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Студия автотюнинга - Заявка на услуги</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Студия автотюнинга</h1>
    <nav>
    <a href="index.php">Главная</a>
        <a href="portfolio.php">Портфолио</a>
        <a href="services.php">Услуги</a>
        <a href="pricing.php">Стоимость</a>
        <a href="contact.php">Контакты</a>
        <a href="zaiva.php">Заявка</a>
        <a href="avtor.php">Авторизация</a>
    </nav>
</header>

<section id="request">
<h2>Заявка на услуги</h2>
<form action="cd.php" method="POST" enctype="multipart/form-data">
    <input type="text" id="search" placeholder="Марка" name="marka">
    <div id="suggestions" class="suggestions"></div>
    <input type="text" id="search" placeholder="Модель"name="model">
    <div id="suggestions" class="suggestions"></div>
    <input type="text" id="search" placeholder="Год"name="god">
    <div id="suggestions" class="suggestions"></div>
    <input type="text" id="search" placeholder="Вид работ"name="vidrabot">
    <div id="suggestions" class="suggestions"></div>
        <input placeholder="Описание желаемых услуг" rows="5" required name="opisanie"> 
        <input type="submit" value="Отправить">
    </form>
</section>
</body>
</html>