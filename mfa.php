<?php
session_start();
require 'database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $code = rand(100000, 999999);
        $expiry = date("Y-m-d H:i:s", time() + 300);

        $stmt = $pdo->prepare("UPDATE users SET mfa_code = ?, mfa_expiry = ? WHERE username = ?");
        $stmt->execute([$code, $expiry, $username]);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('', 'OptimusFit');
            $mail->addAddress($user['email'], $user['username']);
            $mail->isHTML(true);
            $mail->Subject = 'Your MFA Code from OptimusFit';
            $mail->Body    = "Hi {$user['username']},<br><br>Your one-time MFA code is: <strong>$code</strong><br>This code will expire in 5 minutes.";

            $mail->send();

            $_SESSION['username'] = $username;
            header("Location: verify.php");
            exit;
        } catch (Exception $e) {
            echo "Email failed: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid username or password.";
        header(header: "refresh:3; url=login.php");
    }
}
?>
