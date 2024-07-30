<?php
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone_number = sanitize_input($_POST['phone-number']);
    $message = sanitize_input($_POST['message']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Validate phone number (optional: you can add more validation if needed)
    if (!preg_match("/^[0-9]*$/", $phone_number)) {
        die("Invalid phone number format");
    }

    // Prevent email header injection
    if (preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ||
        preg_match("/[\r\n]/", $phone_number) || preg_match("/[\r\n]/", $message)) {
        die("Header injection detected");
    }

    $to = "katherinewanjohi@gmail.com";
    $subject = "Assistance Request";
    $body = "Name: $name\nEmail: $email\nPhone Number: $phone_number\nMessage: $message";
    $headers = "From: your website";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../index.html");  // Redirect to main page
        exit();
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
