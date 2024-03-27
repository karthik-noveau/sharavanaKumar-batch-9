<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Recipient email address
    $to = "surajram3006@gmail.com";

    // Email subject
    $emailSubject = "Contact Form Submission: $subject";

    // Email message
    $emailMessage = "You have received a new message from your website contact form.\n\n";
    $emailMessage .= "Name: $fullName\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Message:\n$message\n";

    // Additional headers
    $headers = "From: $fullName <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $emailSubject, $emailMessage, $headers)) {
        // Email sent successfully
        echo json_encode(array("success" => true, "message" => "Thank you! Your message has been sent."));
    } else {
        // Failed to send email
        echo json_encode(array("success" => false, "message" => "Oops! Something went wrong. Please try again later."));
    }
} else {
    // Not a POST request
    echo json_encode(array("success" => false, "message" => "Error: Invalid request method."));
}
?>
