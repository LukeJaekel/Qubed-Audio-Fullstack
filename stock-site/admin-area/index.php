<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Administration</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">

        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/general.css">
        <link rel="stylesheet" href="styles/admin.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script defer src="../scripts/header.js"></script>
        <script defer src="../scripts/general.js"></script>
    </head>
    <body>

        <header class="js-header">
            <div class="top-container">
                <div class="header-left-container">
                    <div class="logo-container">
                        <img src="../logo/logo.jpg" alt="qubed-logo">
                        <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span> Administration</p>
                    </div>
                </div>
                <div class="header-right-container">
                    <h1>Welcome <span style="color:rgb(233, 32, 23);">Joe</span></h1>
                </div>
            </div>
        </header> 
        
        <section class="admin-title-container">
            <h1>Manage Details</h1>
        </section>
        <section>
            <div class="categories-container">
                <button class="category-button"><a href="insert-product.php">Edit Products</a></button>
                <button class="category-button"><a>View Products</a></button>
                <button class="category-button"><a href="index.php?edit-categories">Edit Categories</a></button>
                <button class="category-button"><a>View Categories</a></button>
                <button class="category-button"><a>Orders</a></button>
                <button class="category-button"><a>Payments</a></button>
                <button class="category-button"><a>Users</a></button>
                <button class="category-button"><a>Page Builder</a></button>
                <button class="category-button"><a>Logout</a></button>
            </div>
        </section>

        <section class="container">
            <?php
            if (isset($_GET['edit-categories'])) {
                include('edit-categories.php');
            }
            else {
                echo "<h1>Hi Joe, Click one of the above options to make changes! :)</h1>";
            }
            ?>

        </section>
    </body>
</html>