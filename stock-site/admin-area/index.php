<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Admin</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="../styles/footer.css">
        <link rel="stylesheet" href="styles/admin.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
    </head>
    <body>

        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container">
                        <img src="../logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                    </div>
                </div>
                <div class="header-right-container">
                    <h1>Welcome <span style="color:rgb(233, 32, 23);">Joe</span></h1>
                </div>
            </div>
        </header> 
        
        <section class="admin-title-container">
            <h1>Manage Details</h1>
        </section>
        <section>
            <div class="categories-container">
                <button class="category-button"><a>Edit Products</a></button>
                <button class="category-button"><a>View Products</a></button>
                <button class="category-button"><a href="index.php?edit-categories">Edit Categories</a></button>
                <button class="category-button"><a>View Categories</a></button>
                <button class="category-button"><a>Orders</a></button>
                <button class="category-button"><a>Payments</a></button>
                <button class="category-button"><a>Users</a></button>
                <button class="category-button"><a>Logout</a></button>
            </div>
        </section>

        <section class="container">
            <?php
            if (isset($_GET['edit-categories'])) {
                include('edit-categories.php');
            }
            else {
                echo "<h1>Hi Joe, Click one of the above options to make changes! :)</h1>";
            }
            ?>
        </section>

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
                        <p><a href="contact.html">Contact Us</a></p>
                        <p><a href="home.html#about">About</a></p>
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