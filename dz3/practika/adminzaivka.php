<?php
require_once "db.php";

$id = [];
$marka = [];
$model = [];
$god = [];
$vidrabot = [];
$opisanie = [];

$sql = "SELECT * FROM `zaivka`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($id, $row['id']);
        array_push($marka, $row['marka']);
        array_push($model, $row['model']);
        array_push($god, $row['god']);
        array_push($vidrabot, $row['vidrabot']);
        array_push($opisanie, $row['opisanie']);
    }
}
$conn->close()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Панель менеджера</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <? if (!isset($_COOKIE["login"])) { 
        header("Location: avtor.php");
    }?> 
    <div class="appeals">
        <? for ($i=0; $i < sizeof($id); $i++) { ?>
            <div class="box">
                <h1>Номер обращения: №<? echo $id[$i]; ?></h1>
                <p>марка: <? echo $marka[$i]; ?></p>
                <p>модель: <? echo $model[$i]; ?></p>
                <p>год: <? echo $god[$i]; ?></p>
                <p>видработ: <? echo $vidrabot[$i]; ?></p>
                <p>описание: <? echo $opisanie[$i]; ?></p>
            </div>
        <? } ?>
    </div>
</body>
</html>