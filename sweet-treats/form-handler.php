<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "sweet_treats");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message received! Thank you.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
