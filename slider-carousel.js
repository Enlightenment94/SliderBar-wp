let currentIndex = 0;
const columns = 3; 
const autoSlideInterval = 3000; 
let autoSlideTimer;

function moveCarousel(direction) {
    const carouselInner = document.querySelector('.carousel-inner');
    const items = document.querySelectorAll('.carousel-item');
    const maxIndex = Math.ceil(items.length / columns) - 1;

    currentIndex += direction;
    console.log(currentIndex)

    if (currentIndex < 0) {
        currentIndex = maxIndex;
    } else if (currentIndex > maxIndex) {
        currentIndex = 0;
    }

    const translateX = -(currentIndex * 100);
    console.log(translateX);
    carouselInner.style.transform = `translateX(${translateX}%)`;
}

function startAutoSlide() {
    autoSlideTimer = setInterval(() => {
        moveCarousel(1); 
    }, autoSlideInterval);
    console.log('Auto-slide started');
}

function stopAutoSlide() {
    clearInterval(autoSlideTimer);
    console.log('Auto-slide stopped');
}

function prev(){
    moveCarousel(-1)
}

function next(){
    moveCarousel(-1)
}

const carousel = document.querySelector('.image-list');

if(carousel){
    startAutoSlide();

    carousel.addEventListener('mouseover', () => {
        stopAutoSlide();
        console.log('Mouse over carousel');
    });

    carousel.addEventListener('mouseleave', () => {
        startAutoSlide();
        console.log('Mouse left carousel');
    });
}


document.addEventListener("DOMContentLoaded", function() {
    if (!window.location.pathname || window.location.pathname === "/") {
        const articles = document.querySelectorAll('article');

        for(i = 0; i <articles.length; i++){
            articles[i].classList.add('article');
        }

        articles.forEach(article => {
            article.addEventListener('click', function() {
                const content = article.querySelector('div');
                article.classList.toggle('active');

                articles.forEach(otherArticle => {
                    if (otherArticle !== article) {
                        otherArticle.classList.remove('active');
                    }
                });
            });
        });
    }
});