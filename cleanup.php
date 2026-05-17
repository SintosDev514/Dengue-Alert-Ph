<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Join upcoming dengue community clean-up drives across the Philippines. Register online.">
  <title>Clean-up Drives – Dengue Alert Philippines</title>
  <link rel="stylesheet" href="Auth/style.css">
  <style>
    .drive-card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:1.75rem;transition:.3s;display:flex;gap:1.5rem;align-items:flex-start;margin-bottom:1.25rem}
    .drive-card:hover{border-color:rgba(220,38,38,.35);transform:translateY(-3px);box-shadow:0 12px 30px rgba(0,0,0,.4)}
    .drive-date-block{min-width:64px;text-align:center;background:rgba(220,38,38,.1);border:1px solid rgba(220,38,38,.25);border-radius:12px;padding:.6rem .5rem;flex-shrink:0}
    .drive-date-block .day{font-family:var(--h);font-size:1.8rem;font-weight:800;color:var(--text);line-height:1}
    .drive-date-block .month{font-size:.7rem;text-transform:uppercase;letter-spacing:.08em;color:var(--red);font-weight:700;margin-top:.25rem}
    .drive-badge{display:inline-block;font-size:.72rem;font-weight:700;padding:.2rem .7rem;border-radius:50px;margin-bottom:.5rem;text-transform:uppercase;letter-spacing:.06em}
    .badge-open{background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.3);color:#6EE7B7}
    .badge-full{background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.3);color:#FCD34D}
    .badge-upcoming{background:rgba(59,130,246,.12);border:1px solid rgba(59,130,246,.3);color:#93C5FD}
    .badge-cancelled{background:rgba(220,38,38,.12);border:1px solid rgba(220,38,38,.3);color:#FCA5A5}
    .meta-pill{display:inline-flex;align-items:center;gap:.35rem;background:rgba(255,255,255,.04);border:1px solid var(--border);border-radius:50px;padding:.25rem .75rem;font-size:.82rem;color:var(--muted)}
    .join-form input,.join-form select,.join-form textarea{width:100%;padding:.875rem 1rem;background:var(--dark);border:1.5px solid var(--border);border-radius:10px;color:var(--text);font-family:var(--b);font-size:.95rem;margin-bottom:1rem;transition:.25s}
    .join-form input:focus,.join-form select:focus,.join-form textarea:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(220,38,38,.12)}
    .join-form input::placeholder,.join-form textarea::placeholder{color:rgba(100,116,139,.5)}
    @media(max-width:640px){.drive-card{flex-direction:column;gap:1rem}}
  </style>
</head>
<body>

<?php include "Auth/db.php"; ?>

<nav class="navbar">
  <div class="nav-div">
    <div class="logo">
      <a href="index.php"><img src="Auth/Dengue-Logo.png" alt="Dengue Alert Philippines"></a>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="awareness.php">Awareness</a></li>
      <li><a href="stats.php">Statistics</a></li>
      <li><a href="cleanup.php" class="active">Clean-up Drives</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="Auth/index.php">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- HERO -->
<div style="padding:120px 2rem 60px;max-width:1200px;margin:0 auto">
  <div class="section-label">Community Action</div>
  <h1 style="font-family:var(--h);font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem">
    Join a Dengue Clean-up Drive
  </h1>
  <p style="color:var(--muted);font-size:1.05rem;max-width:620px;line-height:1.8">
    Community clean-up drives are one of the most effective ways to eliminate dengue mosquito breeding sites. Find a drive near you, register online, and help protect your barangay.
  </p>
</div>

<!-- WHY JOIN -->
<section class="section" style="padding-top:0">
  <div class="grid-3">
    <div class="card">
      <div class="card-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
          <path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>
        </svg>
      </div>
      <h3>Community Impact</h3>
      <p>A single clean-up can eliminate hundreds of mosquito breeding sites, protecting thousands of residents across your barangay.</p>
    </div>
    <div class="card">
      <div class="card-icon green">
        <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
        </svg>
      </div>
      <h3>Free &amp; Organized</h3>
      <p>All drives are coordinated with local LGUs and the DOH. Gloves, trash bags, and refreshments are provided to all volunteers.</p>
    </div>
    <div class="card">
      <div class="card-icon blue">
        <svg viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
        </svg>
      </div>
      <h3>Certificate of Participation</h3>
      <p>Registered volunteers receive an official certificate of participation signed by the local health office upon completion.</p>
    </div>
  </div>
</section>

<!-- DRIVES FROM DB -->
<section class="section" style="padding-top:0">
  <div class="section-label">Schedule</div>
  <h2 class="section-title">Upcoming <span>Clean-up Drives</span></h2>
  <p class="section-sub">Community drives posted by the admin in partnership with local LGUs and the Department of Health.</p>

  <?php
  // Fetch drives from DB — only non-cancelled, ordered by date ascending
  $drives = [];
  $res = mysqli_query($conn, "SELECT * FROM cleanup_drives WHERE status != 'cancelled' ORDER BY drive_date ASC");
  if ($res) {
    while ($d = mysqli_fetch_assoc($res)) $drives[] = $d;
  }
  ?>

  <div style="margin-top:2rem">

    <?php if (empty($drives)): ?>
    <div style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:3rem;text-align:center">
      <div style="font-size:2.5rem;margin-bottom:1rem;opacity:.3">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      </div>
      <p style="color:var(--muted);font-size:1rem">No upcoming clean-up drives have been posted yet.</p>
      <p style="color:var(--muted);font-size:.875rem;margin-top:.5rem">Check back soon or <a href="contact.php" style="color:var(--red);text-decoration:none">contact us</a> to organize one in your area.</p>
    </div>

    <?php else: ?>
      <?php foreach ($drives as $d):
        $badge_class = match($d['status']) {  
          'full'     => 'badge-full',
          'upcoming' => 'badge-upcoming',
          default    => 'badge-open'
        };
        $badge_label = match($d['status']) {
          'full'     => 'Full – Waitlist Open',
          'upcoming' => 'Upcoming – Registration Not Yet Open',
          default    => 'Open – Slots Available'
        };
        $can_register = $d['status'] === 'open' || $d['status'] === 'full';
        $btn_label    = $d['status'] === 'full' ? 'Join Waitlist' : 'Register Now';
        $btn_style    = $d['status'] === 'full' ? 'background:rgba(245,158,11,.8)' : '';
        $drive_day    = date('d', strtotime($d['drive_date']));
        $drive_month  = date('M', strtotime($d['drive_date']));
        $drive_full   = date('F j, Y', strtotime($d['drive_date']));
      ?>
      <div class="drive-card" id="drive-<?= $d['id'] ?>">
        <div class="drive-date-block">
          <div class="day"><?= $drive_day ?></div>
          <div class="month"><?= $drive_month ?></div>
        </div>
        <div style="flex:1">
          <span class="drive-badge <?= $badge_class ?>"><?= $badge_label ?></span>
          <h3 style="font-family:var(--h);font-size:1.1rem;font-weight:700;margin-bottom:.5rem"><?= htmlspecialchars($d['title']) ?></h3>
          <p style="color:var(--muted);font-size:.9rem;line-height:1.6;margin-bottom:1rem"><?= nl2br(htmlspecialchars($d['description'])) ?></p>
          <div style="display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:1rem">
            <span class="meta-pill">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <?= htmlspecialchars($d['location']) ?>
            </span>
            <span class="meta-pill">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              <?= $drive_full ?>
            </span>
            <span class="meta-pill">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <?= htmlspecialchars($d['time_start']) ?> – <?= htmlspecialchars($d['time_end']) ?>
            </span>
            <span class="meta-pill">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
              <?= $d['slots'] ?> volunteer slots
            </span>
            <?php if ($d['organizer']): ?>
            <span class="meta-pill">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <?= htmlspecialchars($d['organizer']) ?>
            </span>
            <?php endif; ?>
          </div>

          <?php if ($can_register): ?>
          <button onclick="openForm(<?= $d['id'] ?>, '<?= addslashes($d['title']) ?>', '<?= addslashes($d['location']) ?>', '<?= $drive_full ?>')"
                  class="btn-primary" style="width:auto;padding:.65rem 1.75rem;font-size:.9rem;display:inline-block;<?= $btn_style ?>">
            <?= $btn_label ?>
          </button>
          <?php else: ?>
          <button disabled style="padding:.65rem 1.75rem;background:rgba(255,255,255,.05);color:var(--muted);border:1px solid var(--border);border-radius:10px;cursor:not-allowed;font-size:.9rem">
            Registration Not Yet Open
          </button>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- REGISTRATION MODAL -->
<div id="modal" style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.75);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);align-items:center;justify-content:center;padding:1.5rem">
  <div style="background:var(--card);border:1px solid var(--border);border-radius:20px;padding:2.5rem;width:100%;max-width:480px;position:relative;max-height:90vh;overflow-y:auto">
    <button onclick="closeForm()" style="position:absolute;top:1.25rem;right:1.25rem;background:rgba(255,255,255,.06);border:1px solid var(--border);color:var(--muted);width:32px;height:32px;border-radius:50%;cursor:pointer;font-size:1.1rem;line-height:1;display:flex;align-items:center;justify-content:center">✕</button>
    <h2 style="font-family:var(--h);font-size:1.5rem;font-weight:700;margin-bottom:.3rem">Volunteer Registration</h2>
    <p id="modal-drive-info" style="color:var(--red);font-size:.875rem;font-weight:600;margin-bottom:.2rem"></p>
    <p id="modal-drive-meta" style="color:var(--muted);font-size:.8rem;margin-bottom:1.5rem"></p>

    <div id="successMsg" style="display:none;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.3);color:#6EE7B7;padding:1rem;border-radius:10px;margin-bottom:1rem;text-align:center;font-size:.9rem">
      ✓ You're registered! We'll send confirmation details to your email shortly.
    </div>

    <form class="join-form" id="joinForm">
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Full Name *</label>
      <input type="text" name="name" placeholder="Juan dela Cruz" required>
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Email Address *</label>
      <input type="email" name="email" placeholder="you@email.com" required>
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Phone Number *</label>
      <input type="tel" name="phone" placeholder="+63 9XX XXX XXXX" required>
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Barangay / City *</label>
      <input type="text" name="location" placeholder="Your barangay and city" required>
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Group Size</label>
      <select name="group">
        <option value="1">Just me (1 person)</option>
        <option value="2-5">Small group (2–5)</option>
        <option value="6-15">Medium group (6–15)</option>
        <option value="16+">Large group (16+)</option>
      </select>
      <label style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase">Notes (optional)</label>
      <textarea name="notes" rows="3" placeholder="Skills, equipment, or special needs..."></textarea>
      <button type="submit" class="btn-primary" style="width:100%;margin-top:.25rem">Confirm Registration</button>
    </form>
  </div>
