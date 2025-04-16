<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Connect to DB
$conn = new mysqli("localhost", "root", "", "sweet_treats");

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Sweet Treats</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        table { width: 90%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>
    <header><h1>Message Dashboard</h1></header>
    <main>
        <table>
            <tr>
                <th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= $row['submitted_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>
</html>
