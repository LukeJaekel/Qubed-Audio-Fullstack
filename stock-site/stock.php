<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Connects to database
include('./includes/connect.php');

// Grabs common functions
include('./functions/function.php');

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

                <div class="sidebar-container">
                    <nav class="sidebar">
                        <p>CATEGORIES</p>
                        <?php getCategories(); ?>
                    </nav>
                </div>

                <div class="right-content">

                    <div class="listing-container">
                        <div class="listing-left-container">
                            <h2 class="category-header"></h2>
                            <p></p>
                        </div>

                        <div class="listing-right-container"></div>
                    </div>

                    <div class="product-grid-container">
                        <div class="product-grid">
                            <?php

                                if (isset($_GET['search-data']) && !empty($_GET['search-data'])) {
                                    searchProduct();
                                }
                                elseif (isset($_GET['category'])) {
                                    getProductsFromCategories();
                                }
                                else {
                                    getProducts();
                                }

                            ?>
                        </div>
                    </div>

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