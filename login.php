<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form action="mfa.php" method="post">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>

            <input type="submit" value="Sign In">

            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
            <p> <a href="index.html">Back to Home</a></p>
        </form>
    </div>
</body>
</html>
