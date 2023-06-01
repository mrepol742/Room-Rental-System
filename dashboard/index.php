
<?php
$page_title = "Dashboard | Room Rental System";
include("../include/header.php");
?>

<?php

if (!isLogin()) {
    echo '<script>window.location.href = "../login"</script>';
    die();
} else if ($_SESSION["user_type"] == 0) {
    echo '<script>window.location.href = "../"</script>';
}
?>
<main>
      <div class="card mb-3 first " style="border-radius: 0px; padding-bottom: 15;">
        <div class="row g-0">
          <div class="col-md-6">
     reservation
          </div>
          <div class="col-md-6">
             hello world
          </div>
        </div>
      </div>
</main>
<?php
include("../include/footer.php");
include("../include/connections.php");
?>

