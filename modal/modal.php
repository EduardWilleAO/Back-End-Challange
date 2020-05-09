<?php

function getTaskAmount($conn, $id){
	$sql = 'SELECT * FROM tasks WHERE binding_id=:id';
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result2 = $stmt->fetchAll();
	print count($result2);
};

?>