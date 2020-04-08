<?php

require "connect.php";

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
    <?php foreach($result as $value){ ?>
        <h2>Are you sure you want to delete "<?php echo $value["name"]; ?>"?</h2>
        <a href="deleteprocess.php?id=<?php echo $id ?>" class="btn-danger">Delete "<?php echo $value["name"]; ?>"</a>
    <?php } ?>
</body>
</html>