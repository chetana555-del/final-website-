<?php
// Include the database connection file
include 'includes/conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id']; // assuming user_id is passed with the form
    $service = $_POST['service'];
    $appointment_date = $_POST['date'];
    $appointment_time = $_POST['time'];

    // Open the database connection
    $database = new Database();
    $db = $database->open();

    try {
        // Prepare SQL insert query
        $sql = "INSERT INTO appointments (user_id, service, appointment_date, appointment_time) 
                VALUES (:user_id, :service, :appointment_date, :appointment_time)";

        // Prepare the statement
        $stmt = $db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':service', $service, PDO::PARAM_STR);
        $stmt->bindParam(':appointment_date', $appointment_date, PDO::PARAM_STR);
        $stmt->bindParam(':appointment_time', $appointment_time, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Appointment successfully booked!';
            header('location: appointment.php');

        } else {
            $_SESSION['error'] = 'Error in booking appointment.';

            header('location: appointment.php');
        }
    } catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }

    // Close the database connection
    $database->close();
}
?>
