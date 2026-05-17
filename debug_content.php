<?php
// Debug script to check database content
include "Auth/db.php";

echo "<h1>Database Content Debug</h1>";

// Check all content sections
$stmt = mysqli_prepare($conn, "SELECT * FROM content_sections ORDER BY id");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

echo "<h2>All Content Sections:</h2>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>{$row['section_name']}</h3>";
    echo "<strong>Title:</strong> {$row['title']}<br>";
    echo "<strong>Content:</strong> " . substr($row['content'], 0, 100) . "...<br>";
    echo "<strong>Updated:</strong> {$row['updated_at']}<br><br>";
}

// Test specific home section
echo "<h2>Home Section Test:</h2>";
$stmt = mysqli_prepare($conn, "SELECT title, content FROM content_sections WHERE section_name='home' LIMIT 1");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$home_content = mysqli_fetch_assoc($result);

if ($home_content) {
    echo "<strong>Title:</strong> {$home_content['title']}<br>";
    echo "<strong>Content:</strong> " . htmlspecialchars(substr($home_content['content'], 0, 200)) . "...<br>";
} else {
    echo "No home content found!<br>";
}

mysqli_close($conn);
?>