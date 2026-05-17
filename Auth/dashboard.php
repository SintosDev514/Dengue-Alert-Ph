<?php
include "db.php";
session_start();

if (!isset($_SESSION["email"])) {
  header("Location: index.php");
  exit;
}

$

$msg = "";
$msgType = "success";

// ── Handle content section updates ──
if (isset($_POST["update_content"])) {
  $section = $_POST["section"];
  $title   = trim($_POST["title"]);
  $content = trim($_POST["content"]);
  if (!empty($title) && !empty($content)) {
    $stmt = mysqli_prepare($conn, "UPDATE content_sections SET title=?, content=? WHERE section_name=?");
    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $section);
    mysqli_stmt_execute($stmt);
    $msg = "Content updated successfully.";
  } else {
    $msg = "Title and content cannot be empty.";
    $msgType = "error";
  }
}

// ── Handle new clean-up drive ──
if (isset($_POST["add_drive"])) {
  $dtitle  = trim($_POST["drive_title"]);
  $loc     = trim($_POST["drive_location"]);
  $date    = $_POST["drive_date"];
  $tstart  = trim($_POST["time_start"]);
  $tend    = trim($_POST["time_end"]);
  $slots   = (int)$_POST["slots"];
  $status  = $_POST["drive_status"];
  $desc    = trim($_POST["description"]);
  $org     = trim($_POST["organizer"]) ?: 'Dengue Alert Philippines';

  if ($dtitle && $loc && $date && $tstart && $tend && $desc) {
    $stmt = mysqli_prepare($conn,
      "INSERT INTO cleanup_drives (title,location,drive_date,time_start,time_end,slots,status,description,organizer)
       VALUES (?,?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "sssssisss", $dtitle, $loc, $date, $tstart, $tend, $slots, $status, $desc, $org);
    mysqli_stmt_execute($stmt);
    $msg = "Clean-up drive posted successfully.";
  } else {
    $msg = "Please fill in all required fields.";
    $msgType = "error";
  }
}

// ── Handle delete drive ──
if (isset($_POST["delete_drive"])) {
  $id = (int)$_POST["drive_id"];
  $stmt = mysqli_prepare($conn, "DELETE FROM cleanup_drives WHERE id=?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $msg = "Drive deleted.";
}

// ── Handle update drive status ──
if (isset($_POST["update_status"])) {
  $id     = (int)$_POST["drive_id"];
  $status = $_POST["new_status"];
  $stmt   = mysqli_prepare($conn, "UPDATE cleanup_drives SET status=? WHERE id=?");
  mysqli_stmt_bind_param($stmt, "si", $status, $id);
  mysqli_stmt_execute($stmt);
  $msg = "Drive status updated.";
}

// ── Fetch content sections ──
$sections = [];
$stmt = mysqli_prepare($conn, "SELECT * FROM content_sections ORDER BY id");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
  $sections[$row['section_name']] = $row;
}

// ── Fetch drives ──
$drives = [];
$r = mysqli_query($conn, "SELECT * FROM cleanup_drives ORDER BY drive_date ASC");
while ($d = mysqli_fetch_assoc($r)) {
  $drives[] = $d;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard – Dengue Alert Philippines</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .tab-nav{display:flex;gap:.5rem;margin-bottom:2rem;border-bottom:1px solid var(--border);padding-bottom:0}
    .tab-btn{background:none;border:none;color:var(--muted);font-family:var(--b);font-size:.9rem;font-weight:600;padding:.75rem 1.25rem;cursor:pointer;border-bottom:2px solid transparent;transition:.25s;margin-bottom:-1px}
    .tab-btn.active{color:var(--text);border-color:var(--red)}
    .tab-content{display:none}.tab-content.active{display:block}
    .drive-row{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:1.25rem 1.5rem;display:flex;gap:1rem;align-items:center;flex-wrap:wrap;margin-bottom:.75rem}
    .badge{display:inline-block;font-size:.72rem;font-weight:700;padding:.2rem .7rem;border-radius:50px;text-transform:uppercase;letter-spacing:.06em}
    .badge-open{background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.3);color:#6EE7B7}
    .badge-full{background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.3);color:#FCD34D}
    .badge-upcoming{background:rgba(59,130,246,.12);border:1px solid rgba(59,130,246,.3);color:#93C5FD}
    .badge-cancelled{background:rgba(220,38,38,.12);border:1px solid rgba(220,38,38,.3);color:#FCA5A5}
    .form-label{display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.35rem;letter-spacing:.04em;text-transform:uppercase}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
    .field input,.field select,.field textarea{width:100%;padding:.8rem 1rem;background:var(--dark);border:1.5px solid var(--border);border-radius:10px;color:var(--text);font-family:var(--b);font-size:.9rem;transition:.25s;margin-bottom:1rem}
    .field input:focus,.field select:focus,.field textarea:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(220,38,38,.12)}
    .field input::placeholder,.field textarea::placeholder{color:rgba(100,116,139,.5)}
    .field textarea{resize:vertical;min-height:100px}
    @media(max-width:640px){.form-row{grid-template-columns:1fr}.drive-row{flex-direction:column;align-items:flex-start}}
  </style>
</head>
<body>

<nav class="navbar">
  <div class="nav-div">
    <div class="logo">
      <a href="../index.php"><img src="Dengue-Logo.png" alt="Dengue Alert Philippines"></a>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="../index.php">Home</a></li>
      <li><a href="../cleanup.php">Clean-up Drives</a></li>
      <li><a href="logout.php" style="color:var(--red)">Logout</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()"><span></span><span></span><span></span></button>
  </div>
</nav>

<div class="dashboard-container">

  <!-- Header -->
  <div class="dashboard-header">
    <div class="section-label" style="justify-content:center;display:flex;margin-bottom:.5rem">Admin Panel</div>
    <h1 style="font-family:var(--h);font-size:2.2rem;font-weight:700;margin-bottom:.4rem">Content Dashboard</h1>
    <p style="color:var(--muted);font-size:.9rem">Logged in as <strong style="color:var(--text)"><?= htmlspecialchars($_SESSION['email']) ?></strong></p>
    <?php if (!empty($msg)): ?>
    <div style="margin-top:1rem;display:inline-block;background:<?= $msgType==='success' ? 'rgba(16,185,129,.1)' : 'rgba(220,38,38,.1)' ?>;border:1px solid <?= $msgType==='success' ? 'rgba(16,185,129,.3)' : 'rgba(220,38,38,.3)' ?>;color:<?= $msgType==='success' ? '#6EE7B7' : '#FCA5A5' ?>;padding:.65rem 1.25rem;border-radius:8px;font-size:.875rem">
      <?= htmlspecialchars($msg) ?>
    </div>
    <?php endif; ?>
  </div>

  <!-- TABS -->
  <div class="tab-nav">
    <button class="tab-btn active" onclick="switchTab('drives',this)">Clean-up Drives</button>
    <button class="tab-btn" onclick="switchTab('content',this)">Page Content</button>
  </div>

  <!-- ═══════════ TAB: DRIVES ═══════════ -->
  <div class="tab-content active" id="tab-drives">

    <!-- ADD NEW DRIVE FORM -->
    <div class="section-card" style="margin-bottom:2rem">
      <h3 style="font-size:1.1rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:.75rem">
        <div class="card-icon" style="width:36px;height:36px;min-width:36px;border-radius:8px">
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        </div>
        Post a New Clean-up Drive
      </h3>
      <form method="POST">
        <div class="form-row">
          <div class="field">
            <label class="form-label">Drive Title *</label>
            <input type="text" name="drive_title" placeholder="e.g. Barangay San Isidro Community Drive" required>
          </div>
          <div class="field">
            <label class="form-label">Location *</label>
            <input type="text" name="drive_location" placeholder="e.g. San Isidro, Quezon City" required>
          </div>
        </div>
        <div class="form-row">
          <div class="field">
            <label class="form-label">Date *</label>
            <input type="date" name="drive_date" required min="<?= date('Y-m-d') ?>">
          </div>
          <div class="field">
            <label class="form-label">Organizer</label>
            <input type="text" name="organizer" placeholder="Dengue Alert Philippines">
          </div>
        </div>
        <div class="form-row">
          <div class="field">
            <label class="form-label">Start Time *</label>
            <input type="text" name="time_start" placeholder="7:00 AM" required>
          </div>
          <div class="field">
            <label class="form-label">End Time *</label>
            <input type="text" name="time_end" placeholder="12:00 PM" required>
          </div>
        </div>
        <div class="form-row">
          <div class="field">
            <label class="form-label">Volunteer Slots *</label>
            <input type="number" name="slots" value="50" min="1" required>
          </div>
          <div class="field">
            <label class="form-label">Status *</label>
            <select name="drive_status">
              <option value="open">Open – Slots Available</option>
              <option value="upcoming">Upcoming – Registration Not Yet Open</option>
              <option value="full">Full – Waitlist Open</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        <div class="field">
          <label class="form-label">Description *</label>
          <textarea name="description" placeholder="Describe the drive activities, focus areas, and what volunteers can expect..." required></textarea>
        </div>
        <button type="submit" name="add_drive" class="save-btn" style="padding:.875rem 2rem">Post Drive</button>
      </form>
    </div>

    <!-- EXISTING DRIVES -->
    <div class="section-label" style="margin-bottom:1rem">Posted Drives (<?= count($drives) ?>)</div>

    <?php if (empty($drives)): ?>
    <div style="background:var(--card);border:1px solid var(--border);border-radius:12px;padding:2.5rem;text-align:center;color:var(--muted)">
      No drives posted yet. Use the form above to post your first clean-up drive.
    </div>
    <?php else: ?>
      <?php foreach ($drives as $d):
        $badge_class = match($d['status']) {
          'full'      => 'badge-full',
          'upcoming'  => 'badge-upcoming',
          'cancelled' => 'badge-cancelled',
          default     => 'badge-open'
        };
        $status_label = match($d['status']) {
          'full'      => 'Full',
          'upcoming'  => 'Upcoming',
          'cancelled' => 'Cancelled',
          default     => 'Open'
        };
      ?>
      <div class="drive-row">
        <div style="flex:1;min-width:200px">
          <span class="badge <?= $badge_class ?>" style="margin-bottom:.4rem;display:inline-block"><?= $status_label ?></span>
          <div style="font-family:var(--h);font-weight:700;font-size:1rem;margin-bottom:.25rem"><?= htmlspecialchars($d['title']) ?></div>
          <div style="color:var(--muted);font-size:.85rem">
            <?= htmlspecialchars($d['location']) ?> &nbsp;·&nbsp;
            <?= date('M j, Y', strtotime($d['drive_date'])) ?> &nbsp;·&nbsp;
            <?= htmlspecialchars($d['time_start']) ?> – <?= htmlspecialchars($d['time_end']) ?> &nbsp;·&nbsp;
            <?= $d['slots'] ?> slots
          </div>
        </div>

        <!-- Change status -->
        <form method="POST" style="display:flex;gap:.5rem;align-items:center">
          <input type="hidden" name="drive_id" value="<?= $d['id'] ?>">
          <select name="new_status" style="padding:.5rem .75rem;background:var(--dark);border:1px solid var(--border);border-radius:8px;color:var(--text);font-size:.85rem;cursor:pointer">
            <option value="open"      <?= $d['status']==='open'      ? 'selected':'' ?>>Open</option>
            <option value="upcoming"  <?= $d['status']==='upcoming'  ? 'selected':'' ?>>Upcoming</option>
            <option value="full"      <?= $d['status']==='full'      ? 'selected':'' ?>>Full</option>
            <option value="cancelled" <?= $d['status']==='cancelled' ? 'selected':'' ?>>Cancelled</option>
          </select>
          <button type="submit" name="update_status" class="edit-btn" style="width:auto;padding:.5rem .9rem;font-size:.8rem">Update</button>
        </form>

        <!-- Delete -->
        <form method="POST" onsubmit="return confirm('Delete this drive?')">
          <input type="hidden" name="drive_id" value="<?= $d['id'] ?>">
          <button type="submit" name="delete_drive" style="background:rgba(220,38,38,.1);border:1px solid rgba(220,38,38,.3);color:#FCA5A5;padding:.5rem .9rem;border-radius:8px;cursor:pointer;font-size:.8rem;font-weight:600;transition:.25s">Delete</button>
        </form>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div><!-- /tab-drives -->

  <!-- ═══════════ TAB: CONTENT ═══════════ -->
  <div class="tab-content" id="tab-content">
    <div class="dashboard-grid">
      <?php
      $pages = [
        'home'      => ['Home Page',       'Edit the main landing page content.'],
        'awareness' => ['Awareness Page',  'Manage prevention tips and educational content.'],
        'stats'     => ['Statistics Page', 'Update dengue statistics data.'],
        'contact'   => ['Contact Page',    'Manage contact information.'],
      ];
      $icons = [
        'home'      => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
        'awareness' => '<path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/>',
        'stats'     => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
        'contact'   => '<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.23 2 2 0 012 .02h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>',
      ];
      foreach ($pages as $key => [$title, $desc]):
      ?>
      <div class="section-card">
        <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1rem">
          <div class="card-icon" style="width:42px;height:42px;min-width:42px;border-radius:10px">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px"><?= $icons[$key] ?></svg>
          </div>
          <div>
            <h3 style="font-size:1rem;margin-bottom:.1rem"><?= $title ?></h3>
            <p style="font-size:.8rem;margin:0"><?= $desc ?></p>
          </div>
        </div>
        <button class="edit-btn" onclick="toggleEdit('<?= $key ?>')">Edit Content</button>
        <form class="edit-form" id="<?= $key ?>-form" method="POST">
          <input type="hidden" name="section" value="<?= $key ?>">
          <div style="margin-bottom:.75rem">
            <label class="form-label">Page Title</label>
            <input type="text" name="title" placeholder="Page title" value="<?= htmlspecialchars($sections[$key]['title'] ?? '') ?>" required style="width:100%;padding:.75rem 1rem;background:var(--dark);border:1.5px solid var(--border);border-radius:8px;color:var(--text);font-family:var(--b);font-size:.875rem">
          </div>
          <div style="margin-bottom:.75rem">
            <label class="form-label">Content (HTML allowed)</label>
            <textarea name="content" required style="width:100%;padding:.75rem 1rem;background:var(--dark);border:1.5px solid var(--border);border-radius:8px;color:var(--text);font-family:var(--b);font-size:.875rem;min-height:160px;resize:vertical"><?= htmlspecialchars($sections[$key]['content'] ?? '') ?></textarea>
          </div>
          <div class="btn-group">
            <button type="submit" name="update_content" class="save-btn">Save</button>
            <button type="button" class="cancel-btn" onclick="toggleEdit('<?= $key ?>')">Cancel</button>
          </div>
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </div><!-- /tab-content -->

  <div style="text-align:center;margin-top:3rem;padding-bottom:3rem">
    <a href="logout.php" class="btn-primary" style="display:inline-block;width:auto;padding:.75rem 2rem;text-decoration:none">Sign Out</a>
  </div>

</div>

<script>
function toggleMenu(){
  document.getElementById('navLinks').classList.toggle('active');
  document.getElementById('hamburger').classList.toggle('active');
}
function toggleEdit(section){
  const form=document.getElementById(section+'-form');
  document.querySelectorAll('.edit-form').forEach(f=>{if(f!==form)f.classList.remove('show');});
  form.classList.toggle('show');
}
function switchTab(name, btn){
  document.querySelectorAll('.tab-content').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
  document.getElementById('tab-'+name).classList.add('active');
  btn.classList.add('active');
}
</script>
</body>
</html>
