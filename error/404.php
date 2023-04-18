<?php
include("connections.php");

$email = $name = $password = $cpassword= "";
$emailErr = $nameErr = $passwordErr = $cPasswordErr = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Confimr Password is required!";
    } else {
        $cpassword = $_POST["cpassword"];
    }
    
    if (isset($_POST['submit'])) {
        $chemail = mysqli_query($conn, "SELECT * FROM thecompany WHERE email= '" . $email . "'");
        $check = mysqli_num_rows($chemail);
        if ($check > 0) {
            $emailErr = "Email is already Registered";
        } else {
            $sql = "INSERT INTO thecompany (fullname, email, pass, account_type) VALUES ('" . $fullname . "', '" . $email . "', '" . $password . "', '" . 2 . "')";
            if ($conn->query($sql) === TRUE) {
                echo "Successful";
            }
        }
	}
    if (isset($_POST['login'])) {
        header('Location: login.php');
    }
    if (isset($_POST['forgot'])) {
        header('Location: forgotpassword.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">

        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.png">
        <link rel="apple-touch-icon" href="favicon.png">
        <title>404 File Not Found | Room Rental System</title>
    </head>
    <body>
        <div class="login-box">
            <img src="rrs-logo.webp" width="300" alt="Room Rental System">
            <h1>The page you are looking for was not here</h1>
        </div>
        <script>
            document.body.style.background = "url('/backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
            document.body.style.backgroundSize = "cover";
        </script>
    </body>
</html>

