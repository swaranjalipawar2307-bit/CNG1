<?php
include '../includes/config.php';
include '../includes/header.php';
if ( isset( $_POST[ 'reg' ] ) ) {
    $name = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $pass = $_POST[ 'password' ];

    mysqli_query( $conn, "INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')" );
    header( 'Location: login.php' );
    exit();
}
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<title>User Register</title>

<!-- Link to your existing CSS -->
<link rel = 'stylesheet' href = '/CNG_STATION_NAVIGATOR/assets/style.css'>

<link rel = 'stylesheet' href = '../assets/ui.css'>
<style>
body {
    background: #eef7ff;
    font-family: Arial, sans-serif;
}

.form-box {
    width: 90%;
    max-width: 450px;
    background: white;
    padding: 30px;
    margin: 50px auto;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 15px rgba( 0, 0, 0, 0.18 );
}

.form-box h2 {
    color: #064663;
    font-size: 28px;
    margin-bottom: 20px;
}

.form-box input {
    width: 90%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #aaa;
    font-size: 16px;
}

.form-box button {
    background: #064663;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    width: 95%;
    margin-top: 10px;
}

.form-box button:hover {
    background: #032f42;
}

.login-link {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #064663;
    font-weight: bold;
}
</style>

</head>
<body>

<div class = 'form-box'>
<h2>📝 User Register</h2>
<form method = 'POST'>
<input type = 'text' name = 'name' placeholder = 'Enter Name' required>
<input type = 'email' name = 'email' placeholder = 'Enter Email' required>
<input type = 'password' name = 'password' placeholder = 'Enter Password' required>
<button name = 'reg'>Register</button>
</form>
<a href = 'login.php' class = 'login-link'>⬅ Already have an account? Login</a>
</div>
<?php include '../includes/footer.php';
?>
</body>
</html>