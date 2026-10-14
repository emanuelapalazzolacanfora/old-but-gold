<?php
/**
 * Template Name: Single Creative Product Manager Blog
 * Description: Template for Creative Product Manager Blog posts
 */

get_header();
?>

<main id="main-content" class="photography-blog" role="main" style="padding: 40px 0;">
    <div class="content-wrapper">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-labelledby="post-title">
                    <!-- Article Header -->
                    <header class="entry-header" style="text-align: center; margin-bottom: 20px;">
                        <h1 id="post-title" class="entry-title" style="font-size: 2rem; margin-bottom: 10px;">
                            <?php echo esc_html(get_the_title()); ?>
                        </h1>
                        <p class="entry-meta" style="font-size: 0.9rem; color: #555;">
                            <span class="post-date">Published on: <?php echo esc_html(get_the_date()); ?></span> |
                            <span class="post-author">Author: <?php echo esc_html(get_the_author()); ?></span> |
                            <span class="post-category">
                                Categories: <?php echo wp_kses_post(get_the_category_list(', ')); ?>
                            </span>
                        </p>
                    </header>
                    <!-- Article Content -->
                    <div class="entry-content" style="padding: 0 15px; text-align: left;">
                        <?php
                        echo wp_kses_post(get_the_content());

                        // Pagination for multi-page posts
                        wp_link_pages([
                            'before' => '<nav class="page-links" style="text-align: center; margin-top: 20px;" aria-label="Page navigation">' . __('Pages:', 'textdomain'),
                            'after' => '</nav>',
                        ]);
                        ?>
                    </div>

                    <!-- Article Footer -->
                    <footer class="entry-footer" style="margin-top: 30px; text-align: center;">
                        <!-- Display Tags -->
                        <div class="post-tags" style="margin-bottom: 20px;">
                            <?php echo get_the_tag_list('<ul class="tags-list" style="list-style: none; padding: 0; display: inline-flex; flex-wrap: wrap; gap: 10px; margin: 0;" aria-label="Tags"><li style="background-color: #f5f5f5; padding: 5px 10px; border-radius: 5px;">', '</li><li style="background-color: #f5f5f5; padding: 5px 10px; border-radius: 5px;">', '</li></ul>'); ?>
                        </div>

                        <!-- Post Navigation -->
                        <nav class="post-navigation" style="display: flex; justify-content: space-between;" aria-label="Post navigation">
                            <div class="nav-previous" style="text-align: left; <?php echo get_previous_post() ? '' : 'visibility: hidden;'; ?>">
                                <?php previous_post_link('%link', '<< Previous Post'); ?>
                            </div>
                            <div class="nav-next" style="text-align: right; <?php echo get_next_post() ? '' : 'visibility: hidden;'; ?>">
                                <?php next_post_link('%link', 'Next Post >>'); ?>
                            </div>
                        </nav>
                    </footer>

                    <!-- Comments Section -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        echo '<br><hr><section class="comments-section" style="margin-top: 40px;" aria-labelledby="comments-title">';
                        echo '<h2 id="comments-title">Comments</h2>';
                        comments_template();
                        echo '</section>';
                    }
                    ?>
                </article>
        <?php endwhile;
        endif; ?>

        <!-- Back to Blog Link -->
        <nav class="nav-back" style="margin-top: 20px; text-align: center;" aria-label="Back to Blog">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" style="text-decoration: none; color: #555; font-weight: bold;">Back to Blog</a>
        </nav>
    </div>
</main>

<?php get_footer(); ?>