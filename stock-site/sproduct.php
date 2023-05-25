<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Product Details</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/sproduct.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
    </head>

    <body>

        <!-- HEADER SECTION -->
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
                        <li><a href="category.php?category=consoles" target="_blank">Consoles</a></li>

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

        <main>
            <section class="product-title-container">
                <p>ABOUT {PRODUCT NAME}</p>
            </section>
            <section class="sproduct">
                <div class="product-details-container">
                    <div class="left-section">
                        <img class="product-image" src="product-images/behringer-pmp500.webp" />
                    </div>
                    <div class="right-section">
                        <p class="category-link">Stock / Consoles</p>
                        <p class="product-title">
                            Behringer PMP500
                        </p>
                        <div class="price-container">
                            <p>Per Day: <span style="font-weight: 600;">£22.00</span></p>
                            <p>Per Week: <span style="font-weight: 600;">£80.00</span></p>
                        </div>
                        <div class="status-container">
                            <p>Availability: <span class="status" style="color: rgb(240, 104, 0);">Currently out on hire</span></p>
                            <p>Returning on 25/05/2023 at 20:00</p>
                        </div>
                        <div class="add-to-cart-container">
                            <label for="quantity" id="quantity"></label>
                            <select class="quantity-box" name="quantity">
                                <option value="1">1</option>
                            </select>
                            <button class="add-to-cart-button">Add To Cart</button>
                        </div>
                        <div class="details-container">
                            <p class="details-title">Description</p>
                            <p class="details">
                                This is the Behringer PMP500. A 12 channel mixing console designed
                                for a smaller live setup.
                            </p>
                        </div>
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