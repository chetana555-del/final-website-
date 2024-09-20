<?php
	include 'includes/session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&C Beauty Salon</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js" defer></script>
     
</head>
<body class="index">
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <div class="logo">
                
                <img src="images/logo.png" alt="D&C Beauty Salon Logo">
            </div>
            <h1>D&C Beauty Salon</h1>
            <button class="nav-toggle" aria-label="Toggle navigation">
                <div class="nav-toggle-icon"></div>
                <div class="nav-toggle-icon"></div>
                <div class="nav-toggle-icon"></div>
            </button>
            <nav class="nav-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="appointment.php">Appointment</a></li>
                    <li><a href="contact.php">Contact</a></li>

                    
                    <?php
  if (!isset($_SESSION['user'])) {
    // Show the Login/Signup option if the user session is not set
    echo '<li><a href="loginsignup.php">Login/Signup</a></li>';
  }
  else{
    // echo '<li><a href="profile.php">' . htmlspecialchars($_SESSION['username']) . '</a></li>';
    echo '
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ' . htmlspecialchars($_SESSION['username']) . '
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li>';

  }
?>
                </ul>
            </nav>
        </div>
    </header>