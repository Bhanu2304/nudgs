<?php
require 'db.php';
$token = $_GET['token'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
<form action="update_password.php" method="POST">
    <input type="hidden" name="token" value="<?= $token ?>">
    <input type="password" name="new_password" placeholder="New Password" required>
    <button type="submit">Update Password</button>
</form>
</body>
</html>
