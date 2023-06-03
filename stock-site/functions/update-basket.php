<?php
// update-basket.php

// Enable error reporting and display
error_reporting(E_ALL);
ini_set('display_errors', 1);

$ip = getIPAddress();

if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $updateProductId = $_POST['productId'];
    $updateQuantity = $_POST['quantity'];

    $updateCart = "UPDATE `cart_details` SET quantity = $updateQuantity WHERE ip_address = '$ip' AND product_id = $updateProductId";
    $resultQty = $connection->query($updateCart);

    // Fetch the updated quantity from the database
    $getQuantityQuery = "SELECT quantity FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $updateProductId";
    $resultGetQuantity = $connection->query($getQuantityQuery);

    if ($resultGetQuantity && $resultGetQuantity->num_rows > 0) {
        $row = $resultGetQuantity->fetch_assoc();
        $currentQuantity = $row['quantity'];

        // Calculate the updated total values
        $totalDailyProductValue = $formattedDailyValue * $currentQuantity;
        $totalWeeklyProductValue = $formattedWeeklyValue * $currentQuantity;

        // Prepare the response as JSON
        $response = array(
            'dailyTotal' => number_format($totalDailyProductValue, 2),
            'weeklyTotal' => number_format($totalWeeklyProductValue, 2)
        );

        // Send the response back to the client
        echo json_encode($response);
        exit;
    }
}
?>