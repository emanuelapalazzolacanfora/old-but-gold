document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // Définir les classes à traiter
    const classMapping = {
        blog: '.blog-content',
        testimonials: '.testimonials-quote',
    };

    // Parcourir les classes définies
    Object.keys(classMapping).forEach(className => {
        if (body.classList.contains(className)) {
            const elements = document.querySelectorAll(classMapping[className]);

            if (elements.length > 0) {
                // Trouver la hauteur maximale
                let maxHeight = 0;

                // Utiliser une boucle pour éviter des problèmes avec NodeList
                elements.forEach(element => {
                    maxHeight = Math.max(maxHeight, element.getBoundingClientRect().height);
                });

                // Appliquer la hauteur maximale à tous les éléments
                elements.forEach(element => {
                    element.style.height = maxHeight + 'px';
                });
            }
        }
    });
});


  