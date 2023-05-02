<?php
include 'connection.php';
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql="DELETE FROM User WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
    
}
?>

<html>
    <a href="create.php" class="btn btn-info"> Create new record</a>
    <a href="read.php" class="btn btn-info" > View records from database</a>
</html>
