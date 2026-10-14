<?php
function get_page_context() {
    // Contexte pour les pages spécifiques au photographe
    if (
        is_page(['photographer-home', 'photographer-about', 'photographer-contact'])
    ) {
        return 'photographer';
    }

    // Contexte pour les pages spécifiques au gestionnaire de projet créatif
    if (
        is_page(['creative-project-manager-home', 'creative-project-manager-about', 'creative-project-manager-contact']) || 
        is_singular('project_insights') || 
        (is_tax('testimonial_categories') && has_term('creative-project-manager', 'testimonial_categories')) || 
        is_tax('creative_project_services') || 
        (is_singular('testimonials') && has_term('creative-project-manager', 'testimonial_categories')) || 
        is_singular('creative_project_services')
    ) {
        return 'general';
    }

    // Contexte général par défaut
    return 'general';
}

?>
