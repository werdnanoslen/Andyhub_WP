<?php
/**
 * The template for displaying the front page.
 *
 * @package Andyhub_WP
 */

get_header(); ?>

    <img src="<?php bloginfo( 'template_url' ); ?>/img/civichero.png"
         alt="human-government interaction" class="hero-image"
    />
    <section id="primary" class="content-area">
        <main class="site-main" role="main">
            <h1>I do <span style="color: #75B7BB">civic tech</span> & <span style="color: #75B7BB">service&nbsp;design</span></h1>
            <h3>I'm currently researching the HCI aspects of civic media and urban computing. My goal is to understand how design and innovative technologies. could best be used to improve public services and opportunities for civic engagement. <a href="portfolio">More&nbsp;about&nbsp;me...</a></h3>
        </main><!-- #main -->
    </section>

    <section id="secondary" class="content-area">
        <main class="site-main" role="main">
            <?php
                $args = array(
                    'category_name'    => 'Now',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $posts_array = get_posts($args);
                if (count($posts_array) > 0) :
            ?>
                <h1>Things I'm doing right now:</h1>
                <?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                        <article id="post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <img src="<?php echo get_post_custom_values('excerpt_image')[0]; ?>" alt="<?php the_title(); ?>" />
                            </a>

                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2>
                            </header><!-- .entry-hfeader -->
                        </article><!-- #post-## -->
                <?php endforeach;
                    wp_reset_postdata();
                ?>
                <article id="more-now">
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <a href="projects" rel="bookmark">More</a>
                        </h1>
                    </header><!-- .entry-hfeader -->
                </article>
            <?php endif; ?>
        </main><!-- #main -->
    </section>

<?php get_footer(); ?>
