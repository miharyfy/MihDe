<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: nextpage.php");
    exit;
}
require 'db.php';

$stmt = $pdo->prepare("SELECT balance FROM users WHERE id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch();
$balance = $user['balance'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > 0 && $amount <= $balance) {
        $stmt = $pdo->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
        $stmt->execute([$amount, $_SESSION['id']]);
        header("Location: wallet.php");
        exit;
    } else {
        $error = "Montant invalide ou supérieur au solde.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Retirer Crypto</title>
</head>
<body>
<h2>Retirer Crypto</h2>
<p>Solde actuel: <?php echo $balance; ?> BTC</p>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Montant à retirer: <input type="number" step="0.0001" name="amount" required>
    <button type="submit">Retirer</button>
</form>
<a href="wallet.php">Retour au portefeuille</a>
</body>
</html>
