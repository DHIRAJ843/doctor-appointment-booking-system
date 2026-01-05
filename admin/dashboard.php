<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$total = $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn();
$pending = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status='Pending'")->fetchColumn();
$approved = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status='Approved'")->fetchColumn();

include '../includes/admin_header.php';
?>

<div class="container my-5">

    <h3 class="fw-bold mb-4">Admin Dashboard</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <h6 class="text-muted">Total Appointments</h6>
                <h2 class="fw-bold"><?= $total ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <h6 class="text-muted">Pending</h6>
                <h2 class="fw-bold text-warning"><?= $pending ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center p-4">
                <h6 class="text-muted">Approved</h6>
                <h2 class="fw-bold text-success"><?= $approved ?></h2>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <a href="manage_appointments.php" class="btn btn-primary">
            Manage Appointments
        </a>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
