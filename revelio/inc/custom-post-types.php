<?php

/**
 * Enregistrement des Custom Post Types (CPT) pour le thème Sfaccettatura
 */
// Enregistrer le CPT "Creative Showcase"
function sfaccettatura_register_cpt_creative_showcase() {
    $labels = array(
        'name'                  => __('Creative Showcase', 'sfaccettatura'),
        'singular_name'         => __('Showcase Item', 'sfaccettatura'),
        'menu_name'             => __('Creative Showcase', 'sfaccettatura'),
        'add_new'               => __('Add New Showcase Item', 'sfaccettatura'),
        'add_new_item'          => __('Add New Showcase Item', 'sfaccettatura'),
        'edit_item'             => __('Edit Showcase Item', 'sfaccettatura'),
        'all_items'             => __('All Showcase Items', 'sfaccettatura'),
        'view_item'             => __('View Showcase Item', 'sfaccettatura'),
        'search_items'          => __('Search Creative Showcase', 'sfaccettatura'),
        'not_found'             => __('No Showcase Items found', 'sfaccettatura'),
        'not_found_in_trash'    => __('No Showcase Items found in Trash', 'sfaccettatura'),
        'archives'              => __('Creative Showcase Archives', 'sfaccettatura'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true, // Visible sur le front-end et accessible
        'publicly_queryable'  => true, // Permet les requêtes publiques
        'show_ui'             => true, // Affiché dans le tableau de bord
        'show_in_menu'        => true, // Ajouté au menu principal d'administration
        'query_var'           => true, // Permet les requêtes WP_Query
        'rewrite'            => array('slug' => 'creative-showcase'),
        'capability_type'     => 'post', // Hérite des capacités de "post"
        'has_archive'         => true, // Active les archives
        'hierarchical'        => false, // Articles non hiérarchiques
        'menu_position'       => null, // Position dans le menu admin
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail', // Requis pour les images
            'excerpt',
            'comments',
            'revisions',
            'custom-fields',
            'page-attributes',
            'post-formats'
        ),
        'show_in_rest'        => true, // Activé pour Gutenberg
        'rest_base' =>'creative-showcase', // assurez-vous que c'est le même que votre slug
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'          => 'dashicons-embed-photo',
        'can_export'          => true, // Permet l'export
        'delete_with_user'    => true, // Supprimé avec l'utilisateur
        'taxonomies'         => array('project_type', 'campaign_type'),
    );

    register_post_type('creative_showcase', $args);
}
add_action('init', 'sfaccettatura_register_cpt_creative_showcase');

// Enregistrer le CPT "Photography Gallery"
function sfaccettatura_register_cpt_photography_gallery() {
    $labels = array(
        'name'                  => __('Photography Gallery', 'sfaccettatura'),
        'singular_name'         => __('Photography Item', 'sfaccettatura'),
        'menu_name'             => __('Photography Gallery', 'sfaccettatura'),
        'add_new_item'          => __('Add New Photography Item', 'sfaccettatura'),
        'edit_item'             => __('Edit Photography Item', 'sfaccettatura'),
        'all_items'             => __('All Photography Items', 'sfaccettatura'),
        'view_item'             => __('View Photography Item', 'sfaccettatura'),
        'search_items'          => __('Search Photography Gallery', 'sfaccettatura'),
        'not_found'             => __('No Photography Items found', 'sfaccettatura'),
        'not_found_in_trash'    => __('No Photography Items found in Trash', 'sfaccettatura'),
        'archives'              => __('Photography Items Archives', 'sfaccettatura'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true, // Visible sur le front-end et accessible
        'publicly_queryable'  => true, // Permet les requêtes publiques
        'show_ui'             => true, // Affiché dans le tableau de bord
        'show_in_menu'        => true, // Ajouté au menu principal d'administration
        'query_var'           => true, // Permet les requêtes WP_Query
        'rewrite'            => array('slug' => 'photography-gallery'),
        'capability_type'     => 'post', // Hérite des capacités de "post"
        'has_archive'         => true, // Active les archives
        'hierarchical'        => false, // Articles non hiérarchiques
        'menu_position'       => null, // Position dans le menu admin
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail', // Requis pour les images
            'excerpt',
            'comments',
            'revisions',
            'custom-fields',
            'page-attributes',
            'post-formats'
        ),
        'show_in_rest'        => true, // Activé pour Gutenberg
        'rest_base' => 'photography-gallery', // assurez-vous que c'est le même que votre slug
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'          => 'dashicons-images-alt2',
        'can_export'          => true, // Permet l'export
        'delete_with_user'    => true, // Supprimé avec l'utilisateur
        'taxonomies'         => array('photo_type', 'photo_collection'),
    );

    register_post_type('photography_gallery', $args);
}
add_action('init', 'sfaccettatura_register_cpt_photography_gallery');

