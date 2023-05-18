<!-- Author: Luke Jaekel -->

<?php
    $name = $_POST['first-name', 'last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $emailBody = "User Name: $name \n".
                 "User Email: $email \n".
                 "Phone Number: $phone \n".
                 "Subject: $subject \n".
                 "Message: $message \n";

    $sendEmailTo = "JaekelLuke@gmail.com";

    $headers = "From: $email \r\n";

    $headers .= "replyTo: $email \r\n";

    mail($sendEmailTo, $subject, $emailBody, $headers);

    header("Location: contact.html");
?>