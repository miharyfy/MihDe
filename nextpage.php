<!DOCTYPE html>
<html lang="mg">
<head>
  <meta charset="UTF-8" />
  <title>Inscription / Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
      animation: fadeInUp 0.7s ease forwards;
    }
    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    input, button {
      width: 100%;
      margin: 8px 0;
      padding: 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
      box-sizing: border-box;
      outline-offset: 2px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input:focus {
      border-color: #1877f2;
      box-shadow: 0 0 8px rgba(24,119,242,0.5);
    }
    button {
      background-color: #1877f2;
      color: white;
      border: none;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.15s ease;
      user-select: none;
    }
    button:hover { background-color: #0f5dc8; transform: scale(1.05); }
    button:active { transform: scale(0.98); }
    p.error {
      color: red;
      font-size: 14px;
      min-height: 20px;
      opacity: 0;
      transition: opacity 0.4s ease;
      margin: 5px 0 0 0;
    }
    p.error.visible { opacity: 1; }
    .password-wrapper { position: relative; width: 100%; }
    .password-wrapper input { padding-right: 40px; }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      width: 24px;
      height: 24px;
      cursor: pointer;
      fill: #888;
      transition: fill 0.3s ease, transform 0.3s ease;
      user-select: none;
    }
    .toggle-password:hover { fill: #1877f2; transform: translateY(-50%) scale(1.1); }
    .toggle-password.active { fill: #1877f2; transform: translateY(-50%) scale(1.2) rotate(20deg); }
    #resetPasswordSection { display: none; margin-top: 10px; }
    #resetPasswordSection input, #resetPasswordSection button { margin-top: 8px; }
    h2 { margin-bottom: 15px; }
  </style>
</head>
<body>

<div class="container">
  <h2>Inscription / Connexion</h2>

  <form method="POST" action="nextpage.php" id="authForm">
    <input name="email" type="email" placeholder="Email" autocomplete="email" required />
    <div class="password-wrapper">
      <input name="password" type="password" placeholder="Mot de passe" autocomplete="current-password" required />
      <svg id="togglePassword" class="toggle-password" viewBox="0 0 24 24" >
        <path d="M12 5c-7 0-11 7-11 7s4 7 11 7 11-7 11-7-4-7-11-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
        <circle cx="12" cy="12" r="2.5"/>
      </svg>
    </div>

    <button type="submit" name="action" value="signup">S'inscrire</button>
    <button type="submit" name="action" value="login">Se connecter</button>
  </form>

  <button id="showResetBtn" style="margin-top: 10px; background: none; color: #1877f2; border:none; cursor:pointer; text-decoration: underline;">Mot de passe oublié ?</button>

  <div id="resetPasswordSection">
    <form method="POST" action="nextpage.php">
      <input name="resetEmail" type="email" placeholder="Entrez votre email pour réinitialiser" required />
      <button type="submit" name="action" value="reset">Envoyer lien de réinitialisation</button>
    </form>
  </div>

  <p class="error" id="error"></p>
</div>

<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.querySelector('.password-wrapper input');
  const showResetBtn = document.getElementById('showResetBtn');
  const resetPasswordSection = document.getElementById('resetPasswordSection');

  togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.classList.toggle('active');
  });

  showResetBtn.addEventListener('click', () => {
    resetPasswordSection.style.display = resetPasswordSection.style.display === 'block' ? 'none' : 'block';
  });
</script>

</body>
</html>
