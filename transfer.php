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
    $to_email = $_POST['to_email'];
    if ($amount > 0 && $amount <= $balance) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$to_email]);
        $recipient = $stmt->fetch();
        if ($recipient) {
            // Déduire du compte expéditeur
            $stmt = $pdo->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
            $stmt->execute([$amount, $_SESSION['id']]);
            // Ajouter au compte destinataire
            $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
            $stmt->execute([$amount, $recipient['id']]);
            header("Location: wallet.php");
            exit;
        } else {
            $error = "Destinataire introuvable.";
        }
    } else {
        $error = "Montant invalide ou supérieur au solde.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Transférer Crypto</title>
</head>
<body>
<h2>Transférer Crypto</h2>
<p>Solde actuel: <?php echo $balance; ?> BTC</p>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Montant à transférer: <input type="number" step="0.0001" name="amount" required><br>
    Email destinataire: <input type="email" name="to_email" required><br>
    <button type="submit">Transférer</button>
</form>
<a href="wallet.php">Retour au portefeuille</a>
</body>
</html>
