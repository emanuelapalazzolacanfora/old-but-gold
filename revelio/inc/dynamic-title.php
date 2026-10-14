<?php
// Activer le support des titres dynamiques (déjà fait dans setup.php)

// Modifier dynamiquement le titre de la page
function sfaccettatura_custom_dynamic_document_title($title_parts) {
    // Récupère le contexte actuel
    $context = get_page_context();

    // Modifie le titre principal en fonction du contexte
    if ($context === 'photographer') {
        $title_parts['title'] = 'Photographer';
    } elseif ($context === 'creative') {
        $title_parts['title'] = 'Creative Project Manager';
    }

    return $title_parts;
}
add_filter('document_title_parts', 'sfaccettatura_custom_dynamic_document_title');

// Définir un séparateur personnalisé pour les titres
function sfaccettatura_custom_title_separator($sep) {
    return ' | '; // Utilise un séparateur clair et standard.
}
add_filter('document_title_separator', 'sfaccettatura_custom_title_separator');
