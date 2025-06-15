<?php
require 'db.php';

$token = $_POST['token'];
$new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

$stmt = $pdo->prepare("UPDATE users SET password=?, reset_token=NULL, token_expire=NULL WHERE reset_token=? AND token_expire > NOW()");
$stmt->execute([$new_password, $token]);

echo $stmt->rowCount() ? "Password updated successfully!" : "Invalid or expired token.";
?>