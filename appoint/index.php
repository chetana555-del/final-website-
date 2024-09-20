
    <?php include 'includes/header.php' ?>
    
    <!-- Home Section -->
    <section id="home">
        <h2>Welcome to D&C Beauty Salon</h2>
        <img src="images/salon.jpg" alt="Salon " class="responsive-image">
        <p>Your beauty is our passion. Discover a variety of services tailored just for you.</p>
        <a href="#appointment" class="btn">Book an Appointment</a>
    </section>
    
     <!-- About Us Section -->
    <section id="about">
        <h2>About Us</h2>
        <img src="images/interior.jpg" alt="About Us Image">
        <p>Welcome to D&C Beauty Salon, where we offer exceptional beauty services with a touch of elegance. Our team of experts is dedicated to enhancing your natural beauty and providing an unforgettable experience.</p>
    </section>

    <!-- Services Section -->
    <section id="services">
        <h2>Our Services</h2>
        <div class="service-item" id="facials">
            <h3>Facials</h3>
            <p>Rejuvenating facials to keep your skin glowing.</p>
        </div>
        <div class="service-item" id="bridal-makeup">
            <h3>Bridal Makeup</h3>
            <p>Elegant bridal makeup that enhances your natural beauty for your special day.</p>
        </div>
        <div class="service-item" id="nail-extensions">
            <h3>Nail Extensions</h3>
            <p>Get beautiful, long-lasting nail extensions with a variety of designs.</p>
        </div>
        <div class="service-item" id="hair-styling">
            <h3>Hair Styling</h3>
            <p>Professional hair styling services for every occasion.</p>
        </div>
        <div class="service-item" id="manicure-pedicure">
            <h3>Manicure & Pedicure</h3>
            <p>Relaxing manicure and pedicure services for beautiful hands and feet.</p>
        </div>
        <div class="service-item" id="eyelash-extensions">
            <h3>Eyelash Extensions</h3>
            <p>Beautiful eyelash extensions for a fuller, longer lash look.</p>
        </div>
        <div class="service-item" id="hair-removal">
            <h3>Hair Removal</h3>
            <p>Effective hair removal services for smooth, hair-free skin.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery">
        <h2>Gallery</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="images/Nail-Extension.jpg" alt="Nail Extension">
            </div>
            <div class="gallery-item">
                <img src="images/eyelash.jpeg" alt="Lash Extension">
            </div>
            <div class="gallery-item">
                <img src="images/bridal makeup.jpg" alt="Bridal Makeup">
            </div>
            <div class="gallery-item">
                <img src="images/manicure-pedicure.jpg" alt="Manicure & Pedicure">
            </div>
            <div class="gallery-item">
                <img src="images/hairstyle.jpg" alt="Hairstyle">
            </div>
        </div>
    </section>

     
     <!-- Appointment Section -->
<section id="appointment">
    <h2>Book Your Appointment</h2>
    <p>Fill out the form below to book your appointment with us.</p>
    <form id="appointment-form" action="#" method="post">
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

    <!-- Confirmation Section -->
    <div id="confirmation" style="display:none;">
        <h3>Appointment Confirmation</h3>
        <p>Thank you, <span id="confirmName"></span>! Your appointment for <span id="confirmService"></span> on <span id="confirmDate"></span> at <span id="confirmTime"></span> has been booked.</p>
        <p>We have sent a confirmation email to <span id="confirmEmail"></span>. If you need to make any changes, please contact us at <span id="confirmPhone"></span>.</p>
        <button type="button">Go Back</button>
    </div>
</section>
  
    <!-- Contact Section -->
    <section id="contact-section">
        <h2><a href="contact.html">Contact Us</a></h2>
        <p>Create an account to stay easily connected with us, receive updates on exciting deals and offers, enjoy exclusive discounts, effortlessly send messages, and access your booking history at any time (click contact us).</p>
        <p>If you have any further inquiries or concerns, please don't hesitate to reach out to us. You can send us a message or contact us directly at the below-given number or email. We're here to help and look forward to hearing from you soon.</p>
        <p>Phone: 9888990000 | 01-4777770</p>
        <p>Email: <a href="mailto:info@D&Cbeautysalon.com">info@D&Cbeautysalon.com</a> | <a href="mailto:press@D&Cbeautysalon.com">press@D&Cbeautysalon.com</a></p>
    </section>
    <!-- login Signup Section -->
    <section id="LoginSignup">
        <h2>
            <a href="loginsignup.html">Login/Signup</a>
        </h2>
        <p>Create an account to stay easily connected with us, receive updates on exciting deals and offers, enjoy exclusive discounts, effortlessly send messages, and access your booking history at any time (click login/signup)</p>
    </section>   

    <!-- Location Section -->
    <section id="location">
        <h2>
            <a href="contact.html">Our Location</a> 

        </h2>
        <p>Find us at 123 Beauty Lane, Glamour City, GC 12345</p>
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
