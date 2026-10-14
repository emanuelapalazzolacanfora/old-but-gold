document.addEventListener('DOMContentLoaded', function () {
    const masonryItems = document.querySelectorAll('.masonry-image');
    const carousel = document.querySelector('.carousel');

    if (!carousel || masonryItems.length === 0) {
        return; // Arrête l'exécution si les éléments requis n'existent pas
    }

    const carouselImage = document.querySelector('.carousel-image');
    const carouselPrev = document.querySelector('.carousel-prev');
    const carouselNext = document.querySelector('.carousel-next');
    const carouselClose = document.querySelector('.carousel-close');
    const carouselCounter = document.querySelector('.carousel-counter');

    let currentIndex = 0;
    const images = Array.from(masonryItems).map(item => item.dataset.src);

    masonryItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
            showCarousel();
        });
    });

    function updateCarousel() {
        carouselImage.src = images[currentIndex];
        carouselCounter.textContent = `${currentIndex + 1} / ${images.length}`;
    }

    function showCarousel() {
        carousel.style.display = 'flex';
    }

    function hideCarousel() {
        carousel.style.display = 'none';
    }

    carouselPrev.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateCarousel();
    });

    carouselNext.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        updateCarousel();
    });

    carouselClose.addEventListener('click', hideCarousel);

    hideCarousel();
});
