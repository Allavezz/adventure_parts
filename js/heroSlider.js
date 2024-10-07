let currentIndex = 0;
const slides = document.querySelectorAll('.hero__slide');
const totalSlides = slides.length;

function changeSlide() {
	slides[currentIndex].classList.remove('hero__slide--active');

	currentIndex = (currentIndex + 1) % totalSlides;

	slides[currentIndex].classList.add('hero__slide--active');
}

setInterval(changeSlide, 7000);
