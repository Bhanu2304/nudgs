<?php 
session_start();
if (isset($_SESSION['user_email'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up | Nudgs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="header">
            <div class="logo">nudgs<span class="outline">ai</span></div>
        </div>
        <div class="card p-4 shadow" style="width: 360px; border-radius: 16px;">
            <h5 class="text-center mb-4">Sign Up for Nudgs</h5>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" style="font-size: 14px;"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success" style="font-size: 14px;"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            <form action="signup_process.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control user_name" placeholder="Full Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control user_email" placeholder="Work Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control user_password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control user_password" placeholder="Confirm Password" required>
                </div>
                <button class="btn w-100 text-white" style="background: linear-gradient(to right, #00C76F, #7D4CDB); border-radius: 50px; font-size: 18px;">Sign Up</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php" class="text-decoration-none" style="font-size:14px;">Already have an account? Log in</a>
            </div>
        </div>
    </div>
</body>
</html>
