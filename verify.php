<!DOCTYPE html>
<html>
<head>
  <title>Verify MFA</title>
  <link rel="stylesheet" href="styles.css">

</head>
<body>
  <h2>Enter your verification code</h2>
  <form action="verify-check.php" method="post">
    <label for="code">6-digit code:</label>
    <input type="text" id="code" name="code" required>
    <input type="submit" value="Verify">
  </form>
</body>
</html>
