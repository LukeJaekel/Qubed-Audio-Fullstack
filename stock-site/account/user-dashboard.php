<?php 

// Connects to database
include('../includes/connect.php');

// Grabs common functions
include('../functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Administration Dashboard</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">
        <link rel="stylesheet" href="../styles/dashboard.css">
        <link rel="stylesheet" href="../styles/footer.css">
        <link rel="stylesheet" href="../styles/general.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

    </head>

    <body>

        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container" onclick="loadStockPage();">
                        <img src="../logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                    </div>
                </div>
                <div class="header-right-container">
                    <h1><span style="color:rgb(233, 32, 23);"></span>User Dashboard</h1>
                </div>
            </div>
        </header>

        <main>
            <div class="button-container">
                <button class="button">Summary</button>
                <button class="button">Current Hires</button>
                <button class="button">Hire History</button>
                <button class="button">Upcoming Hires</button>
                <button class="button">Invoices & Payment</button>
                <button class="button">Account Settings</button>
                <button class="button"></button>
            </div>
            <!-- <div class="dashboard-title-container">
                <p>Summary</p>
            </div> -->
        </main>

    <!-- FOOTER SECTION -->
        <footer class="footer">
            <div class="footer-grid">
                <div class="left-container">
                    <div class="footer-logo-container" onclick="loadHomePage();">
                        <img class="footer-logo" src="../logo/logo.jpg" alt="qubed-logo">
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
                        <p><a href="../../main-site/terms-and-conditions.html" target="_blank">Terms and Conditions</a></p>
                        <p><a href="#" target="_blank">Privacy Policy</a></p>
                        <p><a href="../../main-site/documents/pli-insurance-certificate.pdf" target="_blank">PLI Insurance Certificate</a></p>
                    </div>
                </div>
                <div class="right-container">
                    <div class="link-container">
                        <div class="right-title-container">
                            <p>THE COMPANY</p>
                        </div>
                        <p><a href="../../main-site/contact.php" target="_blank">Contact Us</a></p>
                        <p><a href="../../main-site/home.html#about" target="_blank">About</a></p>
                    </div>
                </div>
                <div class="socials-container">
                    <p>SOCIALS</p>
                    <div class="socials-main-icon-container">
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="../icons/facebook-icon.svg" alt="facebook-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="../icons/twitter-icon.svg" alt="twitter-icon">
                        </div>
                        <div class="socials-icon-container">
                            <img class="socials-icon" src="../icons/linkedin-icon.svg" alt="twitter-icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-container">
                <p>© 2023 Qubed Audio | All Rights Reserved</p>
                <p>Website Developed by <a target="_blank" href="https://github.com/LukeJaekel">Luke Jaekel</a></p>
            </div>
        </footer>
        
    </body>

</html>