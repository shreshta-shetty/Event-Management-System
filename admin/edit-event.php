<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $venue = $_POST['venue'];

    if($_FILES['image']['name'] != "")
    {
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($temp,"../uploads/".$image);

        $sql="UPDATE events SET
        title='$title',
        description='$description',
        event_date='$event_date',
        event_time='$event_time',
        venue='$venue',
        image='$image'
        WHERE id='$id'";
    }
    else
    {
        $sql="UPDATE events SET
        title='$title',
        description='$description',
        event_date='$event_date',
        event_time='$event_time',
        venue='$venue'
        WHERE id='$id'";
    }

    if(mysqli_query($conn,$sql))
    {
        header("Location: manage-events.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Edit Event</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Title</label>
<input
type="text"
name="title"
class="form-control"
value="<?php echo $row['title'];?>"
required>
</div>

<div class="mb-3">
<label>Description</label>
<textarea
name="description"
class="form-control"
rows="5"
required><?php echo $row['description'];?></textarea>
</div>

<div class="mb-3">
<label>Date</label>
<input
type="date"
name="event_date"
class="form-control"
value="<?php echo $row['event_date'];?>"
required>
</div>

<div class="mb-3">
<label>Time</label>
<input
type="time"
name="event_time"
class="form-control"
value="<?php echo $row['event_time'];?>"
required>
</div>

<div class="mb-3">
<label>Venue</label>
<input
type="text"
name="venue"
class="form-control"
value="<?php echo $row['venue'];?>"
required>
</div>

<div class="mb-3">

<label>Current Image</label><br>

<img src="../uploads/<?php echo $row['image']; ?>" width="150">

</div>

<div class="mb-3">

<label>Change Image (Optional)</label>

<input
type="file"
name="image"
class="form-control">

</div>

<button
type="submit"
name="update"
class="btn btn-success">

Update Event

</button>

<a href="manage-events.php" class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

</body>

</html>