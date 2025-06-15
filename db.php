<?php
// $pdo = new PDO("mysql:host=localhost;dbname=yourdb", "root", "");
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nudgs";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>