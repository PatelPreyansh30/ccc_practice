let slideIndex = 0;

function showSlide(index) {
  const slides = document.querySelectorAll(".slides img");

  if (index >= slides.length) {
    slideIndex = 0;
  }
  if (index < 0) {
    slideIndex = slides.length - 1;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex].style.display = "block";
}

function nextSlide() {
  slideIndex++;
  showSlide(slideIndex);
}

function prevSlide() {
  slideIndex--;
  showSlide(slideIndex);
}

document.addEventListener("DOMContentLoaded", function () {
  showSlide(slideIndex);
  setInterval(nextSlide, 2000);
});
