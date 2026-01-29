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

            <form class="login-form" action="" method="post">
                <div class="form-main-container">
                    <div class="form-title-container">
                        <h1>Reset Password</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Please provide the email address associated with your account and we will send you link to reset your password.</p>
                    </div>
                    <div class="line"></div>
                    <div class="input-container">
                        <p>Email</p>
                        <input type="email" name="email" placeholder="Enter Registered Email" required>
                    </div>
                    <div class="login-register-container">
                        <p><a href="login.php">Login</a></p>
                        <p><a href="register.php">Register</a></p>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="submit-button"><a>Send Password Reset Email</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>