<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Appointments</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding: 15px;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar bg-dark">
            <div class="position-sticky">
                <h4 class="text-white my-4">Admin Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Appointments</h1>
            </div>

            <!-- Table of Appointments -->
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// Connect to the database and fetch appointments with client names
include '../includes/conn.php';

$conn = $pdo->open();

// Modify the query to join appointments with the users table
$stmt = $conn->prepare("
    SELECT appointments.*, users.fullname AS client_name 
    FROM appointments 
    JOIN users ON appointments.user_id = users.id
");

$stmt->execute();
$appointments = $stmt->fetchAll();

if($appointments) {
    foreach($appointments as $index => $appointment) {
        // Determine button class based on appointment status
        $statusClass = '';
        $statusText = '';

        switch($appointment['status']) {
            case 'cancelled':
                $statusClass = 'btn-danger'; // Red button for Cancelled
                $statusText = 'Cancelled';
                break;
            case 'rescheduled':
                $statusClass = 'btn-success'; // Green button for Rescheduled
                $statusText = 'Rescheduled';
                break;
            case 'booked':
            default:
                $statusClass = 'btn-primary'; // Blue button for Booked
                $statusText = 'Booked';
                break;
        }

        echo "
        <tr>
            <td>".($index + 1)."</td>
            <td>".htmlspecialchars($appointment['client_name'])."</td>
            <td>".htmlspecialchars($appointment['service'])."</td>
            <td>".htmlspecialchars($appointment['appointment_date'])."</td>
            <td>".htmlspecialchars($appointment['appointment_time'])."</td>
            <td>
                <button class='btn $statusClass btn-sm'>".htmlspecialchars($statusText)."</button>
            </td>
            <td>
                <a href='edit_appointment.php?id=".$appointment['id']."' class='btn btn-sm btn-primary'>Edit</a>
                <a href='delete_appointment.php?id=".$appointment['id']."' class='btn btn-sm btn-danger'>Delete</a>
            </td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No appointments found.</td></tr>";
}

$pdo->close();
?>


                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS (for dropdown functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
