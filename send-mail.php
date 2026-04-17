
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP SETTINGS
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'ekumkofi@gmail.com';
$mail->Password   = 'khoscrwpvrwyrjvr';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
];

        // FROM (must be your domain email)
        $mail->setFrom('ekumkofi@gmail.com', 'Website Contact');

        // TO (YOU - super admin)
        $mail->addAddress('ekumkofi@gmail.com');

        // Reply to user
        $mail->addReplyTo($email, $name);

        // EMAIL CONTENT
        $mail->isHTML(true);
        $mail->Subject = $subject ?: 'New Contact Message';

        $mail->Body = "
            <h3>New Message Received</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();

        echo "<script>alert('Message sent successfully'); window.history.back();</script>";

    } catch (Exception $e) {
        echo "Message failed: {$mail->ErrorInfo}";
    }
}