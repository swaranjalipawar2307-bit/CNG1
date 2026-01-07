<?php
include '../includes/config.php';
include '../includes/header.php';

if ( isset( $_POST[ 'login' ] ) ) {
    $u = $_POST[ 'username' ];
    $p = $_POST[ 'password' ];
    $q = mysqli_query( $conn, "SELECT * FROM users WHERE email='$u' AND password='$p'" );

    if ( mysqli_num_rows( $q ) > 0 ) {
        $user = mysqli_fetch_assoc( $q );
        $_SESSION[ 'user_id' ] = $user[ 'id' ];
        $_SESSION[ 'user_name' ] = $user[ 'name' ];
        header( 'Location: user_dashboard.php' );
        exit();
    } else {
        $error = '❌ Invalid Email or Password';
    }
}
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<title>User Login</title>

<link rel = 'stylesheet' href = '/CNG_STATION_NAVIGATOR/assets/styles.css'>
<link rel = 'stylesheet' href = '../assets/ui.css'>
<script src = '/CNG_STATION_NAVIGATOR/assets/script.js'></script>

</head>
<body>
<div class = 'dashboard-container'>
<h2>👤 User Login</h2>

<?php if ( isset( $error ) ) echo "<p style='color:red; font-weight:bold;'>$error</p>";
?>

<form method = 'POST'>
<input type = 'text' name = 'username' placeholder = 'Enter Email' required>
<input type = 'password' name = 'password' placeholder = 'Enter Password' required>
<button name = 'login'>Login</button>
</form>

<br>
<a href = 'register.php'>📝 Create New Account</a>
</div>
<?php include '../includes/footer.php';
?>
</body>
</html>
