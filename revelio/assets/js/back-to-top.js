// Show Back-to-Top Button on Scroll
document.addEventListener('scroll', function () {
    const backToTopButton = document.getElementById('backToTop');
    if (window.scrollY > 200) { // Show after scrolling 200px
      backToTopButton.classList.add('visible');
    } else {
      backToTopButton.classList.remove('visible');
    }
  });