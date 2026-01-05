<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare(
    "SELECT doctor_name, appointment_date, appointment_time, status
     FROM appointments
     WHERE user_id = :uid
     ORDER BY appointment_date DESC"
);
$stmt->execute(['uid' => $user_id]);
$appointments = $stmt->fetchAll();

include '../includes/header.php';
?>

<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">My Appointments</h3>
        <a href="doctors.php" class="btn btn-primary">
            Book New Appointment
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-4">

            <?php if (count($appointments) === 0): ?>
                <p class="text-muted mb-0">
                    You have not booked any appointments yet.
                </p>
            <?php else: ?>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($appointments as $a): ?>
                            <tr>
                                <td><?= htmlspecialchars($a['doctor_name']) ?></td>
                                <td><?= date("d M Y", strtotime($a['appointment_date'])) ?></td>
                                <td><?= date("h:i A", strtotime($a['appointment_time'])) ?></td>
                                <td>
                                    <?php
                                        $status = $a['status'];
                                        $badge = 'secondary';

                                        if ($status === 'Approved') $badge = 'success';
                                        if ($status === 'Rejected') $badge = 'danger';
                                        if ($status === 'Pending')  $badge = 'warning';
                                    ?>
                                    <span class="badge bg-<?= $badge ?>">
                                        <?= $status ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
