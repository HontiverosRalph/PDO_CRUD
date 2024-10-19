<?php
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experienceYears = $_POST['experience_years'];
    $specialization = $_POST['specialization'];

    // Insert new administrator into the database
    $sql = "INSERT INTO db_administrators (first_name, last_name, email, phone, experience_years, specialization) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstName, $lastName, $email, $phone, $experienceYears, $specialization]);

    echo "New record created successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Administrator</title>
</head>
<body>

<h1>Create New Administrator</h1>

<form method="post">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="number" name="experience_years" placeholder="Experience (Years)" required>
    <input type="text" name="specialization" placeholder="Specialization">
    <button type="submit">Create</button>
</form>

<a href="index.php">Back to Home</a>

</body>
</html>
