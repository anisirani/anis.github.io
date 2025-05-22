<?php
$servername = "localhost"; // Change to your server's name or IP
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "employees"; // The database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
