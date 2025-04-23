<?php
session_start();

echo "<h2>Thank you for your payment!</h2>";
echo "<p>Your account is now upgraded to premium.</p>";


header("refresh:3; url=userhomepremium.php");
exit;
?>
