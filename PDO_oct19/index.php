<?php
require 'db.php';

// Fetch all administrators to display on the homepage
$sql = "SELECT * FROM db_administrators"; // Your SQL query
$stmt = $pdo->query($sql); // Execute the query
$administrators = $stmt->fetchAll(); // Fetch all records
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Registration System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Administrator Registration System</h1>

<h2>Registered Administrators</h2>

<a href="create.php">Add New Administrator</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Experience (Years)</th>
            <th>Specialization</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($administrators as $admin): ?>
            <tr>
                <td><?php echo htmlspecialchars($admin['id']); ?></td>
                <td><?php echo htmlspecialchars($admin['first_name']); ?></td>
                <td><?php echo htmlspecialchars($admin['last_name']); ?></td>
                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                <td><?php echo htmlspecialchars($admin['phone']); ?></td>
                <td><?php echo htmlspecialchars($admin['experience_years']); ?></td>
                <td><?php echo htmlspecialchars($admin['specialization']); ?></td>
                <td><?php echo htmlspecialchars($admin['date_added']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $admin['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $admin['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
