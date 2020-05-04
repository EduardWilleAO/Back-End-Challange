    <?php 

require "connect.php";

$sql = 'SELECT * FROM list WHERE id=:id';
$stmt = $conn->prepare($sql);
$stmt->BindParam(":id", $_GET["id"]);
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "UPDATE list SET name=:name WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->bindParam(":name", $_POST["name"]);
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
            <h2>Editing: "<?php print $value["name"]; ?>"?</h2>
            <label>Name:</label>
            <input name="name" type="text" value="<?php print $value['name']; ?>"><br>
            <label>Tasks:</label>
            <textarea name="tasks" type="text"><?php print $value['tasks']; ?></textarea><br>
            <button type="submit" name="button" class="btn-primary">Save changes for "<?php print $value["name"]; ?>"</button>
        <?php } ?>
    </form>

    <a href="index.php" type="button" class="btn-danger">Go Back</a>
</body>
</html>