<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your information
    $frm_name = 'On the Way Store'; // Your name
    $recepient = 'contact@fahiz.in'; // Your email
    $sitename = 'On the Way Store'; // Your site name
    $subject = "New contact from \"$sitename\""; // Subject template

    // Visitor information
    $name = trim($_POST['visitor_name']);
    $email = trim($_POST['visitor_email']);
    $msg = trim($_POST['visitor_msg']);

    // Email message
    $message = "
    -------------------<br><br>
    Visitor name: $name <br>
    Visitor email: $email <br><br>
    $msg
    <br><br>-------------------
    ";

    // Headers
    $headers = "From: $frm_name <$recepient>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= 'Content-type: text/html; charset="utf-8"' . "\r\n";

    // Send email
    mail($recepient, $subject, $message, $headers);

    // Additional email for a copy or notification
    $copyTo = 'anotheremail@example.com';
    if (!empty($copyTo)) {
        mail($copyTo, $subject, $message, $headers);
    }

    // You can add more logic or redirect the user after sending the email
    // For example: header("Location: thank_you_page.php");
    // Make sure to exit to prevent further script execution
    exit;
}
?>


