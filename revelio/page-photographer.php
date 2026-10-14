<?php

/**
 * Template Name: Landing Page Photographer
 */
get_header(); ?>

<div class="landing-page">

    <!-- Section Hero -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-content">
            <h1 id="hero-title" class="hero-title">IVAN CACCHIONI</h1>

            <div class="separator">
                <div class="line"></div>
                <span class="skull" aria-hidden="true">☠</span>
                <div class="line"></div>
            </div>

            <h2 class="section-subtitle">Photographer</h2>

            <div class="cta-container">
                <a href="#gallery" class="cta-button" aria-label="View Gallery">Gallery</a>
                <a href="#blog" class="cta-button secondary" aria-label="Visit Blog">Blog</a>
            </div>
        </div>
    </section>

    <!-- Section Services -->
    <section id="services" class="services" aria-labelledby="services-title">
        <div class="container">
            <h2 id="services-title" class="section-title">Photography Services</h2>
            <p class="section-subtitle">Capturing memories that last a lifetime.</p>
            <div class="services-grid">
                <?php
                // WP_Query pour les services avec pagination
                $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Récupérer la page actuelle
                $photography_services = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 3, // Nombre de services par page
                    'paged' => $paged, // Page actuelle
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'photography_services',
                            'operator' => 'EXISTS',
                        ),
                    ),
                ));

                if ($photography_services->have_posts()) :
                    while ($photography_services->have_posts()) : $photography_services->the_post();
                ?>
                        <div class="service-card">
                            <div class="accent-line"></div>
                            <div class="service-content">
                                <h3><?php echo esc_html(get_the_title()); ?></h3>
                                <p class="service-description"><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>No photography services found.</p>';
                endif;

                // Réinitialisation des données de la requête
                wp_reset_postdata();
                ?>
            </div>

            <!-- Section Pagination -->
            <div class="pagination-index">
                <?php
                echo paginate_links(array(
                    'total' => $photography_services->max_num_pages, // Nombre total de pages
                    'current' => $paged, // Page actuelle
                    'prev_text' => __('&laquo; Previous'), // Bouton précédent
                    'next_text' => __('Next &raquo;'), // Bouton suivant
                ));
                ?>
            </div>

            <div class="cta-container">
                <a href="/photographer-contact/" class="cta-button" aria-label="Contact the Photographer">Discuss about your projet</a>
            </div>
        </div>
    </section>

    <!-- Section Gallery -->
    <section id="gallery" class="gallery photography-gallery" aria-labelledby="gallery-title">
        <h2 id="photography-gallery-title" class="section-title">Photography Gallery</h2>
        <div id="gallery-container">
            <div class="gallery-grid" id="gallery-grid">
                <?php
                // Ton code pour récupérer les galeries
                if (post_type_exists('photography_gallery') && taxonomy_exists('photo_collection')) {
                    $terms = get_terms(array(
                        'taxonomy' => 'photo_collection',
                        'hide_empty' => true,
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            $term_slug = sanitize_text_field($term->slug);

                            $gallery = new WP_Query([
                                'post_type' => 'photography_gallery',
                                'posts_per_page' => 1,
                                'tax_query' => [[
                                    'taxonomy' => 'photo_collection',
                                    'field'    => 'slug',
                                    'terms'    => $term_slug,
                                ]],
                            ]);

                            if ($gallery->have_posts()) :
                                while ($gallery->have_posts()) : $gallery->the_post();
                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: get_template_directory_uri() . '/images/default-thumbnail.jpg';
                ?>
                                    <div class="gallery-card">
                                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="gallery-link" aria-label="View gallery for <?php echo esc_attr($term->name); ?>">
                                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($term->name); ?>" class="gallery-image">
                                            <div class="gallery-overlay">
                                                <p class="gallery-term-name"><?php echo esc_html($term->name); ?></p>
                                            </div>
                                        </a>
                                    </div>
                <?php endwhile;
                                wp_reset_postdata();
                            endif;
                        }
                    } else {
                        echo '<p>No categories found.</p>';
                    }
                } else {
                    echo '<p>Gallery not available. Please contact support.</p>';
                }
                ?>
            </div>
            <!-- Pagination -->
            <div class="pagination">
                <button id="prev-page" class="pagination-btn" disabled>&lt; Prev</button>
                <button id="next-page" class="pagination-btn">Next &gt;</button>
            </div>
        </div>
    </section>

    <!-- Section Photography Testimonials -->
    <section id="testimonials" class="testimonials" aria-labelledby="photography-testimonials-title">
        <h2 id="photography-testimonials-title" class="section-title">Photography Testimonials</h2>
        <p class="section-subtitle">Discover what clients love about my photography.</p>
        <ul class="testimonials-grid">
            <?php
            // WP_Query pour les témoignages avec pagination
            $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Récupérer la page actuelle
            $photography_testimonials = new WP_Query(array(
                'post_type' => 'testimonials',
                'posts_per_page' => 4, // Limite à 4 témoignages par page
                'paged' => $paged, // Page actuelle
                'tax_query' => array(
                    array(
                        'taxonomy' => 'testimonial_categories',
                        'field' => 'slug',
                        'terms' => 'photographer',
                    ),
                ),
            ));

            // Compter le nombre total de témoignages
            $total_testimonials = $photography_testimonials->found_posts;

            // Vérifie si des témoignages existent
            if ($photography_testimonials->have_posts()) :
                while ($photography_testimonials->have_posts()) : $photography_testimonials->the_post();
                    $content = wp_strip_all_tags(get_the_content()); // Supprime toutes les balises HTML
                    $content_word_count = str_word_count($content); // Compte les mots du contenu complet

                    // Ajuster la longueur de l'extrait selon le nombre total de témoignages
                    if ($total_testimonials === 1) {
                        $excerpt = wp_trim_words($content, 200, '...');
                    } elseif ($total_testimonials <= 3) {
                        $excerpt = wp_trim_words($content, 100, '...');
                    } else {
                        $excerpt = wp_trim_words($content, 50, '...');
                    }

                    $excerpt_word_count = str_word_count(wp_strip_all_tags($excerpt)); // Compte les mots de l'extrait
                    $is_truncated = $excerpt_word_count < $content_word_count; // Vérifie si l'extrait est tronqué
            ?>
                    <li class="testimonial-card">
                        <div class="testimonials-content">
                            <blockquote class="testimonials-quote">
                                <p><?php echo esc_html($excerpt); ?></p>
                            </blockquote>
                            <p class="testimonial-author">- <?php echo esc_html(get_the_title()); ?></p>
                            <?php if ($is_truncated) : ?>
                                <!-- Bouton pour lire la suite si le texte est tronqué -->
                                <a href="<?php echo esc_url(get_permalink()); ?>" aria-label="Read more about <?php echo esc_attr(get_the_title()); ?> testimonials" class="read-more cta-button">Read More</a>
                            <?php else : ?>
                                <!-- Bouton pour voir la page complète -->
                                <a href="<?php echo esc_url(get_permalink()); ?>" aria-label="View the full testimonials of <?php echo esc_attr(get_the_title()); ?>" class="view-full cta-button">View Full Testimonial</a>
                            <?php endif; ?>
                        </div>
                    </li>
            <?php
                endwhile;
            else :
                echo '<p>No photography testimonials found.</p>';
            endif;

            // Réinitialisation des données de la requête
            wp_reset_postdata();
            ?>
        </ul>

        <!-- Section Pagination -->
        <div class="pagination-index">
            <?php
            echo paginate_links(array(
                'total' => $photography_testimonials->max_num_pages, // Nombre total de pages
                'current' => $paged, // Page actuelle
                'prev_text' => __('&laquo; Previous'), // Bouton précédent
                'next_text' => __('Next &raquo;'), // Bouton suivant
            ));
            ?>
        </div>
    </section>

    <!-- Section Blog -->
    <section id="blog" class="blog" aria-labelledby="blog-title">
        <h2 id="blog-title" class="section-title">Photography Blog</h2>
        <?php
        $blog = new WP_Query(array(
            'post_type' => 'photography_blog',
            'posts_per_page' => 3,
            'no_found_rows' => true, // Optimisation des performances
            'ignore_sticky_posts' => true, // Évite les articles épinglés
        ));

        if ($blog->have_posts()) : ?>
            <div class="blog-grid" role="list">
                <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                    <article class="blog-card" role="listitem">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', [
                                'alt' => esc_attr(get_the_title()),
                                'loading' => 'lazy',
                            ]); ?>
                        <?php endif; ?>
                        <div class="blog-content">
                            <h3 class="blog-title">
                                <a href="<?php echo esc_url(get_permalink()); ?>" aria-label="Read more about <?php echo esc_attr(get_the_title()); ?>">
                                    <?php echo esc_html(get_the_title()); ?>
                                </a>
                            </h3>
                            <div class="blog-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </div>
                            <p class="blog-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                            <a class="blog-link" href="<?php echo esc_url(get_permalink()); ?>" aria-label="Read more about <?php echo esc_attr(get_the_title()); ?>">
                                <?php esc_html_e('Read More', 'sfaccettatura'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php if ($blog->max_num_pages > 1) : ?>
                <div class="pagination" aria-label="Pagination Navigation">
                    <?php echo paginate_links([
                        'total' => $blog->max_num_pages,
                        'prev_text' => __('&laquo; Previous', 'sfaccettatura'),
                        'next_text' => __('Next &raquo;', 'sfaccettatura'),
                    ]); ?>
                </div>
            <?php endif; ?>
        <?php
            wp_reset_postdata();
        else :
            echo '<p>' . esc_html__('No blog posts found.', 'sfaccettatura') . '</p>';
        endif;
        ?>
    </section>

    <!-- Footer -->
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>" />
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
    <meta name="twitter:card" content="summary_large_image">
</div>

<?php get_footer(); ?>