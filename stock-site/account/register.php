<?php 

// Connects to database
include('includes/connect.php');

// Grabs common functions
include('functions/function.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Register</title>
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
                        <h1>Create an Account</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Already have an account? <a href="#">Login Here</a></p>
                    </div>
                    <div class="input-container">
                        <p>First name *</p>
                        <input type="text" placeholder="Enter First Name" required>
                    </div>
                    <div class="input-container">
                        <p>Last name *</p>
                        <input type="text" placeholder="Enter Last Name" required>
                    </div>
                    <div class="line"></div>
                    <div class="input-container">
                        <p>Email Address *</p>
                        <input type="email" placeholder="Enter Email" required>
                    </div>
                    <div class="input-container">
                        <p>Phone Number *</p>
                        <input type="tel" placeholder="Enter Phone Number" required>
                    </div>
                    <div class="line"></div>
                    <div class="input-container">
                        <p>House/Flat Number *</p>
                        <input type="text" placeholder="Enter House/Flat Number" required>
                    </div>
                    <div class="input-container">
                        <p>Street Name *</p>
                        <input type="text" placeholder="Enter Street Name *" required>
                    </div>
                    <div class="input-container">
                        <p>Town/City *</p>
                        <input type="text" placeholder="Enter Town/City *" required>
                    </div>
                    <div class="input-container">
                        <p>County/Region *</p>
                        <input type="text" placeholder="Enter County/Region *" required>
                    </div>
                    <div class="input-container">
                        <p>Postcode *</p>
                        <input type="text" placeholder="Enter Postcode *" required>
                    </div>
                    <div class="terms-and-conditions">
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree to <a href="../../main-site/terms-and-conditions.html">Terms and Conditions *</a></label>
                        </div>
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree that the information provided is correct *</a></label>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="submit-button"><a>Sign Up/Register</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>