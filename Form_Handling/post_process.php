<!-- file: post_process.php -->
<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "1234") 
{
    echo "Login successful!";
} 
else 
{
    echo "Invalid login!";
}
?>