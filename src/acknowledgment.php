<?php
include_once 'config.php';
session_start();

// Get appointment details
if (!isset($_GET['id'])) {
    die("Appointment ID is required.");
}
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = :id AND user_id = :user_id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    die("Appointment not found or access denied.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment Acknowledgment</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Appointment Acknowledgment</h1>
    <p>Date: <?= htmlspecialchars($appointment['appointment_date']) ?></p>
    <p>Status: <?= htmlspecialchars($appointment['status']) ?></p>
    <a href="main.php">Back to Dashboard</a>
</body>
</html>
