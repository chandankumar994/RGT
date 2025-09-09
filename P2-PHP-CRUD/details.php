<?php
include 'db.php';
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Employee Details</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> <?= $row['id'] ?></li>
    <li class="list-group-item"><strong>Firstname:</strong> <?= $row['firstname'] ?></li>
    <li class="list-group-item"><strong>Lastname:</strong> <?= $row['lastname'] ?></li>
    <li class="list-group-item"><strong>Department:</strong> <?= $row['department'] ?></li>
    <li class="list-group-item"><strong>Email:</strong> <?= $row['email'] ?></li>
    <li class="list-group-item"><strong>Country:</strong> <?= $row['country'] ?></li>
</ul>
<br>
<a href="index.php" class="btn btn-secondary">Back</a>
</body>
</html>