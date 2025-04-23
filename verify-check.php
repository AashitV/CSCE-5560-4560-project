<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])) {
    echo "Session expired.";
    exit;
}

$username = $_SESSION['username'];
$enteredCode = $_POST['code'];

$stmt = $pdo->prepare("SELECT mfa_code, mfa_expiry FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    $currentTime = date("Y-m-d H:i:s");

    if ($enteredCode == $user['mfa_code'] && $currentTime < $user['mfa_expiry']) {
        echo "MFA Verified! You are now logged in, " . htmlspecialchars($username);

header(header: "refresh:3; url=userhome.php");
exit;
    } else {
        echo "Invalid or expired code.";
    }
}
?>
