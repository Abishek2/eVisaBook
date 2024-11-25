<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['email']) ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
