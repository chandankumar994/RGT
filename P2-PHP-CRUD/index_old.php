<?php
include 'db.php';

// Fetch all employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<head>
    <title>Employee Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Employee List</h2>
<a href="create.php" class="btn btn-success mb-3">+ Add New Employee</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th><th>Firstname</th><th>Lastname</th>
        <th>Department</th><th>Email</th><th>Country</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['firstname'] ?></td>
        <td><?= $row['lastname'] ?></td>
        <td><?= $row['department'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['country'] ?></td>
        <td>
            <a href="details.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Details</a>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>