<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Отзывы клиентов</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <header>
        <h1>Название компании</h1>
        <nav>
        <ul>
            <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="about_us.php">О нас</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="contacts.php">Контакты</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="info.php">информация</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="news.php">Новости</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="history.php">История </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="for_clients.php">Для клиента </a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Отзывы клиентов</h2>
            <!-- Список отзывов -->
            <blockquote>"Отличное оборудование!" - Клиент 1</blockquote>
            <!-- Форма для добавления отзыва -->
            <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <label for="review">Отзыв:</label><br/>
    <textarea id="review" name="review"></textarea><br/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </section>
    </main>
     
</body>
</html>

