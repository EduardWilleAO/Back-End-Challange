<?php 

require "connect.php";

$sql = 'SELECT * FROM list';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET["id"];
    $name = $_POST["name"];

    $sql = "UPDATE list SET name=:name WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->execute();
    header("Location: index.php");
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <form method="post">
        <?php foreach($result as $value){ ?>
            <h2>Editing: "<?php echo $value["name"]; ?>"?</h2>
            <label>Name:</label>
            <input name="name" type="text" placeholder="enter new name"><br>
            <button type="submit" name="button" class="btn-primary">Save changes for "<?php echo $value["name"]; ?>"</button>
        <?php } ?>
    </form>
</body>
</html>