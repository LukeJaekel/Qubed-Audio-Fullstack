<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Products";


// Establish a database connection
$connection = new mysqli($servername, $username, $password, $database);


// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Retrieve product data from the database
$sql = "SELECT * FROM products;";
$result = $connection->query($sql);


// Loop through the retrieved data and generate dynamic HTML
while ($row = $result->fetch_assoc()) {
    $productId = $row['id'];
    $productName = $row["name"];
    $productPricePerDay = $row["price p/d"];
    $productPricePerWeek = $row["price p/w"];
    $productStatus = $row["status"];
    $productAvailability = $row["stock_availability"];
    $productImage = $row["image"];


    // Generate HTML code for each product
    echo '<div class="product" id="' . $productId . '">';
    echo '<div class="image-container">';
    echo '<img class="product-image" src="' . $productImage . '" alt="' . $productName . '">';
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
    echo '<select name="quantity" id="">';
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

// Close the connection
$connection->close();
?>