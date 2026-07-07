<?php
include 'includes/db.php';

if(!isset($_GET['id'])){
    header("Location: events.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM events WHERE id='$id'");

if(mysqli_num_rows($result)==0){
    echo "Event Not Found!";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<?php include 'includes/header.php'; ?>

<section class="event-details">

    <div class="event-image">
        <img src="uploads/<?php echo $row['image']; ?>" alt="">
    </div>

    <div class="event-info">

        <h1><?php echo $row['title']; ?></h1>

        <p><strong>📅 Date:</strong> <?php echo $row['event_date']; ?></p>

        <p><strong>📍 Venue:</strong> <?php echo $row['venue']; ?></p>

        <p><strong>⏰ Time:</strong>
            <?php echo date("H:i", strtotime($row['event_time'])); ?>
        </p>

        <h3>About Event</h3>

        <p><?php echo $row['description']; ?></p>

        <a href="register.php?id=<?php echo $row['id']; ?>" class="btn">
            Register Now
        </a>

    </div>

</section>

<?php include 'includes/footer.php'; ?>