<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
if (!empty($_POST)) {

    $location_id = gen_id();
    $device_id = $_POST['device_id'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $altitude = $_POST['altitude'];
    $course = $_POST['course'];
    $speed = $_POST['speed'];
    $vertical_acc = $_POST['vertical_acc'];
    $horizontal_acc = $_POST['horizontal_acc'];
    $timestamp = $_POST['timestamp'];
    try {
       $stmt = $pdo->prepare("INSERT into locations (location_id,device_id,latitude,longitude,altitude,course,speed,vertical_acc,horizontal_acc,device_timestamp) VALUES (:location_id,:device_id,:latitude,:longitude,:altitude,:course,:speed,:vertical_acc,:horizontal_acc,:device_timestamp)");

       $stmt->bindValue(":location_id", $location_id);
       $stmt->bindValue(":device_id", $device_id);
       $stmt->bindValue(":latitude", $latitude);
       $stmt->bindValue(":longitude", $longitude);
       $stmt->bindValue(":altitude", $altitude);
       $stmt->bindValue(":course", $course);
       $stmt->bindValue(":speed", $speed);
       $stmt->bindValue(":vertical_acc", $vertical_acc);
       $stmt->bindValue(":horizontal_acc", $horizontal_acc);
      $stmt->bindValue(":device_timestamp", $timestamp);
       $da = $stmt->execute();
       var_dump($da);
       } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
} else {
echo 'No Input Detected:(';
}
?>