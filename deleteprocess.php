<?php

require "connect.php";

$id = $_GET["id"];

$sql = "DELETE FROM list WHERE id='$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: index.php");
?>