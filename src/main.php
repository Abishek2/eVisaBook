<?php
include_once 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: templates/login.php');
    exit();
}

// Fetch appointments
$query = $pdo->prepare("SELECT * FROM appointments WHERE user_id = :user_id");
$query->bindParam(':user_id', $_SESSION['user_id']);
$query->execute();
$appointments = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>eVisaBook Dashboard</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Welcome to eVisaBook</h1>
    <a href="templates/signup.php">Book Appointment</a>
    <h2>Your Appointments</h2>
    <ul>
        <?php foreach ($appointments as $appointment): ?>
            <li>
                <?= htmlspecialchars($appointment['appointment_date']) ?> - <?= htmlspecialchars($appointment['status']) ?>
                <a href="acknowledgment.php?id=<?= $appointment['id'] ?>">View Acknowledgment</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
