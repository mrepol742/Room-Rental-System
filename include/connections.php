<?php
$conn = new mysqli("localhost", "root", "", "room_rental_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>