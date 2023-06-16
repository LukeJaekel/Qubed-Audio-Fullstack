<?php 

// Connects to database
include('includes/connect.php');

// Grabs common functions
include('functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Dashboard</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">
        <link rel="stylesheet" href="../styles/dashboard.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">

    </head>

    <body>

    <header class="js-header">
        <div class="top-container">
            <div class="header-left-container">
                <div class="logo-container" onclick="loadStockPage();">
                    <img src="../logo/logo.jpg" alt="qubed-logo">
                    <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(35, 35, 35);">Stock</span></p>
                </div>
            </div>
            <div class="header-right-container">
                <h1>Welcome <span style="color:rgb(233, 32, 23);">Luke</span></h1>
            </div>
        </div>
    </header>

    <main>
        <div class="dashboard-title-container">
            <p>Welcome to your Dashboard</p>
        </div>
        <div class="button-container">
            <button class="button">Account Details</button>
            <button class="button">Bookings</button>
            <button class="button">Saved Products</button>
        </div>

        <div class="main-content-container">
            <p>Bookings</p>
        </div>
    </main>
        
    </body>

</html>