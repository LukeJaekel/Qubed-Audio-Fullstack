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
        <link rel="stylesheet" href="styles/stock.css">
        <link rel="stylesheet" href="styles/product-details.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="scripts/header.js"></script>
        <script defer src="scripts/general.js"></script>
        <script defer src="scripts/product-box.js"></script>
    </head>
    <body>

        <!-- HEADER SECTION -->
        <?php include 'includes/header.php'; ?>

        <!-- MAIN SECTION -->
        <main>
            <div class="main-content">
                <nav class="sidebar">
                    <p>CATEGORIES</p>
                    <?php
                        // Fetches all categories
                        getCategories();
                    ?>
                </nav>
                <div class="sproduct">
                    <?php
                        // Fetches product details
                        productDetails();
                    ?>
                </div>
            </div>
        </main>

        <!-- FOOTER SECTION -->
        <?php include 'includes/footer.php'; ?>

        <?php
            // Fetches logic for cart
            cart();
        ?>
    </body>
</html>