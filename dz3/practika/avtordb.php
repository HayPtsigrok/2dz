<?php
require_once("db.php");

$login = trim($_POST['login']);
$pass = trim($_POST['pass']);

$sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setcookie("login", $login, time() + 1500);
    header("Location: adminzaivka.php");
} else {
    echo "Пользователь не найден!";
    exit();
}