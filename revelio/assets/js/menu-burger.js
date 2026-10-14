// Sélection des éléments du DOM avec vérification de leur existence
const initBurgerMenu = () => {
    const burgerToggle = document.getElementById('burger-toggle');
    const burgerMenu = document.getElementById('burger-menu');
    const burgerLinks = document.querySelectorAll('.burger-menu-items li a');

    // Vérification de l'existence des éléments nécessaires
    if (!burgerToggle || !burgerMenu || !burgerLinks.length) {
        console.warn('Éléments du menu burger manquants');
        return;
    }

    // Gestion de l'état du menu (fermé par défaut sur mobile)
    let isMenuOpen = false;

    // Fonction pour gérer l'ouverture/fermeture du menu
    const toggleMenu = () => {
        isMenuOpen = !isMenuOpen;
        
        // Ajout/suppression des classes avec un léger délai pour les animations
        burgerToggle.classList.toggle('active');
        burgerMenu.classList.toggle('active');

        // Gestion de la visibilité pour l'animation des liens
        if (isMenuOpen) {
            burgerMenu.classList.add('visible');
            // Empêcher le défilement du body quand le menu est ouvert
            document.body.style.overflow = 'hidden';
        } else {
            burgerMenu.classList.remove('visible');
            document.body.style.overflow = '';
        }
    };

    // Fonction pour fermer le menu
    const closeMenu = () => {
        if (isMenuOpen) {
            isMenuOpen = false;
            burgerToggle.classList.remove('active');
            burgerMenu.classList.remove('active', 'visible');
            document.body.style.overflow = '';
        }
    };

    // Gestionnaire d'événements pour le bouton burger
    burgerToggle.addEventListener('click', (event) => {
        event.stopPropagation(); // Évite la propagation du clic
        toggleMenu();
    });

    // Gestion des clics sur les liens du menu
    burgerLinks.forEach((link, index) => {
        // Attribution des délais d'animation
        link.style.setProperty('--i', index);

        // Gestionnaire de clic sur les liens
        link.addEventListener('click', (event) => {
            // Ferme le menu uniquement pour les liens d'ancrage
            if (link.getAttribute('href').includes('#')) {
                event.preventDefault(); // Prévient le comportement par défaut
                const targetId = link.getAttribute('href').slice(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    closeMenu();
                    // Petit délai pour laisser l'animation de fermeture se terminer
                    setTimeout(() => {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }, 300);
                }
            }
        });
    });

    // Fermeture du menu lors du clic en dehors
    document.addEventListener('click', (event) => {
        if (isMenuOpen && !burgerMenu.contains(event.target) && event.target !== burgerToggle) {
            closeMenu();
        }
    });

    // Gestion du redimensionnement de la fenêtre
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Ferme le menu si l'écran dépasse 768px (breakpoint tablette)
            if (window.innerWidth >= 768 && isMenuOpen) {
                closeMenu();
            }
        }, 250);
    });
};

// Initialisation du menu une fois le DOM chargé
document.addEventListener('DOMContentLoaded', initBurgerMenu);