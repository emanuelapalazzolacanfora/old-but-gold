<?php
// Empêche l'accès direct au fichier
if (! defined('ABSPATH')) {
    exit; // Sécurité renforcée
}

get_header(); ?>

<main id="blog" class="blog">
    <header>
        <h1 class="section-title">
            <?php post_type_archive_title(); ?>
        </h1>
    </header>

    <?php if (have_posts()) : ?>
        <div class="blog-grid" role="list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('blog-item archive-item'); ?> role="listitem">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="blog-thumbnail">
                            <?php the_post_thumbnail('medium', [
                                'alt' => esc_attr(get_the_title()),
                                'loading' => 'lazy',
                            ]); ?>
                        </div>
                    <?php endif; ?>

                    <div class="blog-content">
                        <h2 class="blog-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php esc_attr_e('Read more about', 'your-theme-textdomain'); ?> <?php echo esc_attr(get_the_title()); ?>">
                                <?php echo esc_html(get_the_title()); ?>
                            </a>
                        </h2>
                        <p class="blog-meta">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        </p>
                        <p class="blog-excerpt">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>
                        <a class="blog-link" href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php esc_attr_e('Read more about', 'your-theme-textdomain'); ?> <?php echo esc_attr(get_the_title()); ?>">
                            <?php esc_html_e('Read More', 'your-theme-textdomain'); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <nav class="pagination" aria-label="<?php esc_attr_e('Pagination Navigation', 'your-theme-textdomain'); ?>">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => __('« Previous', 'your-theme-textdomain'),
                'next_text' => __('Next »', 'your-theme-textdomain'),
            ]);
            ?>
        </nav>
    <?php else : ?>
        <p class="no-posts">
            <?php esc_html_e('No posts found.', 'your-theme-textdomain'); ?>
        </p>
    <?php endif; ?>

    <div class="nav-back" style="margin-top: 20px; text-align: center;">
        <a href="/creative-project-manager/#blog" class="back-link">
            <?php esc_html_e('Back to Home Blog', 'your-theme-textdomain'); ?>
        </a>
    </div>
</main>

<?php get_footer(); ?>
