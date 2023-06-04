<?php
include("../include/session.php");

if (!isLogin()) {
  echo '<script>window.location.href = "../forgot-password"</script>';
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
  <title>Change Password | Room Rental System</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../">
          <img src="../favicon.png" alt="Logo" width="24" class="d-inline-block align-text-top" style="width: 25px !important;">
          Room Rental System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
          <span class="navbar-toggler-icon" id="qwe"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../rooms">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../rates">rates</a>
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
        <input type="text" name="password" placeholder="Previous Password">
      </div>
      <div class="user-box">
        <input type="text" name="npassword" placeholder="New Password">
      </div>
      <div class="user-box">
        <input type="password" name="cpassword" placeholder="Confirm Password">
      </div>
      <div class="user-actions">
        <button class="btn user" name="submit" type="submit">Change Password</button>
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

$email = $password = $npassword = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST["email"];
  if (empty($email)) {
    echo '<script>showErr("Email is required!")</script>';
  } else {
    $password = $_POST["password"];
    if (empty($password)) {
      echo '<script>showErr("You need to type your previous password!")</script>';
    } else {
      $check_email = mysqli_query($conn, "SELECT * FROM accounts where email = '$email'");
      if (mysqli_num_rows($check_email) > 0) {
        while ($row = mysqli_fetch_assoc($check_email)) {

          $db_password = $row["user_password"];
          if ($password != $db_password) {
            echo '<script>showErr("That is not your previous password!")</script>';
          } else {
            if (empty($_POST["npassword"])) {
              echo '<script>showErr("You need to enter your new password!")</script>';
            } else {
              $npassword = $_POST["cpassword"];
              if (empty($npassword)) {
                echo '<script>showErr("You need to retype your password again!")</script>';
              } else {
                if ($_POST["npassword"] != $npassword) {
                  echo '<script>showErr("Password did not match!")</script>';
                } else if (isset($_POST['submit'])) {
                  if ($password == $npassword) {
                    echo '<script>showErr("You cannot use your previous password as new one!")</script>';
                  } else {
                    $sql = "UPDATE accounts SET user_password = '$npassword' WHERE email = '$email'";
                    if ($conn->query($sql)) {
                      echo '<script>window.location.href = "../"</script>';
                      die();
                    }
                  }
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