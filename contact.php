<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact Dengue Alert Philippines. Reach out for dengue information, emergency hotlines, and community support.">
  <title>Contact – Dengue Alert Philippines</title>
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
      <li><a href="contact.php" class="active">Contact</a></li>
      <li><a href="Auth/index.php">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- PAGE HEADER -->
<div style="padding:120px 2rem 60px;max-width:1200px;margin:0 auto">
  <div class="section-label">Get in Touch</div>
  <h1 style="font-family:var(--h);font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem">Contact Us</h1>
  <p style="color:var(--muted);font-size:1.05rem;max-width:560px;line-height:1.8">Have questions about dengue? Want to report an outbreak? Reach us through any of the channels below. For medical emergencies call <strong style="color:var(--text)">1555</strong> immediately.</p>
</div>

<!-- CONTACT CHANNELS -->
<section class="section" style="padding-top:0">
  <div class="grid-3">

    <div class="card">
      <div class="card-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.23 2 2 0 012 .02h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
        </svg>
      </div>
      <h3>Emergency Hotline</h3>
      <p style="margin-bottom:.5rem">DOH 24/7 Health Emergency Line</p>
      <p style="font-size:1.5rem;font-weight:700;color:var(--text);font-family:var(--h)">1555</p>
      <p style="font-size:.8rem;margin-top:.25rem">Toll-free, available nationwide</p>
    </div>

    <div class="card">
      <div class="card-icon blue">
        <svg viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
        </svg>
      </div>
      <h3>Email Support</h3>
      <p style="margin-bottom:.5rem">For general inquiries and reports</p>
      <p style="font-size:1rem;font-weight:600;color:var(--text)">info@denguealert.ph</p>
      <p style="font-size:.8rem;margin-top:.25rem">Response within 24–48 hours</p>
    </div>

    <div class="card">
      <div class="card-icon green">
        <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
        </svg>
      </div>
      <h3>Office Hours</h3>
      <p style="margin-bottom:.5rem">Our team is available</p>
      <p style="font-size:1rem;font-weight:600;color:var(--text)">Mon – Fri, 8:00 AM – 5:00 PM</p>
      <p style="font-size:.8rem;margin-top:.25rem">Philippine Standard Time (PST)</p>
    </div>

  </div>
</section>

<!-- CONTACT FORM + FAQ -->
<div style="max-width:1200px;margin:0 auto;padding:0 2rem 100px;display:grid;grid-template-columns:1fr 1fr;gap:2rem;align-items:start">

  <!-- FORM -->
  <div class="card" style="padding:2.5rem">
    <h2 style="font-family:var(--h);font-size:1.5rem;font-weight:700;margin-bottom:.4rem">Send a Message</h2>
    <p style="color:var(--muted);font-size:.9rem;margin-bottom:2rem">Fill out the form and we'll get back to you as soon as possible.</p>
    <form id="contactForm">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="e.g. Juan dela Cruz" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@email.com" required>
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <select id="subject" name="subject" required style="width:100%;padding:.875rem 1rem;background:var(--dark);border:1.5px solid var(--border);border-radius:10px;color:var(--text);font-family:var(--b);font-size:.95rem">
          <option value="">Select a topic</option>
          <option value="dengue-info">Dengue Information</option>
          <option value="prevention">Prevention Questions</option>
          <option value="case-report">Case Reporting</option>
          <option value="general">General Inquiry</option>
        </select>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" placeholder="Describe your concern in detail..." required></textarea>
      </div>
      <div id="formMsg" style="display:none;margin-bottom:1rem"></div>
      <button type="submit" class="btn-primary" style="width:100%;display:block">Send Message</button>
    </form>
  </div>

  <!-- FAQ -->
  <div style="display:flex;flex-direction:column;gap:1rem">
    <div class="section-label">FAQ</div>
    <h2 style="font-family:var(--h);font-size:1.5rem;font-weight:700;margin-bottom:.5rem">Common Questions</h2>

    <div class="card" style="padding:1.5rem">
      <div style="display:flex;gap:1rem;align-items:flex-start">
        <div class="card-icon" style="width:36px;height:36px;min-width:36px;border-radius:8px">
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <div>
          <h3 style="font-size:.95rem;margin-bottom:.35rem">What should I do if I suspect dengue?</h3>
          <p style="font-size:.875rem">Seek medical attention immediately. Do not self-medicate. Visit your nearest Barangay Health Center or hospital for testing.</p>
        </div>
      </div>
    </div>

    <div class="card" style="padding:1.5rem">
      <div style="display:flex;gap:1rem;align-items:flex-start">
        <div class="card-icon green" style="width:36px;height:36px;min-width:36px;border-radius:8px">
          <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
        </div>
        <div>
          <h3 style="font-size:.95rem;margin-bottom:.35rem">Is there a dengue vaccine available?</h3>
          <p style="font-size:.875rem">Yes. Dengvaxia is available for those aged 9–45 with a prior confirmed dengue infection. Consult your doctor to assess eligibility.</p>
        </div>
      </div>
    </div>

    <div class="card" style="padding:1.5rem">
      <div style="display:flex;gap:1rem;align-items:flex-start">
        <div class="card-icon blue" style="width:36px;height:36px;min-width:36px;border-radius:8px">
          <svg viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div>
          <h3 style="font-size:.95rem;margin-bottom:.35rem">How long does dengue fever last?</h3>
          <p style="font-size:.875rem">Symptoms typically last 7–10 days. Most patients recover fully with rest, hydration, and proper medical monitoring.</p>
        </div>
      </div>
    </div>

    <div class="card" style="padding:1.5rem">
      <div style="display:flex;gap:1rem;align-items:flex-start">
        <div class="card-icon amber" style="width:36px;height:36px;min-width:36px;border-radius:8px">
          <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div>
          <h3 style="font-size:.95rem;margin-bottom:.35rem">When are Aedes mosquitoes most active?</h3>
          <p style="font-size:.875rem">Aedes mosquitoes bite primarily during early morning and late afternoon, but can bite throughout the day in shaded areas.</p>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="site-footer">
  <p>&copy; <?php echo date('Y'); ?> Dengue Alert Philippines &nbsp;|&nbsp; Emergency: <strong>1555</strong> &nbsp;|&nbsp; <a href="awareness.php">Prevention Tips</a></p>
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
document.getElementById('contactForm').addEventListener('submit',function(e){
  e.preventDefault();
  const msg=document.getElementById('formMsg');
  msg.style.display='block';
  msg.style.background='rgba(16,185,129,.1)';
  msg.style.border='1px solid rgba(16,185,129,.3)';
  msg.style.color='#6EE7B7';
  msg.style.padding='.75rem 1rem';
  msg.style.borderRadius='8px';
  msg.style.fontSize='.875rem';
  msg.textContent='Thank you! Your message has been sent. We will respond within 24 hours.';
  this.reset();
});
// Animate progress bars on scroll
document.querySelectorAll('[data-width]').forEach(el=>{
  el.style.width=el.dataset.width+'%';
});
</script>
</body>
</html>