<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id=?");
$stmt->execute([$_SESSION['user_id']]);
$data = $stmt->fetchAll();

include '../includes/header.php';
?>

<div class="container mt-4 fade-up">
<h4>My Appointments</h4>

<table class="table table-bordered shadow">
<tr>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
</tr>

<?php foreach ($data as $a): ?>
<tr>
<td><?= htmlspecialchars($a['doctor_name']) ?></td>
<td><?= $a['appointment_date'] ?></td>
<td><?= $a['appointment_time'] ?></td>
<td><?= $a['status'] ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>

<?php include '../includes/footer.php'; ?>
