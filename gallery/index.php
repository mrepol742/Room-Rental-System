<?php
$page_title = "Gallery | Room Rental System";
include("../include/header.php");
include("../include/connections.php");
echo '<script>
let element = document.getElementById("gallery");
element.classList.add("active");
</script>';
?>

<div class="d-flex justify-content-md-center align-items-center vh-100">
<h1>No gallery available to show.</h1>
</div>

<?php
include("../include/footer.php");
?>

