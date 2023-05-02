<?php
include("session.php");

$account = $session_status = $session_action = $cllp = "";

if ($_SESSION['user_type'] == 1) {
  echo '<script>window.location.href = "../admin"</script>';
  die();
}

if (!isLogin()) {
  $account = '<li class="nav-item">
  <a class="nav-link anh" href="../create/">Create Account</a>
  </li>
  <hr>
  <li class="nav-item">
  <a class="nav-link hna" href="../login/">Login</a>
  </li>';
  $session_status = "Not login";
  $session_action = '<li><a class="dropdown-item" href="../login"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>Login</title><path fill="#484848" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>Login</a></li>';
  $session_action .= '<li><a class="dropdown-item" href="../create"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>account-plus</title><path fill="#484848" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg>Create Account</a></li>';
  $cllp = ' <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarText">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-auto text-md-center text-left">
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
  </ul>
  <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
  ' . $account .'
  </ul>
</div>';
} else {
  $session_status = $_SESSION['name'];
  $session_action = '<li><a class="dropdown-item" href="../logout"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>logout</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Logout</a></li>';
  $session_action .= '<li><a class="dropdown-item" href="../change-password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>change password</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Change Password</a></li>';
  $cllp = '<div class="collapse navbar-collapse" id="navbarText">
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
  </ul>
</div>';
}

$session_action .= '<li><a class="dropdown-item" href="../forgot-password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>forgot password</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Forgot Password</a></li>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../css/primary.css">

        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="../favicon.png">
        <link rel="apple-touch-icon" href="../favicon.png">
        <link rel="manifest" href="../site.webmanifest">
        <title><?php echo $page_title; ?></title>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <nav class="autohide navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
      <div class="navbar-brand">
      <span class="navbar-toggler-icon sidebar" data-bs-toggle="offcanvas" href="#sidebarCanvas" role="button" aria-controls="sidebar" id="sidebarbb"></span>
      <a class="navbar-brand1" href="../">
          Room Rental System
        </a>
</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
          <span class="navbar-toggler-icon" id="qwe"></span>
        </button>
        <?php echo $cllp; ?> 
      </div>
    </nav>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarCanvas" aria-labelledby="sidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="sidebarCanvas" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"> 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 24px; margin-right: 7px;"><title>Account</title><path fill="#484848" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg> <?php echo $session_status; ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"><path fill="#484848" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg></h5>
    <div class="dropdown">
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php echo $session_action; ?>
      </ul>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <ul class="menu">
        <li class="menuitem" ><a href="../rooms"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Rooms</title><path fill="#fff" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>Rooms</a></li>
        <li class="menuitem" ><a href="../pricing"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Pricing</title><path fill="#fff" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" /></svg>Pricing</a></li>
        <li class="menuitem"><a href="../locations"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Locations</title><path fill="#fff"  d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg>Locations</a></li>
        <li class="menuitem" ><a href="../landlords"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Landlords</title><path fill="#fff" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>Landlord</a></li>
        <li class="menuitem" ><a href="../amenity"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Amnenity</title><path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg>Amnenity</a></li>
        <li class="menuitem"><a href="../chat-with-us"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Chat with Us</title><path  fill="#fff" d="M12,3C17.5,3 22,6.58 22,11C22,15.42 17.5,19 12,19C10.76,19 9.57,18.82 8.47,18.5C5.55,21 2,21 2,21C4.33,18.67 4.7,17.1 4.75,16.5C3.05,15.07 2,13.13 2,11C2,6.58 6.5,3 12,3Z" /></svg>Chat with Us</a></li>
      </ul>

  </div>
</div>