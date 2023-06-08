<?php
$page_title = "Categories | Room Rental System";
include("../include/header.php");
include("../include/connections.php");
echo '<script>
let element = document.getElementById("categories");
element.classList.add("active");
</script>';

function getDefQ()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["search"])) {
      $search = $_POST["search"];
      return "SELECT * FROM rooms WHERE type='$search' OR category='$search' OR description='$search' OR location='$search' OR rate_12='$search' OR rate_24='$search' OR promo='$search'";
    }
  }
  return "SELECT * FROM rooms ORDER BY category DESC";
}

$result = $conn->query(getDefQ());
$mcontent = "";
if ($result->num_rows > 0) {
    $mcontent .= '<section>' .
    '<div class="container ">' .
    '<div class="row">';

    while($row = $result->fetch_assoc()) {
      $mcontent .= '<div class="col-sm-6 roomt">' .
      '<div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">' .
      '<div class="col mb-5">' .
      '<img class="rounded img-fluid" src="https://source.unsplash.com/1200x700?room">' .
      '</div>' .
      '<div class="col">' .
      '<div>' .
      '<h3 class="fw-bold">' . $row["type"] . '</h3>' .
      '<p class="text-muted mb-0">• ' . $row["category"] . '</p>' .
      //  '<p class="text-muted mb-0">• ' . $row["description"] . '</p>' .
      '<p class="text-muted mb-0">• ' . $row["rate_12"] . '$ per 12 hours</p>' .
      '<p class="text-muted mb-0">• ' . $row["rate_24"] . '$ per 24 hours</p>' .
      '<p class="text-muted mb-0">• ' . $row["location"] . '</p>';
      $mcontent .= '<br>' .
            '<button class="btn btn-primary">&nbsp;&nbsp; Book now &nbsp;&nbsp;</button>';
    $promo = (int) $row["promo"];
    if ($promo > 0) {
      $mcontent .= '<p class="text-muted mb-0">•  -' . $row["promo"] . '$</p>';
    }
    $mcontent .= '<br>' .
      '</div>' .
      '</div>' .
      '</div>' .
      $row["description"] .
      '</div>';
  }
  $mcontent .= '</div></div></section>';
} else {
  $mcontent = '<div class="d-flex justify-content-md-center align-items-center vh-100">' .
  '<h1>No locations available to show.</h1>' .
  '</div>';
}
?>

<?php echo $mcontent; ?>

<?php
include("../include/footer.php");
?>

