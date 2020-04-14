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
            <div class="item_container">
                <div>
                    <label><b><?php print $row["name"]; ?></b></label><br><br>
                    <label>Tasks: <br><?php print $row["tasks"]; ?></label>
                </div>

                <a href="update.php?id=<?php print $row['id']; ?>" type="button" class="btn-primary">Edit</a>
                <a href="delete.php?id=<?php print $row['id']; ?>" type="button" class="btn-danger">Delete</a>
            </div>
        <?php } ?>
    </div>
    <a href="create.php" type="button" class="btn-primary">Add Item!</a>
</body>
</html>