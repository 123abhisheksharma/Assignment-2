<?php
// Database connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Sneakers</title>
    <link rel="stylesheet" href="choose.css">
</head>
<body>
    <header>
        <h1>Choose Your Sneakers</h1>
    </header>
    <section>
        <form action="requested.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="sneaker">Choose Sneaker:</label>
            <select id="sneaker" name="sneaker" required>
                <option value="#001">#001 - AIR JORDAN 1</option>
                <option value="#002">#002 - AIR FORCE</option>
                <option value="#003">#003 - LIBERTY SERIES 9</option>
                <option value="#004">#004 - AIR MAX 7</option>
                <option value="#005">#005 - NIKE 601</option>
                <option value="#006">#006 - AIR 2</option>
                <option value="#007">#007 - AMIIRI MA-1</option>
                <option value="#008">#008 - MEN's AIR 2</option>
                <option value="#009">#009 - RED THUNDER</option>
                <option value="#010">#010 - PUMA SERIES 1</option>
            </select>
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments"></textarea>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
