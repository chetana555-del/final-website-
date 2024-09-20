<?php include 'includes/header.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: appointment.php');
  }
?>


    <!-- Make an Account Section -->
    <section id="account">
    <div class="login-box">
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
    <section id="make-account">
        <h2>Make an Account</h2>
        <p>Create an account to stay easily connected with us .</p>
         
                <!-- Login Form -->
                <form id="login-form" class="auth-form" action="verify.php" method="POST">
                    <h2>Login</h2>
                    <input type="email" id="login-email" name="email" placeholder="Email" required>
                    <input type="password" id="login-password" name="password" placeholder="Password" required>
                    <input type="submit" class="auth-submit-btn" name="login">Login</button>
                </form>

                <!-- Signup Form -->
                <form id="signup-form" class="auth-form" action="register.php" method="POST">
                    <h2>Sign Up</h2>
                    <input type="text" id="signup-name" name="fullname" placeholder="Full Name" required>
                    <input type="email" id="signup-email" name="email" placeholder="Email" required>
                    <input type="password" id="signup-password" name="password" placeholder="Password" required>
                    <input type="tel" id="signup-phone" name="phone" placeholder="Phone Number" required>
                    <input type="text" id="signup-address" name="address" placeholder="Address" required>
                    <input type="submit" class="auth-submit-btn" name="signup">Sign Up</button>
                </form>

                 
            </div>
        </div>
    </section>
</section>
     
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="location.html">Location</a></li>
                    <li><a href="about.html">About Us</a></li>
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
