<?php
include("db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$employee = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    $query = "UPDATE employees SET 
              firstname='$firstname', lastname='$lastname', department='$department', 
              email='$email', country='$country' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?page=employees");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<h3>Edit Employee</h3>
<form method="POST">
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo $employee['firstname']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo $employee['lastname']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" value="<?php echo $employee['department']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $employee['email']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control" value="<?php echo $employee['country']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="dashboard.php?page=employees" class="btn btn-secondary">Cancel</a>
</form>
