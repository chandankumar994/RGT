<?php
// ========== API CALL ==========
$url = "https://jsonplaceholder.typicode.com/users";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}
curl_close($ch);
$data = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>API Demo - Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">👨‍💻 Users Data from Free API</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($data)) {
                $i = 1;
                foreach ($data as $user) {
                    echo "<tr>
                            <td>{$i}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['phone']}</td>
                            <td>{$user['company']['name']}</td>
                            <td>{$user['address']['city']}</td>
                          </tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='6' class='text-center text-danger'>❌ Failed to load API data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>