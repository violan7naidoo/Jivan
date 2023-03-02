<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = strip_tags(trim($_POST["first_name"]));
    $last_name = strip_tags(trim($_POST["last_name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Set your email address where you want to receive the form submissions
    $recipient = "violan7naidoo@gmail.com";

    // Set the email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Build the email content
    $email_content = "First Name: $first_name\n\n";
    $email_content .= "Last Name: $last_name\n\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $email_headers = "From: $first_name $last_name <$email>";

    // Send the email
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Thank you! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission. Please try again.";
}
?>