<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM events WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: manage-events.php");
        exit();
    } else {
        echo "Error deleting event.";
    }
}
?>