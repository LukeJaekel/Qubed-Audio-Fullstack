<?php 

// Enable error reporting and display
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connect.php');

if (isset($_POST['insert-product'])) {

    // Accessing product information from database
    $productTitle = $_POST['product-title'];
    $productDescription = $_POST['product-description'];
    $productCategory = $_POST['product-category'];
    $productPricePerDay = $_POST['price-per-day'];
    $productPricePerWeek = $_POST['price-per-week'];
    $productStock = $_POST['available-stock'];

    // Stores image file
    $productImage = isset($_FILES['product-image']['name']) ? $_FILES['product-image']['name'] : 'image-not-available.jpg';

    // Stores temporary name of image
    $temporaryImage = isset($_FILES['product-image']['tmp_name']) ? $_FILES['product-image']['tmp_name'] : '';

    if ($productTitle == '' or 
        $productDescription == '' or
        $productCategory == '' or
        $productPricePerDay == '' or
        $productPricePerWeek == '' or
        $productStock == '') {
            echo "<script>alert('Please fill in all the available fields!')</script>";
            exit();
    } 
    else {
        // Get the maximum ID value from the products table
        $maxIdQuery = "SELECT MAX(product_id) AS max_id FROM `products`;";
        $resultMaxId = mysqli_query($connection, $maxIdQuery);
        $rowMaxId = mysqli_fetch_assoc($resultMaxId);
        $nextId = $rowMaxId['max_id'] + 1;

        // Move the uploaded image file or use the default "image-not-available" image
        if (!empty($temporaryImage)) {
            move_uploaded_file($temporaryImage, "./product-images/$productImage");
        } 
        else {
            $productImage = 'product-images/default-image.jpeg';
        }

        $insertProduct = "INSERT INTO `products` (product_id, product_title, product_description, category_id, 
                                                 product_image, product_price_pd, product_price_pw,
                                                 product_stock, product_status, date_added) VALUES ('$nextId', 
                                                 '$productTitle', '$productDescription', '$productCategory', 
                                                 '$productImage', '$productPricePerDay', '$productPricePerWeek', 
                                                 '$productStock', 'Available', NOW());";

        $resultQuery = mysqli_query($connection, $insertProduct);
        if ($resultQuery) {
            echo "<script>alert('Product added successfully!')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q-Stock | Admin Dashboard</title>

    <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">

    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/form-content.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .title-container {
            display: flex;
            justify-content: center;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .form-input-container {
            margin-bottom: 30px;
            position: relative;
        }

        .title {
            width: 100%;
            margin-bottom: 10px;
            margin-left: 5px;
        }

        .pound-sign {
            position: absolute;
            font-size: 24px;
            left: 10px;
            bottom: 6px;
        }

    </style>
</head>
<body>
    <div class="title-container">
        <h1 class="form-title">Insert Products</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <!-- PRODUCT TITLE -->
        <div class="form-container">
            <div class="form-input-container">
                <p class="title">Product Title *</p>
                <input type="text" name="product-title" 
                placeholder="Enter Product Title" id="product-title" 
                class="form-control" autocomplete="off" required="required">
            </div>

            <!-- PRODUCT DESCRIPTION -->
            <div class="form-input-container">
                <p class="title">Product Description</p>
                <textarea class="form-text-control" name="product-description" 
                placeholder="Enter Product Description..."></textarea>
            </div>

            <!-- PRODUCT CATEGORY -->
            <div class="form-input-container">
                <p class="title">Select a Category *</p>
                <select name="product-category" class="drop-down" required="required">
                    <option value="">Select Category</option>
                    <?php
                    
                    $selectQuery = "SELECT * FROM `categories`;";
                    $resultQuery = mysqli_query($connection, $selectQuery);

                    while ($row = mysqli_fetch_assoc($resultQuery)) {
                        $categoryTitle = $row['category_title'];
                        $categoryId = $row['category_id'];

                        echo "<option value='$categoryId'>$categoryTitle</option>";
                    }

                    ?>
                </select>
            </div>

            <!-- PRODUCT IMAGE -->
            <div class="form-input-container">
                <p class="title">Product Image *</p>
                <input type="file" name="product-image" 
                id="product-image" class="form-control" 
                required="required">
            </div>

            <!-- PRODUCT PRICE PER DAY -->
            <div class="form-input-container">
                <p class="title">Price Per Day *</p>
                <input style="padding-left: 15px" type="text" name="price-per-day" 
                placeholder="e.g. 20.00" id="price-per-day" 
                class="form-control" autocomplete="off" required="required">
                <div class="pound-sign">
                    <p>£</p>
                </div>
            </div>

            <!-- PRODUCT PRICE PER WEEK -->
            <div class="form-input-container">
                <p class="title">Price Per Week *</p>
                <input style="padding-left: 15px" type="text" name="price-per-week" 
                placeholder="e.g. 60.00" id="price-per-week" 
                class="form-control" autocomplete="off" required="required">
                <div class="pound-sign">
                    <p>£</p>
                </div>
            </div>

            <!-- PRODUCT STOCK AVAILABLE -->
            <div class="form-input-container">
                <p class="title">Total Product Stock Available *</p>
                <input type="text" name="available-stock" 
                placeholder="Enter Total Stock Available e.g. 10" id="available-stock" 
                class="form-control" autocomplete="off" required="required">
            </div>

            <!-- SUBMIT -->
            <div class="form-input-container">
                <input style="width: 500px;" type="submit" name="insert-product" 
                class="submit" value="Insert Product">
            </div>
        </div>
    </form>
</body>
</html>