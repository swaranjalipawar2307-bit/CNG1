<?php
include '../includes/config.php';
include '../includes/header.php';
if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = 'UTF-8'>
<title>User Dashboard</title>
<link rel = 'stylesheet' href = '../assets/styles.css'>
<link rel = 'stylesheet' href = '../assets/ui.css'>
</head>
<body>
<div class = 'dashboard-container'>
<h2>Welcome, <?php echo $_SESSION[ 'user_name' ];
?> 👋</h2>
<a href = 'book.php'>🚗 Book CNG</a>
<a href = 'map.php'>📍 Find Nearest Station</a>
<a href = 'profile.php'>👤 Update Profile</a>
<a href="feedback.php">⭐ Give Feedback</a>
<div class="wait-box">
    ⏳ Estimated Waiting Time:
    <span id="waitTime">Loading...</span> minutes
</div>

<script>
fetch("check_waiting_time.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("waitTime").innerText = data;
    });
</script>

<a class = 'logout-btn' href = 'logout.php'>Logout</a>
</div>
<?php include '../includes/footer.php';
?>
</body>
</html>
