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
            echo '<button class="add-to-cart-button"><a href="stock.php?add_to_cart=' . $productId . '">Add To Cart<a></button>';
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
            // Retrieve category title from the database
            $selectCategory = "SELECT category_title FROM `categories` WHERE category_id = $categoryId;";
            $resultCategory = mysqli_query($connection, $selectCategory);
            $categoryRow = mysqli_fetch_assoc($resultCategory);
            $categoryTitle = $categoryRow['category_title'];

            echo "<p style='

                  position: absolute;
                  top: 10px;
                  right: 20px;
                  font-size: 24px;
                  color: rgb(235, 235, 235);
                  animation: transitionIn 1s;
            
                  '>Found <strong>$resultCount</strong> results</p>";

            echo "
            <p style='

                  position: absolute;
                  top: 10px;
                  left: 320px;
                  font-size: 24px;
                  color: rgb(235, 235, 235);
                  animation: transitionIn 1s;
            
                  '>Category: <strong>$categoryTitle</strong></p>";
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
            echo '<button class="add-to-cart-button"><a href="stock.php?add_to_cart=' . $productId . '">Add To Cart<a></button>';
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

        // Check if the current category is selected
        $selectedCategory = isset($_GET['category']) && $_GET['category'] == $categoryId;

        // Add a class for styling the selected category
        $class = $selectedCategory ? 'selected' : '';

        echo "<li><a href='stock.php?category=$categoryId' class='$class'>$categoryTitle</a></li>";
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
            if (empty($searchValue)) {
                echo "<p style='

                    position: absolute;
                    top: 10px;
                    right: 20px;
                    font-size: 24px;
                    color: rgb(235, 235, 235);
            
                    '>Found <strong>$resultCount</strong> results</p>";
            }
            else {
                echo "<p style='

                        position: absolute;
                        top: 10px;
                        right: 20px;
                        font-size: 24px;
                        color: rgb(235, 235, 235);
                
                        '>Found <strong>$resultCount</strong> results for '$searchValue'</p>";
            }
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
            echo '<button class="add-to-cart-button"><a href="stock.php?add_to_cart=' . $productId . '">Add To Cart<a></button>';
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

// Fetches product details for product page
function productDetails() {

    global $connection;

    if (isset($_GET['product_id'])) {

        // Checks if category is not chosen
        if (!isset($_GET['category'])) {

            $productId = $_GET['product_id'];

            // Retrieve product data from the database
            $sql = "SELECT * FROM `products` WHERE product_id = $productId";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
    
                $productName = $row["product_title"];
                $productPricePerDay = $row["product_price_pd"];
                $productPricePerWeek = $row["product_price_pw"];
                $productStatus = $row["product_status"];
                $productStock = $row["product_stock"];
                $productCurrentStock = $row['product_current_stock'];
                $productImage = $row["product_image"];
                $productDescription = $row['product_description'];

                echo '<div class="sproduct-container">';
                echo '<div class="sproduct-left-container">';
                echo '<div class="sproduct-image-container">';
                echo '<img src="' . $productImage . '" alt="" onerror="this.src=`admin-area/product-images/default-image.jpeg`">';
                echo '</div>';
                echo '</div>';
                echo '<div class="sproduct-text-container">';
                echo '<p class="sproduct-title">' . $productName . '</p>';
                echo '<div class="sproduct-price-container">';
                echo '<p>Per Day: <span style="font-weight: 600;">£' . $productPricePerDay . '</span></p>';
                echo '<p>Per Week: <span style="font-weight: 600;">£' . $productPricePerWeek . '</span></p>';
                echo '</div>';
                echo '<div class="status-container">';
                echo '<p><span class="status" style=font-weight: 600;">' . $productStatus . '</span></p>';
                echo '</div>';
                echo '<div class="sproduct-stock-container">';
                echo '<p>Current Stock: <span style="font-weight: 600;">' . $productCurrentStock . '</span></p>';
                echo '<p>Total Stock: <span style="font-weight: 600;">' . $productStock . '</span></p>';
                echo '</div>';
                echo '<div class="sproduct-button-container">';
                echo '<button class="add-to-cart-button"><a href="stock.php?add_to_cart=' . $productId . '">Add To Cart<a></button>';
                echo '<label for="sproduct-quantity" id="quantity"></label>';
                echo '<select class="sproduct-quantity-box" name="quantity">';
                echo '<option value="1">1</option>';
                echo '</select>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="sproduct-description-container">';
                echo '<h1>Description</h1>';
                echo '<p>' . $productDescription . '</p>';
                echo '</div>';
            }
            else {
                echo "<div style='
                        position: absolute;
                        top: 50px;
                
                        '>";
                
                echo "<h1 style='
                        color: rgb(235, 235, 235);
                        text-align: center;
                        '>

                        Product not found... <br>:(</br>
                        
                        </h1>";
                echo "</div>";
            }
        }
    }
}


// Get IP Address
function getIPAddress() {  
    
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    
    //whether ip is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    
    return $ip;  
}


// Cart function
function cart() {

    if (isset($_GET['add_to_cart'])) {
        global $connection;

        $ip = getIPAddress();

        $productId = $_GET['add_to_cart'];
        $sql = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND
                product_id = $productId";
        $result = $connection->query($sql);

        $resultCount = mysqli_num_rows($result);
        if ($resultCount > 0) {
            echo "<script>alert('You already have this item in the cart')</script>";
            echo "<script>window.open('stock.php', '_self')</script>";
        }
        else {
            $insertQuery = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
                                                        VALUES ($productId, '$ip', 0)";
            $result = $connection->query($insertQuery);
            echo "<script>alert('Item added to cart')</script>";
            echo "<script>window.open('stock.php', '_self')</script>";
        }
    }
}


/* ----- CART FUNCTIONS ----- */

// Fetches number of items in cart
function cartQuantity() {

    // Enable error reporting and display
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    global $connection;

    if (isset($_GET['add_to_cart'])) {

        $ip = getIPAddress();

        $sql = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $result = $connection->query($sql);

        $itemCount = mysqli_num_rows($result);
    }
    else {

        $ip = getIPAddress();

        $sql = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $result = $connection->query($sql);

        $itemCount = mysqli_num_rows($result);
    }

    echo $itemCount;
}


// Fetches total cart price
function totalCartPrice() {
    global $connection;

    $dailyTotal = 0;
    $weeklyTotal = 0;

    $ip = getIPAddress();

    $cartQuery = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    $cartResult = $connection->query($cartQuery);

    while ($row = mysqli_fetch_array($cartResult)) {
        $productId = $row['product_id'];

        $selectQuery = "SELECT * FROM `products` WHERE product_id = '$productId'";
        $selectResult = $connection->query($selectQuery);

        while ($rowProductPrice = mysqli_fetch_array($selectResult)) {

            // Total price per day
            $dailyProductPrice = array($rowProductPrice['product_price_pd']);
            $dailyProductValues = array_sum($dailyProductPrice);
            $dailyTotal += $dailyProductValues;

            // Total price per week
            $weeklyProductPrice = array($rowProductPrice['product_price_pw']);
            $weeklyProductValues = array_sum($weeklyProductPrice);
            $weeklyTotal += $weeklyProductValues;
        }
    }

    // Format the total prices with ".00" for integers
    $formattedDailyTotal = number_format($dailyTotal, 2);
    $formattedWeeklyTotal = number_format($weeklyTotal, 2);

    echo "<p class='center-aligned-text'>P/Day: £$formattedDailyTotal</p>";
    echo "<p class='right-aligned-text'>P/Week: £$formattedWeeklyTotal</p>";
}

?>