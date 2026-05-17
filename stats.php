<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dengue case statistics and regional trends from the Department of Health Philippines.">
  <title>Statistics – Dengue Alert Philippines</title>
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
      <li><a href="stats.php" class="active">Statistics</a></li>
      <li><a href="cleanup.php">Clean-up Drives</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="Auth/index.php">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<?php
require_once 'dengue_data.php';

// Attempt live fetch; fall back gracefully
$data_ok = false;
$dengue  = [];
try {
    $dengue  = get_dengue_data();
    $data_ok = !empty($dengue['regions']);
} catch (Exception $e) {
    $data_ok = false;
}

// Compute display values
$regions      = $data_ok ? array_slice($dengue['regions'], 0, 10, true) : [];
$total_cases  = $data_ok ? number_format($dengue['total_cases'])  : '150,000+';
$total_deaths = $data_ok ? number_format($dengue['total_deaths']) : '800+';
$max_cases    = $data_ok && $regions ? max(array_column($regions, 'cases')) : 1;
$source_label = $data_ok ? htmlspecialchars($dengue['source']) : 'DOH Epidemiology Bureau (estimated)';
$source_url   = $data_ok ? htmlspecialchars($dengue['source_url']) : 'https://doh.gov.ph';
$fetched_at   = $data_ok ? date('F j, Y', $dengue['fetched_at']) : 'N/A';
?>

<!-- PAGE HEADER -->
<div style="padding:120px 2rem 60px;max-width:1200px;margin:0 auto">
  <div class="section-label">DOH Data · Updated <?= $fetched_at ?></div>
  <h1 style="font-family:var(--h);font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem">
    Dengue Statistics Philippines
  </h1>
  <p style="color:var(--muted);font-size:1.05rem;max-width:600px;line-height:1.8">
    Data sourced directly from the
    <a href="<?= $source_url ?>" target="_blank" rel="noopener"
       style="color:var(--red);text-decoration:none">Department of Health Epidemiology Bureau</a>
    via the Humanitarian Data Exchange (HDX). Regional case totals aggregated from official DOH CSV files.
  </p>
</div>

<!-- KEY NUMBERS -->
<div style="max-width:1200px;margin:0 auto;padding:0 2rem">
  <div class="stat-grid">
    <div class="stat-card">
      <span class="stat-number"><?= $total_cases ?></span>
      <div class="stat-label">Total Cases (2020–2021)</div>
    </div>
    <div class="stat-card">
      <span class="stat-number"><?= $total_deaths ?></span>
      <div class="stat-label">Deaths Recorded</div>
    </div>
    <div class="stat-card">
      <span class="stat-number"><?= $data_ok ? count($dengue['regions']) : '17' ?></span>
      <div class="stat-label">Regions Affected</div>
    </div>
    <div class="stat-card">
      <span class="stat-number">
        <?php
          if ($data_ok && $dengue['total_cases'] > 0) {
            echo round(($dengue['total_deaths'] / $dengue['total_cases']) * 100, 2) . '%';
          } else { echo '0.5%'; }
        ?>
      </span>
      <div class="stat-label">Case Fatality Rate</div>
    </div>
  </div>
</div>

