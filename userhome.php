<?php
session_start();
require 'database.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Welcome</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            text-align: center;
            padding-top: 60px;
            background: url('treadmil.webp') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        .container {
            background: white;
            padding: 100px;
            border-radius: 20px;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        a.button {
            display: block;
            margin: 15px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            background-color: black;
            text-decoration: none;
            border-radius: 6px;
        }
        a.button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to OptimusFit, <?php echo $username;?> </h1>

        <a class="button" href="https://optimusfit.infinityfreeapp.com/AI.html">Talk to AI Agent</a>
        <a class="button" href="profile.php">View Profile</a>
        <a class="button" href="logout.php">Logout</a>
        <a class="button" href="contact.php">Contact Us</a>
        <p> <h2>This is your homepage<h2></p>
    </div>
</body>
</html>