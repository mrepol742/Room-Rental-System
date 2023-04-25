<?php
include("../include/session.php");

if ($_SESSION['user_type'] == 1) {
    echo '<script>window.location.href = "../admin"</script>';
    die();
}

if (!isLogin()) {
    echo '<script>window.location.href = "../login"</script>';
    die();
}
?>