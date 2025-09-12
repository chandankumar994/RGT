<?php
include("db.php");
$result = mysqli_query($conn, "SELECT * FROM employees");
?>

<h3>Employees List</h3>
<a href="dashboard.php?page=add_employee" class="btn btn-primary mb-2">Add Employee</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Department</th>
        <th>Email</th>
        <th>Country</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['country']; ?></td>
        <td>
            <a href="dashboard.php?page=edit_employee&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
