<?php
include 'includes/db.php';
include 'includes/header.php';
?>

<section class="events">

<h2 class="page-title">All Events</h2>

<div class="event-container">

<?php

$query = mysqli_query($conn,"SELECT * FROM events ORDER BY event_date ASC");

if(mysqli_num_rows($query)>0)
{

while($row=mysqli_fetch_assoc($query))
{

?>

<div class="card">

<img src="uploads/<?php echo $row['image']; ?>" alt="">

<h3><?php echo $row['title']; ?></h3>

<p><strong>📅 Date:</strong> <?php echo $row['event_date']; ?></p>

<p><strong>⏰ Time:</strong> <?php echo date("H:i", strtotime($row['event_time'])); ?></p>

<p><strong>📍 Venue:</strong> <?php echo $row['venue']; ?></p>

<p><?php echo $row['description']; ?></p>

<a href="register.php?id=<?php echo $row['id']; ?>" class="btn">
Register
</a>

</div>

<?php

}

}

else

{

echo "
<div style='width:100%; text-align:center; padding:80px 0;'>
    <h3>No Events Available</h3>
    <p>Please check back later for upcoming events.</p>
</div>";

}

?>

</div>

</section>

<?php include 'includes/footer.php'; ?>