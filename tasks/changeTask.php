    <?php 

require "../connect.php";

$sql = 'SELECT * FROM tasks WHERE task_id=:id';
$stmt = $conn->prepare($sql);
$stmt->BindParam(":id", $_GET["id"]);
$stmt->execute();
$result = $stmt->fetchAll();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "UPDATE tasks SET name=:name, description=:description, status=:status, duration=:duration WHERE task_id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->bindParam(":name", $_POST["name"]);
    $stmt->bindParam(":description", $_POST["description"]);
    $stmt->bindParam(":status", $_POST["status"]);
    $stmt->bindParam(":duration", $_POST["duration"]);
    $stmt->execute();

    $conn = null;

    header('Location: tasks.php?id='.$_GET["binding_id"]);
}

$conn = null;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="../css/stylesheet.css" rel="stylesheet" />
    <title></title>
</head>
<body>
    <?php foreach($result as $row){ ?>
        <label>Changing Task: <b><?php print $row["name"]; ?></b></label>
        <form method="post">
            <label>Task Name: </label><input name="name" value="<?php print $row['name']; ?>"><br>
        
            <label>Task Description: </label><input name="description" value="<?php print $row['description']; ?>"><br>
        
            <label>Task Status: 
            <select name="status">
                <option selected="selected">Not Started</option>
                <option>In Progress</option>
                <option>Finished</option>
            </select><br>
        
            <label>Task Duration: </label><input name="duration" value="<?php print $row['duration']; ?>"><br>

            <input type="submit">
        </form>
    <?php } ?>
    <a href="tasks.php?id=<?php print $_GET['binding_id']; ?>" type="button" class="btn-danger">Go Back</a>
</body>
</html>