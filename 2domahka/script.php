<?php
$messages = [];
$filePath = 'data.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message)) {
        $dateTime = date('Y-m-d H:i:s');
        $message = nl2br($message);
        $entry = "$name|$email|$dateTime|$message\n";
        file_put_contents($filePath, $entry, FILE_APPEND | LOCK_EX);
    }
}

if (file_exists($filePath)) {
    $messages = array_reverse(file($filePath, FILE_IGNORE_NEW_LINES));
}