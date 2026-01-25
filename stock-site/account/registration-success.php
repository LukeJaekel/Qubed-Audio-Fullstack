<?php 

// Connects to database
include(__DIR__ . '/../includes/connect.php');

// Grabs common functions
include(__DIR__ . '/../functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Login</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">
        <link rel="stylesheet" href="../styles/account-form.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>


    <body>
        <main>
            <div class="logo-container" onclick="loadStockPage();">
                <img class="logo" src="../logo/logo.jpg" alt="qubed-logo">
                <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(235, 235, 235);">Stock</span></p>
            </div>

            <div class="registration-success">
                <div class="form-main-container">
                    <div class="icon-container">
                        <img class="tick-icon" src="../icons/tick-icon-original.png" alt="Success Icon">
                    </div>
                    <div>
                        <h1 class="">Account created successfully</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Continue to <a href="login.php">Login Here</a></p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>