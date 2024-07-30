<?php
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $first_name = sanitize_input($_POST['first-name']);
    $second_name = sanitize_input($_POST['second-name']);
    $last_name = sanitize_input($_POST['last-name']);
    $phone_number = sanitize_input($_POST['phone-number']);
    $email = sanitize_input($_POST['email']);
    
    // Handle services
    $services = isset($_POST['services']) ? array_map('sanitize_input', $_POST['services']) : [];
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Prevent email header injection
    if (preg_match("/[\r\n]/", $first_name) || preg_match("/[\r\n]/", $second_name) ||
        preg_match("/[\r\n]/", $last_name) || preg_match("/[\r\n]/", $phone_number) ||
        preg_match("/[\r\n]/", $email)) {
        die("Header injection detected");
    }

    $to = "katherinewanjohi@gmail.com";
    $subject = "New Application Form Submission";
    $body = "First Name: $first_name\nSecond Name: $second_name\nLast Name: $last_name\nPhone Number: $phone_number\nEmail: $email\nServices Interested In: " . implode(", ", $services);
    $headers = "From:your website";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../index.html");  // Redirect to main page
        exit();
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}

