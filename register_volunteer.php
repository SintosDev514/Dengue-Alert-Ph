<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $drive_id = $_POST['drive_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];
  $group = $_POST['group'];
  $notes = $_POST['notes'];

  $stmt = mysqli_prepare($conn, "
    INSERT INTO volunteer_registrations 
    (drive_id, name, email, phone, location, group_size, notes)
    VALUES (?, ?, ?, ?, ?, ?, ?)
  ");

  mysqli_stmt_bind_param(
    $stmt,
    "issssss",
    $drive_id,
    $name,
    $email,
    $phone,
    $location,
    $group,
    $notes
  );

  if (mysqli_stmt_execute($stmt)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>