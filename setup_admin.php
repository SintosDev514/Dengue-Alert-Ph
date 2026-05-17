<?php
/**
 * Run this once to setup the admin user
 * Visit: http://localhost/DengueAlertPh-main/setup_admin.php
 */
include "Auth/db.php";

$sql_create = "CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `is_verified` TINYINT(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if (!mysqli_query($conn, $sql_create)) {
    die("<p style='color:red'>Error creating table: " . mysqli_error($conn) . "</p>");
}

mysqli_query($conn, "TRUNCATE TABLE users");

$email = "admin@gmail.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn, "INSERT INTO users (email, password, is_verified) VALUES (?, ?, 1)");
mysqli_stmt_bind_param($stmt, "ss", $email, $password);

if (mysqli_stmt_execute($stmt)) {
    echo "<p style='font-family:sans-serif;color:green'>✓ Admin account created successfully.</p>";
    echo "<p style='font-family:sans-serif'>Email: <strong>admin@gmail.com</strong><br>Password: <strong>admin123</strong></p>";
    echo "<p style='font-family:sans-serif'><a href='Auth/index.php'>→ Go to Login Page</a></p>";
} else {
    echo "<p style='font-family:sans-serif;color:red'>✗ Error: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
