<?php
echo"hi";
$servername = "localhost";
$username = "Islam";
$password = "Test1234";
$dbName="Validation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$firstName = $_POST['fName'];
$lastName = $_POST['lName'];
$email = $_POST['eMail'];
$password = $_POST['psWord'];
$college = $_POST['colLege'];
$major = $_POST['maJor'];


echo $firstName. $lastName. $email.$password;
$sql = "INSERT INTO UserData  VALUES  ('$firstName','$lastName','$email','$password','$college','$major')";
echo $sql;
if ($conn->query($sql) === TRUE) {
    header("Location: ../html/login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
