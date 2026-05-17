<?php
include "db.php";
session_start();

$msg = "";

if (isset($_POST["login"])) {
  $email = strtolower(trim($_POST["email"]));
  $password = $_POST["password"];

  $stmt = mysqli_prepare($conn, "SELECT id,email,password,is_verified FROM users WHERE email=? LIMIT 1");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $user = mysqli_fetch_assoc($res);

  if ($user && (int)$user["is_verified"] === 1 && password_verify($password, $user["password"])) {
    $_SESSION["email"] = $user["email"];
    header("Location: dashboard.php");
    exit;
  } else {
    $msg = "Invalid credentials or account not yet verified.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login – Dengue Alert Philippines</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-div">
    <div class="logo">
      <a href="../index.php"><img src="Dengue-Logo.png" alt="Dengue Alert Philippines"></a>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="../index.php">Home</a></li>
      <li><a href="../awareness.php">Awareness</a></li>
      <li><a href="../stats.php">Statistics</a></li>
      <li><a href="../contact.php">Contact</a></li>
      <li><a href="#" class="active">Login</a></li>
    </ul>
    <button class="hamburger" id="hamburger" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="login-container">
  <div class="login-box">

    <!-- Logo -->
    <div style="text-align:center;margin-bottom:1.5rem">
      <img src="Dengue-Logo.png" alt="Logo" style="height:52px;filter:drop-shadow(0 0 10px rgba(220,38,38,.5))">
    </div>

    <h2 style="margin-bottom:.3rem">Welcome Back</h2>
    <p style="color:var(--muted);font-size:.875rem;text-align:center;margin-bottom:1.75rem">Sign in to access the admin dashboard</p>

    <?php if (!empty($msg)): ?>
      <p class="error"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>

    <form method="POST">
      <div class="form-group" style="margin-bottom:0">
        <label for="email" style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.4rem;letter-spacing:.04em;text-transform:uppercase">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@email.com" required>
      </div>
      <div class="form-group" style="margin-bottom:0">
        <label for="password" style="display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:.4rem;letter-spacing:.04em;text-transform:uppercase">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login" style="margin-top:.25rem">Sign In</button>
    </form>

    <!-- Removed links as requested: single admin account only -->

    <p style="text-align:center;margin-top:2rem;font-size:.8rem;color:var(--muted)">
      <a href="../index.php" style="color:var(--muted);text-decoration:none">
        ← Back to Dengue Alert Philippines
      </a>
    </p>

  </div>
</div>

<script>
function toggleMenu(){
  document.getElementById('navLinks').classList.toggle('active');
  document.getElementById('hamburger').classList.toggle('active');
}
</script>
</body>
</html>