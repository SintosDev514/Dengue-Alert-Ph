<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dengue awareness, symptoms, prevention tips and facts from Dengue Alert Philippines.">
  <title>Awareness – Dengue Alert Philippines</title>
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
      <li><a href="awareness.php" class="active">Awareness</a></li>
      <li><a href="stats.php">Statistics</a></li>
      <li><a href="cleanup.php">Clean-up Drives</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="Auth/index.php">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- PAGE HEADER -->
<div style="padding:120px 2rem 60px;max-width:1200px;margin:0 auto">
  <div class="section-label">Public Health</div>
  <h1 style="font-family:var(--h);font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem">Dengue Awareness &amp; Prevention</h1>
  <p style="color:var(--muted);font-size:1.05rem;max-width:620px;line-height:1.8">Understanding dengue fever is the first step to stopping its spread. Learn the facts, recognize symptoms early, and take action to protect your family and community.</p>
</div>

<!-- WHAT IS DENGUE -->
<section class="section" style="padding-top:0">
  <div class="grid-2">
    <div class="card">
      <div class="card-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
      </div>
      <h3>What is Dengue?</h3>
      <p>Dengue fever is a mosquito-borne viral infection caused by the dengue virus. It is transmitted by female <em>Aedes aegypti</em> mosquitoes. Around 400 million people are infected globally each year, with the Philippines being one of the most affected countries in Asia.</p>
    </div>
    <div class="card">
      <div class="card-icon amber">
        <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
      </div>
      <h3>Know the Symptoms</h3>
      <p>Symptoms appear 4–10 days after an infected mosquito bite and typically last 2–7 days. Seek medical attention immediately if you experience:</p>
      <ul style="list-style:none;margin-top:.75rem;padding:0">
        <li style="color:var(--muted);font-size:.9rem;padding:.3rem 0 .3rem 1.2rem;position:relative"><span style="position:absolute;left:0;color:var(--red);font-weight:700">–</span>High fever (40°C / 104°F)</li>
        <li style="color:var(--muted);font-size:.9rem;padding:.3rem 0 .3rem 1.2rem;position:relative"><span style="position:absolute;left:0;color:var(--red);font-weight:700">–</span>Severe headache and pain behind the eyes</li>
        <li style="color:var(--muted);font-size:.9rem;padding:.3rem 0 .3rem 1.2rem;position:relative"><span style="position:absolute;left:0;color:var(--red);font-weight:700">–</span>Muscle and joint pain</li>
        <li style="color:var(--muted);font-size:.9rem;padding:.3rem 0 .3rem 1.2rem;position:relative"><span style="position:absolute;left:0;color:var(--red);font-weight:700">–</span>Nausea, vomiting, and skin rash</li>
        <li style="color:var(--muted);font-size:.9rem;padding:.3rem 0 .3rem 1.2rem;position:relative"><span style="position:absolute;left:0;color:var(--red);font-weight:700">–</span>Bleeding gums or nose (severe dengue)</li>
      </ul>
    </div>
  </div>
</section>

<!-- EDUCATIONAL VIDEO -->
<section class="section" style="padding-top:0">
  <div class="section-label">Educational Videos</div>
  <h2 class="section-title">Understanding <span>Mosquito Bites</span></h2>
  <p class="section-sub">Watch these scientific documentaries to understand exactly how mosquitoes find blood vessels and what happens to your body during a bite.</p>
  
  <div class="grid-2" style="margin-top:2rem">
    
    <!-- Video 1 -->
    <div style="border-radius:16px; overflow:hidden; border:1px solid var(--border); box-shadow:0 12px 30px rgba(0,0,0,.4);">
      <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
        <iframe style="position:absolute; top:0; left:0; width:100%; height:100%;" src="https://www.youtube.com/embed/rD8SmacBUcU?si=K87DggTp9TPFxsha" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div style="padding:1.25rem; background:var(--card);">
        <h3 style="font-size:1.05rem; margin-bottom:.3rem;">How Mosquitoes Use Six Needles to Suck Your Blood</h3>
        <p style="color:var(--muted); font-size:.85rem;">Deep Look documentary on mosquito anatomy.</p>
      </div>
    </div>

    <!-- Video 2 -->
    <div style="border-radius:16px; overflow:hidden; border:1px solid var(--border); box-shadow:0 12px 30px rgba(0,0,0,.4);">
      <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
        <iframe style="position:absolute; top:0; left:0; width:100%; height:100%;" src="https://www.youtube.com/embed/91X8RcJBFwA?si=fhv1eaPGArILpcKk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div style="padding:1.25rem; background:var(--card);">
        <h3 style="font-size:1.05rem; margin-bottom:.3rem;">What Happens to Your Body When a Mosquito Bites You</h3>
        <p style="color:var(--muted); font-size:.85rem;">The body's immune response to mosquito bites.</p>
      </div>
    </div>

  </div>
