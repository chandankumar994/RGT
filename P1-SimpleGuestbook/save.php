<?php
try {
    $name = $_POST['name'] ?? '';
    $message = $_POST['message'] ?? '';
    $imageName = "";

    // Handle file upload (if any)
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }
        $imageName = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }

    // Save to CSV file
    $file = fopen("data.csv", "a");
    if (!$file) {
        throw new Exception("Cannot open file!");
    }
    fputcsv($file, [$name, $message, $imageName]);
    fclose($file);

    // Redirect back
    header("Location: index.php");
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>