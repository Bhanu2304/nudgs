<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$remember = isset($_POST['remember']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];

      // If "Remember Me" is checked, set cookie for 7 days
        if ($remember) {
            setcookie("remember_email", $email, time() + (86400 * 7), "/"); // 7 days
        } else {
            setcookie("remember_email", "", time() - 3600, "/"); // Clear cookie
        }
    header('Location: dashboard.php');
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header('Location: login.php');
}
?>