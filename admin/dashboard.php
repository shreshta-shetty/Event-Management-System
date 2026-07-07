<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

// Count events
$eventQuery = mysqli_query($conn, "SELECT * FROM events");
$totalEvents = mysqli_num_rows($eventQuery);

// Count registrations
$regQuery = mysqli_query($conn, "SELECT * FROM registrations");
$totalRegistrations = mysqli_num_rows($regQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">
            <i class="fa-solid fa-calendar-days"></i> EventHub Admin
        </span>

        <a href="logout.php" class="btn btn-light">
            Logout
        </a>
    </div>
</nav>

<div class="container mt-5">

    <h2 class="mb-4">Welcome, Admin 👋</h2>

    <div class="row">

        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5>Total Events</h5>
                    <h1><?php echo $totalEvents; ?></h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5>Total Registrations</h5>
                    <h1><?php echo $totalRegistrations; ?></h1>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4">

        <a href="add-event.php" class="btn btn-primary me-2">
            ➕ Add Event
        </a>

        <a href="manage-events.php" class="btn btn-warning me-2">
            📅 Manage Events
        </a>

        <a href="registrations.php" class="btn btn-success">
            👥 View Registrations
        </a>
        <a href="messages.php" class="btn btn-primary">
    Contact Messages
</a>
    </div>

</div>

</body>
</html>