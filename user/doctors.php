<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include '../includes/header.php';
?>

<div class="container my-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Doctors</h2>
        <p class="text-muted">
            Choose a specialist and book your appointment instantly
        </p>
    </div>

    <div class="row g-4">

        <!-- Doctor 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="../assets/images/doctor-hero.png"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Dr. Rajesh Patel</h5>
                    <p class="text-muted mb-1">Cardiologist</p>
                    <p class="small text-secondary">
                        12+ years experience in heart care and diagnosis.
                    </p>

                    <a href="book_appointment.php?doctor=Dr. Rajesh Patel"
                       class="btn btn-primary w-100">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>

        <!-- Doctor 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="../assets/images/doctor-hero.png"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Dr. Neha Shah</h5>
                    <p class="text-muted mb-1">Dermatologist</p>
                    <p class="small text-secondary">
                        Specialist in skin care, acne, and allergies.
                    </p>

                    <a href="book_appointment.php?doctor=Dr. Neha Shah"
                       class="btn btn-primary w-100">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>

        <!-- Doctor 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="../assets/images/doctor-hero.png"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Dr. Amit Verma</h5>
                    <p class="text-muted mb-1">Orthopedic</p>
                    <p class="small text-secondary">
                        Expert in bone, joint, and sports injuries.
                    </p>

                    <a href="book_appointment.php?doctor=Dr. Amit Verma"
                       class="btn btn-primary w-100">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>
