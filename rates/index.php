<?php
$page_title = "rates | Room Rental System";
include("../include/header.php");
include("../include/connections.php");
echo '<script>
let element = document.getElementById("rates");
element.classList.add("active");
</script>';
?>

<div class="d-flex justify-content-md-center align-items-center vh-100">
<h1>No rates available to show.</h1>
</div>

<?php
include("../include/footer.php");
?>

