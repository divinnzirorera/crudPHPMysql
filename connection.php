<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'STUDENT_DB';
$conn = new mysqli($servername,$username, $password, $dbname);
if(!$conn){
    echo "Connection failed";
}
else{
    echo "Connection was succesful";
};
?>