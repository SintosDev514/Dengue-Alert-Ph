<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dengue Alert Philippines – Real-time dengue awareness, prevention guides, and statistics for Filipino communities.">
  <title>Dengue Alert Philippines – Protect Your Community</title>
  <link rel="stylesheet" href="Auth/style.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-div">
    <div class="logo">
      <a href="index.php"><img src="Auth/Dengue-Logo.png" alt="Dengue Alert Philippines"></a>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="awareness.php">Awareness</a></li>  
      <li><a href="stats.php">Statistics</a></li>
      <li><a href="cleanup.php">Clean-up Drives</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="loginn.php">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <video class="hero-video" autoplay loop muted playsinline>
    <source src="assets/lamokbg.mp4" type="video/mp4">
  </video>
  <div class="hero-overlay"></div>
  <div style="position:relative; z-index:1;">
    <div class="hero-badge">
      <span></span> Live Dengue Monitoring – Philippines
    </div>
    <h1>Fight Dengue.<br>Protect Lives.</h1>
    <p>Stay informed with real-time dengue outbreak data, science-backed prevention guides, and community health resources for every Filipino.</p>
    <div class="btn-row">
      <a href="awareness.php" class="btn-primary">Explore Prevention</a>
      <a href="stats.php" class="btn-outline">View Statistics</a>
    </div>
  </div>
</section>

<!-- STATS SUMMARY -->
<div style="max-width:1200px;margin:0 auto;padding:0 2rem">
  <div class="stat-grid">
    <div class="stat-card">
      <span class="stat-number">150K+</span>
      <div class="stat-label">Cases in 2024</div>
    </div>
    <div class="stat-card">
      <span class="stat-number">800+</span>
      <div class="stat-label">Fatalities Recorded</div>
    </div>
    <div class="stat-card">
      <span class="stat-number">17</span>
      <div class="stat-label">Regions Affected</div>
    </div>
    <div class="stat-card">
      <span class="stat-number">81</span>
      <div class="stat-label">Provinces at Risk</div>
    </div>
  </div>
</div>

<!-- FEATURES -->
<section class="section">
  <div class="section-label">What We Offer</div>
  <h2 class="section-title">Everything You Need to <span>Stay Safe</span></h2>
  <p class="section-sub">Our platform gives Filipino communities the tools, data, and knowledge to prevent and respond to dengue outbreaks.</p>
  <div class="grid-3">

    <div class="card">
      <div class="card-icon">
        <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      </div>
      <h3>Real-time Outbreak Alerts</h3>
      <p>Receive up-to-date warnings about dengue hotspots and case surges in your province or municipality.</p>
    </div>

    <div class="card">
      <div class="card-icon green">
        <svg viewBox="0 0 24 24" style="stroke:#10B981"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
      </div>
      <h3>Prevention Guidelines</h3>
      <p>Access DOH-aligned tips and step-by-step guides to eliminate mosquito breeding sites around your home.</p>
    </div>

    <div class="card">
      <div class="card-icon blue">
        <svg viewBox="0 0 24 24" style="stroke:#3B82F6"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><rect x="1" y="20" width="22" height="1"/></svg>
      </div>
      <h3>Case Statistics Dashboard</h3>
      <p>Explore verified, region-by-region dengue case data with trends to understand the scope of outbreaks.</p>
    </div>

    <div class="card">
      <div class="card-icon amber">
        <svg viewBox="0 0 24 24" style="stroke:#F59E0B"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <h3>Symptom Recognition</h3>
      <p>Learn to identify dengue early — high fever, severe headache, rash, and pain behind the eyes.</p>
    </div>

    <div class="card">
      <div class="card-icon green">
        <svg viewBox="0 0 24 24" style="stroke:#10B981"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.23 2 2 0 012 .02h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
      </div>
      <h3>Emergency Contacts</h3>
      <p>Quick access to DOH hotlines, nearest hospitals, and Barangay Health Centers for immediate response.</p>
    </div>

    <div class="card">
      <div class="card-icon blue">
        <svg viewBox="0 0 24 24" style="stroke:#3B82F6"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
      </div>
      <h3>Community Reporting</h3>
      <p>Enable communities to report suspected cases and stagnant water sites for faster government response.</p>
    </div>

  </div>
</section>

<!-- DB CONTENT -->
<?php
$db_connected = false;
try {
  include "Auth/db.php";
  $stmt = mysqli_prepare($conn, "SELECT content FROM content_sections WHERE section_name='home' LIMIT 1");
  if($stmt){
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $db_connected = true;
  }
} catch(Exception $e){ $row = null; }

if(!empty($row['content'])){
  echo '<div class="content-container"><div class="content-box">'.$row['content'].'</div></div>';
}
?>

<!-- CTA BANNER -->
<div style="max-width:1200px;margin:0 auto;padding:0 2rem 100px">
  <div style="background:linear-gradient(135deg,rgba(220,38,38,.15),rgba(220,38,38,.05));border:1px solid rgba(220,38,38,.2);border-radius:20px;padding:3.5rem 2.5rem;text-align:center;">
    <div class="section-label" style="justify-content:center;display:flex;margin-bottom:.75rem">Take Action Today</div>
    <h2 style="font-family:var(--h);font-size:2rem;font-weight:700;margin-bottom:1rem">Dengue is preventable.<br>Start protecting your family now.</h2>
    <p style="color:var(--muted);margin-bottom:2rem;max-width:480px;margin-left:auto;margin-right:auto">Visit our awareness page for step-by-step prevention guides approved by the Department of Health.</p>
    <a href="awareness.php" class="btn-primary" style="display:inline-block;width:auto;padding:.875rem 2.5rem">Learn How to Prevent Dengue</a>
  </div>
</div>

<!-- FOOTER -->
<footer class="site-footer">
  <p>&copy; <?php echo date('Y'); ?> Dengue Alert Philippines &nbsp;|&nbsp; Data source: Department of Health PH &nbsp;|&nbsp; <a href="contact.php">Contact Us</a></p>
</footer>

<script>
function toggleMenu(){
  document.getElementById('navLinks').classList.toggle('active');
  document.getElementById('hamburger').classList.toggle('active');
}
document.addEventListener('click',function(e){
  const nav=document.querySelector('.navbar');
  if(!nav.contains(e.target)){
    document.getElementById('navLinks').classList.remove('active');
    document.getElementById('hamburger').classList.remove('active');
  }
});
</script>
</body>
</html>