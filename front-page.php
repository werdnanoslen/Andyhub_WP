<?php
/**
 * The template for displaying the front page.
 *
 * @package Andyhub_WP
 */

get_header(); ?>
    <?php if ( header_image() ) : ?>
        <img src="<?php header_image();?>" class="hero-image" />
    <?php endif; ?>

    <section id="primary" class="content-area">
        <main class="site-main" role="main">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('content', 'page');
                }
            ?>
        </main>
    </section>

    <section id="secondary" class="content-area">
        <main class="site-main" role="main">
            <?php
                $args = array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'wide-page.php'
                );
                $posts_array = get_pages($args); 
                if (count($posts_array) > 0) :
            ?>
                <h1><a href="/contact">Contact me</a> about...</h1>
                <?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                                $img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                            $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE);
                                        } else if ( get_post_custom_values('excerpt_image')[0] ) {
                                                $img = get_post_custom_values('excerpt_image')[0];
                                        } else {
                                                $bgColor = "".substr(md5(rand()), 0, 6);
                                                $r = hexdec(substr($bgColor,0,2));
                                                $g = hexdec(substr($bgColor,2,2));
                                                $b = hexdec(substr($bgColor,4,2));
                                                $fgColor = ($r + $g + $b > 400) ? 40 : 'F';
                                                $img = "https://dummyimage.com/300x300/$bgColor/$fgColor/&text=" . get_the_title();
                                        }
                                    ?>
                                    <img src="<?php echo $img ?>" alt="<?php echo $alt ?>" />
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        </header><!-- .entry-hfeader -->
                    </article><!-- #post-## -->
                <?php endforeach;
                    wp_reset_postdata();
                ?>
            <?php endif; ?>
        </main><!-- #main -->
    </section>

<?php get_footer(); ?>
