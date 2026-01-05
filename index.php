<?php include 'includes/header.php'; ?>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold mb-3">
                    Book Doctor Appointments Easily
                </h1>
                <p class="mb-4">
                    Simple, fast and secure appointment booking with trusted doctors.
                </p>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="user/login.php" class="btn btn-light btn-lg">
                        Get Started
                    </a>
                <?php else: ?>
                    <a href="user/doctors.php" class="btn btn-light btn-lg">
                        Book Appointment
                    </a>
                <?php endif; ?>
            </div>

            <div class="col-md-6 text-center">
                <img src="assets/images/doctor-hero.png" alt="Doctor">
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-4">
                <h5 class="fw-bold">Search Doctors</h5>
                <p class="text-muted">Find doctors by specialty</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h5 class="fw-bold">Book Appointment</h5>
                <p class="text-muted">Choose date and time</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h5 class="fw-bold">Get Approval</h5>
                <p class="text-muted">Admin confirms appointment</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
