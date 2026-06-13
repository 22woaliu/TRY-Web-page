const container = document.getElementById('slidesContainer');
const slides = document.querySelectorAll('.member-slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0;
const totalSlides = slides.length;
let autoPlayTimer;

function showSlide(index) {
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }
    container.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function startAutoPlay() {
    autoPlayTimer = setInterval(() => {
        showSlide(currentIndex + 1);
    }, 2000);
}

function resetAutoPlay() {
    clearInterval(autoPlayTimer);
    startAutoPlay();
}

nextBtn.addEventListener('click', () => {
    showSlide(currentIndex + 1);
    resetAutoPlay();
});

prevBtn.addEventListener('click', () => {
    showSlide(currentIndex - 1);
    resetAutoPlay();
});

startAutoPlay();