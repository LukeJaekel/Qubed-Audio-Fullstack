<?php 

// Connects to database
include(__DIR__ . '/../includes/connect.php');

// Grabs common functions
include(__DIR__ . '/../functions/function.php');

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = login($connection);

    if ($result === true) {
        // redirect is handled by role
        exit;
    }
    else {
        $error_message = $result;
    }
}

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
                        <h1>Login to Your Account</h1>
                    </div>
                    <div class="login-link-container">
                        <p>Don't already have an account? <a href="register.php">Sign Up/Register Here</a></p>
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
                        <p>Email</p>
                        <input type="email" name="email" placeholder="Enter Registered Email" required>
                    </div>
                    <div class="input-container">
                        <p>Password</p>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="reset-password-container">
                        <p>Forgotten your password? No problem! <a href="reset-password.php">Reset your password</a></p>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="submit-button"><a>Login</a></button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>

<?php function login($connection) {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Checks whether fields in form are blank
    if ($email === '' || $password === '') {
        return 'Please enter both email and password';
    }

    // If fields are filled, then it will check for staff login first
    $checkUser = $connection->prepare("select id, EmailAddress, PasswordHash, PasswordSalt
                                        from staff where EmailAddress = ? limit 1");
    $checkUser->bind_param("s", $email);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($staff = $result->fetch_assoc()) {
        if (verifyStaffPassword($password, $staff['PasswordHash'], $staff['PasswordSalt'])) {
            $_SESSION['user_id'] = $staff['id'];
            $_SESSION['role'] = 'staff';

            header('Location: admin-dashboard.php');
            exit;
        }

        return 'You have entered an incorrect Email or Password';
    }

    // Else it will try the web user login
    $checkUser = $connection->prepare("select UserID, Email, PasswordHash 
                                        from web_users where Email = ? limit 1");
    $checkUser->bind_param("s", $email);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['PasswordHash'])) {
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['role'] = 'user';

            header('Location: user-dashboard.php');
            exit();
        }

        return 'You have entered an incorrect Email or Password';
    }

    // If neither matched
    return 'There was no account with that email address. Consider registering';
}


// Used for verifying PBKDF2 encrypted passwords for StockALot staff
function verifyStaffPassword(string $password, string $storedHashText, string $storedSalt): bool
{
    $iterations = 100000;

    // Decodes Base64 hash stored in VARCHAR
    $storedHash = base64_decode($storedHashText, true);
    if ($storedHash === false) {
        return false;
    }

    $hashLength = strlen($storedHash);

    // Recomputes PBKDF2 hash
    $computedHash = hash_pbkdf2(
        'sha256',
        $password,
        $storedSalt,
        $iterations,
        $hashLength,
        true // raw binary
    );

    return hash_equals($storedHash, $computedHash);
}

?>