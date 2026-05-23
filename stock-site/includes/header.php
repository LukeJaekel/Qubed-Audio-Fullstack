<header class="js-header">
    <div class="top-container">
        <div class="header-left-container">
            <div class="logo-container" onclick="loadStockPage();">
                <img class="logo" src="logo/logo.jpg" alt="qubed-logo">
                <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(255, 255, 255);">Stock</span></p>
            </div>
        </div>
        <div class="header-middle-container">
            <form class="search-bar" action="stock.php" method="get">
                <input type="search"
                    name="search-data"
                    placeholder="Search Items">

                <button type="submit">
                    <img src="icons/search-icon.svg" alt="search">
                </button>
            </form>
        </div>
        <div class="header-right-container">
            <div class="account-wrapper">
                <div class="account-trigger">
                    <img src="icons/account-icon.png" alt="my-account-icon">
                    <span>My Account</span>
                    <span class="account-arrow">▾</span>
                </div>

                <div class="account-dropdown">
                    <a href="account/register.php">Register</a>
                    <a href="account/login.php">Login</a>
                </div>
            </div>
            <div class="basket-container">
                <img class="basket" onclick="window.open('basket.php', '_self');" src="icons/basket-icon.png" alt="basket-icon">
                <span class="basket-number">
                    <?php 
                        cartQuantity();
                    ?>
                </span>
            </div>
        </div>
    </div>
</header>