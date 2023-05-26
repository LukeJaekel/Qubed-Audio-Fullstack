<?php

// Enable error reporting and display
error_reporting(E_ALL);
ini_set('display_errors', 1);


include("../includes/connect.php");

if (isset($_POST['insert-category'])) {

    $categoryTitle = $_POST['category-title'];


    // Get the maximum ID value from the categories table
    $maxIdQuery = "SELECT MAX(category_id) AS max_id FROM `categories`;";
    $resultMaxId = mysqli_query($connection, $maxIdQuery);
    $rowMaxId = mysqli_fetch_assoc($resultMaxId);
    $nextId = $rowMaxId['max_id'] + 1;


    // Select data from database
    $selectQuery = "SELECT * FROM `categories` 
                    WHERE category_title = '$categoryTitle';";
    
    $resultSelect = mysqli_query($connection, $selectQuery);
    $number = mysqli_num_rows($resultSelect);


    // If category already exists, alert the user
    if ($number > 0) {
        echo "<script>alert('This category already exists!')</script>";
    }

    // Otherwise, insert new category
    else {
        $insertQuery = "INSERT INTO `categories` (category_id, category_title) 
                        VALUES ('$nextId', '$categoryTitle');";
        
        $result = mysqli_query($connection, $insertQuery);

        if ($result) {
            echo "<script>alert('Category added successfully')</script>";
        }
    }
}

?>
<link rel="stylesheet" href="styles/form-content.css">

<form action="" method="post" class="mb-2">
    <h2>Insert A New Category</h2>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="category-title" placeholder="Insert Category" aria-label="Category" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
    <input type="submit" class="submit" name="insert-category" value="Insert Category">
    </div>
</form>