<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT username, email FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Profile</title>
    <style>
        body { font-family: Arial;
        background: url('treadmil.webp') no-repeat center center fixed;
        background-size: cover;
        text-align: center; 
        padding-top: 50px; 
        }
        .profile-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="profile-box">
        <h1>Your Profile</h1>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="userhome.php">Back to Home</a>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>