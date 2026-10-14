<?php

/**
 * Gestion des styles et scripts pour le thème Sfaccettatura
 */

// Enqueue Font Awesome
function sfaccettatura_enqueue_fontawesome()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'sfaccettatura_enqueue_fontawesome');

// Enqueue styles spécifiques au contexte
function enqueue_context_specific_styles()
{
    // CSS global par défaut
    wp_enqueue_style('default-style', get_stylesheet_directory_uri() . '/assets/css/global.css');

    // Vérifier le contexte (photographer, creative, general)
    $context = get_page_context();
    if ($context === 'photographer') {
        wp_enqueue_style('photographer-style', get_stylesheet_directory_uri() . '/assets/css/photographer.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_context_specific_styles');

// Enqueue script pour le menu burger
function enqueue_menu_burger_script()
{
    wp_enqueue_script('menu-burger', get_template_directory_uri() . '/assets/js/menu-burger.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_menu_burger_script');

function enqueue_back_to_top_script()
{
    wp_enqueue_script(
        'back-to-top',
        get_template_directory_uri() . '/assets/js/back-to-top.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_back_to_top_script');

// Enqueue scripts pour les archives de blog et autres pages
function enqueue_custom_blog_scripts()
{
    // Vérifie si on est sur les taxonomies ou les pages spécifiques
    if (
        is_tax('testimonial_categories', 'creative-project-manager') || // Taxonomy : Creative Project Manager
        is_page(array('photography', 'creative-project-manager', 'home')) ||   // Pages spécifiques
        is_post_type_archive('project_insights')                       // Archive : Project Insights
    ) {
        wp_enqueue_script(
            'custom-height-block-scripts',
            get_template_directory_uri() . '/assets/js/custom-height-block.js',
            array(),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_blog_scripts');

function enqueue_landing_gallery_script()
{
    // Charger le script 'landing-gallery' pour plusieurs templates
    if (is_page_template(array('page-general.php', 'page-creative-project-manager.php', 'page-photographer.php'))) {
        wp_enqueue_script(
            'landing-gallery',
            get_template_directory_uri() . '/assets/js/landing-gallery.js',
            array(),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_landing_gallery_script');
