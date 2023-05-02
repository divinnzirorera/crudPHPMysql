<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>signup form</h2>
    <form action="update.php" method="post">
        <fieldset>
            <legend>personal info</legend>
            firstname:<br>
            <input type="text" name="firstname" value="$row["fname"]">
            <br>
            lastname:<br>
            <input type="text" name="lastname" value="$row["lname"]">
            <br>
            email:<br>
            <input type="email" name="email" value="$row["email"]">
            <br>
            password:<br>
            <input type="password" name="password" value="$row["password"]">
            <br>
            Gender: <br> <br>
            <input type="radio" name="male" id="" value="male"> male
            <input type="radio" name="female" id="" value="female">female
            <br>
            <input type="submit" value="update" name="submit">

        </fieldset>
    </form>
    <?php
    
    include 'connection.php';
    $sql = "SELECT * FROM User";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc()


    if(isset($_POST['submit'])){
        $first_name = $_POST['firstname'];
        $last_name =  $_POST['lastname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];
        $sql="UPDATE User SET fname='$first_name', lname='$last_name', email='$email', password='$password', gender='$gender' WHERE id=$id";
    
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
        
    }
    ?>


</body>

</html>