</section>


<!-- PREVENTION -->
<section class="section" style="padding-top:0">
  <div class="section-label">Prevention</div>
  <h2 class="section-title">5S Strategy to <span>Prevent Dengue</span></h2>
  <p class="section-sub">The Department of Health recommends the 5S approach — a proven method to reduce mosquito populations in your community.</p>
  <div class="grid-3" style="margin-top:2rem">

    <div class="card">
      <div style="font-family:var(--h);font-size:2.5rem;font-weight:800;color:var(--red);margin-bottom:.75rem">01</div>
      <h3>Search &amp; Destroy</h3>
      <p>Regularly inspect your surroundings for stagnant water — flower pots, tires, roof gutters, and containers. Empty or remove them immediately.</p>
    </div>

    <div class="card">
      <div style="font-family:var(--h);font-size:2.5rem;font-weight:800;color:var(--red);margin-bottom:.75rem">02</div>
      <h3>Self-protection</h3>
      <p>Use DOH-approved mosquito repellents, wear long sleeves and pants, and install window screens to prevent bites during daytime hours.</p>
    </div>

    <div class="card">
      <div style="font-family:var(--h);font-size:2.5rem;font-weight:800;color:var(--red);margin-bottom:.75rem">03</div>
      <h3>Seek Early Treatment</h3>
      <p>Do not wait. Consult your Barangay Health Center or hospital at the first sign of fever lasting more than two days.</p>
    </div>

    <div class="card">
      <div style="font-family:var(--h);font-size:2.5rem;font-weight:800;color:var(--red);margin-bottom:.75rem">04</div>
      <h3>Support Fogging</h3>
      <p>Cooperate with local government unit fogging operations during outbreaks. Fogging is most effective when combined with source reduction.</p>
    </div>

    <div class="card">
      <div style="font-family:var(--h);font-size:2.5rem;font-weight:800;color:var(--red);margin-bottom:.75rem">05</div>
      <h3>Say Yes to Dengvaxia</h3>
      <p>If you or your child is between 9–45 years old and has had a confirmed previous dengue infection, talk to your doctor about vaccination.</p>
    </div>

    <div class="card" style="border-color:rgba(220,38,38,.2);background:rgba(220,38,38,.04)">
      <div class="card-icon" style="margin-bottom:1rem">
        <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.23 2 2 0 012 .02h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
        </svg>
      </div>
      <h3>DOH Hotline</h3>
      <p>Call <strong style="color:var(--text)">1555</strong> for free 24/7 medical information, dengue case reporting, and health emergency assistance anywhere in the Philippines.</p>
    </div>

  </div>
</section>

<!-- DB CONTENT -->
<?php
try {
  include "Auth/db.php";
  $stmt = mysqli_prepare($conn, "SELECT content FROM content_sections WHERE section_name='awareness' LIMIT 1");
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
  <p>&copy; <?php echo date('Y'); ?> Dengue Alert Philippines &nbsp;|&nbsp; Source: DOH Philippines &nbsp;|&nbsp; <a href="contact.php">Contact Us</a></p>
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