<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])){
    $eid = $_SESSION['edid'];
    $status = $_POST['sta'];
    // Validate and sanitize inputs
    // $status = mysqli_real_escape_string($conn, $status);

    $sql = "UPDATE tblbooking SET Status = '$status' WHERE ID = '$eid'";
    $query = mysqli_query($conn, $sql);

    if ($query == TRUE) {
        echo '<script>alert("Booking status has been updated"); window.location="new_bookings.php";</script>';
    } else {
        echo '<script>alert("Update failed! Try again later") window.location="new_bookings.php";</script>';
    }

    $stmt->close();
}

?>




