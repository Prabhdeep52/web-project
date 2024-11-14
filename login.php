<?php
session_start();


include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['username']); // first name as username
    $password = trim($_POST['password']);

    
    if (empty($username) || empty($password)) {
        die("Please fill out both fields.");
    }

    
    $sql = "SELECT id, fname, password_hash FROM users WHERE fname = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }


    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

    
        if (password_verify($password, $user['password_hash'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['fname'];

            
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
