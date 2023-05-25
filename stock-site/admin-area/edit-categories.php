<?php

include("../includes/connect.php");

if (isset($_POST['insert-category'])) {

    $categoryTitle = $_POST['category-title'];


    // Get the maximum ID value from the categories table
    $maxIdQuery = "SELECT MAX(id) AS max_id FROM `categories`;";
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
        $insertQuery = "INSERT INTO `categories` (id, category_title) 
                        VALUES ('$nextId', '$categoryTitle');";
        
        $result = mysqli_query($connection, $insertQuery);

        if ($result) {
            echo "<script>alert('Category added successfully')</script>";
        }
    }
}

?>


<style>
    .mb-2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .form-control {
        width: 500px;
        height: 50px;
        font-size: 20px;
        border: none;
        border-radius: 30px;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
        text-indent: 15px;
    }

    .submit {
        font-size: 18px;
        padding: 10px 20px;
        border: none;
        color: rgb(217, 217, 217);
        background-color: rgb(233,32,23);
        border-radius: 5px;
        transition: background-color 0.15s, color 0.15s;
        cursor: pointer;
    }

    .submit:hover {
        background-color: rgb(35, 35, 35);
        color: rgb(233,32,23);
    }

    .submit:active {
        opacity: 0.7;
    }

</style>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"></span>
        <input type="text" class="form-control" name="category-title" placeholder="Insert Category" aria-label="Category" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
    <input type="submit" class="submit" name="insert-category" value="Insert Category">
    </div>
</form>