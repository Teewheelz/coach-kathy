<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $first_name = htmlspecialchars($_POST['first_name']);
    $second_name = htmlspecialchars($_POST['second_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $email = htmlspecialchars($_POST['email']);
    $services = isset($_POST['services']) ? $_POST['services'] : [];

    // Email details
    $to = "katherinewanjohi@gmail.com"; // Change this to your email address
    $subject = "New Application Form Submission";
    $body = "First Name: $first_name\nSecond Name: $second_name\nLast Name: $last_name\nPhone Number: $phone_number\nEmail: $email\nServices: " . implode(", ", $services);
    $headers = "From: your website";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>
