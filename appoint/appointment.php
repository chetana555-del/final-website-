<?php
include 'includes/header.php'; 
?>

<!-- Appointment Section -->
<section id="appointment">
<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
<?php
if (isset($_SESSION['user'])) {
    $id=$_SESSION['user'];
    echo "<h2>$id</h2>";
}

?>



    <h2>Book Your Appointment</h2>
    <p>Fill out the form below to book your appointment with us.</p>

    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
    ?>
        <!-- Show Appointment Form -->
        <form id="appointment-form" action="book_appointment.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']; ?>"> <!-- Assuming user_id is stored in session -->
            
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="service">Select Service:</label>
            <select id="service" name="service" required>
                <option value="facial">Facial</option>
                <option value="bridal-makeup">Bridal Makeup</option>
                <option value="nail-extensions">Nail Extensions</option>
                <option value="hair-styling">Hair Styling</option>
                <option value="manicure-pedicure">Manicure & Pedicure</option>
                <option value="eyelash-extensions">Eyelash Extensions</option>
                <option value="hair-removal">Hair Removal</option>
            </select>

            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Preferred Time:</label>
            <input type="time" id="time" name="time" required>

            <button type="submit">Book Appointment</button>
        </form>

        <br><br>

        <!-- Reschedule or Cancel Section -->
        <h3>Manage Your Appointment</h3>
        <p>If you need to reschedule or cancel your appointment, please enter your details below.</p>

        <!-- <form id="manage-appointment-form" action="#" method="post">
            <label for="email-manage">Email:</label>
            <input type="email" id="email-manage" name="email-manage" required>

            <label for="phone-manage">Phone:</label>
            <input type="tel" id="phone-manage" name="phone-manage" required>

            <label for="action">Select Action:</label>
            <select id="action" name="action" required>
                <option value="reschedule">Reschedule</option>
                <option value="cancel">Cancel</option>
            </select>

            <div id="reschedule-options" style="display:none;">
                <label for="new-date">New Preferred Date:</label>
                <input type="date" id="new-date" name="new-date">

                <label for="new-time">New Preferred Time:</label>
                <input type="time" id="new-time" name="new-time">
            </div>

            <button type="submit">Submit</button>
        </form> -->
        <?php
// Include the database connection file

// Start session to access user_id
$user_id = $_SESSION['user'];
$conn = $pdo->open();

// Fetch appointments
try {
    $sql = "SELECT * FROM appointments WHERE user_id = :user_id AND status != 'cancelled'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $appointments = $stmt->fetchAll();

    if ($appointments) {
        echo '<h2>Your Appointments</h2>';
        foreach ($appointments as $appointment) {
            ?>
            <div class="appointment-item">
                <p>
                    <strong>Service:</strong> <?= htmlspecialchars($appointment['service']); ?><br>
                    <strong>Date:</strong> <?= htmlspecialchars($appointment['appointment_date']); ?><br>
                    <strong>Time:</strong> <?= htmlspecialchars($appointment['appointment_time']); ?><br>
                </p>
                <form method="post" action="manage_appointment.php">
                    <input type="hidden" name="appointment_id" value="<?= $appointment['id']; ?>">
                    
                    <label for="action-<?= $appointment['id']; ?>">Action:</label>
                    <select id="action-<?= $appointment['id']; ?>" name="action" onchange="toggleRescheduleOptions(<?= $appointment['id']; ?>)" required>
                        <option value="reschedule">Reschedule</option>
                        <option value="cancel" selected>Cancel</option> <!-- Set Cancel as the default selected option -->
                    </select>
                    
                    <!-- Initially hide reschedule options -->
                    <div id="reschedule-options-<?= $appointment['id']; ?>" class="reschedule-options" style="display:none;">
                        <label for="new-date-<?= $appointment['id']; ?>">New Date:</label>
                        <input type="date" id="new-date-<?= $appointment['id']; ?>" name="new_date">
                        <label for="new-time-<?= $appointment['id']; ?>">New Time:</label>
                        <input type="time" id="new-time-<?= $appointment['id']; ?>" name="new_time">
                    </div>
        
                    <button type="submit">Submit</button>
                </form>
                <hr>
            </div>
            <?php
        }
        
        
    } else {
        echo "<p>No appointments found.</p>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $pdo->close(); // Close the connection if needed
}
?>

<script>
    // Function to toggle reschedule options based on selected action
    function toggleRescheduleOptions(appointmentId) {
        const actionSelect = document.getElementById('action-' + appointmentId);
        const rescheduleOptions = document.getElementById('reschedule-options-' + appointmentId);
        
        // Check the selected action
        if (actionSelect.value === 'reschedule') {
            rescheduleOptions.style.display = 'block'; // Show options
        } else {
            rescheduleOptions.style.display = 'none'; // Hide options
        }
    }

    // This function can be called to set the initial state of reschedule options
    document.querySelectorAll('select[name="action"]').forEach(function(select) {
        toggleRescheduleOptions(select.id.split('-')[1]); // Call toggle for each select on load
    });
</script>


    <?php
    } else {
        // Show message if user is not logged in
        echo "<p>You need to be logged in to book or manage appointments. Please <a href='loginsignup.php'>log in</a>.</p>";
    }
    ?>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-left">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <h3>Get Connected</h3>
            <p>Phone: 9888990000 | 01-4777770</p>
            <p>Email: <a href="mailto:info@D&Cbeautysalon.com">info@D&Cbeautysalon.com</a> | <a href="mailto:press@D&Cbeautysalon.com">press@D&Cbeautysalon.com</a></p>
            <div class="social-media">
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </div>
    <p class="footer-bottom">© 2024 D&C Beauty Salon. All Rights Reserved.</p>
</footer>

</body>
</html>
