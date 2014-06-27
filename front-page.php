<?php
/**
 * The template for displaying the front page.
 *
 * @package Andyhub_WP
 */

get_header(); ?>

    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'page' ); ?>

            <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->

    <script type="text/javascript">
        var bgImgs = {};
        var bgImgsSize = 0;

        bgImgs[bgImgsSize++] = {
            "title":    "you",
            "href":     "/contact",
            "img":      ""
        };
        bgImgs[bgImgsSize++] = {
            "title":    "communities",
            "href":     "/concepts/",
            "img":      "http://andyhub.com/wordpress/wp-content/uploads/2014/05/gleanhub_screenshot.png"
        };
        bgImgs[bgImgsSize++] = {
            "title":    "companies",
            "href":     "/portfolio/",
            "img":      "http://andyhub.com/wordpress/wp-content/uploads/primanetsc.png"
        };

        var i = 0;
        var bgInterval = setInterval(function() {
            var main = document.getElementsByTagName("main")[0];
            var index = (++i) % bgImgsSize;
            main.style.backgroundImage = "url(" + bgImgs[index].img + ")";
            document.getElementById("forwhom").innerHTML = bgImgs[index].title;
            document.getElementById("forwhom").href = bgImgs[index].href;
        }, 4000);
    </script>

<?php get_footer(); ?>
