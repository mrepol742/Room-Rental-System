<?php
include("../include/session.php");

$session_status = $session_action = "";

if (!isLogin()) {
  echo '<script>window.location.href = "../login"</script>';
  die();
} else if ($_SESSION["user_type"] == 0) {
  echo '<script>window.location.href = "../"</script>';
}

$session_status = $_SESSION['name'];
$session_action = '<li><a class="dropdown-item" href="../logout"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>logout</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Logout</a></li>';
$session_action .= '<li><a class="dropdown-item" href="../change-password"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  style="width: 24px; margin-right: 10px;"><title>change password</title><path  fill="#484848" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" /></svg>Change Password</a></li>';
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
  <title>Dashboard | Room Rental System</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <nav class="autohide navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
      <div class="navbar-brand">
        <span class="navbar-toggler-icon sidebar" data-bs-toggle="offcanvas" href="#sidebarCanvas" role="button" aria-controls="sidebar" id="sidebarbb"></span>
        <a class="navbar-brand1" href="../dashboard">
          Dashboard
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" id="qwe111">
        <span class="navbar-toggler-icon" id="qwe"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-auto text-md-center text-left">

        </ul>
        <ul class="nav navbar-nav justify-content-md-center justify-content-start flex-nowrap">
          <li class="nav-item">
            <a class="nav-link hna" href="#" type="button" data-bs-toggle="modal" data-bs-target="#addRoom">Add Room</a>
          </li>
        </ul>
      </div>
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
  <div class="modal fade" id="addRoom" tabindex="-1" aria-labelledby="addRoomLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <form action="<?php htmlspecialchars('php_self'); ?>" method="post">

          <div class="modal-header">
            <h5 class="modal-title" id="addRoomLabel">Add Room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="user-box-add">
              <select name="room">
                <option value="premium">Premium Room</option>
                <option value="deluxe">Deluxe Room</option>
                <option value="executive">Executive Room</option>
                <option value="regency">Regency</option>
              </select>
            </div>
            <div class="user-box-add">
              <input type="text" name="description" placeholder="Descripton" required>
            </div>
            <div class="user-box-add">
              <input type="number" name="price" placeholder="Price" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <section class="py-5">
    <div class="container ">
      <div class="row">
        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>



        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>



        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
            <div class="col mb-5">
              <img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">
            </div>
            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
              <div>
                <h5 class="fw-bold">Delux Sweet Room</h5>
                <p class="text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit, metus id faucibus imperdiet.</p>
                <p class="text-muted mb-0">23$ / Night</p>
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Edit</title>
                  <path fill="#4285f4" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M15.1,7.07C15.24,7.07 15.38,7.12 15.5,7.23L16.77,8.5C17,8.72 17,9.07 16.77,9.28L15.77,10.28L13.72,8.23L14.72,7.23C14.82,7.12 14.96,7.07 15.1,7.07M13.13,8.81L15.19,10.87L9.13,16.93H7.07V14.87L13.13,8.81Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 30px; margin: 5px;">
                  <title>Delete</title>
                  <path fill="#4285f4" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
  </section>

  <footer class="footer mt-5 text-center">
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Facebook</title>
        <path fill="#484848" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Instagram</title>
        <path fill="#484848" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Pinterest</title>
        <path fill="#484848" d="M9.04,21.54C10,21.83 10.97,22 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2A10,10 0 0,0 2,12C2,16.25 4.67,19.9 8.44,21.34C8.35,20.56 8.26,19.27 8.44,18.38L9.59,13.44C9.59,13.44 9.3,12.86 9.3,11.94C9.3,10.56 10.16,9.53 11.14,9.53C12,9.53 12.4,10.16 12.4,10.97C12.4,11.83 11.83,13.06 11.54,14.24C11.37,15.22 12.06,16.08 13.06,16.08C14.84,16.08 16.22,14.18 16.22,11.5C16.22,9.1 14.5,7.46 12.03,7.46C9.21,7.46 7.55,9.56 7.55,11.77C7.55,12.63 7.83,13.5 8.29,14.07C8.38,14.13 8.38,14.21 8.35,14.36L8.06,15.45C8.06,15.62 7.95,15.68 7.78,15.56C6.5,15 5.76,13.18 5.76,11.71C5.76,8.55 8,5.68 12.32,5.68C15.76,5.68 18.44,8.15 18.44,11.43C18.44,14.87 16.31,17.63 13.26,17.63C12.29,17.63 11.34,17.11 11,16.5L10.33,18.87C10.1,19.73 9.47,20.88 9.04,21.57V21.54Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Twitter</title>
        <path fill="#484848" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Github</title>
        <path fill="#484848" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>LinkedIn</title>
        <path fill="#484848" d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
      </svg>
    </a>
    <a href="#" style="padding-left: 2px; padding-right: 2px;" target="_blank">
      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <title>Youtube</title>
        <path fill="#484848" d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z" />
      </svg>
    </a>
    <br>
    <span>© 2023 The Room Rental System Project</span>
  </footer>
  <script src="../assets/bootstrap.min.js"></script>
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('../sw.js').then((reg) => {
        console.log('[ServiceWorker] Registered');
      }).catch((err) => {
        console.error('[ServiceWorker] failed: ', err)
      });
    }

    /*
                document.body.style.background = "url('../backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
                document.body.style.backgroundSize = "cover";
                document.body.style.transition = "all 1s ease";
    */
    function showErr(err) {
      let bsAlert = new bootstrap.Toast(document.getElementById("error-toast"));
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
    document.addEventListener("DOMContentLoaded", function() {
      el_autohide = document.querySelector('.autohide');
      navbar_height = document.querySelector('.navbar').offsetHeight;
      document.body.style.paddingTop = navbar_height + 'px';
      if (el_autohide) {
        var last_scroll_top = 0;
        window.addEventListener('scroll', function() {
          let scroll_top = window.scrollY;
          if (scroll_top < last_scroll_top) {
            el_autohide.classList.remove('scrolled-down');
            el_autohide.classList.add('scrolled-up');
          } else {
            el_autohide.classList.remove('scrolled-up');
            el_autohide.classList.add('scrolled-down');
          }
          last_scroll_top = scroll_top;
        });
      }
    });
  </script>
</body>

</html>
<?php
include("../include/connections.php");
?>