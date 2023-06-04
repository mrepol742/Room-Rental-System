<?php
include("session.php");

$account = $session_status = $session_action = $cllp = "";

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
  $session_action .= '<li><a class="dropdown-item" href="../create"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>Create Account</title><path fill="#484848" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg>Create Account</a></li>';
  $cllp = ' <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarText">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-auto text-md-center text-left">
  <li class="nav-item">
      <a class="nav-link" href="../rooms" id="rooms">Rooms</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../pricing" id="pricing">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../categories" id="categories">Categories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../locations" id="locations">Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../promo" id="promo">Promos & Discounts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../gallery" id="gallery">Gallery</a>
    </li>
  </ul>
  <ul class="nav navbar-nav justify-content-md-center justify-content-start flex-nowrap">
  ' . $account . '
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
      <a class="nav-link" href="../locations">Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../promo">Promos & Discounts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../gallery">Gallery</a>
    </li>
  </ul>
</div>';
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
          Home
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
        <span class="navbar-toggler-icon" id="qwe"></span>
      </button>
      <?php echo $cllp; ?>
    </div>
  </nav>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarCanvas" aria-labelledby="sidebar">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarCanvas" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 24px; margin-right: 7px;">
          <title>Account</title>
          <path fill="#484848" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" />
        </svg> <?php echo $session_status; ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px">
          <path fill="#484848" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
        </svg>
      </h5>
      <div class="dropdown">
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php echo $session_action; ?>
        </ul>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="menu">
        <li class="menuitem" id="about">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;">
            <title>About</title>
            <path fill="#fff" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
          </svg>
          About
        </li>
        <li class="menuitem" id="contact">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;">
            <title>Contact</title>
            <path fill="#fff" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M8.43 14.44L7.07 13.83C7.35 13.27 7.5 12.67 7.5 12.05C7.5 11.39 7.35 10.76 7.07 10.17L8.43 9.56C8.81 10.37 9 11.2 9 12.05C9 12.8 8.81 13.6 8.43 14.44M11.53 15.94L10.22 15.29C10.75 14.16 11 13 11 11.86C11 10.73 10.75 9.69 10.22 8.71L11.53 7.96C12.19 9.12 12.5 10.42 12.5 11.86C12.5 13.33 12.19 14.69 11.53 15.94M14.68 17.35L13.31 16.65C14.1 15.11 14.5 13.57 14.5 12S14.1 8.87 13.31 7.31L14.68 6.65C15.55 8.43 16 10.22 16 12C16 13.82 15.55 15.6 14.68 17.35Z" />
          </svg>
          Contact
        </li>
        <li class="menuitem" id="support">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;">
            <title>Support</title>
            <path fill="#fff" d="M18.72,14.76C19.07,13.91 19.26,13 19.26,12C19.26,11.28 19.15,10.59 18.96,9.95C18.31,10.1 17.63,10.18 16.92,10.18C13.86,10.18 11.15,8.67 9.5,6.34C8.61,8.5 6.91,10.26 4.77,11.22C4.73,11.47 4.73,11.74 4.73,12A7.27,7.27 0 0,0 12,19.27C13.05,19.27 14.06,19.04 14.97,18.63C15.54,19.72 15.8,20.26 15.78,20.26C14.14,20.81 12.87,21.08 12,21.08C9.58,21.08 7.27,20.13 5.57,18.42C4.53,17.38 3.76,16.11 3.33,14.73H2V10.18H3.09C3.93,6.04 7.6,2.92 12,2.92C14.4,2.92 16.71,3.87 18.42,5.58C19.69,6.84 20.54,8.45 20.89,10.18H22V14.67H22V14.69L22,14.73H21.94L18.38,18L13.08,17.4V15.73H17.91L18.72,14.76M9.27,11.77C9.57,11.77 9.86,11.89 10.07,12.11C10.28,12.32 10.4,12.61 10.4,12.91C10.4,13.21 10.28,13.5 10.07,13.71C9.86,13.92 9.57,14.04 9.27,14.04C8.64,14.04 8.13,13.54 8.13,12.91C8.13,12.28 8.64,11.77 9.27,11.77M14.72,11.77C15.35,11.77 15.85,12.28 15.85,12.91C15.85,13.54 15.35,14.04 14.72,14.04C14.09,14.04 13.58,13.54 13.58,12.91A1.14,1.14 0 0,1 14.72,11.77Z" />
          </svg>
          Support
        </li>
        <li class="menuitem" id="faq">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;">
            <title>Faq</title>
            <path fill="#fff" d="M18,15H6L2,19V3A1,1 0 0,1 3,2H18A1,1 0 0,1 19,3V14A1,1 0 0,1 18,15M23,9V23L19,19H8A1,1 0 0,1 7,18V17H21V8H22A1,1 0 0,1 23,9M8.19,4C7.32,4 6.62,4.2 6.08,4.59C5.56,5 5.3,5.57 5.31,6.36L5.32,6.39H7.25C7.26,6.09 7.35,5.86 7.53,5.7C7.71,5.55 7.93,5.47 8.19,5.47C8.5,5.47 8.76,5.57 8.94,5.75C9.12,5.94 9.2,6.2 9.2,6.5C9.2,6.82 9.13,7.09 8.97,7.32C8.83,7.55 8.62,7.75 8.36,7.91C7.85,8.25 7.5,8.55 7.31,8.82C7.11,9.08 7,9.5 7,10H9C9,9.69 9.04,9.44 9.13,9.26C9.22,9.08 9.39,8.9 9.64,8.74C10.09,8.5 10.46,8.21 10.75,7.81C11.04,7.41 11.19,7 11.19,6.5C11.19,5.74 10.92,5.13 10.38,4.68C9.85,4.23 9.12,4 8.19,4M7,11V13H9V11H7M13,13H15V11H13V13M13,4V10H15V4H13Z" />
          </svg>
          Faq
        </li>
        <li class="menuitem" id="privacy">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;">
            <title>Privacy</title>
            <path fill="#fff" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z" />
          </svg>
          Privacy
        </li>
        <script>
          about.addEventListener('click', function() {
            window.location.href = '../about';
          });
          contact.addEventListener('click', function() {
            window.location.href = '../contact';
          });

          support.addEventListener('click', function() {
            window.location.href = '../support';
          });

          faq.addEventListener('click', function() {
            window.location.href = '../faq';
          });

          privacy.addEventListener('click', function() {
            window.location.href = '../privacy';
          });
        </script>
      </ul>
    </div>
  </div>