let currentStep = 0;

function updateDots() {
  const dots = document.querySelectorAll(".dot");
  dots.forEach((dot, index) => {
    dot.classList.toggle("active", index === currentStep);
  });
}

function next() {
  currentStep = (currentStep + 1) % 3;
  updateDots();
}

function skip() {
  currentStep = 2;
  updateDots();
}
