<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Portefeuille Crypto</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-firestore-compat.js"></script>
<style>
body {
    margin:0; padding:0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg,#1877f2,#6ea0f8);
    display:flex; justify-content:center; align-items:center; min-height:100vh;
}
.container {
    background:white; width:90%; max-width:500px; padding:30px 25px;
    border-radius:20px; box-shadow:0 10px 25px rgba(24,119,242,.4);
    text-align:center;
}
h2 { color:#1877f2; margin-bottom:25px; font-weight:700; }
button {
    margin-top:20px; width:100%; padding:12px 0; font-size:16px;
    border:none; border-radius:12px; cursor:pointer;
    background:#1877f2; color:white; font-weight:600;
    transition:background 0.3s ease, transform 0.15s ease;
}
button:hover { background:#145dbf; transform:scale(1.05); }
.wallet-info { text-align:left; margin-top:20px; font-size:16px; }
.wallet-info p { margin:8px 0; }
</style>
</head>
<body>

<div class="container">
    <h2>Portefeuille Crypto</h2>

    <div class="wallet-info">
        <p><strong>Solde BTC :</strong> <span id="btc">0</span></p>
        <p><strong>Solde ETH :</strong> <span id="eth">0</span></p>
        <p><strong>Solde USDT :</strong> <span id="usdt">0</span></p>
    </div>

    <button id="refreshBtn">Actualiser</button>
    <button id="backBtn">Retour au Dashboard</button>
</div>

<script>
// Config Firebase (identique au dashboard)
const firebaseConfig = {
    apiKey: "AIzaSyAzcnb-eswHt_pDi7tCvcIBzlzejCprJfE",
    authDomain: "mitalky.firebaseapp.com",
    projectId: "mitalky",
    storageBucket: "mitalky.appspot.com",
    messagingSenderId: "753557195623",
    appId: "1:753557195623:web:abc3b37eca5d67c9157dc2"
};

firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();
const db = firebase.firestore();

// Vérifier si user connecté
auth.onAuthStateChanged(user=>{
    if(!user){
        window.location.href="login.html";
    } else {
        loadWallet(user.uid);
    }
});

// Charger portefeuille
function loadWallet(uid){
    db.collection("wallets").doc(uid).get().then(doc=>{
        if(doc.exists){
            const data = doc.data();
            document.getElementById("btc").innerText = data.btc || 0;
            document.getElementById("eth").innerText = data.eth || 0;
            document.getElementById("usdt").innerText = data.usdt || 0;
        }
    });
}

// Actualiser
document.getElementById("refreshBtn").addEventListener("click", ()=>{
    const user = auth.currentUser;
    if(user) loadWallet(user.uid);
});

// Retour dashboard
document.getElementById("backBtn").addEventListener("click", ()=>{
    window.location.href="dashboard.html";
});
</script>

</body>
</html>
