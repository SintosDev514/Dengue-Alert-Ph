<?php
include "Auth/db.php";

$stmt = mysqli_prepare($conn, "SELECT title, content FROM content_sections WHERE section_name='home' LIMIT 1");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$home_content = mysqli_fetch_assoc($result);

if ($home_content) {
    echo "Title: " . $home_content['title'] . "\n";
    echo "Content: " . substr($home_content['content'], 0, 150) . "...\n";
} else {
    echo "No content found\n";
}

mysqli_close($conn);
?>