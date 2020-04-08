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
    <div id="content_container">

        <?php foreach($result as $row){ ?>
            <span>
                <?php echo $row["id"] . " " . $row["name"]; ?>
                <a href="update.php?id=<?php echo $row['id']; ?>" type="button" class="btn-primary">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" type="button" class="btn-danger">Delete</a>
            </span>
            <br>
        <?php } ?>

    </div>
    <a href="create.php" type="button" class="btn-primary">Add Item!</a>
</body>
</html>