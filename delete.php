<?php

require "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET["id"];

    $sql = "DELETE FROM list WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: index.php");
}

$id = $_GET["id"];

$sql = "SELECT * FROM list WHERE id='$id'";
$result = $conn->query($sql);

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
</body>
</html>