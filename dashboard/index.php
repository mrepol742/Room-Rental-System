<?php
include("../include/session.php");

if (!isLogin()) {
    echo '<script>window.location.href = "../login"</script>';
    die();
}
?>