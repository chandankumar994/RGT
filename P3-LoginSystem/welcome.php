<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html>
<head><title>Welcome</title></head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
  <p>You are now logged in.</p>
  <a href="logout.php">Logout</a>
</body>
</html>