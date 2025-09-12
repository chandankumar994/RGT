<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    $query = "INSERT INTO employees (firstname, lastname, department, email, country) 
              VALUES ('$firstname', '$lastname', '$department', '$email', '$country')";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?page=employees");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<h3>Add Employee</h3>
<form method="POST">
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
    <a href="dashboard.php?page=employees" class="btn btn-secondary">Cancel</a>
</form>
