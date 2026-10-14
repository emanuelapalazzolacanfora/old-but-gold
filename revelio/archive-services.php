<?php get_header(); ?>

<section id="services" class="services" aria-labelledby="services-title">
    <div class="container">
        <!-- Titre de la section -->
        <h2 id="services-title" class="section-title"><?php esc_html_e('Services', 'textdomain'); ?></h2>
        <p class="section-subtitle">
            <?php esc_html_e('Discover our tailored services designed to elevate your brand and capture timeless moments.', 'textdomain'); ?>
        </p>

        <!-- Boutons de filtre -->
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all" aria-pressed="true"><?php esc_html_e('All', 'textdomain'); ?></button>
            <button class="filter-btn" data-filter="photography_services" aria-pressed="false"><?php esc_html_e('Photography', 'textdomain'); ?></button>
            <button class="filter-btn" data-filter="creative_project_services" aria-pressed="false"><?php esc_html_e('Creative Project', 'textdomain'); ?></button>
        </div>

        <!-- Grille des services -->
        <div class="services-grid">
            <?php
            $paged = max(1, get_query_var('paged')); // Récupérer la page actuelle pour la pagination
            $services = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 6, // Nombre d'articles par page
                'paged' => $paged,
            ]);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();

                    // Ajouter des classes dynamiques basées sur les taxonomies
                    $taxonomy_classes = [];
                    if (has_term('', 'photography_services')) {
                        $taxonomy_classes[] = 'photography_services';
                    }
                    if (has_term('', 'creative_project_services')) {
                        $taxonomy_classes[] = 'creative_project_services';
                    }
                    $class_list = implode(' ', $taxonomy_classes);
            ?>
                    <div class="service-card service <?php echo esc_attr($class_list); ?>">
                        <div class="accent-line"></div>
                        <div class="service-content">
                            <h3><?php the_title(); ?></h3>
                            <p class="service-description"><?php the_excerpt(); ?></p>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo '<p>' . esc_html__('No services found.', 'textdomain') . '</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>

        <!-- Pagination -->
        <div class="pagination-index">
            <?php
            echo paginate_links(array(
                'total' => $services->max_num_pages, // Nombre total de pages
                'current' => $paged, // Page actuelle
                'prev_text' => __('&laquo; Previous'), // Bouton précédent
                'next_text' => __('Next &raquo;'), // Bouton suivant
            ));
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
