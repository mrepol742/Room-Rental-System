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
  <title>Login or sign up | Room Rental System</title>
</head>

<body>
  <header>
    <nav class="autohide navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
        <div class="navbar-brand">
          <a class="navbar-brand1" href="/Room-Rental-System/">
            Home
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
          <span class="navbar-toggler-icon" id="qwe"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-auto text-md-center text-left">
            <li class="nav-item">
              <a class="nav-link" href="../rooms">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../rates">Rates</a>
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
          <ul class="nav navbar-nav justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
              <a class="nav-link hna" href="../create/">Create Account</a>
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
        <input type="password" name="password" placeholder="Password">
      </div>
      <div class="user-actions">
        <button class="btn user" name="submit" type="submit">Login</button>
        <a href="../forgot-password/">Forgot password</a>
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

$email = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST["email"])) {
    echo '<script>showErr("Email is required!")</script>';
  } else {
    $email = $_POST["email"];
    if (empty($_POST["password"])) {
      echo '<script>showErr("Password is required!")</script>';
    } else if (isset($_POST['submit'])) {
      $password = $_POST["password"];
      $check_email = mysqli_query($conn, "SELECT * FROM accounts where email = '$email'");
      if (mysqli_num_rows($check_email) > 0) {
        while ($row = mysqli_fetch_assoc($check_email)) {

          $db_password = $row["user_password"];
          $db_user_type = $row["is_landlord"];

          if ($db_password == $password) {

            $_SESSION['user_login'] = true;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row["user_name"];
            $_SESSION["user_type"] = $db_user_type;


            if ($db_user_type == 0) {
              echo '<script>window.location.href = "../"</script>';
            } else {
              echo '<script>window.location.href = "../dashboard"</script>';
            }
            die();
          } else {
            echo '<script>showErr("Email or Password incorrect!")</script>';
          }
        }
      } else {
        echo '<script>showErr("Email is not registered! Please create an account first.")</script>';
      }
    }
  }
}
?>