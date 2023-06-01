<?php 

// Connects to database
include('includes/connect.php');

// Grabs common functions
include('functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Stock</title>
        <link rel="icon" type="image/x-icon" href="logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/basket.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
        <script defer src="scripts/basket.js"></script>
    </head>
    <body>

        <!-- HEADER SECTION -->
        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container" onclick="loadStockPage();">
                        <img class="logo" src="logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                    </div>
                </div>
                <div class="header-middle-container">
                    <form class="search-bar" action="search.php" method="get">
                        <input type="search" placeholder="Search Item" name="search-data" aria-label="Search">
                        <button type="submit" name="search-data-product" value="search">
                            <img class="search-icon" src="icons/search-icon.svg" alt="search-icon">
                        </button>
                    </form>
                </div>
                <div class="header-right-container">
                    <div class="login-container">
                        <a href="#">Register</a>
                        <a href="#">Login</a>
                    </div>
                    <img src="icons/account-icon.png" alt="my-account-icon">
                    <div class="basket-container">
                        <img onclick="window.open('basket.php', '_self');" src="icons/basket-icon.png" alt="basket-icon">
                        <span class="basket-number">
                            <?php 
                                cartQuantity();
                            ?>
                        </span>
                    </div>
                    <div>
                        <?php
                            totalCartPrice();
                        ?>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN SECTION -->
        <main>
            <div class="basket-content-container">
                <section class="basket-left-container">
                    <div class="basket-title-container">
                        <h1>Equipment Cart</h1>
                        <h1>3 Items</h1>
                    </div>
                    <div class="line"></div>
                    <div class="basket-headings">
                        <p class="details-heading">Product Details</p>
                        <p class="quantity-heading">Quantity</p>
                        <p class="price-heading">Price</p>
                        <p class="total-heading">Total</p>
                    </div>
                    <div class="sproduct-grid">
                        <div class="sproduct">
                            <div class="product-details">
                                <div class="product-details-container">
                                    <div class="product-image-container">
                                        <img class="product-image" src="product-images/behringer-pmp500.webp" alt="product-image">
                                    </div>
                                </div>
                                <div class="product-details-text">
                                    <p class="product-title">Behringer PMP500</p>
                                    <p class="product-category">Consoles</p>
                                    <a class="remove-item" href="#">X Remove Item</a>
                                </div>
                            </div>
                            <div class="quantity-container">
                                <button onclick="decreaseQuantity();">
                                    <img src="icons/minus-icon.png" alt="">
                                </button>
                                <input class="quantity" id="js-quantity" type="text" pattern="^[a-zA-Z0-9]+$" onkeydown="return blockChars(event)" maxlength="2" required value="1">
                                <button onclick="increaseQuantity();">
                                    <img src="icons/plus-icon.png" alt="">
                                </button>
                            </div>
                            <div class="price-container">
                                <p>P/Day: £20.00</p>
                                <p>P/Week: £80.00</p>
                            </div>
                            <div class="total-container">
                                <p>P/Day: £200.00</p>
                                <p>P/Week: £800.00</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="basket-right-container">
                    <div class="basket-title-container">
                        <h1>Order Summary</h1>
                    </div>
                    <div class="line"></div>
                    <div class="subtotal-container">
                        <p>3 Items</p>
                        <p>£20.00</p>
                    </div>
                    <div class="hire-length-container">
                        <p>Hire Duration *</p>
                        <select class="hire-length" required>
                            <?php
                                echo "<option value='$i'>1 day</option>";
                                for ($i = 2; $i <= 30; $i++) {
                                    echo "<option value='$i'>$i days</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="terms-and-conditions-container">
                        <input type="checkbox" id="t-and-cs" name="myCheckbox" required>
                        <label for="t-and-cs">By ticking this box, you agree to <a href="../main-site/terms-and-conditions.html">Terms and Conditions *</a></label>
                    </div>
                    <div class="button-container">
                        <button class="submit-button"><a>Submit Request</a></button>
                    </div>
                </section>
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
                        <p><a href="../main-site/terms-and-conditions.html">Terms and Conditions</a></p>
                        <p><a href="#">Privacy Policy</a></p>
                        <p><a href="../main-site/documents/pli-insurance-certificate.pdf" target="_blank">PLI Insurance Certificate</a></p>
                    </div>
                </div>
                <div class="right-container">
                    <div class="link-container">
                        <div class="right-title-container">
                            <p>THE COMPANY</p>
                        </div>
                        <p><a href="../main-site/contact.php">Contact Us</a></p>
                        <p><a href="../main-site/home.html#about">About</a></p>
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

        <?php
            // Fetches logic for cart
            cart();
        ?>
    </body>
</html>