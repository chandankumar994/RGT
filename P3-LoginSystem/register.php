<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username == "" || $password == "") {
        echo "All fields are required!";
    } else {
        // Save to CSV (with hashed password for safety)
        $file = fopen("users.csv", "a");
        fputcsv($file, [$username, password_hash($password, PASSWORD_DEFAULT)]);
        fclose($file);

        echo "Registration successful! <a href='login.php'>Login here</a>";
        exit;
    }
}
?>
<!doctype html>
<html>
<head><title>Register</title></head>
<body>
  <h1>Register</h1>
  <form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>