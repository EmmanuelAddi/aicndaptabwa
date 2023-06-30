<?php

$to = 'emmanuelbett82108@gmail.com';
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'No subject';
$message = isset($_POST['message']) ? $_POST['message'] : 'No message';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(json_encode(array(
        'status' => 'Invalid email address'
    )));
}

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $email . "\r\n";

// Validate subject and message
if (empty($subject) || empty($message)) {
    die(json_encode(array(
        'status' => 'Subject and message are required'
    )));
}

// Send email
if (mail($to, $subject, $message, $headers)) {
    die(json_encode(array(
        'status' => 'Email sent successfully!'
    )));
}

die(json_encode(array(
    'status' => 'Unable to send email. Please try again later.'
)));

?>
