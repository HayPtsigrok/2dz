<?
$host = 'localhost';
$user = 'root'; 
$password = 'root'; 
$dbname = 'city';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>