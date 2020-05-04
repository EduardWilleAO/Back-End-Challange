<?php

require "connect.php";

$sql = 'SELECT * FROM list';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <div class="grid_container">
        <?php foreach($result as $row) { ?>
            <div class="grid-item"><label>List Name: <b><?php print $row["name"]; ?></b></label></div>

            <?php 
            $sql = 'SELECT * FROM tasks WHERE binding_id=:id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $row["id"]);
            $stmt->execute();
            $result2 = $stmt->fetchAll();
            ?>

            <div class="grid-item">Task numbers: <?php print count($result2); ?></div>

            <div class="grid-item">
                <a href="tasks/tasks.php?id=<?php print $row['id']; ?>" type="button" class="btn-success float-right">See Tasks</a>
                <a href="update.php?id=<?php print $row['id']; ?>" type="button" class="btn-primary float-right">Edit</a>
                <a href="delete.php?id=<?php print $row['id']; ?>" type="button" class="btn-danger float-right">Delete</a>
            </div>
        <?php } ?>
    </div>

    <a href="create.php" type="button" class="btn-primary">Add Item!</a>
</body>
</html>