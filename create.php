<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	require "connect.php";

	$sql = "INSERT INTO list (name) VALUES (:name)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":name", $_POST["name"]);
	$stmt->execute();

	$conn = null;

	header ('Location: index.php');
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <form method="post">
		<div class="form-group">
			<label for="">name: </label>
			<input type="text" name="name" value="" id="name" class="form-control" required>
		</div>
		<button type="submit" name="button" class="btn btn-primary">Submit</button>
	</form>	

	<a href="index.php" type="button" class="btn-danger">Go Back</a>
</body>
</html>