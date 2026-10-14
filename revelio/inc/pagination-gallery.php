<?php
/**
 * Ajuste la pagination pour les galeries et autres contextes
 */

function ajuster_pagination($query) {
    // Vérifie que nous sommes dans une requête principale du front-end
    if (!is_admin() && $query->is_main_query()) {
        // Articles illimités pour certaines taxonomies ou pages spécifiques
        if (is_tax('photo_collection') || is_tax('project_industries')) {
            $query->set('posts_per_page', -1); // Articles illimités pour ces taxonomies
        } elseif (is_page(['about-photographer', 'gallery-page'])) {
            $query->set('posts_per_page', -1); // Articles illimités pour ces pages spécifiques
        } else {
            // Pagination par défaut : 10 articles par page
            $query->set('posts_per_page', 10);
        }
    }
}
add_action('pre_get_posts', 'ajuster_pagination');