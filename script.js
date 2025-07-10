let trx = 0;
let interval;

function startMining() {
  const email = document.getElementById("email").value;
  if (!email || !email.includes("@")) {
    alert("Ampidiro mail FaucetPay marina");
    return;
  }

  document.getElementById("miningBox").style.display = "block";
  document.getElementById("status").innerText = "Miketrika...";
  trx = 0;
  document.getElementById("amount").innerText = trx;

  interval = setInterval(() => {
    trx++;
    document.getElementById("amount").innerText = trx;

    if (trx >= 25) { // Ato no hajanona amin'ny 25 TRX test
      clearInterval(interval);
      document.getElementById("status").innerText = "Vita!";
      sendFakeClaim(email, trx);
    }
  }, 1000);
}

function sendFakeClaim(email, amount) {
  // Ity no simulation fotsiny fa tsy tena API
  document.getElementById("result").innerText =
    `✅ Nandefa ${amount} TRX ho any amin'ny FaucetPay (test). Jereo ny mail: ${email}`;
}
