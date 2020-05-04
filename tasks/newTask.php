<?php

require "../connect.php"; 

$sql = "SELECT * FROM list WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $_GET["id"]);
$stmt->execute();
$result = $stmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO tasks (binding_id, name, description, status, duration) VALUES (:binding_id, :name, :description, :status, :duration)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":binding_id", $_GET["id"]);
    $stmt->bindParam(":name", $_POST["name"]);
    $stmt->bindParam(":description", $_POST["description"]);
    $stmt->bindParam(":status", $_POST["status"]);
    $stmt->bindParam(":duration", $_POST["duration"]);
	$stmt->execute();

	$conn = null;

	header ('Location: tasks.php?id='.$_GET["id"]);
}

$conn = null;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <?php foreach($result as $row){ ?>
        <label>Adding Task for: <b><?php print $row["name"]; ?></b></label>
    <?php } ?>
    <form method="post">
        <label>Task Name: </label><input name="name" placeholder="Enter Task Name"><br>
        
        <label>Task Description: </label><input name="description" placeholder="Enter Description"><br>
        
        <label>Task Status: 
        <select name="status">
            <option selected="selected">Not Started</option>
            <option>In Progress</option>
            <option>Finished</option>
        </select><br>
        
        <label>Task Duration: </label><input name="duration" placeholder="Enter Duration"><br>

        <input type="submit">
    </form>

    <a href="tasks.php?id=<?php print $_GET['id']; ?>" type="button" class="btn-danger">Go Back</a>
</body>
</html>