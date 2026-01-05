<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['doctor'])) {
    header("Location: doctors.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$doctor_name = $_GET['doctor'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];

    if ($date && $time) {

        $stmt = $pdo->prepare(
            "INSERT INTO appointments 
            (user_id, doctor_name, appointment_date, appointment_time, status)
            VALUES (:u, :d, :ad, :at, 'Pending')"
        );

        $stmt->execute([
            'u'  => $user_id,
            'd'  => $doctor_name,
            'ad' => $date,
            'at' => $time
        ]);

        $message = "Appointment booked successfully. Await admin approval.";
    } else {
        $message = "Please select date and time.";
    }
}

include '../includes/header.php';
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <h4 class="fw-bold mb-3">Book Appointment</h4>

                    <p class="mb-2">
                        <strong>Doctor:</strong> <?= htmlspecialchars($doctor_name) ?>
                    </p>

                    <?php if ($message): ?>
                        <div class="alert alert-info">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Appointment Date</label>
                            <input type="date"
                                   name="appointment_date"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Appointment Time</label>
                            <input type="time"
                                   name="appointment_time"
                                   class="form-control"
                                   required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Confirm Appointment
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
