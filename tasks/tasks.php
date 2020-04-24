<?php

require "../connect.php"; 

// Get list info
$sql = "SELECT * FROM list WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $_GET["id"]);
$stmt->execute();
$result = $stmt->fetchAll();

// Get task info
$sql = "SELECT * FROM tasks WHERE binding_id=:binding_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":binding_id", $_GET["id"]);
$stmt->execute();
$result2 = $stmt->fetchAll();

$conn = null;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <?php foreach($result as $row){ ?><label>Tasks for: <b><?php print $row["name"]; ?></b></label><br><?php } ?>

    <?php foreach($result2 as $row){ ?>
        <?php print $row["name"]; ?> |
        <?php print $row["description"]; ?> |
        <?php print $row["status"]; ?> |
        <?php print $row["duration"]; ?>
        <a href="removeTask.php?task_id=<?php print $row['task_id']; ?>&binding_id=<?php print $row['binding_id']; ?>" type="button" class="btn-danger">Remove Task</a>
        <a href="changeTask.php?id=<?php print $row['id']; ?>" type="button" class="btn-success">Change Task</a><br>
    <?php } ?>

    <?php foreach($result as $row){ ?>
        <a href="newTask.php?id=<?php print $row["id"]; ?>" type="button" class="btn-primary">Add Task</a>
    <?php } ?>
</body>
</html>