<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/assets/bootstrap.min.css">
        <link rel="stylesheet" href="/css/login.css">
        
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.png">
        <link rel="apple-touch-icon" href="/favicon.png">
        <title>Forgot Password | Room Rental System</title>
    </head>
    <body>
        <div class="login-box">
        <img src="/rrs-logo.webp" width="300" alt="Room Rental System">
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="user-box">
                    <input type="password" name="password"  placeholder="Password">
                </div>
                <div class="user-box">
                    <input type="password" name="password"  placeholder="Confirm Password">
                </div>
                <div class="user-actions">
                    <button class="btn" name="submit" type="submit">Forgot Password</button>
                </div>
            </form>
        </div>
        <script>
            document.body.style.background = "url('/backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
            document.body.style.backgroundSize = "cover";
            document.body.style.transition = "all 1s ease";

            function showErr(err) {
                let bsAlert = new  bootstrap.Toast(document.getElementById("error-toast"));
                bsAlert.show();
                document.getElementById("error").innerText = err;
            }
        </script>
        <div class="toast" id="error-toast" style="position: fixed; bottom: 0; right: 0; z-index: 9999; float: right; margin: 3%;" data-bs-autohide="true">
        <div class="toast-header">
      <strong class="me-auto">Error</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
        <div class="toast-body">
          <p id="error"></p>
        </div>
        <script src="/assets/bootstrap.min.js"></script>
<script src="/assets/lozad.min.js"></script>
<script>
        const observer = lozad();
observer.observe();
        if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js').then((reg) => {
      console.log('[ServiceWorker] Registered');
    }).catch((err) => {
      console.error('[ServiceWorker] failed: ', err)
    });
}
    </script>
    </body>
</html>

<?php
include("../include/connections.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    if (empty($_POST["email"])) {
        echo '<script>showErr("Email is required!")</script>';
    } else {
        if (empty($_POST["password"])) {
            echo '<script>showErr("Password is required!")</script>';
        } else {
            if (empty($_POST["cpassword"])) {
                echo '<script>showErr("You need to retype your password again!")</script>';
            } else {
                if ($_POST["password"] != $_POST["cpassword"]) {
                    echo '<script>showErr("Password did not match!")</script>';
                } else if (isset($_POST['submit'])) {
                    header('Location: /login');
                }
            }
        }
    }
}
?>