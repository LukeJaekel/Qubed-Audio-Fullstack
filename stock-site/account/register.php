<?php 

// Connects to database
include(__DIR__ . '/../includes/connect.php');

// Grabs common functions
include(__DIR__ . '/../functions/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = storeUser($connection);

    if ($result === true) {
        header("Location: registration-success.php?status=success");
        exit;
    }
    else {
        $error_message = $result;
    }
}

// Pre-fills form on error (except passwords)
$fields = ['first_name', 'last_name', 'email', 'phone', 'house_number', 'street_name', 'city', 'region', 'postcode'];
foreach ($fields as $field) {
    $value[$field] = isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : '';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Q-Stock | Register</title>
        <link rel="icon" type="image/x-icon" href="../logo/logo.jpg">
        <link rel="stylesheet" href="../styles/account-form.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script defer src="../scripts/register.js"></script>

    </head>


    <body>
        <main>
            <div class="logo-container" onclick="loadStockPage();">
                <img class="logo" src="../logo/logo.jpg" alt="qubed-logo">
                <p style="color: rgb(233, 32, 23);">Q-<span style="color: rgb(235, 235, 235);">Stock</span></p>
            </div>

            <form class="registration-form" action="" method="post">
                <div class="form-main-container">
                    <div class="form-title-container">
                        <h1>Create an Account</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Already have an account? <a href="login.php">Login Here</a></p>
                    </div>

                    <?php
                        // Displays error container if there is an error with the values entered in the form
                        if (!empty($error_message)) : ?>
                        <div class="error-container">
                            <p class="error"><?= htmlspecialchars($error_message) ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="line"></div>
                    <div class="input-container">
                        <p>First name <span>*</span></p>
                        <input type="text" name="first_name" placeholder="Enter First Name" value="<?= $value['first_name'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>Last name <span>*</span></p>
                        <input type="text" name="last_name" placeholder="Enter Last Name" value="<?= $value['last_name'] ?>" required>
                    </div>
                    <div class="line"></div>
                    <div class="input-container">
                        <p>Email Address <span>*</span></p>
                        <input type="email" name="email" placeholder="Enter Email" value="<?= $value['email'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>Phone Number <span>*</span></p>
                        <input type="tel" name="phone" placeholder="Enter Phone Number" value="<?= $value['phone'] ?>" required>
                    </div>
                    <div class="line"></div>
                    <div class="input-container">
                        <p>House/Flat Number <span>*</span></p>
                        <input type="text" name="house_number" placeholder="Enter House/Flat Number" value="<?= $value['house_number'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>Street Name <span>*</span></p>
                        <input type="text" name="street_name" placeholder="Enter Street Name" value="<?= $value['street_name'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>Town/City <span>*</span></p>
                        <input type="text" name="city" placeholder="Enter Town/City" value="<?= $value['city'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>County/Region <span>*</span></p>
                        <input type="text" name="region" placeholder="Enter County/Region" value="<?= $value['region'] ?>" required>
                    </div>
                    <div class="input-container">
                        <p>Postcode <span>*</span></p>
                        <input type="text" name="postcode" placeholder="Enter Postcode" value="<?= $value['postcode'] ?>" required>
                    </div>
                    <div class="line"></div>
                    <h1>Create Password</h1>
                    <div class="input-container">
                        <p>Create Password <span>*</span></p>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Enter New Password" required>
                            <button type="button" class="toggle-password" aria-label="Show password" tabindex="-1"></button>
                        </div>
                    </div>
                    <div class="input-container">
                        <p>Confirm Password <span>*</span></p>
                        <input type="password" name="confirm_password" placeholder="Re-enter New Password" required>
                    </div>
                    <div class="password-requirements">
                        <p id="req-length"><span class="status invalid">❌</span> At least 8 characters</p>
                        <p id="req-uppercase"><span class="status invalid">❌</span> Contains uppercase</p>
                        <p id="req-lowercase"><span class="status invalid">❌</span> Contains lowercase</p>
                        <p id="req-number"><span class="status invalid">❌</span> Contains number</p>
                        <p id="req-symbol"><span class="status invalid">❌</span> Contains symbol</p>
                    </div>
                    <div class="line"></div>
                    <div class="terms-and-conditions">
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs-terms" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree to <a href="../../main-site/terms-and-conditions.html" target="_blank">Terms and Conditions</a> <span>*</span></label>
                        </div>
                        <div class="terms-and-conditions-container">
                            <input type="checkbox" id="t-and-cs-info" name="myCheckbox" required>
                            <label for="t-and-cs">By ticking this box, you agree that the information provided is correct <span>*</span></a></label>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="submit-button"><a>Sign Up/Register</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>

<?php function storeUser($connection) {

    // Sanitises inputs
    $firstname = trim($_POST['first_name'] ?? '');
    $lastname = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $houseNumber = trim($_POST['house_number'] ?? '');
    $streetName = trim($_POST['street_name'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $postcode = trim($_POST['postcode'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    // Checked whether the password entered matches in the confirm-password field
    if ($password !== $confirmPassword) {
        return "Error: Those passwords didn't match. Please try again";
    }

    // Checks for at least 8 characters in password
    if (strlen($password) < 8) {
        return "Error: Password must be at least 8 characters long";
    }

    // Checks for at least 1 uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return "Error: Password must contain at least one uppercase letter";
    }

    // Checks for at least 1 lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return "Error: Password must contain at least one lowercase letter";
    }

    // Checks for at least 1 number
    if (!preg_match('/[0-9]/', $password)) {
        return "Error: Password must contain at least one number";
    }

    // Checks for at least 1 special character
    if (!preg_match('/[\W_]/', $password)) {
        return "Error: Password must contain at least one special character";
    }


    // Stores the password as a hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Checks if the email entered already exists
    $check = $connection->prepare("select UserID from web_users where Email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();
    
    if ($check->num_rows > 0) {
        return "Error: Looks like an account with this email already exists";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }

    // Adds user to the DB
    $insertUser = $connection->prepare("insert into web_users (FirstName, LastName, Email,
                                        Phone, HouseNumber, StreetName, City, Region, 
                                        Postcode, PasswordHash) values (?, ?, ?, ?, ?, ?, 
                                        ?, ?, ?, ?)");
    
    $insertUser->bind_param(
    "ssssssssss",
    $firstname,
    $lastname,
    $email,
    $phone,
    $houseNumber,
    $streetName,
    $city,
    $region,
    $postcode,
    $hashedPassword
    );

    if ($insertUser->execute()) {
        return true;
    }
    return false;
}
?>