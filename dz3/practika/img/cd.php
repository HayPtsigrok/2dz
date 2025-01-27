<?php 
require_once "db.php";

$marka = $_POST["marka"];
$model = $_POST["model"];
$god = $_POST["god"];
$vidrabot = $_POST["vidrabot"];
$opisanie = $_POST["opisanie"];
$sql = "INSERT INTO `catalog` (`marka`, `model`, `god`, `vidrabot`, `opisanie`,) VALUES ('$marka', '$model', '$god', '$vidrabot', '$opisanie')";
$conn->query($sql);

$conn->close();
header("Location: index.php");
?>