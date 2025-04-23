<?php
require 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        echo "Passwords do not match!";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->rowCount() > 0) {
            echo "This Username or Email is already in use.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed]);

            echo "Account created! Welcome to OptimusFit! You can now <a href='login.php'>log in</a>.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="POST" action="signup.php">
<h2>Sign Up</h2>

    <label>Username:</label><br>
    <input type="text" name="username" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>

    <label>Confirm Password:</label><br>
    <input type="password" name="confirm" required><br><br>

    <input type="submit" value="Sign Up">

            <p>Already have an account? <a href="login.php">Log in here</a></p>
            <p> <a href="index.html">Back to Home</a></p>


</form>
</body>
</html>