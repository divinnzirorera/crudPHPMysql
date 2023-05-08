<?php
include 'connection.php';
$sql = "SELECT * FROM User";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table ><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th><th>update</th><th>delete</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["email"]. "</td><td>"  . $row["GENDER"]. "</td><td><a href='update.php?id=".$row["id"]."'>Edit</a></td> <td> <form method='post' action='delete.php'><input type='hidden' name='id' value='".$row["id"]."'><button type='submit' name='delete'>Delete</button></form></td></tr>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }
    
    $conn->close();
    ?>
    
    <html>
        <a href="signup.html" class="btn btn-info"> Create new record</a>
    </html>
    
