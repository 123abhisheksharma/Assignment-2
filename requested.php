<?php
// Database connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sneaker = $_POST['sneaker'];
    $comments = $_POST['comments'];

    // Insert data into the database
    $query = "INSERT INTO requests (name, email, sneaker, comments) VALUES ('$name', '$email', '$sneaker', '$comments')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Sneakers</title>
    <link rel="stylesheet" href="requested.css">
</head>
<body>
    <header>
        <h1>Requested Sneakers</h1>
    </header>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sneaker</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all requests
                $result = mysqli_query($conn, "SELECT * FROM requests");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['sneaker']}</td>";
                    echo "<td>{$row['comments']}</td>";
                    echo "<td>
                            <a href='update.php?id={$row['id']}'>Update</a> |
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
