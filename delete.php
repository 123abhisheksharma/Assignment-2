<?php
// Database connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete request
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM requests WHERE id=$id");

header('Location: requested.php');
exit();
?>
