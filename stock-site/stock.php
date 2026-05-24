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
                            <h2 class="category-header"><!-- USED AS A PLACEHOLDER FOR 
                                                            renderResultsHeader() in function.php --></h2>
                            <p><!-- USED AS A PLACEHOLDER FOR 
                                renderResultsHeader() in function.php --></p>
                        </div>

                        <div class="listing-right-container">
                            <form method="GET" id="sort-form">

                                <!-- Preserve category -->
                                <?php if (isset($_GET['category'])): ?>
                                    <input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
                                <?php endif; ?>

                                <!-- Preserve search -->
                                <?php if (isset($_GET['search-data'])): ?>
                                    <input type="hidden" name="search-data" value="<?php echo htmlspecialchars($_GET['search-data']); ?>">
                                <?php endif; ?>

                                <select name="sort" class="sort-box" onchange="this.form.submit()">
                                    <option value="newest"
                                        <?php if(($_GET['sort'] ?? '') == 'newest') echo 'selected'; ?>>
                                        Sort by: Newest
                                    </option>
                                    <option value="a-z"
                                        <?php if(($_GET['sort'] ?? '') == 'a-z') echo 'selected'; ?>>
                                        Sort by: A-Z
                                    </option>

                                    <option value="price-low-to-high"
                                        <?php if(($_GET['sort'] ?? '') == 'price-low-to-high') echo 'selected'; ?>>
                                        Sort by: Price (Low to High)
                                    </option>

                                    <option value="price-high-to-low"
                                        <?php if(($_GET['sort'] ?? '') == 'price-high-to-low') echo 'selected'; ?>>
                                        Sort by: Price (High to Low)
                                    </option>

                                    <option value="available-now"
                                        <?php if(($_GET['sort'] ?? '') == 'available-now') echo 'selected'; ?>>
                                        Sort by: Available Now
                                    </option>

                                </select>
                            </form>
                        </div>
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