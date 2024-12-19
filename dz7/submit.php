<?php

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$age = $_POST['age'] ?? '';
$specialty = $_POST['specialty'] ?? '';
$experience = $_POST['experience'] ?? '';


$dataString = "$name, $email, $age, $specialty, $experience\n";


file_put_contents('data.txt', $dataString, FILE_APPEND);


echo nl2br(file_get_contents('data.txt'));
?>
