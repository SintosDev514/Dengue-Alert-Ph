<?php
// Database setup script for Dengue Alert Philippines
// Run this once to create the content_sections table

include "Auth/db.php";

echo "Setting up content management tables...\n";

// Check if table already exists
$result = mysqli_query($conn, "SHOW TABLES LIKE 'content_sections'");
$table_exists = mysqli_num_rows($result) > 0;

if ($table_exists) {
    echo "✓ content_sections table already exists\n";
} else {
    // Create content_sections table
    $sql = "CREATE TABLE `content_sections` (
      `id` int(11) NOT NULL,
      `section_name` varchar(50) NOT NULL,
      `title` varchar(255) NOT NULL,
      `content` text NOT NULL,
      `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

    if (mysqli_query($conn, $sql)) {
        echo "✓ content_sections table created successfully\n";
    } else {
        echo "✗ Error creating table: " . mysqli_error($conn) . "\n";
    }

    // Add primary key and unique constraint
    $sql = "ALTER TABLE `content_sections`
      ADD PRIMARY KEY (`id`),
      ADD UNIQUE KEY `section_name` (`section_name`)";

    if (mysqli_query($conn, $sql)) {
        echo "✓ Table constraints added\n";
    } else {
        echo "✗ Error adding constraints: " . mysqli_error($conn) . "\n";
    }

    // Set auto increment
    $sql = "ALTER TABLE `content_sections`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

    if (mysqli_query($conn, $sql)) {
        echo "✓ Auto increment set\n";
    } else {
        echo "✗ Error setting auto increment: " . mysqli_error($conn) . "\n";
    }
}

// Insert default content
$sections = [
    ['home', 'Welcome to Dengue Alert Philippines', '<h1>Welcome to Dengue Alert Philippines</h1><p>Your trusted source for dengue prevention and awareness information.</p><p>Dengue fever is a mosquito-borne viral infection that has become a major public health concern in the Philippines. Our platform provides real-time information, prevention tips, and community support to help combat this disease.</p>'],
    ['awareness', 'Dengue Awareness and Prevention', '<h1>Dengue Awareness</h1><h2>What is Dengue?</h2><p>Dengue is a viral infection transmitted by the Aedes mosquito. It can cause severe flu-like symptoms and in some cases, life-threatening complications.</p><h2>Prevention Tips</h2><ul><li>Eliminate mosquito breeding sites</li><li>Use mosquito repellents</li><li>Wear protective clothing</li><li>Install window screens</li><li>Use mosquito nets when sleeping</li></ul>'],
    ['stats', 'Dengue Statistics and Trends', '<h1>Dengue Statistics</h1><p>Track the latest dengue cases and trends across the Philippines.</p><div class="stats-container"><div class="stat-box"><h3>Total Cases (2024)</h3><span class="stat-number">150,000+</span></div><div class="stat-box"><h3>Deaths</h3><span class="stat-number">800+</span></div><div class="stat-box"><h3>Regions Affected</h3><span class="stat-number">17</span></div></div>'],
    ['contact', 'Contact Us', '<h1>Get in Touch</h1><p>Have questions about dengue prevention or need assistance? Contact our team.</p><div class="contact-info"><h3>Emergency Hotline</h3><p>Call: 1555 (DOH Hotline)</p><h3>Email Support</h3><p>Email: info@denguealert.ph</p><h3>Office Hours</h3><p>Monday - Friday: 8:00 AM - 5:00 PM</p></div>']
];

foreach ($sections as $section) {
    $stmt = mysqli_prepare($conn, "INSERT IGNORE INTO content_sections (section_name, title, content) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $section[0], $section[1], $section[2]);
    if (mysqli_stmt_execute($stmt)) {
        echo "✓ {$section[0]} section content inserted\n";
    } else {
        echo "✗ Error inserting {$section[0]}: " . mysqli_error($conn) . "\n";
    }
}

echo "\nSetup completed! You can now access the admin dashboard at Auth/dashboard.php\n";
echo "Main website pages: index.php, awareness.php, stats.php, contact.php\n";

mysqli_close($conn);
?>