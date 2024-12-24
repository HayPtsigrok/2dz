<?php
require_once("db.php");

if (isset($_POST['region_id'])) {
    $region_id = intval($_POST['region_id']);
    $result = $conn->query("SELECT * FROM cities WHERE region_id = $region_id");
    
    $cities = [];
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
    
    echo json_encode($cities);
}

$conn->close();
?>