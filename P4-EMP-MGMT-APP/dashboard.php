<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width:250px; height:100vh;">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="dashboard.php?page=home" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="dashboard.php?page=employees" class="nav-link text-white">Employees</a></li>
            <li class="nav-item"><a href="dashboard.php?page=add_employee" class="nav-link text-white">Add Employee</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Welcome to Dashboard</h2>
            <span>Hi, <?php echo strtoupper($_SESSION['username']); ?> 👋</span>
        </div>

        <?php
        // Load different content
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == "employees") {
                include("employees.php");
            } elseif ($page == "add_employee") {
                include("add_employee.php");
            } elseif ($page == "edit_employee" && isset($_GET['id'])) {
                include("edit_employee.php");
            } else {
                echo "<p>This is the Home page content.</p>";
            }
        } else {
            echo "<p>This is the Home page content.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
