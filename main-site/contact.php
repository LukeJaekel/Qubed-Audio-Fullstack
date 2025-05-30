<!DOCTYPE html>
<html>
    <head>
        <title>Contact | Qubed Audio</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/contact.css">
        <link rel="stylesheet" href="styles/footer.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
    </head>
    <body>

        <!----- HEADER SECTION ----->
        <header class="js-header">
            <nav class="nav-bar">
                <div class="brand-name">
                    <div class="logo-container" onclick="loadHomePage();">
                        <img class="logo" src="logo/logo.jpg" alt="qubed-logo">
                    </div>
                    <div class="title-container" onclick="loadHomePage();">
                        <p class="title">Qubed <span class="title-two">Audio</span></p>
                    </div>
                    <div class="menu-button-container">
                        <a href="#" class="menu-button">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </a>
                    </div>
                </div>
                <div class="nav-bar-links">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="home.html#about">About</a></li>
                        <li><a href="home.html#why-us">Company Values</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="../stock-site/stock.php">Hire Equipment</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <!----- MAIN SECTION ----->
        <main>
            <section>
                <div class="contact-title-container">
                    <p class="contact-title">CONTACT US</p>
                    <p class="contact-description">
                        Need a sound engineer for your event?
                        <br>
                            We want to hear from you!
                        </br>
                    </p>
                </div>
            </section>
            <section style="background-color: rgba(0, 0, 0, 0.9);">
                <div class="contact-info-grid">
                    <div class="contact-container">
                        <p class="option">GET IN TOUCH</p>
                        <div class="contact-details-container">
                            <div class="contact-number-container">
                                <img class="icon" src="icons/phone-icon.svg" alt="phone-icon">
                                <p>Phone: 07530 289512</p>
                            </div>
                            <div class="contact-email-container">
                                <img class="icon" src="icons/email-icon.svg" alt="email-icon">
                                <p>Email: qubedaudio@gmx.co.uk</p>
                            </div>
                        </div>
                    </div>
                    <div class="or-container">
                        <p class="option">OR</p>
                    </div>
                    <div class="contact-form-container">
                        <p class="option">SEND US A MESSAGE</p>
                        <form class="contact-form" method="post">
                            <div class="label">
                                <p>Your Name *</p>
                            </div>
                            <div class="name-input">
                                <input type="text" name="first-name" placeholder="First Name">
                                <input type="text" name="last-name" placeholder="Last Name">
                            </div>
                            <div class="label">
                                <p>Email Address *</p>
                            </div>
                            <div class="email-input">
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="label">
                                <p>Phone Number</p>
                            </div>
                            <div class="phone-input">
                                <input type="tel" name="phone" placeholder="Phone Number (optional)">
                            </div>
                            <div class="label">
                                <p>Subject *</p>
                            </div>
                            <div class="subject-input">
                                <input type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="label">
                                <p>Message *</p>
                            </div>
                            <div class="message-input">
                                <textarea name="message" placeholder="Please enter your message here..."></textarea>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="submit-button" value="Submit">Submit</button>
                            </div>
                            <div>
                                <p class="status">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        <!-- FOOTER SECTION -->
        <footer class="footer">
            <div class="footer-grid">
                <div class="left-container">
                    <div class="footer-logo-container" onclick="loadHomePage();">
                        <img class="footer-logo" src="logo/logo.jpg" alt="qubed-logo">
                    </div>
                    <div onclick="loadHomePage();">
                        <p class="footer-title">Qubed <span class="footer-title-two">Audio</span></p>
                    </div>
                </div>
                <div class="middle-container">
                    <div class="link-container">
                        <div class="middle-title-container">
                            <p>THE BORING STUFF</p>
                        </div>
                        <p><a href="terms-and-conditions.html">Terms and Conditions</a></p>
                        <p><a href="#">Privacy Policy</a></p>
                        <p><a href="documents/pli-insurance-certificate.pdf" target="_blank">PLI Insurance Certificate</a></p>
                    </div>
                </div>
                <div class="right-container">
                    <div class="link-container">
                        <div class="right-title-container">
                            <p>THE COMPANY</p>
                        </div>
                        <p><a href="contact.php">Contact Us</a></p>
                        <p><a href="home.html#about">About</a></p>
                    </div>
                </div>
                <div class="socials-container">
                    <p>SOCIALS</p>
                    <div class="socials-main-icon-container">
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/facebook-icon.svg" alt="facebook-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/twitter-icon.svg" alt="twitter-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="icons/linkedin-icon.svg" alt="twitter-icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-container">
                <p>© 2023 Qubed Audio | All Rights Reserved</p>
                <p>Website Developed by <a target="_blank" href="https://github.com/LukeJaekel">Luke Jaekel</a></p>
            </div>
        </footer>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".contact-form").addEventListener("submit", function(event) {
                    event.preventDefault(); // Prevent form from submitting

                    // Perform form validation and submission using AJAX or fetch API
                    // You can display the status message dynamically using JavaScript
                    // Example code for AJAX submission:
                    let formData = new FormData(this);

                    fetch("php-scripts/form-handler.php", {
                    method: "POST",
                    body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        const statusElement = document.querySelector(".status");
                        statusElement.textContent = data;
                        statusElement.className = "status"; // Remove any existing classes

                        if (data.includes("successfully")) {
                        statusElement.classList.add("success");
                        } else {
                        statusElement.classList.add("error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        const statusElement = document.querySelector(".status");
                        statusElement.textContent = "An error occurred while sending the email. Please try again later.";
                        statusElement.className = "status error";
                    });
                });
            });
        </script>
    </body>
</html>