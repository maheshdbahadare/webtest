<?php
// Database configuration
$host = 'localhost';      // Database host
$user = 'master';   // Database username
$pass = '12345678';   // Database password
$db   = 'formdata';   // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example: Assuming your form sends 'name' and 'email' fields via POST
$name  = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';

// Insert data into your table (replace 'users' with your table name)
$sql = "INSERT INTO myform (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>