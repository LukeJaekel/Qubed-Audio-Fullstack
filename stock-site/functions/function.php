<?php

// Connects to database
include(__DIR__ . '/../includes/connect.php');


// Fetches current product status by ID and outputs whether booked or not
function getStatusDetails($statusID) {
    switch ($statusID) {
        case 1:
            return [
                'text' => 'Asset Booked',
                'colour' => 'rgb(250, 170, 100)' // orange
            ];
        case 0:
            return [
                'text' => 'In Warehouse',
                'colour' => 'rgb(100, 250, 128)' // green
            ];
        default:
            return [
                'text' => 'Unknown Status',
                'colour' => 'black'
            ];
    }
}

// Used for filter on stock page to inject into stock.php
function buildSortSql() {

    $sort = $_GET['sort'] ?? '';

    switch ($sort) {

        case 'a-z':
            return "ORDER BY AssetName ASC";

        case 'price-low-to-high':
            return "ORDER BY AssetCostPerDay ASC, AssetCostPerWeek ASC";

        case 'price-high-to-low':
            return "ORDER BY AssetCostPerDay DESC, AssetCostPerWeek ASC";

        case 'newest':
            return "ORDER BY ID DESC";

        case 'available-now':
            return "ORDER BY AssetQty DESC";

        default:
            return "ORDER BY ID DESC";
    }
}

