<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

if(isset($_POST['add']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $venue = $_POST['venue'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp, "../uploads/".$image);

    $sql = "INSERT INTO events(title,description,event_date,event_time,venue,image)
            VALUES('$title','$description','$event_date','$event_time','$venue','$image')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Event Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed to Add Event!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Add New Event</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Event Title</label>

<input
type="text"
name="title"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"
rows="5"
required></textarea>

</div>

<div class="mb-3">

<label>Date</label>

<input
type="date"
name="event_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Time</label>

<input
type="time"
name="event_time"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Venue</label>

<input
type="text"
name="venue"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Event Image</label>

<input
type="file"
name="image"
class="form-control"
required>

</div>

<button
type="submit"
name="add"
class="btn btn-primary">

Add Event

</button>

<a href="dashboard.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>
</html>