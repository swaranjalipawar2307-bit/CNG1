<?php
include '../includes/config.php';

$uid = $_SESSION['user_id'];

/* user ची latest booking */
$userBooking = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT booking_time 
        FROM bookings 
        WHERE user_id='$uid' 
        ORDER BY booking_time DESC 
        LIMIT 1
    ")
);

/* user च्या आधी किती pending bookings आहेत */
$queue = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT COUNT(*) AS total 
        FROM bookings 
        WHERE booking_time < '{$userBooking['booking_time']}'
        AND status='pending'
    ")
);

$vehiclesBefore = $queue['total'];
$timePerVehicle = 10; // minutes

$estimatedWait = $vehiclesBefore * $timePerVehicle;

echo $estimatedWait;
?>