// Loads the header listings section above the product grid
function renderResultsHeader($count, $type = 'all', $searchValue = null, $categoryTitle = null) {

    if ($count == 0) {
        echo "<div class='results-message no-results'>
                <h1>No results found :(</h1>
              </div>";
        return;
    }

    if ($type === 'category') {
        echo "<script>
            document.querySelector('.category-header').textContent = " . json_encode($categoryTitle) . ";
            document.querySelector('.listing-left-container p').textContent = 'Showing $count results';
        </script>";
    }

    if ($type === 'search') {
        echo "<script>
            document.querySelector('.category-header').textContent = 'Search results';
            document.querySelector('.listing-left-container p').textContent = 'Showing $count results for " . addslashes($searchValue) . "';
        </script>";
    }

    if ($type === 'all') {
        echo "<script>
            document.querySelector('.category-header').textContent = 'All Products';
            document.querySelector('.listing-left-container p').textContent = 'Showing $count results';
        </script>";
    }
}

// Loads the product
function renderProductCard($row) {

    $productId = (int)$row['ID'];

    $productName = htmlspecialchars($row["AssetName"] ?? '', ENT_QUOTES, 'UTF-8');

    $productPricePerDay = htmlspecialchars($row["AssetCostPerDay"], ENT_QUOTES, 'UTF-8');

    $productPricePerWeek = htmlspecialchars($row["AssetCostPerWeek"], ENT_QUOTES, 'UTF-8');

    $productAvailability = (int)$row["AssetQty"];

    $productImage = htmlspecialchars($row["AssetImage"] ?? '', ENT_QUOTES, 'UTF-8');

    $statusDetails = getStatusDetails($row["AssetStatusID"]);

    echo '<div class="product" id="' . $productId . '">';

        echo '<div class="product-top-container">';

            echo '<div class="image-container">';
                echo '<img class="product-image"
                        src="' . $productImage . '"
                        alt="' . $productName . '"
                        onerror="this.src=`admin-area/product-images/default-image.jpeg`">';
                echo '</div>';

                echo '<div class="text-container">';

                echo '<div class="product-title-container">';
                echo '<p>
                        <a class="product-title-link"
                        href="product.php?ID=' . $productId . '">'
                        . $productName .
                        '</a>
                    </p>';
            echo '</div>';

        echo '</div>';
    echo '</div>';

    echo '<div class="product-bottom-container">';


    echo '<div class="price-main-container">';

        echo '<div class="price-container">';
            echo '<p><span style="color: rgb(220,32,25);">£' . $productPricePerDay . '</span> / day</p>';
        echo '</div>';

        echo '<div class="price-container">';
            echo '<p><span style="color: rgb(255,255,255);">£' . $productPricePerWeek . '</span> / week</p>';
        echo '</div>';

    echo '</div>';

    echo '<div class="sproduct-button-container">';

        echo '<form method="post" action="stock.php">';

            echo '<input type="hidden" name="add_to_cart" value="' . $productId . '">';

            echo '<select class="sproduct-quantity-box" name="quantity">';

                for ($i = 1; $i <= $productAvailability; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }

            echo '</select>';

            $disabled = ($productAvailability <= 0) ? 'disabled' : '';

            echo '<button class="add-to-cart-button" type="submit" ' . $disabled . '>';
                echo '<img src="icons/cart-icon.png" alt="cart-icon">';
                echo 'Add to Basket';
            echo '</button>';

        echo '</form>';

    echo '</div>';

    echo '<div class="status-container">';
        echo '<p style="color:' . $statusDetails['colour'] . ';">'
                . $statusDetails['text'] .
            '</p>';
    echo '</div>';

    echo '<div class="stock-container">';
        echo '<p>Stock available:</p>';
        echo '<p>' . $productAvailability . '</p>';
    echo '</div>';

    echo '</div>';

    echo '</div>';
}

// Fetches all products
function getProducts() {

    global $connection;

    // Checks if category is not chosen
    if (!isset($_GET['category'])) {

        // Retrieve product data from the database
        $sortSql = buildSortSql();

        $sql = "SELECT * FROM stock WHERE AssetInactive = 0 AND Deleted = 0 $sortSql";
        $result = $connection->query($sql);

        $resultCount = mysqli_num_rows($result);

        renderResultsHeader($resultCount, 'all');

        if ($resultCount == 0) {
            return;
        }

        // Declare and initialize the $i variable
        $i = 1;

        // Loop through the retrieved stock and generate dynamic HTML
        while ($row = $result->fetch_assoc()) {
            renderProductCard($row);
        }
    }
}


// Fetches products based on selected category
function getProductsFromCategories() {

    global $connection;

    // Checks if category is chosen
    if (isset($_GET['category'])) {

        $categoryId = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);

        if (!$categoryId) {
            exit("Invalid category.");
        }

        // Check category exists and is active
        $stmt = $connection->prepare("
            SELECT CategoryName
            FROM categories
            WHERE CategoryID = ?
            AND CategoryInactive = 0
        ");

        $stmt->bind_param("i", $categoryId);
        $stmt->execute();

        $categoryResult = $stmt->get_result();

        if ($categoryResult->num_rows === 0) {
            renderResultsHeader(0, 'category', null, 'Category');
            return;
        }

        $categoryRow = $categoryResult->fetch_assoc();
        $categoryTitle = $categoryRow['CategoryName'];
        

        // Fetch products from active category
        $sortSql = buildSortSql();

        $query = "SELECT * FROM stock WHERE AssetCategoryID = ? AND AssetInactive = 0 AND Deleted = 0 $sortSql";

        $productStmt = $connection->prepare($query);

        $productStmt->bind_param("i", $categoryId);
        $productStmt->execute();

        $result = $productStmt->get_result();

        $resultCount = mysqli_num_rows($result);

        // Renders the product listing info above the product grid
        renderResultsHeader($resultCount, 'category', null, $categoryTitle);

        if ($resultCount == 0) {
            return;
        }


        // Loop through the retrieved data and generate dynamic HTML
        while ($row = $result->fetch_assoc()) {
            renderProductCard($row);
        }
    }
}

// Fetches all available categories
function getCategories() {
    global $connection;

    $selectCategories = "SELECT * FROM `categories` WHERE CategoryInactive = 0;";
    $resultCategories = mysqli_query($connection, $selectCategories);

    while ($rowData = mysqli_fetch_assoc($resultCategories)) {

        $categoryTitle = $rowData['CategoryName'];
        $categoryId = $rowData['CategoryID'];

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

    if (!isset($_GET['search-data']) || trim($_GET['search-data']) === '') {
        return;
    }

    $searchInput = $_GET['search-data'];
    $searchValue = "%" . $searchInput . "%";

    $sortSql = buildSortSql();

    $stmt = $connection->prepare("SELECT * FROM stock WHERE AssetName LIKE ? AND AssetInactive = 0 AND Deleted = 0 $sortSql");

    $stmt->bind_param("s", $searchValue);
    $stmt->execute();

    $result = $stmt->get_result();
    $resultCount = $result->num_rows;

    renderResultsHeader($resultCount, 'search', $searchInput);

    if ($resultCount === 0) {
        return;
    }

    while ($row = $result->fetch_assoc()) {
        renderProductCard($row);
    }
}

// Fetches product details for product page
function productDetails() {

    global $connection;

    if (isset($_GET['ID'])) {

        // Checks if category is not chosen
        if (!isset($_GET['category'])) {

            $productId = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);

            // Retrieve product data from the database
            $stmt = $connection->prepare("SELECT * FROM stock WHERE ID = ? AND AssetInactive = 0 AND Deleted = 0");

            $stmt->bind_param("i", $productId);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
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

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
    
                $productName = $row["AssetName"];
                $productPricePerDay = $row["AssetCostPerDay"];
                $productPricePerWeek = $row["AssetCostPerWeek"];
                $productStatus = $row["AssetStatusID"];
                $productStock = $row["AssetQty"];
                $productCurrentStock = $row['AssetCurrentQty'];
                $productImage = $row["AssetImage"];
                $productDescription = $row['AssetDescription'];
                $statusDetails = getStatusDetails($row["AssetStatusID"]);

                // Declare and initialize the $i variable
                $i = 1;

                // Call the cart() function and pass the selected quantity
                if (isset($_GET['add_to_cart'])) {
                    cart();
                }

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
                echo '<p><span class="status" style=font-weight: 600; style="color:' . $statusDetails['colour'] . ';"">' . $statusDetails['text'] . '</span></p>';
                echo '</div>';
                echo '<div class="sproduct-stock-container">';
                echo '<p>Current Stock: <span style="font-weight: 600;">' . $productCurrentStock . '</span></p>';
                echo '<p>Total Stock: <span style="font-weight: 600;">' . $productStock . '</span></p>';
                echo '</div>';
                echo '<div class="sproduct-button-container">';
                echo '<button class="add-to-cart-button"><a href="stock.php?add_to_cart=' . $productId . '&quantity=' . $i . '">Add To Cart</a></button>';
                echo '<label for="sproduct-quantity" id="quantity"></label>';
                echo '<select class="sproduct-quantity-box" name="quantity">';
                $maxQty = (int)$row['AssetQty'];

                for ($i = 1; $i <= $maxQty; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
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
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ipList[0]);  // take the first IP only
    }  
    
    //whether ip is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    
    return $ip;  
}

/* ----- CART FUNCTIONS ----- */

// Cart function
function cart() {

    global $connection;

    if (isset($_POST['add_to_cart'])) {

        $ip = getIPAddress();

        $productId = filter_input(INPUT_POST, 'add_to_cart', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

        if (!$productId || !$quantity || $quantity < 1) {
            return;
        }

        // Validate product exists and is active
        $stmt = $connection->prepare("SELECT AssetQty FROM stock WHERE ID = ? AND AssetInactive = 0 AND Deleted = 0");

        $stmt->bind_param("i", $productId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return;
        }

        $product = $result->fetch_assoc();

        // Prevent quantity exceeding stock
        if ($quantity > $product['AssetQty']) {
            $quantity = $product['AssetQty'];
        }

        // Check if already in cart
        $cartStmt = $connection->prepare("SELECT quantity FROM cart_details WHERE ip_address = ? AND product_id = ?");

        $cartStmt->bind_param("si", $ip, $productId);
        $cartStmt->execute();

        $cartResult = $cartStmt->get_result();

        // Update existing cart item
        if ($cartResult->num_rows > 0) {

            $updateStmt = $connection->prepare("UPDATE cart_details SET quantity = quantity + ? WHERE ip_address = ? AND product_id = ?");

            $updateStmt->bind_param("isi", $quantity, $ip, $productId);
            $updateStmt->execute();

        } 
        
        // Insert new cart item
        else {

            $insertStmt = $connection->prepare("INSERT INTO cart_details (product_id, ip_address, quantity) VALUES (?, ?, ?)");

            $insertStmt->bind_param("isi", $productId, $ip, $quantity);
            $insertStmt->execute();
        }

        echo "<script>window.open('stock.php', '_self');</script>";
    }
}



// Fetches number of items in cart
function cartQuantity() {

    // Enable error reporting and display
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    global $connection;

    $ip = getIPAddress();

    $sql = "SELECT SUM(quantity) AS total_quantity FROM `cart_details` WHERE ip_address = '$ip'";
    $result = $connection->query($sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalQuantity = $row['total_quantity'] ?? 0;
        echo $totalQuantity;
    } else {
        echo 0;
    }
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
        $currentQuantity = $row['quantity'];

        $selectQuery = "SELECT * FROM `stock` WHERE ID = '$productId'";
        $selectResult = $connection->query($selectQuery);

        while ($rowProductPrice = mysqli_fetch_array($selectResult)) {
            // Total price per day
            $dailyProductPrice = array($rowProductPrice['AssetCostPerDay']);
            $dailyProductValue = array_sum($dailyProductPrice);
            $dailyTotal += $dailyProductValue * $currentQuantity;

            // Total price per week
            $weeklyProductPrice = array($rowProductPrice['AssetCostPerWeek']);
            $weeklyProductValue = array_sum($weeklyProductPrice);
            $weeklyTotal += $weeklyProductValue * $currentQuantity;
        }
    }

    // Format the total prices with ".00" for integers
    $formattedDailyTotal = number_format($dailyTotal, 2);
    $formattedWeeklyTotal = number_format($weeklyTotal, 2);

    echo "<p class='center-aligned-text'>P/Day: £$formattedDailyTotal</p>";
    echo "<p class='right-aligned-text'>P/Week: £$formattedWeeklyTotal</p>";
}


// Remove item from basket
function removeItem() {
    global $connection;
    $ip = getIPAddress();
    if (isset($_POST['remove-basket'])) {
        $productId = $_POST['product-id']; // Assuming you have a hidden input field with the product ID
        $deleteQuery = "DELETE FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $productId";
        $resultDelete = $connection->query($deleteQuery);

        if ($resultDelete) {
            echo "<script>window.open('basket.php', '_self')</script>";
        }
    }
}

function loadProductItems() {

    // Enable error reporting and display
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    global $connection;

    $ip = getIPAddress();

    $dailyTotal = 0;
    $weeklyTotal = 0;

    $cartQuery = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    $cartResult = $connection->query($cartQuery);

    while ($row = mysqli_fetch_array($cartResult)) {
        $productId = $row['product_id'];
        $currentQuantity = $row['quantity'];

        $selectQuery = "SELECT * FROM `stock` WHERE ID = '$productId'";
        $selectResult = $connection->query($selectQuery);

        while ($productRow = mysqli_fetch_array($selectResult)) {

            // Total price per day
            $dailyProductPrice = array($productRow['AssetCostPerDay']);
            $dailyProductValue = array_sum($dailyProductPrice);
            $dailyTotal += $dailyProductValue;

            // Total price per week
            $weeklyProductPrice = array($productRow['AssetCostPerWeek']);
            $weeklyProductValue = array_sum($weeklyProductPrice);
            $weeklyTotal += $weeklyProductValue;

            // Product Title
            $productTitle = $productRow['AssetName'];
        
            // Fetch the updated quantity from the database
            $getQuantityQuery = "SELECT quantity FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $productId";
            $resultGetQuantity = $connection->query($getQuantityQuery);

            if ($resultGetQuantity && $resultGetQuantity->num_rows > 0) {
                $row = $resultGetQuantity->fetch_assoc();
                $currentQuantity = $row['quantity'];

                $formattedDailyTotal = number_format($dailyProductValue * $currentQuantity, 2);
                $formattedWeeklyTotal = number_format($weeklyProductValue * $currentQuantity, 2);

                echo '<div class="item-container">';
                echo '<p class="left-aligned-text">'. $currentQuantity .'x '. $productTitle .'</p>';
                echo '<p class="center-aligned-text">P/Day: £'. $formattedDailyTotal .'</p>';
                echo '<p class="right-aligned-text">P/Week: £'. $formattedWeeklyTotal .'</p>';
                echo '</div>';
            }
        }
    }
}

?>