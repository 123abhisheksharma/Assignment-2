<?php
// Database connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch request data
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM requests WHERE id=$id");
$request = mysqli_fetch_assoc($result);

// Update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sneaker = $_POST['sneaker'];
    $comments = $_POST['comments'];

    $query = "UPDATE requests SET name='$name', email='$email', sneaker='$sneaker', comments='$comments' WHERE id=$id";
    mysqli_query($conn, $query);

    header('Location: requested.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Request</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <header>
        <h1>Update Request</h1>
    </header>
    <section>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $request['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $request['email']; ?>" required>
            <label for="sneaker">Choose Sneaker:</label>
            <select id="sneaker" name="sneaker" required>
                <option value="#001" <?php echo $request['sneaker'] === '#001' ? 'selected' : ''; ?>>#001 - AIR JORDAN 1</option>
                <option value="#002" <?php echo $request['sneaker'] === '#002' ? 'selected' : ''; ?>>#002 - AIR FORCE</option>
                <option value="#003" <?php echo $request['sneaker'] === '#003' ? 'selected' : ''; ?>>#003 - LIBERTY SERIES 9</option>
                <option value="#004" <?php echo $request['sneaker'] === '#004' ? 'selected' : ''; ?>>#004 - AIR MAX 7</option>
                <option value="#005" <?php echo $request['sneaker'] === '#005' ? 'selected' : ''; ?>>#005 - NIKE 601</option>
                <option value="#006" <?php echo $request['sneaker'] === '#006' ? 'selected' : ''; ?>>#006 - AIR 2</option>
                <option value="#007" <?php echo $request['sneaker'] === '#007' ? 'selected' : ''; ?>>#007 - AMIIRI MA-1</option>
                <option value="#008" <?php echo $request['sneaker'] === '#008' ? 'selected' : ''; ?>>#008 - MEN's AIR 2</option>
                <option value="#009" <?php echo $request['sneaker'] === '#009' ? 'selected' : ''; ?>>#009 - RED THUNDER</option>
                <option value="#010" <?php echo $request['sneaker'] === '#010' ? 'selected' : ''; ?>>#010 - PUMA SERIES 1</option>
            </select>
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments"><?php echo $request['comments']; ?></textarea>
            <button type="submit">Update</button>
        </form>
    </section>
</body>
</html>
