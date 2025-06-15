<?php
session_start();
include 'db.php';

$name = $conn->real_escape_string(trim($_POST['name']));
$email = $conn->real_escape_string(trim($_POST['email']));
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Basic validation
if ($password !== $confirm_password) {
    $_SESSION['error'] = "Passwords do not match.";
    header('Location: signup.php');
    exit();
}

// Check if email already exists
$sql_check = "SELECT id FROM users WHERE email = '$email'";
$result = $conn->query($sql_check);

if ($result && $result->num_rows > 0) {
    $_SESSION['error'] = "Email already registered.";
    $conn->close();
    header('Location: signup.php');
    exit();
}

// Hash password
$hashed_password = md5($password);

// Insert user into database
$sql_insert = "INSERT INTO users (name, email, password, role) 
               VALUES ('$name', '$email', '$hashed_password', '3')";

if ($conn->query($sql_insert) === TRUE) {
    $_SESSION['success'] = "Account created successfully. Please log in.";
    header('Location: signup.php');
} else {
    $_SESSION['error'] = "Something went wrong. Try again.";
    header('Location: signup.php');
}

$conn->close();
