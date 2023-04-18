<!-- 
    One our crud system finalize this page should not be visible and user cannot visit this when 
he is logged on if he visited it'll be redirected to homepage
-->

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
        <title>Create Account | Room Rental System</title>
    </head>
    <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="/">
          <img src="/favicon.png" alt="Logo" width="24" class="d-inline-block align-text-top" style="width: 25px !important;">
          Room Rental System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
          <span class="navbar-toggler-icon black" id="qwe"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="/rooms">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pricing">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/categories">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contactus">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/faq">Faq</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hna" href="/login/">Log in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
        <div class="login-box">
            <img src="/rrs-logo.webp" width="300" alt="Room Rental System">
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email (you@gmail.com)">
                </div>
                <div class="user-box">
                    <input type="text" name="name" placeholder="Name (Surname, First name, MI.)">
                </div>
                <div class="user-box">
                    <input type="date" name="birthday">
                </div>
                <div class="user-box">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="user-box">
                    <input type="password" name="cpassword" placeholder="Re-type Password">
                </div>
                <div class="user-actions">
                    <button class="btn" name="submit" type="submit">Create Account</button>
                </div>
            </form>
        </div>
        <div class="toast" id="error-toast" style="position: fixed; bottom: 0; right: 0; z-index: 9999; float: right; margin: 3%;" data-bs-autohide="true">
        <div class="toast-header">
      <strong class="me-auto">Oops!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
        <div class="toast-body">
          <p id="error"></p>
        </div>
        </div>
        <script src="/assets/bootstrap.min.js"></script>
<script src="/assets/lozad.min.js"></script>
<script src="/js/login.js"></script>
    </body>
</html>

<?php
include("../include/connections.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["email"])) { 
        echo '<script>showErr("Email is required!")</script>';
    } else {
        if (empty($_POST["name"])) {
            echo '<script>showErr("Name is required!")</script>';
        } else {
          if (empty($_POST["birthday"])) {
            echo '<script>showErr("Birthday is required!")</script>';
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
    }
}
?>