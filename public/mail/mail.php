<?php

// Validasi input
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit('Invalid request method');
}

// Sanitasi input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email format');
}

// Compose email message
$email_message = "
Name: " . htmlspecialchars($name) . "
Email: " . htmlspecialchars($email) . "
Phone: " . htmlspecialchars($phone) . "
Subject: " . htmlspecialchars($subject) . "
Message: " . htmlspecialchars($message);

// Email headers
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
$to = "your@email.com"; // Ganti dengan email tujuan
$mail_sent = mail($to, "New Contact Message", $email_message, $headers);

// Response
if ($mail_sent) {
    header("Location: ../mail-success.html");
    exit();
} else {
    header("Location: ../mail-error.html");
    exit();
}


