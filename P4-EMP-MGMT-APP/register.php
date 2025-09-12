<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $error = "⚠ Username already exists!";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php?registered=1");
            exit;
        } else {
            $error = "❌ Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - User System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {background: #495057; display: flex; align-items: center; justify-content: center; height: 100vh;}
    .card {width: 380px; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,.2);}
  </style>
</head>
<body>
<div class="card">
  <h3 class="text-center mb-3">📝 Register</h3>
  <?php if (!empty($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success w-100">Register</button>
  </form>
  <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>