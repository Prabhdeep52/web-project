<?php
session_start();

if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    // Auto-login using cookies
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['first_name'] = $_COOKIE['first_name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Hotel Booking System</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <nav>
        <div class="nav-logo">Allure</div>
        <ul class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.html">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Page content here -->

</body>
</html>
