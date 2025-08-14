<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: nextpage.php");
    exit;
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > 0) {
        $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        $stmt->execute([$amount, $_SESSION['id']]);
        header("Location: wallet.php");
        exit;
    } else {
        $error = "Montant invalide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Déposer Crypto</title>
</head>
<body>
<h2>Déposer Crypto</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Montant à déposer: <input type="number" step="0.0001" name="amount" required>
    <button type="submit">Déposer</button>
</form>
<a href="wallet.php">Retour au portefeuille</a>
</body>
</html>
