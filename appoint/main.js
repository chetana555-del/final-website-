document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    setupNavToggle(); 
    setupPage();
     
});

function setupNavToggle() {
    const navToggle = document.createElement('div');
    navToggle.classList.add('nav-toggle');
    navToggle.innerHTML = '&#9776;';  
    const header = document.querySelector('header');
    if (header) {
        header.appendChild(navToggle);
        navToggle.addEventListener('click', () => {
            const navList = document.querySelector('nav ul');
            if (navList) {
                navList.classList.toggle('show');
            }
        });
    } else {
        console.error('Header element not found in the DOM.');
    }
}

function setupPage() {
    if (document.body.classList.contains('index')) {
        setupAppointmentPage();  
    }
    if (document.body.classList.contains('about')) {
        setupAboutPage();  
    }
    if (document.body.classList.contains('appointment')) {
        setupAppointmentPage();
    }
    if (document.body.classList.contains('contact')) {
        setupContactPage();  
    }
    if (document.body.classList.contains('loginsignup')) {
        setupLoginSignupPage();  
    }
    if (document.body.classList.contains('services')) {
        setupServicesPage(); 
    }
    if (document.body.classList.contains('gallery')) {
        setupGalleryPage();  
    }
}
function setupAuthForms() {
    const loginBtn = document.getElementById('login-btn');
    const signupBtn = document.getElementById('signup-btn');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const authMessage = document.getElementById('auth-message');

    if (loginBtn && signupBtn && loginForm && signupForm && authMessage) {
       
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');

         
        loginBtn.addEventListener('click', () => {
            loginForm.classList.remove('hidden');
            signupForm.classList.add('hidden');
            loginBtn.classList.add('active');
            signupBtn.classList.remove('active');
        });

         
        signupBtn.addEventListener('click', () => {
            signupForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            signupBtn.classList.add('active');
            loginBtn.classList.remove('active');
        });

         
        loginForm.addEventListener('submit', (event) => {
            event.preventDefault();
            authMessage.textContent = 'Success! You are now logged in.';
            authMessage.classList.remove('hidden');
            loginForm.reset();
            setTimeout(() => authMessage.classList.add('hidden'), 3000);
        });

         
        signupForm.addEventListener('submit', (event) => {
            event.preventDefault();
            authMessage.textContent = 'Success! You are now signed up.';
            authMessage.classList.remove('hidden');
            signupForm.reset();
            setTimeout(() => authMessage.classList.add('hidden'), 3000);
        });
    } else {
        console.error('One or more authentication elements not found in the DOM.');
    }
}
 
function setupLoginSignupPage() {
     
}

 
function setupServicesPage() {
     
}

 
function setupGalleryPage() {
    
}
