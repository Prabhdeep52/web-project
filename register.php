<?php

session_start();


include 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $mname = isset($_POST['mname']) ? trim($_POST['mname']) : null;
    $phone = trim($_POST['phone']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $language = $_POST['language'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']) ? 1 : 0;


    if (empty($fname) || empty($lname) || empty($phone) || empty($age) || empty($gender) || empty($country) || empty($language) || empty($password)) {
        die("All required fields must be filled out.");
    }


    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long.");
    }


    $hashed_password = password_hash($password, PASSWORD_BCRYPT);


    $sql = "INSERT INTO users (fname, lname, mname, phone, age, gender, country, language, password_hash, terms)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);


    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }


    $stmt->bind_param("ssssissssi", $fname, $lname, $mname, $phone, $age, $gender, $country, $language, $hashed_password, $terms);


    if ($stmt->execute()) {
        echo "Registration successful! <a href='login/login.html'>Log in here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>