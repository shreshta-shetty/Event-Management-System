<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

$result = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Events</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4">Manage Events</h2>

<a href="dashboard.php" class="btn btn-secondary mb-3">
← Dashboard
</a>

<a href="add-event.php" class="btn btn-primary mb-3">
+ Add Event
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Image</th>

<th>Title</th>

<th>Date</th>

<th>Time</th>

<th>Venue</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img src="../uploads/<?php echo $row['image']; ?>" width="100">

</td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['event_time']; ?></td>

<td><?php echo $row['venue']; ?></td>

<td>

<a href="edit-event.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="delete-event.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this event?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>

</html>