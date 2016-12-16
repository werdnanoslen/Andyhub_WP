<?php
/**
 * The template for displaying the front page.
 *
 * @package Andyhub_WP
 */

get_header(); ?>
    <img src="<?php header_image();?>" alt="header image" class="hero-image" />

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
                    'category_name'    => 'Now',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $posts_array = get_posts($args);
                if (count($posts_array) > 0) :
            ?>
                <h1>I'm doing this right&nbsp;now:</h1>
                <?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
                        <article id="post-<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php
				if ( has_post_thumbnail() ) {
       					$img = the_post_thumbnail_url('medium');
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
				<img src="<?php echo $img ?>" alt="<?php the_title(); ?>" />
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
                            <a href="work" rel="bookmark">More</a>
                        </h1>
                    </header><!-- .entry-hfeader -->
                </article>
            <?php endif; ?>
        </main><!-- #main -->
    </section>

<?php get_footer(); ?>
