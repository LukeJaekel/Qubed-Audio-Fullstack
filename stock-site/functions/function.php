<?php


// Connects to database
include("./includes/connect.php");

// Fetches all products
function getProducts() {

    global $connection;

    // Checks if category is not chosen
    if (!isset($_GET['category'])) {

        // Retrieve product data from the database
        $sql = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,9;";
        $result = $connection->query($sql);

        
        $resultCount = mysqli_num_rows($result);
        if ($resultCount == 0) {
            echo "<div style='
                 position: absolute;
                 top: 50px;
            
                 '>";
            
            echo "<h1 style='
                  color: rgb(235, 235, 235);
                  text-align: center;
                  '>

                  Nothing to see here... <br>:(</br>
                  
                  </h1>";
            echo "</div>";
        }
        else {
            echo "<p style='

                  position: absolute;
                  top: 10px;
                  right: 20px;
                  font-size: 24px;
                  color: rgb(235, 235, 235);
            
                  '>Found <strong>$resultCount</strong> results</p>";
        }


        // Loop through the retrieved data and generate dynamic HTML
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $productName = $row["product_title"];
            $productPricePerDay = $row["product_price_pd"];
            $productPricePerWeek = $row["product_price_pw"];
            $productStatus = $row["product_status"];
            $productAvailability = $row["product_stock"];
            $productImage = $row["product_image"];


            // Generate HTML code for each product
            echo '<div class="product" id="' . $productId . '">';
            echo '<div class="image-container">';
            echo '<img class="product-image" src="' . $productImage . '" alt="' . $productName . '" onerror="this.src=`admin-area/product-images/default-image.jpeg`">';
            echo '</div>';
            echo '<div class="text-container">';
            echo '<div class="product-title-container">';
            echo '<p><a class="product-title-link" href="product.php?product_id=' . $productId . '">' . $productName . '</a></p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/day:</p>';
            echo '<p>£' . $productPricePerDay . '</p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/week:</p>';
            echo '<p>£' . $productPricePerWeek . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="button-container">';
            echo '<button class="add-to-cart-button">Add To Cart</button>';
            echo '<label for="quantity" id="quantity"></label>';
            echo '<select class="quantity" name="quantity">';
            echo '<option value="1">1</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="status-container">';
            echo '<p>' . $productStatus . '</p>';
            echo '</div>';
            echo '<div class="stock-container">';
            echo '<p>Stock available:</p>';
            echo '<p>' . $productAvailability . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
}


// Fetches products based on selected category
function getProductsFromCategories() {

    global $connection;

    // Checks if category is chosen
    if (isset($_GET['category'])) {

        $categoryId = $_GET['category'];

        // Retrieve product data from the database
        $sql = "SELECT * FROM `products` WHERE category_id = $categoryId ORDER BY rand() LIMIT 0,9;";
        $result = $connection->query($sql);

        $resultCount = mysqli_num_rows($result);
        if ($resultCount == 0) {
            echo "<div style='
                 position: absolute;
                 top: 50px;
            
                 '>";
            
            echo "<h1 style='
                  color: rgb(235, 235, 235);
                  text-align: center;
                  '>

                  Nothing to see here... <br>:(</br>
                  
                  </h1>";
            echo "</div>";
        }
        else {
            echo "<p style='

                  position: absolute;
                  top: 10px;
                  right: 20px;
                  font-size: 24px;
                  color: rgb(235, 235, 235);
            
                  '>Found <strong>$resultCount</strong> results</p>";
        }


        // Loop through the retrieved data and generate dynamic HTML
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $productName = $row["product_title"];
            $productPricePerDay = $row["product_price_pd"];
            $productPricePerWeek = $row["product_price_pw"];
            $productStatus = $row["product_status"];
            $productAvailability = $row["product_stock"];
            $productImage = $row["product_image"];


            // Generate HTML code for each product
            echo '<div class="product" id="' . $productId . '">';
            echo '<div class="image-container">';
            echo '<img class="product-image" src="' . $productImage . '" alt="' . $productName . '" onerror="this.src=`admin-area/product-images/default-image.jpeg`">';
            echo '</div>';
            echo '<div class="text-container">';
            echo '<div class="product-title-container">';
            echo '<p><a class="product-title-link" href="product.php?product_id=' . $productId . '">' . $productName . '</a></p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/day:</p>';
            echo '<p>£' . $productPricePerDay . '</p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/week:</p>';
            echo '<p>£' . $productPricePerWeek . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="button-container">';
            echo '<button class="add-to-cart-button">Add To Cart</button>';
            echo '<label for="quantity" id="quantity"></label>';
            echo '<select class="quantity" name="quantity">';
            echo '<option value="1">1</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="status-container">';
            echo '<p>' . $productStatus . '</p>';
            echo '</div>';
            echo '<div class="stock-container">';
            echo '<p>Stock available:</p>';
            echo '<p>' . $productAvailability . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
}

// Fetches all available categories
function getCategories() {

    global $connection;

    $selectCategories = "SELECT * FROM `categories`;";
    $resultCategories = mysqli_query($connection, $selectCategories);

    while ($rowData = mysqli_fetch_assoc($resultCategories)) {
        $categoryTitle = $rowData['category_title'];
        $categoryId = $rowData['category_id'];

        echo "<li><a href='stock.php?category=$categoryId'>$categoryTitle</a></li>";
    }
}


// Searches Products
function searchProduct() {

    global $connection;
    if (isset($_GET['search-data-product'])) {

        $searchValue = $_GET['search-data'];

        // Retrieve product data from the database
        $sql = "SELECT * FROM `products` WHERE product_title LIKE '%$searchValue%'";
        $result = $connection->query($sql);

        
        $resultCount = mysqli_num_rows($result);
        if ($resultCount == 0) {
            echo "<div style='
                    position: absolute;
                    top: 50px;
            
                    '>";
            
            echo "<h1 style='
                    color: rgb(235, 235, 235);
                    text-align: center;
                    '>

                    No results found... <br>:(</br>
                    
                    </h1>";
            echo "</div>";
        }
        else {
            echo "<p style='

                    position: absolute;
                    top: 10px;
                    right: 20px;
                    font-size: 24px;
                    color: rgb(235, 235, 235);
            
                    '>Found <strong>$resultCount</strong> results</p>";
        }


        // Loop through the retrieved data and generate dynamic HTML
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $productName = $row["product_title"];
            $productPricePerDay = $row["product_price_pd"];
            $productPricePerWeek = $row["product_price_pw"];
            $productStatus = $row["product_status"];
            $productAvailability = $row["product_stock"];
            $productImage = $row["product_image"];


            // Generate HTML code for each product
            echo '<div class="product" id="' . $productId . '">';
            echo '<div class="image-container">';
            echo '<img class="product-image" src="' . $productImage . '" alt="' . $productName . '" onerror="this.src=`admin-area/product-images/default-image.jpeg`">';
            echo '</div>';
            echo '<div class="text-container">';
            echo '<div class="product-title-container">';
            echo '<p><a class="product-title-link" href="product.php?product_id=' . $productId . '">' . $productName . '</a></p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/day:</p>';
            echo '<p>£' . $productPricePerDay . '</p>';
            echo '</div>';
            echo '<div class="price-container">';
            echo '<p>Price p/week:</p>';
            echo '<p>£' . $productPricePerWeek . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="button-container">';
            echo '<button class="add-to-cart-button">Add To Cart</button>';
            echo '<label for="quantity" id="quantity"></label>';
            echo '<select class="quantity" name="quantity">';
            echo '<option value="1">1</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="status-container">';
            echo '<p>' . $productStatus . '</p>';
            echo '</div>';
            echo '<div class="stock-container">';
            echo '<p>Stock available:</p>';
            echo '<p>' . $productAvailability . '</p>';
            echo '</div>';
            echo '</div>';
        }
    }
}

function productDetails() {

    global $connection;

    if (isset($_GET['product_id'])) {

        // Checks if category is not chosen
        if (!isset($_GET['category'])) {

            $productId = $_GET['product_id'];

            // Retrieve product data from the database
            $sql = "SELECT * FROM `products` WHERE product_id = $productId";
            $result = $connection->query($sql);

            echo '<section class="product">';
            echo '<div class="product-details-container">';
            echo '<div class="left-section">';
            echo '<img class="product-image" src="product-images/behringer-pmp500.webp" />';
            echo '</div>';
            echo '<div class="right-section">';
            echo '<p class="category-link">Stock / Consoles</p>';
            echo '<p class="product-title">';
            echo 'Behringer PMP500';
            echo '</p>';
            echo '<div class="price-container">';
            echo '<p>Per Day: <span style="font-weight: 600;">£22.00</span></p>';
            echo '<p>Per Week: <span style="font-weight: 600;">£80.00</span></p>';
            echo '</div>';
            echo '<div class="status-container">';
            echo '<p>Availability: <span class="status" style="color: rgb(240, 104, 0);">Currently out on hire</span></p>';
            echo '<p>Returning on 25/05/2023 at 20:00</p>';
            echo '</div>';
            echo '<div class="add-to-cart-container">';
            echo '<label for="quantity" id="quantity"></label>';
            echo '<select class="quantity-box" name="quantity">';
            echo '<option value="1">1</option>';
            echo '</select>';
            echo '<button class="add-to-cart-button">Add To Cart</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="details-container">';
            echo '<p class="details-title">Description</p>';
            echo '<p class="details">';
            echo 'This is the Behringer PMP500. A 12 channel mixing console designed';
            echo 'for a smaller live setup.';
            echo '</p>';
            echo '</div>';
            echo '</section>';
        }
    }
}

?>