<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (($file = fopen("users.csv", "r")) !== false) {
        $found = false;
        while (($row = fgetcsv($file)) !== false) {
            if ($row[0] === $username && password_verify($password, $row[1])) {
                $found = true;
                break;
            }
        }
        fclose($file);

        if ($found) {
            $_SESSION['user'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "No users registered yet!";
    }
}
?>
<!doctype html>
<html>
<head><title>Login</title></head>
<body>
  <h1>Login</h1>
  <form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>