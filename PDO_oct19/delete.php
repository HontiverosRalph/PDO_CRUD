<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Delete the administrator record
    $sql = "DELETE FROM db_administrators WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    echo "Record deleted successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Administrator</title>
</head>
<body>

<h1>Delete Administrator</h1>

<form method="post">
    <input type="number" name="id" placeholder="Enter Administrator ID to delete" required>
    <button type="submit">Delete</button>
</form>

<a href="index.php">Back to Home</a>

</body>
</html>
