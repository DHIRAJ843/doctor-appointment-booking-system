<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['approve'])) {
    $stmt = $pdo->prepare(
        "UPDATE appointments SET status='Approved' WHERE id=:id"
    );
    $stmt->execute(['id' => $_GET['approve']]);
}

if (isset($_GET['reject'])) {
    $stmt = $pdo->prepare(
        "UPDATE appointments SET status='Rejected' WHERE id=:id"
    );
    $stmt->execute(['id' => $_GET['reject']]);
}

$stmt = $pdo->query(
    "SELECT * FROM appointments ORDER BY created_at DESC"
);
$appointments = $stmt->fetchAll();

include '../includes/admin_header.php';
?>

<div class="container my-5">

    <h3 class="fw-bold mb-4">Manage Appointments</h3>

    <div class="card shadow border-0">
        <div class="card-body p-4">

            <?php if (count($appointments) === 0): ?>
                <p class="text-muted mb-0">No appointments found.</p>
            <?php else: ?>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>User ID</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($appointments as $a): ?>
                        <tr>
                            <td><?= $a['user_id'] ?></td>
                            <td><?= htmlspecialchars($a['doctor_name']) ?></td>
                            <td><?= date("d M Y", strtotime($a['appointment_date'])) ?></td>
                            <td><?= date("h:i A", strtotime($a['appointment_time'])) ?></td>
                            <td>
                                <?php
                                    $badge = 'secondary';
                                    if ($a['status'] === 'Pending')  $badge = 'warning';
                                    if ($a['status'] === 'Approved') $badge = 'success';
                                    if ($a['status'] === 'Rejected') $badge = 'danger';
                                ?>
                                <span class="badge bg-<?= $badge ?>">
                                    <?= $a['status'] ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($a['status'] === 'Pending'): ?>
                                    <a href="?approve=<?= $a['id'] ?>"
                                       class="btn btn-sm btn-success">
                                       Approve
                                    </a>
                                    <a href="?reject=<?= $a['id'] ?>"
                                       class="btn btn-sm btn-danger">
                                       Reject
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Done</span>
                                <?php endif; ?>
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
