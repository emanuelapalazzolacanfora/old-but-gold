<?php
/**
 * Template for displaying a single creative Service post.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1>
                <div class="entry-meta">
                    <p><?php esc_html_e( 'Published on:', 'textdomain' ); ?> <?php echo esc_html( get_the_date() ); ?></p>
                </div>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail( 'large', ['alt' => esc_attr( get_the_title() )] );
                endif;

                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <nav class="post-navigation">
            <div class="nav-links">
                <?php
                previous_post_link( '<div class="nav-previous">%link</div>', esc_html__( 'Previous Service', 'textdomain' ) );
                next_post_link( '<div class="nav-next">%link</div>', esc_html__( 'Next Service', 'textdomain' ) );
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .post-navigation -->
    <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #primary -->

<?php get_footer(); ?>
