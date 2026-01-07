<?php
session_start();
include '../includes/config.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit'])){
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $uid = $_SESSION['user_id'];

    mysqli_query($conn,
        "INSERT INTO feedback(user_id, rating, feedback)
         VALUES('$uid','$rating','$feedback')"
    );

    $success = "✅ Thank you for your feedback!";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Feedback</title>
<link rel="stylesheet" href="../assets/ui.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="dashboard-container">
    <h2>⭐ Rate Our Service</h2>

    <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="POST">
        <label>Rating (1–5)</label><br>
        <select name="rating" required>
            <option value="">Select</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select><br><br>

        <textarea name="feedback" placeholder="Write your feedback..." required></textarea><br>

        <button name="submit">Submit Feedback</button>
    </form>

    <a href="user_dashboard.php">⬅ Back</a>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
