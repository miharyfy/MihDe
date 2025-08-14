<?php
session_start();
require 'db.php'; // fichier pour connexion PDO/MySQL

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Récupération solde
$stmt = $pdo->prepare("SELECT balance FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
$balance = $user['balance'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Portefeuille Crypto</title>
<style>
body{font-family:Arial; max-width:600px;margin:20px auto;}
input,button{padding:10px;width:100%;margin:5px 0;border-radius:5px;}
button{cursor:pointer;background:#1877f2;color:#fff;border:none;}
button:hover{background:#145dbf;}
h2{color:#1877f2;}
.error{color:red;}
</style>
</head>
<body>
<h2>Portefeuille Crypto</h2>
<p>Solde actuel: <strong><?php echo $balance; ?> BTC</strong></p>

<h3>Dépôt</h3>
<form method="POST" action="deposit.php">
    <input type="number" step="0.00000001" name="amount" placeholder="Montant BTC à déposer" required>
    <button type="submit">Déposer</button>
</form>

<h3>Retrait</h3>
<form method="POST" action="withdraw.php">
    <input type="number" step="0.00000001" name="amount" placeholder="Montant BTC à retirer" required>
    <button type="submit">Retirer</button>
</form>

<h3>Transfert</h3>
<form method="POST" action="transfer.php">
    <input type="email" name="target_email" placeholder="Email destinataire" required>
    <input type="number" step="0.00000001" name="amount" placeholder="Montant BTC à transférer" required>
    <button type="submit">Transférer</button>
</form>

<a href="logout.php">Se déconnecter</a>
</body>
</html>
