// Sélectionne toutes les slides et les dots dans #homecarousel
const slides = document.querySelectorAll('#homecarousel .slide');
const dotsContainer = document.querySelector('#homecarousel .dots');

// Charge les images statiques définies dans data-background
slides.forEach(slide => {
  const bgImage = slide.dataset.background; // Récupère l'URL de data-background
  if (bgImage) {
    slide.style.backgroundImage = `url(${bgImage})`; // Applique l'image en fond
  }
});

// Générer dynamiquement les dots en fonction des slides
slides.forEach((slide, index) => {
  const dot = document.createElement('span'); // Crée un nouvel élément <span> pour chaque dot
  dot.textContent = slide.dataset.title; // Récupère le titre de la slide depuis data-title
  dot.addEventListener('click', () => goToSlide(index)); // Ajoute un événement click pour naviguer vers la slide correspondante
  dotsContainer.appendChild(dot); // Ajoute le dot au conteneur
});

// Initialisation : définis la slide active au chargement
let currentSlide = 1; // Index de la slide active
updateCarousel(); // Met à jour l'affichage

// Fonction pour mettre à jour le carrousel
function updateCarousel() {
  slides.forEach((slide, index) => {
    // Place chaque slide à la bonne position verticale
    slide.style.top = `${(index - currentSlide) * 100}%`;
  });

  // Met à jour l'état des dots (ajout ou suppression de la classe active)
  document.querySelectorAll('#homecarousel .dots span').forEach((dot, index) => {
    dot.classList.toggle('active', index === currentSlide); // Active uniquement le dot correspondant
  });
}

// Fonction pour naviguer vers une slide spécifique
function goToSlide(index) {
  currentSlide = index; // Met à jour l'index de la slide active
  updateCarousel(); // Met à jour l'affichage
}

// Fonction pour passer à la slide suivante (défilement automatique)
function nextSlide() {
  currentSlide = (currentSlide + 1) % slides.length; // Passe à la slide suivante, revient à la première après la dernière
  updateCarousel(); // Met à jour l'affichage
}
