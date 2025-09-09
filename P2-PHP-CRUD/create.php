<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $dept      = $_POST['department'];
    $email     = $_POST['email'];
    $country   = $_POST['country'];

    $sql = "INSERT INTO employees (firstname, lastname, department, email, country)
            VALUES ('$firstname', '$lastname', '$dept', '$email', '$country')";

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
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Add New Employee</h2>
<form method="post">
    <input class="form-control mb-2" type="text" name="firstname" placeholder="First Name" required>
    <input class="form-control mb-2" type="text" name="lastname" placeholder="Last Name" required>
    <input class="form-control mb-2" type="text" name="department" placeholder="Department" required>
    <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
    <input class="form-control mb-2" type="text" name="country" placeholder="Country" required>
    <button class="btn btn-success" type="submit">Save</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>