<?php
function enqueue_gallery_scripts() {
    wp_enqueue_script('masonry');

    wp_enqueue_script(
        'masonry-script',
        get_template_directory_uri() . '/assets/js/masonry.js',
        array('masonry'),
        null,
        true
    );

    // Charger carousel.js uniquement sur certaines pages
    if (is_tax('photo_collection') || is_page('photo-collection')) {
        wp_enqueue_script(
            'carousel-script',
            get_template_directory_uri() . '/assets/js/carousel.js',
            array('jquery'),
            null,
            true
        );
    } elseif(is_tax('project_industries') || is_page('project-industries')) {
        wp_enqueue_script(
            'carousel-script',
            get_template_directory_uri() . '/assets/js/carousel.js',
            array('jquery'),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_scripts');


?>