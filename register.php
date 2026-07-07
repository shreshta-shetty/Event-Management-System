<?php
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    echo "
    <main>
        <div style='min-height:70vh; display:flex; justify-content:center; align-items:center;'>
            <h2>Invalid Event!</h2>
        </div>
    </main>";
    include 'includes/footer.php';
    exit();
}

$event_id = $_GET['id'];

$event = mysqli_query($conn, "SELECT * FROM events WHERE id='$event_id'");

if(mysqli_num_rows($event)==0){
    echo "
    <main>
        <div style='min-height:70vh; display:flex; justify-content:center; align-items:center;'>
            <h2>Event Not Found!</h2>
        </div>
    </main>";
    include 'includes/footer.php';
    exit();
}

$row = mysqli_fetch_assoc($event);

if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $college = mysqli_real_escape_string($conn, $_POST['college']);

    // Check duplicate registration
    $check = mysqli_query($conn,
        "SELECT * FROM registrations
         WHERE email='$email' AND event_id='$event_id'");

    if (mysqli_num_rows($check) > 0) {

        echo "<script>alert('You have already registered for this event!');</script>";

    } else {

        $sql = "INSERT INTO registrations
        (name,email,phone,college,event_id)
        VALUES
        ('$name','$email','$phone','$college','$event_id')";

        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('Registration Successful!');</script>";

        } else {

            echo "<script>alert('Registration Failed!');</script>";

        }
    }
}
?>

<main>

<div class="container mt-5 mb-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2>Register for Event</h2>

</div>

<div class="card-body">

<h4><?php echo $row['title']; ?></h4>

<p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>

<p><strong>Venue:</strong> <?php echo $row['venue']; ?></p>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>College</label>
<input type="text" name="college" class="form-control" required>
</div>

<button type="submit" name="register" class="btn btn-success">
Register
</button>

<a href="events.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

</main>

<?php include 'includes/footer.php'; ?>