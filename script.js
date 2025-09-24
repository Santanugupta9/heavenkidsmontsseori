
var photos = ["p2.jpg","p4.jpg", "p5.jpg", "p2.jpg"];
   
const slideshow = document.querySelectorAll('.slide');
const currentIndex = 0;

function showSlide(index) {
  slideshow.forEach((slide, i) => {
    slide.style.display = i === index ? 'block' : 'none';
  });
}

function nextSlide() {
  const nextIndex = (currentIndex + 1) % slideshow.length;
  showSlide(nextIndex);
}

function startSlideshow() {
  setInterval(nextSlide, 5000);
}

showSlide(currentIndex);
startSlideshow();