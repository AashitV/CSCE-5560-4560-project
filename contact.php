<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('contact-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            max-width: 600px;
            margin: 80px auto;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: black;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .back-link {
            margin-top: 30px;
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <p><strong>Email:</strong> OptimusFitnessOF@gmail.com</p>
        <p><strong>Phone:</strong> WIP</p>
        <p><strong>Address:</strong> WIP</p>
        <p><strong>Hours:</strong> Mon-Sun, 10am - 7pm</p>
        <a class="back-link" href="userhome.php">Back to Home</a>
    </div>
</body>
</html>
