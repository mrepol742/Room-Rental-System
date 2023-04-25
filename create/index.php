<?php
include("../include/session.php");

if (isLogin()) {
  echo '<script>window.location.href = "../"</script>';
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
        <title>Create Account | Room Rental System</title>
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
          <span class="navbar-toggler-icon black" id="qwe"></span>
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
              <a class="nav-link" href="../about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contactus">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../faq">Faq</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hna" href="../login/">Log in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
        <div class="login-box">
            <h1> <img src="../favicon.png" alt="Logo" width="24" class="d-inline-block align-text-top" style="width: 40px !important;">Create Account</h1>
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email (you@gmail.com)">
                </div>
                <div class="user-box">
                    <input type="text" name="name" placeholder="Name (Surname, First name, MI.)">
                </div>
                <div class="user-box">
                    <input type="date" name="birthdate">
                </div>
                <div class="user-box">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="user-box">
                    <input type="password" name="cpassword" placeholder="Re-type Password">
                </div>
                <div class="user-actions">
                    <button class="btn user" name="submit_user" type="submit">As a User</button>
                    <hr>
                    <button class="btn landlord" name="submit_landlord" type="submit">As a Landlord</button>
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

$email = $name = $birthdate = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["email"])) { 
        echo '<script>showErr("Email is required!")</script>';
    } else {
      $email = $_POST["email"];
        if (empty($_POST["name"])) {
            echo '<script>showErr("Name is required!")</script>';
        } else {
          $name = $_POST["name"];
          if (empty($_POST["birthdate"])) {
            echo '<script>showErr("Birthdate is required!")</script>';
        } else {
          $birthdate = $_POST["birthdate"];
            if (empty($_POST["password"])) {
                echo '<script>showErr("Password is required!")</script>';
            } else {
                if (empty($_POST["cpassword"])) {
                    echo '<script>showErr("You need to retype your password again!")</script>';
                } else {
                    if ($_POST["password"] != $_POST["cpassword"]) {
                        echo '<script>showErr("Password did not match!")</script>';
                    } else if (isset($_POST['submit_user']) || isset($_POST['submit_landlord'])) {
                      $password = $_POST["password"];
                      $chemail = mysqli_query($conn, "SELECT * FROM accounts WHERE email= '" . $email . "'");
                      $check = mysqli_num_rows($chemail);
                      if ($check > 0) {
                        echo '<script>showErr("Email is already registered!")</script>';
                      } else {
                          $sql = "INSERT INTO accounts (user_name, email, birthdate, user_password, valid_id_num, is_landlord) VALUES ";
                          if (isset($_POST['submit_user'])) {
                              $sql .= "('$name', '$email', '$birthdate', '$password', 1, 0)";
                          } else {
                              $sql .= "('$name', '$email', '$birthdate', '$password', 1, 1)";
                          }
                          if ($conn->query($sql) === TRUE) {
                            // prompt a dialog for user to upload their identification cards for user verification
                            echo '<script>window.location.href = "../login"</script>';
                            die();
                          } else {
                            echo '<script>showErr("An error occured please try again later!")</script>';
                          }
                      }
                    }
                }
            }
          }
        }
    }
}
?>