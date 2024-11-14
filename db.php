<?php
$host = "localhost";       // Database host
$username = "root";        // Database username
$password = "";            // Database password (leave empty if none)
$dbname = "web_project"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
