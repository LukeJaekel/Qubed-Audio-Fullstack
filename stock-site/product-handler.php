<?php

include("includes/connect.php");

// Retrieve product data from the database
$sql = "SELECT * FROM products;";
$result = $connection->query($sql);


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

// Close the connection
$connection->close();
?>