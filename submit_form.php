<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
    $to = "elijahezetochukwu@gmail.com";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Compose the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n";
    $body .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        // Success message
        echo "<p>Thank you for contacting us, $name! We'll get back to you soon.</p>";
    } else {
        // Error message
        echo "<p>Sorry, something went wrong. Please try again later.</p>";
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.html");
    exit();
}
?>
