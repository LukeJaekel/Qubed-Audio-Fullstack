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
                  color: white;
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
            echo '<p><a class="product-title-link" href="#">' . $productName . '</a></p>';
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
                  color: white;
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
            echo '<p><a class="product-title-link" href="#">' . $productName . '</a></p>';
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

?>