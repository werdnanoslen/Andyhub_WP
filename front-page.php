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
    <main class="site-main">
        <section id="primary" class="content-area">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('content', 'page');
                }
            ?>
        </section>

        <section id="secondary" class="content-area">
            <?php
                $args = array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'wide-page.php',
                    'sort_column' => 'menu_order'
                );
                $posts_array = get_pages($args); 
                if (count($posts_array) > 0) :
            ?>
                <h2>
                    <img 
                        class="inline-text-icon" 
                        src="/wordpress/wp-content/uploads/arrow.svg" 
                        alt=""
                    />
                    My specialties
                </h2>
                <?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                    <article id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <header class="entry-header">
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
                                <h3 class="entry-title"><?php the_title(); ?></h3>
                            </header><!-- .entry-hfeader -->
                        </a>
                    </article><!-- #post-## -->
                <?php endforeach;
                    wp_reset_postdata();
                ?>
            <?php endif; ?>
        </section>
    </main>

<?php get_footer(); ?>
