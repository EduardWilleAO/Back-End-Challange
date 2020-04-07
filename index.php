<?php

require "connect.php";

$sql = 'SELECT * FROM list';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        a {
            background-color: lightgray;
            border-radius: 4px;
            color: black;
            padding: 2px 10px;
            margin: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #008CBA;
            color: white;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div id="content_container">
        <?php foreach($result as $row){ ?>
            <span>
                <?php echo $row["id"] . " " . $row["name"]; ?>
                <a href="" type="button" class="btn-danger">Delete</a>
            </span>
            <br>
        <?php } ?>
    </div>
    <a href="create.php" type="button" class="btn-primary">Add Item!</a>
</body>
</html>