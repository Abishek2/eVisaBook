<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $date = $_POST['appointment_date'];

    $stmt = $pdo->prepare("INSERT INTO appointments (user_id, appointment_date, status) VALUES (:user_id, :appointment_date, 'Pending')");
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':appointment_date', $date);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Appointment booked successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to book appointment"]);
    }
}
?>
