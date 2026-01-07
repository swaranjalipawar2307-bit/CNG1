<?php
session_start();
include '../includes/config.php';

// ❗Correct Session Check
if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit();
}

$uid = $_SESSION[ 'user_id' ];
$u = mysqli_fetch_assoc( mysqli_query( $conn, "SELECT * FROM users WHERE id='$uid'" ) );

// 🚀 Update Profile
if ( isset( $_POST[ 'up' ] ) ) {
    $name = $_POST[ 'name' ];
    $veh  = $_POST[ 'vehicle' ];

    mysqli_query( $conn, "UPDATE users SET name='$name', vehicle='$veh' WHERE id='$uid'" );
    $success = '✔ Profile Updated Successfully!';

    // Reload updated data
    $u = mysqli_fetch_assoc( mysqli_query( $conn, "SELECT * FROM users WHERE id='$uid'" ) );
}
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<title>My Profile</title>

<!-- MAIN Stylesheet -->
<link rel = 'stylesheet' href = '/CNG_STATION_NAVIGATOR/assets/styles.css'>
<link rel = 'stylesheet' href = '../assets/ui.css'>

<style>
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    background: #f4f4f4;
    /* White + Light Gray Background */
    height: 100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding: 20px;
}

/* ---------- White Clean Profile Box ---------- */
.profile-box {
    width: 95%;
    max-width: 450px;
    background: #ffffff;
    border-radius: 18px;
    padding: 30px;
    text-align: center;
    color: #333;
    border: 1px solid #ddd;
    box-shadow: 0 5px 18px rgba( 0, 0, 0, 0.15 );
}
.profile-box h2 {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    color:#064663;
}
.profile-box input {
    width: 100%;
    padding: 14px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 15px;
    color:#333;
    background:white;
}
.profile-box input::placeholder {
    color: #666;
}

.profile-box button {
    width: 100%;
    padding: 14px;
    background: #064663;
    border:none;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor:pointer;
    transition: .3s;
}
.profile-box button:hover {
    background: #032f42;
}

.success-msg {
    background:#2ecc71;
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
    font-weight:bold;
    color:white;
}

/* Back Button */
.back-btn {
    display:block;
    margin-top:15px;
    color:#064663;
    font-weight:600;
    text-decoration:none;
}
.back-btn:hover {
    text-decoration:underline;
}
</style>
</head>
<body>

<div class = 'profile-box'>
<h2>👤 My Profile</h2>

<?php if ( isset( $success ) ) echo "<p class='success-msg'>$success</p>";
?>

<form method = 'POST'>
<input type = 'text' name = 'name'
value = "<?= htmlspecialchars($u['name']) ?>" placeholder = 'Your Name' required>

<input type = 'text' name = 'vehicle'
value = "<?= htmlspecialchars($u['vehicle']) ?>" placeholder = 'Vehicle Name' required>

<button name = 'up'>Update Profile</button>
</form>

<a href = 'user_dashboard.php' class = 'back-btn'>⬅ Back to Dashboard</a>
</div>

</body>
</html>