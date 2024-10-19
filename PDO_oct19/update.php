<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experienceYears = $_POST['experience_years'];
    $specialization = $_POST['specialization'];

    // Update the administrator record
    $sql = "UPDATE db_administrators SET first_name = ?, last_name = ?, email = ?, phone = ?, experience_years = ?, specialization = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstName, $lastName, $email, $phone, $experienceYears, $specialization, $id]);

    echo "Record updated successfully.";
}

// Fetch existing administrator for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM db_administrators WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
} else {
    die("ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Administrator</title>
</head>
<body>

<h1>Update Administrator</h1>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($admin['first_name']); ?>" required>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($admin['last_name']); ?>" required>
    <input type="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($admin['phone']); ?>" required>
    <input type="number" name="experience_years" value="<?php echo htmlspecialchars($admin['experience_years']); ?>" required>
    <input type="text" name="specialization" value="<?php echo htmlspecialchars($admin['specialization']); ?>">
    <button type="submit">Update</button>
</form>

<a href="index.php">Back to Home</a>

</body>
</html>
