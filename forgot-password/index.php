<?php
include("../include/session.php");

if (isLogin()) {
  echo '<script>window.location.href = "../change-password"</script>';
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../css/login.css">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="../favicon.png">
        <link rel="apple-touch-icon" href="../favicon.png">
        <title>Forgot Password | Room Rental System</title>
    </head>
    <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="../">
          <img src="../favicon.png" alt="Logo" width="24" class="d-inline-block align-text-top" style="width: 25px !important;">
          Room Rental System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
          <span class="navbar-toggler-icon" id="qwe"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="../rooms">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pricing">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../categories">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../locations">Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../promo">Promos & Discounts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../gallery">Gallery</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
        <div class="login-box">
        <img src="../rrs-logo.webp" width="300" alt="Room Rental System">
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="user-box">
                <span style="color: #fff;" name="sdc" id="sdc">Send Code</span>
                </div>
                <div class="user-box">
                    <input type="number" name="code"  placeholder="Enter Code">
                </div>
                <div class="user-box" style="display: none;">
                    <input type="number" name="ffcode"  placeholder="" id="ffcode">
                </div>

                <script>
                  let code = Math.floor(100000 + Math.random() * 900000);
                  sdc.addEventListener('click', function() {
            alert("Your 6 digit code is " + code + " DO NOT SHARE THIS TO ANYONE.")
          });
ffcode.value = code;
                  </script>
                <div class="user-box">
                    <input type="text" name="password"  placeholder="New Password">
                </div>
                <div class="user-box">
                    <input type="password" name="npassword"  placeholder="Confirm Password">
                </div>
                <div class="user-actions">
                    <button class="btn user" name="submit" type="submit">Forgot Password</button>
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
        <script src="../assets/bootstrap.min.js"></script>
<script src="../js/login.js"></script>
    </body>
</html>

<?php
include("../include/connections.php");

$email = $$npassword = $npassword = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $email = $_POST["email"];
  $code = $_POST["ffcode"];
  $code2 = $_POST["code"];
    if (empty($email)) {
        echo '<script>showErr("Email is required!")</script>';
        return;
    } else {
        

         $check_email = mysqli_query($conn, "SELECT * FROM accounts where email = '$email'");
         if (mysqli_num_rows($check_email) > 0) {
          $password = $_POST["password"];
              if (empty($code2)) {
                echo '<script>showErr("Code is required!")</script>';
              } else if ($code != $code2) {
                echo '<script>showErr("Invalid Code!")</script>';
              } else if (empty($password)) {
            echo '<script>showErr("You need to enter your new password!")</script>';
          } else {
      $npassword = $_POST["npassword"];
              if (empty($npassword)) {
                  echo '<script>showErr("You need to enter your new password!")</script>';
              } else {
                  if ($password != $npassword) {
                      echo '<script>showErr("Password did not match!")</script>';
                  } else if (isset($_POST['submit'])) {
                      echo '<script>window.location.href = "../login"</script>';
                      die();
                  }
              }
          }
          } else {
            echo '<script>showErr("The email you enter is not registered yet!")</script>';
          }
    }
}
?>