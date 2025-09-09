<?php
include 'db.php';

// -------------------------
// SEARCH FEATURE
// -------------------------
$search = $_GET['search'] ?? "";

// -------------------------
// PAGINATION SETTINGS
// -------------------------
$limit = 3; // show 5 records per page
$page = $_GET['page'] ?? 1;
$page = (int)$page;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// -------------------------
// COUNT TOTAL RECORDS (for pagination)
// -------------------------
$countSql = "SELECT COUNT(*) as total FROM employees 
             WHERE firstname LIKE '%$search%' 
             OR lastname LIKE '%$search%' 
             OR department LIKE '%$search%' 
             OR email LIKE '%$search%' 
             OR country LIKE '%$search%'";

$countResult = $conn->query($countSql);
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

// -------------------------
// FETCH RECORDS WITH LIMIT
// -------------------------
$sql = "SELECT * FROM employees 
        WHERE firstname LIKE '%$search%' 
        OR lastname LIKE '%$search%' 
        OR department LIKE '%$search%' 
        OR email LIKE '%$search%' 
        OR country LIKE '%$search%'
        LIMIT $limit OFFSET $offset";

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

    <!-- Search Form -->
    <form method="get" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2"
               placeholder="Search employees..." 
               value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <a href="create.php" class="btn btn-success mb-3">+ Add New Employee</a>

    <!-- Employee Table -->
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th><th>Firstname</th><th>Lastname</th>
            <th>Department</th><th>Email</th><th>Country</th><th>Action</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['firstname']) ?></td>
                <td><?= htmlspecialchars($row['lastname']) ?></td>
                <td><?= htmlspecialchars($row['department']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['country']) ?></td>
                <td>
                    <a href="details.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Details</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center">No employees found</td></tr>
        <?php endif; ?>
    </table>

    <!-- Pagination -->
    <nav>
      <ul class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= $i ?>">
                <?= $i ?>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </nav>

</body>
</html>
