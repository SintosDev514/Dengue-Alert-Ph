<?php
$db_server = "localhost:3306";
$db_user   = "root";
$db_pass   = "";
$db_name   = "database_ini";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    // Stop execution and show real error
    die("Database connection failed: " . mysqli_connect_error());
}

?>