// Enregistrer le CPT "Services"
function sfaccettatura_register_cpt_services() {
    $labels = array(
        'name'                  => __('Services', 'sfaccettatura'),
        'singular_name'         => __('Service', 'sfaccettatura'),
        'menu_name'             => __('Services', 'sfaccettatura'),
        'add_new'               => __('Add a Service', 'sfaccettatura'),
        'add_new_item'          => __('Add a New Service', 'sfaccettatura'),
        'edit_item'             => __('Edit Service', 'sfaccettatura'),
        'all_items'             => __('All Services', 'sfaccettatura'),
        'view_item'             => __('View Service', 'sfaccettatura'),
        'search_items'          => __('Search Services', 'sfaccettatura'),
        'not_found'             => __('No Services Found', 'sfaccettatura'),
        'not_found_in_trash'    => __('No Services in Trash', 'sfaccettatura'),
        'archives'              => __('Service Archives', 'sfaccettatura'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true, // Visible sur le front-end et accessible
        'publicly_queryable'  => true, // Permet les requêtes publiques
        'show_ui'             => true, // Affiché dans le tableau de bord
        'show_in_menu'        => true, // Ajouté au menu principal d'administration
        'query_var'           => true, // Permet les requêtes WP_Query
        'rewrite'             => array('slug' => 'services'),
        'capability_type'     => 'post', // Hérite des capacités de "post"
        'has_archive'         => true, // Active les archives
        'hierarchical'        => false, // Articles non hiérarchiques
        'menu_position'       => null, // Position dans le menu admin
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail', // Requis pour les images
            'excerpt',
            'comments',
            'revisions',
            'custom-fields',
            'page-attributes',
            'post-formats'
        ),
        'show_in_rest'        => true, // Activé pour Gutenberg
        'rest_base' => 'services', // assurez-vous que c'est le même que votre slug
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'           => 'dashicons-cart',
        'can_export'          => true, // Permet l'export
        'delete_with_user'    => true, // Supprimé avec l'utilisateur
        'taxonomies'          => array('creative_services'),
    );

    register_post_type('services', $args);
}
add_action('init', 'sfaccettatura_register_cpt_services');



// Enregistrer le CPT "Testimonials"
function sfaccettatura_register_cpt_testimonials() {
    $labels = array(
        'name'                  => __('Testimonials', 'sfaccettatura'),
        'singular_name'         => __('Testimonial', 'sfaccettatura'),
        'menu_name'             => __('Testimonials', 'sfaccettatura'),
        'add_new'               => __('Add New', 'sfaccettatura'),
        'add_new_item'          => __('Add New Testimonial', 'sfaccettatura'),
        'edit_item'             => __('Edit Testimonial', 'sfaccettatura'),
        'all_items'             => __('All Testimonials', 'sfaccettatura'),
        'view_item'             => __('View Testimonial', 'sfaccettatura'),
        'search_items'          => __('Search Testimonials', 'sfaccettatura'),
        'not_found'             => __('No Testimonials found', 'sfaccettatura'),
        'not_found_in_trash'    => __('No Testimonials found in Trash', 'sfaccettatura'),
        'archives'              => __('Testimonials Archives', 'sfaccettatura'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true, // Visible sur le front-end et accessible
        'publicly_queryable'  => true, // Permet les requêtes publiques
        'show_ui'             => true, // Affiché dans le tableau de bord
        'show_in_menu'        => true, // Ajouté au menu principal d'administration
        'query_var'           => true, // Permet les requêtes WP_Query
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'     => 'post', // Hérite des capacités de "post"
        'has_archive'         => true, // Active les archives
        'hierarchical'        => false, // Articles non hiérarchiques
        'menu_position'       => null, // Position dans le menu admin
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail', // Requis pour les images
            'excerpt',
            'comments',
            'revisions',
            'custom-fields',
            'page-attributes',
            'post-formats'
        ),
        'show_in_rest'        => true, // Activé pour Gutenberg
        'rest_base' => 'testimonials', // assurez-vous que c'est le même que votre slug
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'          => 'dashicons-format-quote',
        'can_export'          => true, // Permet l'export
        'delete_with_user'    => true, // Supprimé avec l'utilisateur
    );

    register_post_type('testimonials', $args);
}
add_action('init', 'sfaccettatura_register_cpt_testimonials');

// Enregistrer le CPT "About Sections"
function sfaccettatura_register_cpt_about_sections() {
    $labels = array(
        'name'                  => __('About Sections', 'sfaccettatura'),
        'singular_name'         => __('About Section', 'sfaccettatura'),
        'menu_name'             => __('About Sections', 'sfaccettatura'),
        'add_new'               => __('Add New About Section', 'sfaccettatura'),
        'edit_item'             => __('Edit About Section', 'sfaccettatura'),
        'all_items'             => __('All About Sections', 'sfaccettatura'),
        'view_item'             => __('View About Section', 'sfaccettatura'),
        'search_items'          => __('Search About Sections', 'sfaccettatura'),
        'not_found'             => __('No About Sections found', 'sfaccettatura'),
        'not_found_in_trash'    => __('No About Sections found in Trash', 'sfaccettatura'),
        'archives'              => __('About Sections Archives', 'sfaccettatura'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true, // Visible sur le front-end et accessible
        'publicly_queryable'  => true, // Permet les requêtes publiques
        'show_ui'             => true, // Affiché dans le tableau de bord
        'show_in_menu'        => true, // Ajouté au menu principal d'administration
        'query_var'           => true, // Permet les requêtes WP_Query
        'rewrite'            => array('slug' => 'about-sections'),
        'capability_type'     => 'post', // Hérite des capacités de "post"
        'has_archive'         => true, // Active les archives
        'hierarchical'        => false, // Articles non hiérarchiques
        'menu_position'       => null, // Position dans le menu admin
        'supports'            => array(
            'title',
            'editor',
            'author',
            'thumbnail', // Requis pour les images
            'excerpt',
            'comments',
            'revisions',
            'custom-fields',
            'page-attributes',
            'post-formats'
        ),
        'show_in_rest'        => true, // Activé pour Gutenberg
        'rest_base' => 'about-sections', // assurez-vous que c'est le même que votre slug
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_icon'          => 'dashicons-info',
        'can_export'          => true, // Permet l'export
        'delete_with_user'    => true, // Supprimé avec l'utilisateur
        'taxonomies'         => array('about_types'),
    );

    register_post_type('about_sections', $args);
}
add_action('init', 'sfaccettatura_register_cpt_about_sections');