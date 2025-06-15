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
    <title>Login | Nudgs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <!-- Forgot Password Modal -->
    <div id="forgotPasswordModal" class="modal-overlay">
        <div class="modal-content">
            <h4>Forgot Password</h4>
            <label for="forgotEmail">Enter work email ID</label>
            <input type="email" id="forgotEmail" class="form-control mt-2" placeholder="Work email">
            <button class="submit-btn mt-3" onclick="submitForgotPassword()">Submit</button>
        </div>
    </div>


    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="header">
            <div class="logo">nudgs<span class="outline">ai</span></div>
        </div>
        <div class="card p-4 shadow" style="width: 360px; border-radius: 16px;">
            <h5 class="text-center mb-4">Log in to Nudgs</h5>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="login_process.php" method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control user_email"placeholder="Work email"value="<?= isset($_COOKIE['remember_email']) ? htmlspecialchars($_COOKIE['remember_email']) : '' ?>"required>

                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control user_password" placeholder="Password" required>
                </div>
                <div class="form-check mb-3">
                    <<input type="checkbox" class="form-check-input" id="remember" name="remember"<?= isset($_COOKIE['remember_email']) ? 'checked' : '' ?>>

                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button class="btn w-100 text-white" style="background: linear-gradient(to right, #00C76F, #7D4CDB);    border-radius: 50px;font-size: 18px;line-height: inherit;">Log in</button>
            </form>
            <div class="text-center mt-3">
                <!-- <a href="forgot_password.php" class="links text-decoration-none" style="font-size:14px;" >Forgot Password?</a> -->
                <a href="javascript:void(0);" onclick="openForgotPasswordModal()" class="text-decoration-none" style="font-size:14px;">Forgot Password?</a>

            </div>
            <a href="signup.php" class="text-decoration-none" style="text-align: center; font-size:14px;">Don't have an account? Sign up</a>
            <hr>
            <div class="d-flex justify-content-around">
                <button class="request_demo_btn">Request demo</button>
                <button class="product_tour">Product tour</button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('forgotPasswordModal');

        function openForgotPasswordModal() {
            modal.style.display = 'flex';
        }

        function submitForgotPassword() {
            const email = document.getElementById('forgotEmail').value;
            if (!email) {
                alert('Please enter your work email.');
                return;
            }
            // Optional: Make an AJAX call to handle forgot password
            alert(`Password reset link will be sent to: ${email}`);
            modal.style.display = 'none';
        }

        // Optional: Close modal if clicked outside
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

</body>
</html>
