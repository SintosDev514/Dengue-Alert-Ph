<?php
/**
 * Run this once to create the cleanup_drives table.
 * Visit: http://localhost/DengueAlertPh-main/setup_cleanup.php
 */
include "Auth/db.php";

$sql = "CREATE TABLE IF NOT EXISTS `cleanup_drives` (
  `id`          INT(11) NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(255) NOT NULL,
  `location`    VARCHAR(255) NOT NULL,
  `drive_date`  DATE NOT NULL,
  `time_start`  VARCHAR(20) NOT NULL,
  `time_end`    VARCHAR(20) NOT NULL,
  `slots`       INT(11) NOT NULL DEFAULT 50,
  `status`      ENUM('open','full','upcoming','cancelled') NOT NULL DEFAULT 'open',
  `description` TEXT NOT NULL,
  `organizer`   VARCHAR(255) DEFAULT 'Dengue Alert Philippines',
  `created_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

if (mysqli_query($conn, $sql)) {
    echo "<p style='font-family:sans-serif;color:green'>✓ cleanup_drives table created (or already exists).</p>";
    echo "<p style='font-family:sans-serif'><a href='Auth/dashboard.php'>→ Go to Admin Dashboard</a></p>";
} else {
    echo "<p style='font-family:sans-serif;color:red'>✗ Error: " . mysqli_error($conn) . "</p>";
}
mysqli_close($conn);
?>
