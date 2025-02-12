const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let currentIndex = 0;
let autoSlideInterval;

// Updates the slider position and active dot
function updateSlider() {
  slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  dots.forEach(dot => dot.classList.remove('active'));
  dots[currentIndex].classList.add('active');
}

// Navigate to the previous slide
function showPrevSlide() {
  currentIndex = (currentIndex > 0) ? currentIndex - 1 : dots.length - 1;
  updateSlider();
  resetAutoSlide();
}

// Navigate to the next slide
function showNextSlide() {
  currentIndex = (currentIndex < dots.length - 1) ? currentIndex + 1 : 0;
  updateSlider();
  resetAutoSlide();
}

// Resets the auto-slide timer
function resetAutoSlide() {
  clearInterval(autoSlideInterval);
  autoSlideInterval = setInterval(showNextSlide, 3000);
}

// Event listeners for navigation buttons
prevBtn.addEventListener('click', showPrevSlide);
nextBtn.addEventListener('click', showNextSlide);

// Event listeners for dot navigation
dots.forEach(dot => {
  dot.addEventListener('click', () => {
    currentIndex = parseInt(dot.dataset.index);
    updateSlider();
    resetAutoSlide();
  });
});

// Initialize the slider
function initSlider() {
  updateSlider();
  autoSlideInterval = setInterval(showNextSlide, 3000);
}

initSlider();
