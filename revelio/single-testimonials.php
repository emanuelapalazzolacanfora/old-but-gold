<?php
// single-testimonials.php - Template pour les pages "Single Testimonial"
get_header();
?>

<section id="testimonials" class="testimonials" aria-labelledby="testimonial-category-title">
    <h1 id="testimonial-category-title" class="section-title">
        <?php echo esc_html(get_the_title()); ?>
    </h1>
    <p class="entry-meta" style="font-size: 0.9rem; color: #555;">
        <span class="post-date">Published on: <?php echo esc_html(get_the_date()); ?></span>
    </p>
    <ul class="testimonials-grid">
        <?php
        // Récupération des informations du témoignage actuel
        if (have_posts()) :
            while (have_posts()) : the_post();
                $content = wp_kses_post(get_the_content());
                $testimonial_rating = get_post_meta(get_the_ID(), 'testimonial_rating', true); // Note
                $testimonial_link = get_post_meta(get_the_ID(), 'testimonial_link', true); // Lien
        ?>
                <li class="testimonial-card">
                    <div class="testimonials-content">
                        <blockquote class="testimonials-quote">
                            <p><?php echo $content; ?></p>
                        </blockquote>

                        <?php if (!empty($testimonial_rating)) : ?>
                            <p class="testimonial-rating">Rating: <?php echo esc_html($testimonial_rating); ?> / 5</p>
                        <?php endif; ?>

                        <?php if (!empty($testimonial_link)) : ?>
                            <a href="<?php echo esc_url($testimonial_link); ?>" target="_blank" class="testimonial-link">Visit Profile</a>
                        <?php endif; ?>
                    </div>
                </li>
        <?php
            endwhile;
        else :
            echo '<p>No testimonials found.</p>';
        endif;

        // Réinitialisation des données de la requête
        wp_reset_postdata();
        ?>
    </ul>

    <!-- Section Pagination -->
    <div class="pagination-index">
        <?php
        echo paginate_links(array(
            'total' => 1,
            'current' => 1,
            'prev_text' => __('&laquo; Previous'),
            'next_text' => __('Next &raquo;'),
        ));
        ?>
    </div>
    <!-- Back to Testimonials Link -->
    <nav class="nav-back" style="margin-top: 20px; text-align: center;" aria-label="Back to Testimonials">
        <?php
        $terms = wp_get_post_terms(get_the_ID(), 'testimonial_categories'); // Récupère les termes associés
        if (!empty($terms) && !is_wp_error($terms)) {
            $term = $terms[0]; // Prend le premier terme (si plusieurs, ajuster selon besoin)
            $term_link = get_term_link($term); // Génère le lien vers l'archive du terme
            if (!is_wp_error($term_link)) {
                echo '<a href="' . esc_url($term_link) . '" style="text-decoration: none; color: #555; font-weight: bold;">Back to ' . esc_html($term->name) . ' Testimonials Archives</a>';
            }
        }
        // Si aucun terme n'est trouvé, ne rien afficher
        ?>
    </nav>
</section>

<?php
get_footer();
