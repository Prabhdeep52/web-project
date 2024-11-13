<?php
$servername = "localhost";
$username = "root";
$password = "vitcc"; // Enter your MySQL password
$dbname = "allure_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
