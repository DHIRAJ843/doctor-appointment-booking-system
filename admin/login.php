<?php
require_once '../config/db.php';
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :e AND role = 'admin'");
    $stmt->execute(['e' => $_POST['email']]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['role'] = 'admin';
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Invalid admin credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">Admin Login</h2>

    <?php if ($message): ?>
        <div class="alert alert-danger text-center"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" class="card p-4 col-md-4 mx-auto">
        <input class="form-control mb-3" name="email" type="email" placeholder="Admin Email" required>
        <input class="form-control mb-3" name="password" type="password" placeholder="Password" required>
        <button class="btn btn-dark w-100">Login</button>
    </form>
</div>

</body>
</html>
