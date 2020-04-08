<?php

require "connect.php";

//$sql = "INSERT INTO `backendChallange`.`list` (`id`, `name`) VALUES ('3', 'ernie')";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["name"];

	$sql = "INSERT INTO list (name) VALUES (:name)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->execute();
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
</body>
</html>