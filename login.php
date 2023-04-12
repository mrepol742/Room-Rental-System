<?php
include("connections.php");

$email = $password  = "";
$emailErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
    } else {
        $password = $_POST["password"];
    }
    
    if (isset($_POST['submit'])) {
		$check_email = mysqli_query($conn, "SELECT * FROM thecompany where email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            while ($row = mysqli_fetch_assoc($check_email)) {
                $db_password = $row["pass"];
                $db_account_type = $row["account_type"];
                if ($db_password == $password) {
                    if ($db_account_type == "1"){
                        echo "<script>window.location.href='admin';</script>";
                    } else {
                        echo "<script>window.location.href='user';</script>";
                    }
                } else {
                    echo "Password is incorrect";
                }
            }
        } else {
            echo "Email is not registered";
        }
	}
    if (isset($_POST['create'])) {
        header('Location: create.php');
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
        <title>Login</title>
    </head>
    <body>
        <div class="login-box">
            <img src="anya.jpg" width="100" alt="Anya">
            <br>
            <h2>LOGIN</h2>
            <form action="<?php htmlspecialchars('php_self'); ?>" method="post">
                <div class="user-box">
                    <input type="text" name="email" placeholder="Email">
                    <?php echo "<div class=\"error\">" . $emailErr . "</div>" ?> 
                </div>
                <div class="user-box">
                    <input type="password" name="password"  placeholder="Password">
                    <?php echo "<div class=\"error\">" . $passwordErr . "</div>" ?> 
                </div>
                <div class="user-actions">
                    <button class="btn" name="submit" type="submit">Login</button> <button class="btn" name="create">Create Account</button> <br><br>
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

