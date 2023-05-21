<?php
$status = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = sanitizeInput($_POST['first-name']);
    $lastName = sanitizeInput($_POST['last-name']);
    $name = $firstName . ' ' . $lastName;
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);

    // Check if required fields are empty
    if (empty($firstName) || empty($lastName) || empty($email) || empty($subject) || empty($message)) {
        $status = "Please fill in all required fields.";
    } else {
        $emailBody = "User Name: $name \n".
                     "User Email: $email \n".
                     "Phone Number: $phone \n".
                     "Subject: $subject \n".
                     "Message: $message \n";

        $sendEmailTo = "JaekelLuke@gmail.com";

        $headers = "From: " . sanitizeHeader($email) . "\r\n";
        $headers .= "Reply-To: " . sanitizeHeader($email) . "\r\n";

        // Send the email
        if (mail($sendEmailTo, $subject, $emailBody, $headers)) {
            // Email sent successfully
            $status = "Email sent successfully.";
        } else {
            // Error sending email
            $status = "An error occurred while sending the email. Please try again later.";
        }
    }

    echo $status;
}

// Function to sanitize user input
function sanitizeInput($input) {
    // Remove leading/trailing white spaces
    $input = trim($input);
    // Remove special characters
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Function to sanitize email headers
function sanitizeHeader($header) {
    // Remove newlines and carriage returns
    $header = str_replace(array("\r", "\n"), '', $header);
    return $header;
}
?>
