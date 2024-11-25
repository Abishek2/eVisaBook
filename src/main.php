<?php
include_once 'config.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: templates/login.php');
    exit();
}

// Fetch appointments for dashboard
$query = $pdo->query("SELECT * FROM appointments WHERE user_id = " . $_SESSION['user_id']);
$appointments = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Welcome to eVisaBook</h1>
    <div>
        <a href="templates/appointment_form.php">Book Appointment</a>
    </div>
    <div>
        <h2>Your Appointments</h2>
        <ul>
            <?php foreach ($appointments as $appointment): ?>
                <li><?= htmlspecialchars($appointment['appointment_date']) ?> - <?= htmlspecialchars($appointment['status']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
