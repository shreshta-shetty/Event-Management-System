<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About Us</title>

<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<?php include 'includes/header.php'; ?>

<section class="about-section">

<div class="container">

<h1 class="text-center text-primary fw-bold mb-3">
About EventHub
</h1>

<div class="row align-items-center mb-3">

<div class="col-lg-6 text-center">

<img src="images/about.png"
class="img-fluid about-img">

</div>

<div class="col-lg-6">

<h2 class="fw-bold mb-3">
Simple Event Management System
</h2>

<p class="text-muted">
EventHub is a web-based Event Management System developed using
PHP and MySQL. It helps administrators create and manage events
while allowing users to explore upcoming events and register online
through a simple interface.
</p>

<div class="row mt-4">

<div class="col-6">

<p>✔ Event Management</p>
<p>✔ Online Registration</p>

</div>

<div class="col-6">

<p>✔ Admin Login</p>
<p>✔ MySQL Database</p>

</div>

</div>

</div>

</div>

<div class="row text-center g-2">

<div class="col-md-3">

<div class="feature-card">

<i class="fa-solid fa-calendar-days"></i>

<h5>Events</h5>

<p>Create and manage events.</p>

</div>

</div>

<div class="col-md-3">

<div class="feature-card">

<i class="fa-solid fa-user-plus"></i>

<h5>Registration</h5>

<p>Online event registration.</p>

</div>

</div>

<div class="col-md-3">

<div class="feature-card">

<i class="fa-solid fa-user-shield"></i>

<h5>Admin</h5>

<p>Manage events easily.</p>

</div>

</div>

<div class="col-md-3">

<div class="feature-card">

<i class="fa-solid fa-database"></i>

<h5>Database</h5>

<p>Store event records.</p>

</div>

</div>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>