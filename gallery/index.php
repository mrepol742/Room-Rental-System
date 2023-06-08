<?php
$page_title = "Gallery | Room Rental System";
include("../include/header.php");
include("../include/connections.php");
echo '<script>
let element = document.getElementById("gallery");
element.classList.add("active");
</script>';
?>

<div class="row" style="margin-right: 0; margin-left: 0;">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="https://source.unsplash.com/1080x700?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
    src="https://source.unsplash.com/700x1080?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
    src="https://source.unsplash.com/700x1080?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
    src="https://source.unsplash.com/1080x700?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
    src="https://source.unsplash.com/1080x700?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
    src="https://source.unsplash.com/400x1080?room"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>
</div>

<?php
include("../include/footer.php");
?>

