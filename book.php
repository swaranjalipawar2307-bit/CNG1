<?php
session_start();
include '../includes/config.php';
include '../includes/header.php';

if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit();
}

if ( isset( $_POST[ 'book' ] ) ) {
    $v = $_POST[ 'vehicle' ];
    $t = $_POST[ 'time' ];
    $q = $_POST[ 'qty' ];
    $uid = $_SESSION[ 'user_id' ];

    mysqli_query( $conn, "INSERT INTO bookings(user_id,vehicle_name,reaching_time,quantity)
    VALUES('$uid','$v','$t','$q')" );

    $success = '✔ Booking Successful!';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = 'UTF-8'>
<title>Book CNG</title>

<!-- 🎨 UI CSS + JS Path ( User Folder साठी योग्य ) -->
<link rel = 'stylesheet' href = '/CNG_STATION_NAVIGATOR/assets/style.css'>

<link rel = 'stylesheet' href = '../assets/ui.css'>
<script src = '/CNG_STATION_NAVIGATOR/assets/script.js'></script>

<style>
/* Page Background */
body {
    background: #eef7ff;
}

/* Booking Box */
.form-box {
    width: 90%;
    max-width: 450px;
    background: white;
    padding: 25px;
    margin: 40px auto;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 15px rgba( 0, 0, 0, 0.18 );
}
.form-box h2 {
    color: #064663;
    font-size: 26px;
    margin-bottom: 15px;
}
.form-box input {
    width: 90%;
    padding: 12px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #aaa;
}
.form-box button {
    background: #064663;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}
.form-box button:hover {
    background: #032f42;
}
.back-btn {
    display:inline-block;
    margin-top:10px;
    text-decoration:none;
    color:#064663;
    font-weight:bold;
}
</style>

</head>
<body>

<div class = 'form-box'>
<h2>🚗 Book CNG</h2>

<?php if ( isset( $success ) ) echo "<p style='color:green;font-weight:bold;'>$success</p>";
?>

<form method = 'POST'>
<input type = 'text' name = 'vehicle' placeholder = 'Enter Vehicle Name' required>
<input type = 'text' name = 'time' placeholder = 'Reaching Time' required>
<input type = 'number' name = 'qty' placeholder = 'Quantity (KG/Ltrs)' required>
<button name = 'book'>Book Now</button>
</form>

<a href = 'user_dashboard.php' class = 'back-btn'>⬅ Back to Dashboard</a>
</div>
<?php include '../includes/footer.php';
?>
</body>
</html>
