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
        <link rel="stylesheet" href="../styles/register.css">

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

            <form class="registration-form" action="" method="post">
                <div class="form-main-container">
                    <div>
                        <h1>Login to Your Account</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Don't already have an account? <a href="register.php">Sign Up/Register Here</a></p>
                    </div>
                    <div class="input-container">
                        <p>Email</p>
                        <input type="email" placeholder="Enter Registered Email" required>
                    </div>
                    <div class="input-container">
                        <p>Password</p>
                        <input type="password" placeholder="Enter Password" required>
                    </div>
                    <div class="reset-password-container">
                        <p>Forgotten your password? No problem! Reset your password <a href="">here</a></p>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="submit-button"><a>Login</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>