<!-- REGIONAL BREAKDOWN -->
<section class="section">
  <div class="section-label">Regional Data</div>
  <h2 class="section-title">Highest-Impact <span>Regions</span></h2>
  <p class="section-sub">
    <?php if ($data_ok): ?>
      Live-aggregated from official DOH case records. Showing top <?= count($regions) ?> regions by total confirmed cases.
    <?php else: ?>
      Unable to fetch live data. Showing estimated figures from DOH reports.
    <?php endif; ?>
  </p>

  <?php if (!$data_ok): ?>
  <div style="margin-top:1.5rem;padding:1rem 1.25rem;background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.25);border-radius:10px;color:#FCD34D;font-size:.875rem">
    <strong>Notice:</strong> Live data could not be fetched (network or timeout). Displaying representative DOH estimates. Data will auto-refresh when connection is restored.
  </div>
  <?php endif; ?>

  <div style="margin-top:2rem;display:flex;flex-direction:column;gap:.875rem">

    <?php if ($data_ok && $regions): ?>
      <?php foreach ($regions as $region => $info): ?>
        <?php
          $pct   = $max_cases > 0 ? round(($info['cases'] / $max_cases) * 100) : 0;
          $share = $dengue['total_cases'] > 0 ? round(($info['cases'] / $dengue['total_cases']) * 100, 1) : 0;
        ?>
        <div style="background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1.1rem 1.5rem">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.6rem;flex-wrap:wrap;gap:.5rem">
            <span style="font-weight:600;font-size:.95rem"><?= htmlspecialchars($region) ?></span>
            <div style="display:flex;gap:1.25rem;align-items:center">
              <span style="font-size:.85rem;color:var(--muted)"><?= number_format($info['cases']) ?> cases</span>
              <span style="font-size:.8rem;background:rgba(220,38,38,.1);color:#FCA5A5;padding:.2rem .65rem;border-radius:50px;font-weight:600"><?= $share ?>% of total</span>
              <?php if ($info['deaths'] > 0): ?>
              <span style="font-size:.8rem;color:var(--muted)"><?= $info['deaths'] ?> deaths</span>
              <?php endif; ?>
            </div>
          </div>
          <div style="background:rgba(255,255,255,.05);border-radius:50px;height:6px;overflow:hidden">
            <div style="height:100%;width:<?= $pct ?>%;background:linear-gradient(90deg,var(--red),var(--red-soft));border-radius:50px;transition:width 1s ease"></div>
          </div>
        </div>
      <?php endforeach; ?>

    <?php else: ?>
      <!-- Fallback estimated data -->
      <?php
      $fallback = [
        ['Region IV-A – CALABARZON',   22, '#DC2626'],
        ['Region III – Central Luzon', 18, '#EF4444'],
        ['Region VII – Central Visayas',14,'#DC2626'],
        ['NCR (Metro Manila)',          12, '#EF4444'],
        ['Region XI – Davao Region',   10, '#DC2626'],
        ['Region VI – Western Visayas', 9, '#EF4444'],
        ['Region V – Bicol Region',     7, '#DC2626'],
      ];
      foreach ($fallback as [$name, $pct, $color]): ?>
      <div style="background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1.1rem 1.5rem">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.6rem">
          <span style="font-weight:600;font-size:.95rem"><?= $name ?></span>
          <span style="font-size:.85rem;color:var(--muted)"><?= $pct ?>% of national (est.)</span>
        </div>
        <div style="background:rgba(255,255,255,.05);border-radius:50px;height:6px;overflow:hidden">
          <div style="height:100%;width:<?= $pct ?>%;background:<?= $color ?>;border-radius:50px"></div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>

  <!-- Attribution -->
  <p style="margin-top:1.5rem;font-size:.8rem;color:var(--muted)">
    Source: <?= $source_label ?> ·
    <a href="<?= $source_url ?>" target="_blank" rel="noopener" style="color:var(--muted)">View raw dataset</a> ·
    License: CC BY
  </p>
</section>

<!-- INSIGHT CARDS -->
<section class="section" style="padding-top:0">
  <div class="section-label">Understanding the Data</div>
  <h2 class="section-title">Key <span>Insights</span></h2>
  <div class="grid-3" style="margin-top:2rem">
    <div class="card">
      <div class="card-icon">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      </div>
      <h3>Peak Season: June – October</h3>
      <p>Dengue cases spike during rainy season when standing water allows <em>Aedes aegypti</em> mosquitoes to breed rapidly in urban and rural areas.</p>
    </div>
    <div class="card">
      <div class="card-icon amber">
        <svg viewBox="0 0 24 24" style="stroke:#F59E0B"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
      </div>
      <h3>Children Most at Risk</h3>
      <p>Children under 14 account for over 40% of dengue cases in the Philippines, making school-based prevention programs a priority.</p>
    </div>
    <div class="card">
      <div class="card-icon green">
        <svg viewBox="0 0 24 24" style="stroke:#10B981"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
      </div>
      <h3>Fatality Rate Declining</h3>
      <p>Improved early detection, DOH treatment guidelines, and community health campaigns have contributed to a steadily declining case fatality rate.</p>
    </div>
  </div>
</section>

<!-- DB CONTENT -->
<?php
try {
  include_once "Auth/db.php";
  $stmt = mysqli_prepare($conn, "SELECT content FROM content_sections WHERE section_name='stats' LIMIT 1");
  if($stmt){
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if(!empty($row['content'])){
      echo '<div class="content-container" style="padding-top:0"><div class="content-box">'.$row['content'].'</div></div>';
    }
  }
} catch(Exception $e){}
?>

<footer class="site-footer">
  <p>
    &copy; <?php echo date('Y'); ?> Dengue Alert Philippines &nbsp;|&nbsp;
    Data: DOH Epidemiology Bureau via
    <a href="https://data.humdata.org/dataset/philippine-dengue-cases-and-deaths" target="_blank" rel="noopener">HDX</a>
    &nbsp;|&nbsp; <a href="contact.php">Contact Us</a>
  </p>
</footer>

<script>
function toggleMenu(){
  document.getElementById('navLinks').classList.toggle('active');
  document.getElementById('hamburger').classList.toggle('active');
}
document.addEventListener('click',function(e){
  if(!document.querySelector('.navbar').contains(e.target)){
    document.getElementById('navLinks').classList.remove('active');
    document.getElementById('hamburger').classList.remove('active');
  }
});
</script>
</body>
</html>