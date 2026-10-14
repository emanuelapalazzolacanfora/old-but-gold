document.addEventListener("DOMContentLoaded", () => {
    const galleryGrid = document.getElementById("gallery-grid");
    const items = Array.from(galleryGrid.children);
    const prevBtn = document.getElementById("prev-page");
    const nextBtn = document.getElementById("next-page");

    let maxCards;

    // Fonction pour calculer le nombre maximum de cartes selon la largeur de l'écran
    function calculateMaxCards() {
        if (window.innerWidth >= 992) {
            return 4;
        } else if (window.innerWidth >= 600) {
            return 2;
        } else {
            return 1;
        }
    }

    // Met à jour le nombre maximum de cartes affichées
    function updateMaxCards() {
        maxCards = calculateMaxCards();
        renderPage();
    }

    let currentPage = 0;

    // Affiche les cartes pour la page actuelle
    function renderPage() {
        const start = currentPage * maxCards;
        const end = start + maxCards;

        // Masquer toutes les cartes
        items.forEach((item, index) => {
            item.style.display = index >= start && index < end ? "block" : "none";
        });

        // Gérer l'état des boutons
        prevBtn.disabled = currentPage === 0;
        nextBtn.disabled = end >= items.length;

        // Masquer les boutons de pagination si tout tient sur une page
        if (items.length <= maxCards) {
            prevBtn.style.display = "none";
            nextBtn.style.display = "none";
        } else {
            prevBtn.style.display = "inline-block";
            nextBtn.style.display = "inline-block";
        }
    }

    // Écouteurs pour la pagination
    prevBtn.addEventListener("click", () => {
        if (currentPage > 0) {
            currentPage--;
            renderPage();
        }
    });

    nextBtn.addEventListener("click", () => {
        if ((currentPage + 1) * maxCards < items.length) {
            currentPage++;
            renderPage();
        }
    });

    // Ajuster au redimensionnement de l'écran
    window.addEventListener("resize", updateMaxCards);

    // Initialiser l'affichage
    updateMaxCards();
});
