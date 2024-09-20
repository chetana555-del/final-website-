<?php
// Include the database connection
include 'includes/conn.php';

$conn = $pdo->open();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST['appointment_id'];
    $action = $_POST['action'];
    $new_date = isset($_POST['new_date']) ? $_POST['new_date'] : null;
    $new_time = isset($_POST['new_time']) ? $_POST['new_time'] : null;

    // Open the database connection
    

    try {
        if ($action == 'reschedule') {
            // Validate the new date and time
            if (!empty($new_date) && !empty($new_time)) {
                // Update appointment with new date and time
                $sql = "UPDATE appointments 
                        SET appointment_date = :new_date, appointment_time = :new_time, status = 'rescheduled'
                        WHERE id = :appointment_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':new_date', $new_date, PDO::PARAM_STR);
                $stmt->bindParam(':new_time', $new_time, PDO::PARAM_STR);
                $stmt->bindParam(':appointment_id', $appointment_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $_SESSION['success'] = 'Appointment rescheduled successfully.';
                } else {
                    $_SESSION['error'] = 'Failed to reschedule appointment.';
                }
            } else {
                $_SESSION['error'] = 'New date and time are required for rescheduling.';
            }

        } elseif ($action == 'cancel') {
            // Cancel the appointment
            $sql = "UPDATE appointments SET status = 'cancelled' WHERE id = :appointment_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':appointment_id', $appointment_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $_SESSION['success'] = 'Appointment canceled successfully.';
            } else {
                $_SESSION['error'] = 'Failed to cancel appointment.';
            }
        }

        header('Location: appointment.php');
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $database->close();
}
?>
