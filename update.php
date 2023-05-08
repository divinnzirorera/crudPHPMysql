<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $first_name = $_POST['firstname'];
    $last_name =  $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $sql="UPDATE User SET fname='$first_name', lname='$last_name', email='$email', password='$password', GENDER='$gender' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    
} else {
    // Get user data from database
    $id = $_GET['id'];
    $sql = "SELECT * FROM User WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Render update form with user data pre-filled
    ?>
    <html lang="en">  
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h2>Update user</h2>
        <form action="update.php" method="post">
            <fieldset>
                <legend>Personal info</legend>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                Firstname:<br>
                <input type="text" name="firstname" value="<?php echo $row['fname']; ?>">
                <br>
                Lastname:<br>
                <input type="text" name="lastname" value="<?php echo $row['lname']; ?>">
                <br>
                Email:<br>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
                <br>
                Password:<br>
                <input type="password" name="password" value="<?php echo $row['password']; ?>">
                <br>
                Gender: <br> <br>
                <input type="radio" name="gender" id="male" value="male" <?php echo ($row['GENDER'] == 'male') ? 'checked' : ''; ?>> Male
                <input type="radio" name="gender" id="female" value="female" <?php echo ($row['GENDER'] == 'female') ? 'checked' : ''; ?>> Female
                <br>
                <input type="submit" value="Update" name="submit">

            </fieldset>
        </form>
        <a href="views.php" class="btn btn-info" > View records from database</a>
    </body>
    </html>
    <?php
}
?>

        
