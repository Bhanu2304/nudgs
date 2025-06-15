<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'db.php';

$email = $_POST['email'];
$token = bin2hex(random_bytes(50));
$expire = date("Y-m-d H:i:s", strtotime('+1 hour'));

$stmt = $pdo->prepare("UPDATE users SET reset_token=?, token_expire=? WHERE email=?");
$stmt->execute([$token, $expire, $email]);

$link = "http://yourdomain.com/reset_password.php?token=$token";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.yourmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'you@example.com';
    $mail->Password = 'your-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('you@example.com', 'Nudgeable');
    $mail->addAddress($email);
    $mail->Subject = 'Password Reset';
    $mail->Body = "Click this link to reset your password: $link";

    $mail->send();
    echo "Email sent!";
} catch (Exception $e) {
    echo "Failed to send email: " . $mail->ErrorInfo;
}
?>