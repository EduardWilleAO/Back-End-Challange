<?php

require "connect.php";

$sql = 'SELECT * FROM list WHERE id=:id';
$stmt = $conn->prepare($sql);
$stmt->BindParam(":id", $_GET["id"]);
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "DELETE FROM list WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();

    $conn = null;

    header("Location: index.php");
}

$conn = null;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <form method="post">
        <?php foreach($result as $value){ ?>
            <h2>Are you sure you want to delete "<?php print $value["name"]; ?>"?</h2>
            <button type="submit" name="button" class="btn-danger">Delete "<?php print $value["name"]; ?>"</button>
        <?php } ?>
    </form>

    <a href="index.php" type="button" class="btn-danger">Go Back</a>
</body>
</html>