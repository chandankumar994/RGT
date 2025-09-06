<!-- file: upload.php -->
<?php
if (isset($_FILES['myfile'])) {
    $file = $_FILES['myfile'];

    // Move file to "uploads" folder
    move_uploaded_file($file['tmp_name'], "uploads/" . $file['name']);

    echo "File uploaded: " . $file['name'];
}
?>