<?php
// Mampiasa session hitahirizana ny dingana (step) tsy hita ao amin'ny HTML
session_start();

// Lisitry ny hafatra mifandraika amin'ny portefeuille crypto
$steps = [
  "Cette application vous aide à gérer votre portefeuille crypto plus facilement.",
  "Vos opérations sont signées côté serveur : vos clés sensibles ne sont jamais exposées au navigateur.",
  "Mises à jour régulières pour plus de sécurité. Allons-y !"
];

// Maka step ankehitriny
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 0;
}
$step = (int) $_SESSION['step'];

// Fametrahana redirect/refresh server-side (tsy hita amin'ny View Source)
if ($step < count($steps) - 1) {
    header("Refresh: 5"); // havaozina isaky ny 5 segondra
} else {
    header("Refresh: 1; url=nextpage.php"); // avy dia mipetraka amin'ny pejy manaraka
}

// Manomana sanda aseho
$currentText = $steps[$step];

// Manavao ny step ho an'ny request manaraka
$_SESSION['step'] = ($step < count($steps) - 1) ? $step + 1 : 0;
?>
<!DOCTYPE html>
<html lang="mg">
<head>
  <meta charset="UTF-8" />
  <title>Portefeuille Crypto - Mi-talky</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      margin: 0; padding: 0;
      font-family: Arial, sans-serif;
      background-color: #e9ebee;
      display: flex; justify-content: center; align-items: center;
      height: 100vh;
    }
    .container {
      background-color: white;
      width: 90%; max-width: 420px;
      padding: 50px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,.3);
      border: 3px solid #1877f2;
      outline: 4px solid #cde0ff; outline-offset: -10px;
      text-align: center;
      transition: transform .3s ease, box-shadow .3s ease;
      position: relative; overflow: hidden;
    }
    .container:hover { transform: scale(1.01); box-shadow: 0 6px 20px rgba(0,0,0,.35); }
    .circle {
      width: 140px; height: 140px; border-radius: 50%;
      overflow: hidden; border: 2px solid #1877f2;
      margin: 0 auto 25px; display: flex; justify-content: center; align-items: center;
    }
    .circle img { width: 100%; height: 100%; object-fit: cover; }
    .title {
      font-size: 26px; margin-bottom: 25px;
      color: #1877f2; font-weight: bold;
    }
    .dot-text-container { position: relative; min-height: 50px; margin: 30px 0; }
    .dot-text {
      display: inline-flex; align-items: center; gap: 10px;
      font-size: 16px; color: #444; max-width: 350px; text-align: left;
    }
    .dot-circle { width: 16px; height: 16px; background: #1877f2; border-radius: 50%; flex-shrink: 0; }
    .hint { font-size: 12px; color: #777; margin-top: 18px; }
  </style>
</head>
<body>
  <div class="container">
    <div class="circle">
      <img src="platform.png" alt="Plateforme" />
    </div>

    <h2 class="title">Portefeuille Crypto</h2>

    <div class="dot-text-container">
      <div class="dot-text">
        <div class="dot-circle"></div>
        <span><?= htmlspecialchars($currentText, ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
    </div>

    <div class="hint">
      Étape <?= ($step + 1) ?>/<?= count($steps) ?> • Actualisation automatique
    </div>
  </div>
</body>
</html>