</div>

<!-- PREP INFO -->
<section class="section" style="padding-top:0">
  <div class="section-label">Preparation</div>
  <h2 class="section-title">What to Bring &amp; <span>Expect</span></h2>
  <div class="grid-2" style="margin-top:2rem">
    <div class="card">
      <h3 style="margin-bottom:1rem">Bring with You</h3>
      <?php foreach(['Comfortable closed-toe shoes','Long sleeves and pants','Water bottle and light snacks','Your registration confirmation (screenshot)','Positive energy and community spirit!'] as $item): ?>
      <div style="display:flex;gap:.75rem;align-items:center;margin-bottom:.6rem">
        <span style="width:6px;height:6px;border-radius:50%;background:var(--red);flex-shrink:0"></span>
        <span style="color:var(--muted);font-size:.9rem"><?= $item ?></span>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="card">
      <h3 style="margin-bottom:1rem">We Provide</h3>
      <?php foreach(['Rubber gloves and face masks','Trash bags and cleaning tools','Mosquito repellent spray','Refreshments during the drive','Certificate of Participation'] as $item): ?>
      <div style="display:flex;gap:.75rem;align-items:center;margin-bottom:.6rem">
        <span style="width:6px;height:6px;border-radius:50%;background:#10B981;flex-shrink:0"></span>
        <span style="color:var(--muted);font-size:.9rem"><?= $item ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<footer class="site-footer">
  <p>&copy; <?php echo date('Y'); ?> Dengue Alert Philippines &nbsp;|&nbsp; In partnership with DOH &amp; local LGUs &nbsp;|&nbsp; <a href="contact.php">Contact Us</a></p>
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
function openForm(id, title, location, dateStr){
  document.getElementById('modal-drive-info').textContent = title;
  document.getElementById('modal-drive-meta').textContent = location + ' · ' + dateStr;
  document.getElementById('successMsg').style.display='none';
  document.getElementById('joinForm').style.display='block';
  document.getElementById('joinForm').reset();
  document.getElementById('modal').style.display='flex';
  document.body.style.overflow='hidden';
}
function closeForm(){
  document.getElementById('modal').style.display='none';
  document.body.style.overflow='';
}
document.getElementById('modal').addEventListener('click',function(e){
  if(e.target===this) closeForm();
});
document.getElementById('joinForm').addEventListener('submit',function(e){
  e.preventDefault();
  document.getElementById('successMsg').style.display='block';
  this.style.display='none';
});
</script>
</body>
</html>
