<?php

require "connect.php";

$name = $_POST["name"];

$sql = "INSERT INTO list (name) VALUES (:name)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->execute();
header ('Location: index.php');

?>