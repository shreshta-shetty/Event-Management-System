<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

$sql = "SELECT registrations.*, events.title
        FROM registrations
        JOIN events ON registrations.event_id = events.id
        ORDER BY registrations.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Event Registrations</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4 fw-bold">Event Registrations</h2>

<a href="dashboard.php" class="btn btn-secondary mb-3">
    ← Dashboard
</a>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>College</th>

<th>Event</th>

<th>Registered On</th>

</tr>

</thead>

<tbody>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['college']; ?></td>

<td><?php echo $row['title']; ?></td>

<td>
<?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?>
</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</body>

</html>