<?php
include 'includes/db.php';

if(isset($_POST['send']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages(name,email,message)
            VALUES('$name','$email','$message')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Message sent successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Something went wrong!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us</title>

<link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<?php include 'includes/header.php'; ?>

<section class="contact-section">

<div class="container">

<h1 class="text-center text-primary fw-bold mb-4">
Contact Us
</h1>

<div class="row align-items-stretch">

<div class="col-lg-5 text-center mb-4">

<img src="images/contact.png"
class="img-fluid contact-img">

</div>

<div class="col-lg-7">

<form method="POST">

<div class="mb-3">
<input type="text" name="name" class="form-control" placeholder="Your Name" required>
</div>

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Your Email" required>
</div>

<div class="mb-3">
<textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
</div>

<button type="submit" name="send" class="btn">
Send Message
</button>

</form>

<div class="row text-center mt-4">

<div class="col-md-4">

<i class="fa-solid fa-location-dot fa-2x text-primary"></i>

<p class="mt-2">Mangaluru</p>

</div>

<div class="col-md-4">

<i class="fa-solid fa-envelope fa-2x text-primary"></i>

<p class="mt-2">eventhub@gmail.com</p>

</div>

<div class="col-md-4">

<i class="fa-solid fa-phone fa-2x text-primary"></i>

<p class="mt-2">+91 9876543210</p>

</div>

</div>

</div>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>