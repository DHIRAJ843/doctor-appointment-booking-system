<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CareConnect</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/doctor-appointment-booking-system/assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/doctor-appointment-booking-system/">
            CareConnect
        </a>

        <div class="ms-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/doctor-appointment-booking-system/user/dashboard.php" class="btn btn-outline-light btn-sm me-2">
                    Dashboard
                </a>
                <a href="/doctor-appointment-booking-system/user/logout.php" class="btn btn-danger btn-sm">
                    Logout
                </a>
            <?php else: ?>
                <a href="/doctor-appointment-booking-system/user/login.php" class="btn btn-outline-light btn-sm me-2">
                    Login
                </a>
                <a href="/doctor-appointment-booking-system/user/register.php" class="btn btn-warning btn-sm">
                    Register
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>
