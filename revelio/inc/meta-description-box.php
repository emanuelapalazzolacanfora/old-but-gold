<?php

function add_meta_description_box() {
    add_meta_box(
        'meta_description_box',            // ID unique
        'Meta Description',                // Titre
        'render_meta_description_box',     // Fonction de rendu
        ['project_insights', 'photography_blog', 'creative_showcase', 'photography_gallery', 'services', 'testimonials', 'about_sections', 'page'],                  // Types de contenu
        'side',                            // Position dans l'éditeur
        'high'                             // Priorité
    );
}
add_action('add_meta_boxes', 'add_meta_description_box');

function render_meta_description_box($post) {
    // Récupérer la valeur actuelle
    $meta_description = get_post_meta($post->ID, '_meta_description', true);
    ?>
    <label for="meta_description">Méta Description :</label>
    <textarea id="meta_description" name="meta_description" rows="3" style="width: 100%;"><?php echo esc_textarea($meta_description); ?></textarea>
    <?php
}

function save_meta_description($post_id) {
    // Vérifiez les autorisations de l'utilisateur
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Enregistrer le champ personnalisé
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, '_meta_description', sanitize_text_field($_POST['meta_description']));
    }
}