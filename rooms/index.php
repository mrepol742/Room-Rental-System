<?php
$page_title = "Rooms | Room Rental System";
include("../include/header.php");
include("../include/connections.php");
echo '<script>
let element = document.getElementById("rooms");
element.classList.add("active");
</script>';

$sql = "SELECT * FROM rooms ORDER BY _id DESC";
$result = $conn->query($sql);
$mcontent = "";
if ($result->num_rows > 0) {
    $mcontent .= '<section class="py-5">' .
    '<div class="container ">' .
    '<div class="row">';

    while($row = $result->fetch_assoc()) {
      $mcontent .= '<div class="col-sm-6 roomt">' .
      '<div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">' .
        '<div class="col mb-5">' .
          '<img class="rounded img-fluid shadow" src="https://source.unsplash.com/1080x700?room">' .
        '</div>' .
        '<div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">' .
          '<div>' .
            '<h5 class="fw-bold">' . $row["type"] . '</h5>' .
            '<p class="text-muted mb-0">' . $row["category"] . '</p>' .
            '<p class="text-muted mb-0">' . $row["description"] . '</p>' .
            '<p class="text-muted mb-0">' . $row["rate_12"] . '$ 12hrs | ' . $row["rate_24"] . '$ 24hrs per Night</p>' .
            '<p class="text-muted mb-0">' . $row["location"] . '</p>';
            $mcontent .= '<br>' .
            '<button class="btn btn-primary">Book now</button>' .
          '</div>' .
        '</div>' .
      '</div>' .
    '</div>';
    }

    $mcontent .= '</div></div></section>';
} else {
  $mcontent = '<div class="d-flex justify-content-md-center align-items-center vh-100">' .
  '<h1>No rooms available to show.</h1>' .
  '</div>';
}
?>

<?php echo $mcontent; ?>

<?php
include("../include/footer.php");
?>