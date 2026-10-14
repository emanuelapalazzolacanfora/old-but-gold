<?php
// Ajout du support des miniatures et définition de tailles personnalisées
function sfaccettatura_theme_setup()
{
     // Activer les miniatures
    add_theme_support('post-thumbnails');

    // Définir les tailles d’image personnalisées
    add_image_size('custom-size', 600, 600, true); // Taille carrée recadrée
    add_image_size('creative-thumbnail', 800, 400, true);
    add_image_size('photography-thumbnail', 1200, 800, true);

    // Enregistrer les emplacements de menus
    register_nav_menus(array(
        'photographer-menu' => _x('Photographer Menu (Header)', 'Menu location', 'sfaccettatura'),
        'general-menu' => _x('General Menu (Header)', 'Menu location', 'sfaccettatura'),
        'social-menu' => _x('Social Menu (Header)', 'Menu location', 'sfaccettatura'),
        'footer-photographer-menu' => _x('Photographer Footer Menu (Site Map)', 'Menu location', 'sfaccettatura'),
        'footer-general-menu' => _x('General Footer Menu (Site Map)', 'Menu location', 'sfaccettatura'),
    ));
}
add_action('after_setup_theme', 'sfaccettatura_theme_setup');

add_action('wp_head', function() {
    if (is_page() || is_single() || is_archive() || is_tax()) {
        $description = '';
        if (is_page() || is_single()) {
            $description = get_the_excerpt() ?: 'Description par défaut pour cette page.';
        } elseif (is_archive()) {
            $description = 'Découvrez nos archives pour ' . single_cat_title('', false) . '.';
        } elseif (is_tax()) {
            $description = 'En savoir plus sur ' . single_term_title('', false) . '.';
        }
        echo '<meta name="description" content="' . esc_attr($description) . '">';
    } else {
        echo '<meta name="description" content="Description générale pour le site.">';
    }
});