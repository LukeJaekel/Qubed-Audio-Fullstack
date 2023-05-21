<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "Products";


// Establish a database connection
$connection = new mysqli($servername, $username, $password, $database);


// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Step 2: Retrieve category slugs from the database
$query = "SELECT slug FROM categories";
$result = $connection->query($query);
$categories = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
</head>
<body>
    <ul>
    </ul>
</body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Stock</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/product-box.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
        <script defer src="scripts/product-box.js"></script>
    </head>
    <body>

        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container">
                        <img src="logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                    </div>
                </div>
                <div class="header-right-container">
                    <div class="login-container">
                        <a href="#">Register</a>
                        <a href="#">Login</a>
                    </div>
                    <img src="icons/account-icon.png" alt="my-account-icon">
                    <div class="basket-container">
                        <img src="icons/basket-icon.png" alt="basket-icon">
                        <span class="basket-number">0</span>
                    </div>
                </div>
            </div>
            <div class="js-navbar">
                <nav class="navbar">
                    <ul class="links">
                        <li><a href="stock.php">Stock</a></li>
                        <li><a href="category.php?category=consoles">Consoles</a></li>

                        <li><a href="category.php?category=pa-speakers">PA Speakers +</a>
                            <ul>
                                <li><a href="category.php?category=pa-speakers%2Fsubwoofers">Subwoofers</a></li>
                                <li><a href="category.php?category=pa-speakers%2Fspeakers">Speakers</a></li>
                            </ul>
                        </li>

                        <li><a href="category.php?category=wired-equipment">Wired Equipment +</a>
                            <ul>
                                <li><a href="category.php?category=wired-equipment%2Fwired-microphones">Wired Microphones</a></li>
                                <li><a href="category.php?category=wired-equipment%2Fbundles">Bundles</a></li>
                            </ul>
                        </li>

                        <li><a href="category.php?category=wireless-equipment">Wireless Equipment +</a>
                            <ul>
                                <li><a href="category.php?category=wireless-equipment%2Fwireless-microphones">Wireless Microphones</a></li>
                                <li><a href="category.php?category=wireless-equipment%2Fiems">IEMS</a></li>
                            </ul>
                        </li>

                        <li><a href="category.php?category=units">Units +</a>
                            <ul>
                                <li><a href="category.php?category=units%2Famplifiers">Amplifiers</a></li>
                                <li><a href="category.php?category=units%2Fstage-boxes">Stage Boxes</a></li>
                                <li><a href="category.php?category=units%2Fdi-boxes">DI Boxes</a></li>
                                <li><a href="category.php?category=units%2Ffx-racks">FX Racks</a></li>
                            </ul>
                        </li>

                        <li><a href="category.php?category=consumables">Consumables +</a>
                            <ul>
                                <li><a href="category.php?category=consumables%2Fbatteries">Batteries</a></li>
                                <li><a href="category.php?category=consumables%2Faccessories">Accessories</a></li>
                            </ul>
                        </li>

                        <li><a href="category.php?category=services">Services +</a>
                            <ul>
                                <li><a href="#">Show Recording & Editing</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="menu-button">
                        <input type="checkbox" id="menu-bar">
                        <label for="menu-bar">Menu</label>
                    </div>
                </nav>
            </div>
        </header>

        <!-- MAIN SECTION -->
        <main>
            <div class="stock-title-container">
                <h1>Welcome to Q-Stock</h1>
                <p>
                    Browse through our products or 
                    find what you require on the
                    navigation menu.
                </p>
            </div>
            <div class="product-grid-container">
                <div class="product-grid">
                    <?php include "product-handler.php"; ?>
                </div>
            </div>
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
                        <p><a href="contact.html">Contact Us</a></p>
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
    </body>
</html>