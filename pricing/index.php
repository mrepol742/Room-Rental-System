<?php
include("../include/session.php");

$account = $session_status = $session_action = "";

if (!isLogin()) {
  $account = '<li class="nav-item">
  <a class="nav-link anh" href="create/">Create Account</a>
  </li>
  <hr>
  <li class="nav-item">
  <a class="nav-link hna" href="login/">Login</a>
  </li>';
  $session_status = "Not login";
  $session_action = '<li><a class="dropdown-item" href="../login"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>Login</title><path fill="#484848" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>Login</a></li>';
  $session_action .= '<li><a class="dropdown-item" href="../create"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>account-plus</title><path fill="#484848" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg>Create Account</a></li>';
} else {
  $session_status = $_SESSION['name'];
  $session_action = '<li><a class="dropdown-item" href="../logout"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>logout</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Logout</a></li>';
}

$session_action .= '<li><a class="dropdown-item" href="../change-password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>change password</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Change Password</a></li>';
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
        <title>Pricing | Room Rental System</title>
    </head>
    <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-static-top">
      <div class="container-fluid">
      <span class="navbar-toggler-icon sidebar" data-bs-toggle="offcanvas" href="../#sidebarCanvas" role="button" aria-controls="sidebar" id="sidebarbb"></span>
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
              <a class="nav-link active" href="../#">Pricing</a>
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
            <?php echo $account; ?> 
          </ul>
        </div>
      </div>
    </nav>
  </header>

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
        <li class="menuitem" ><a href="../#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Rooms</title><path fill="#484848" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>Rooms</a></li>
        <li class="menuitem" ><a href="../#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Pricing</title><path fill="#484848" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" /></svg>Pricing</a></li>
        <li class="menuitem"><a href="../#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Locations</title><path fill="#484848"  d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg>Locations</a></li>
        <li class="menuitem" ><a href="../#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Tenants</title><path fill="#484848" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>Landlord</a></li>
        <li class="menuitem" ><a href="../#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 26px; margin-right: 10px;"><title>Amnenity</title><path fill="#484848" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg>Amnenity</a></li>
      </ul>

  </div>
</div>

  <footer class="footer">
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Facebook</title>
        <path fill="#3b5998"
          d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Instagram</title>
        <path fill="#feda75"
          d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Pinterest</title>
        <path fill="#c8232c"
          d="M9.04,21.54C10,21.83 10.97,22 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12C2,16.25 4.67,19.9 8.44,21.34C8.35,20.56 8.26,19.27 8.44,18.38L9.59,13.44C9.59,13.44 9.3,12.86 9.3,11.94C9.3,10.56 10.16,9.53 11.14,9.53C12,9.53 12.4,10.16 12.4,10.97C12.4,11.83 11.83,13.06 11.54,14.24C11.37,15.22 12.06,16.08 13.06,16.08C14.84,16.08 16.22,14.18 16.22,11.5C16.22,9.1 14.5,7.46 12.03,7.46C9.21,7.46 7.55,9.56 7.55,11.77C7.55,12.63 7.83,13.5 8.29,14.07C8.38,14.13 8.38,14.21 8.35,14.36L8.06,15.45C8.06,15.62 7.95,15.68 7.78,15.56C6.5,15 5.76,13.18 5.76,11.71C5.76,8.55 8,5.68 12.32,5.68C15.76,5.68 18.44,8.15 18.44,11.43C18.44,14.87 16.31,17.63 13.26,17.63C12.29,17.63 11.34,17.11 11,16.5L10.33,18.87C10.1,19.73 9.47,20.88 9.04,21.57V21.54Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Twitter</title>
        <path fill="#00acee"
          d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Github</title>
        <path fill="#171515"
          d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>LinkedIn</title>
        <path fill="#0072b1"
          d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
      </svg>
    </a>
    <a href="../#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Youtube</title>
        <path fill="#FF0000"
          d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z" />
      </svg>
    </a>
    <br>
    <span>© 2023 Room Rental System</span>
  </footer>

        <script>
            document.body.style.background = "url('../backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
            document.body.style.backgroundSize = "cover";
            document.body.style.transition = "all 1s ease";

            function showErr(err) {
                let bsAlert = new  bootstrap.Toast(document.getElementById("error-toast"));
                bsAlert.show();
                document.getElementById("error").innerText = err;
            }
            let isShow = true;
            qwe111.addEventListener("click", function() {
                if (isShow) {
                    isShow = false;
                    qwe.style.background = 'url("../chevron-up.svg")';
                } else {
                    isShow = true;
                    qwe.style.background = 'url("../chevron-down.svg")';
                }
            });
            
          
        </script>
        <script src="../assets/bootstrap.min.js"></script>
<script src="../assets/lozad.min.js"></script>
<script>
    
    /*
* DO NOT MODIFY this code its use to speed up our system loading and increase performance 
* by making sure the media such as images are lazy loaded
*/
        const observer = lozad();
        observer.observe();
/*
* DO NOT MODIFY this code its use to speed up our system loading and increase performance 
* caching the contents instead of loading it on the disk or on the server
*/
        if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../sw.js').then((reg) => {
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


?>

