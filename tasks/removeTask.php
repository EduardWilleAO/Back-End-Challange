<?php

require "../connect.php";

$sql = 'SELECT * FROM tasks WHERE task_id=:task_id AND binding_id=:binding_id';
$stmt = $conn->prepare($sql);
$stmt->BindParam(":task_id", $_GET["task_id"]);
$stmt->BindParam(":binding_id", $_GET["binding_id"]);
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "DELETE FROM tasks WHERE task_id=:task_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":task_id", $_GET["task_id"]);
    $stmt->execute();

    $conn = null;

    header("Location: ../index.php");
}

$conn = null;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <form method="post">
        <?php foreach($result as $value){ ?>
            <h2>Are you sure you want to delete "<?php print $value["name"]; ?>"?</h2>
            <button type="submit" name="button" class="btn-danger">Delete "<?php print $value["name"]; ?>"</button>
        <?php } ?>
    </form>

    <a href="tasks.php?id=<?php print $_GET["binding_id"]; ?>" type="button" class="btn-danger">Go Back</a>
</body>
</html>