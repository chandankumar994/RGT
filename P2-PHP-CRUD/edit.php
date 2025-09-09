<?php
include 'db.php';
$id = $_GET['id'];

// Get current record
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $dept      = $_POST['department'];
    $email     = $_POST['email'];
    $country   = $_POST['country'];

    $sql = "UPDATE employees SET 
            firstname='$firstname', lastname='$lastname',
            department='$dept', email='$email', country='$country'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!doctype html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Edit Employee</h2>
<form method="post">
    <input class="form-control mb-2" type="text" name="firstname" value="<?= $row['firstname'] ?>" required>
    <input class="form-control mb-2" type="text" name="lastname" value="<?= $row['lastname'] ?>" required>
    <input class="form-control mb-2" type="text" name="department" value="<?= $row['department'] ?>" required>
    <input class="form-control mb-2" type="email" name="email" value="<?= $row['email'] ?>" required>
    <input class="form-control mb-2" type="text" name="country" value="<?= $row['country'] ?>" required>
    <button class="btn btn-primary" type="submit">Update</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>