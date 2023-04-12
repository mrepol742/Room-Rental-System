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
        <link rel="stylesheet" href="main.css">

        <link rel="shortcut icon" href="anya.jpg">
        <link rel="apple-touch-icon" href="anya.jpg">
        <title>Create Account</title>
    </head>
    <body>
        <div class="login-box">
            <img src="anya.jpg" width="100" alt="Anya">
            <br>
            <h2>CREATE ACCOUNT</h2>
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email">
                    <?php echo "<div class=\"error\">" . $emailErr . "</div>" ?> 
                </div>
                <div class="user-box">
                    <input type="text" name="name" placeholder="Name">
                    <?php echo "<div class=\"error\">" . $nameErr . "</div>" ?> 
                </div>
                <div class="user-box">
                    <input type="password" name="password" placeholder="Password">
                    <?php echo "<div class=\"error\">" . $passwordErr . "</div>" ?> 
                </div>
                <div class="user-box">
                    <input type="password" name="cpassword" placeholder="Confirm Password">
                    <?php echo "<div class=\"error\">" . $cpasswordErr . "</div>" ?> 
                </div>
                <div class="user-actions">
                    <button class="btn" name="login">Login</button> <button class="btn" name="submit" type="submit">Create Account</button> <br><br>
                    <button class="btn" name="forgot">Forgot Password</button>
                </div>
            </form>
        </div>
        <script>
            document.body.style.background = "url('backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
            document.body.style.backgroundSize = "cover";
        </script>
    </body>
</html>

