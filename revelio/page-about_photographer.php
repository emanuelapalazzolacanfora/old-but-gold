<?php
/**
 * Template Name: About Photographer
 */ 
get_header(); ?>
<!-- About Section -->
<?php
    $query = new WP_Query([
        'post_type' => 'about_sections',
        'tax_query' => [
            [
                'taxonomy' => 'about_types',
                'field'    => 'slug',
                'terms'    => sanitize_text_field('photographer'),
            ],
        ],
    ]);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <section id="about" class="about" aria-labelledby="about-title">
                <h2 id="about-title" class="section-title">About</h2>

                <div class="about-container">
                    <!-- Images sur le côté gauche -->
                    <div class="image-wrapper">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', [
                                'class' => 'featured-image',
                                'alt' => esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) ?: esc_attr(get_the_title()),
                                'loading' => 'lazy',
                            ]);
                        } else {
                            echo '<p>No image found.</p>';
                        }
                        ?>
                    </div>

                    <!-- Contenu textuel -->
                    <div class="text-content">
                        <h3 class="entry-title">
                            <?php echo esc_html(get_the_title()); ?>
                        </h3>
                        <p>
                            <?php echo wp_kses_post(get_the_content()); ?>
                        </p>
                    </div>
                </div>
            </section>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p class="about-nocontent">No content found for About section.</p>';
    endif;
    ?>
<?php get_footer(); ?>