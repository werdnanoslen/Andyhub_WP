<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Andyhub_WP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'That\'s a 404 good buddy.', 'andyhub_wp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php get_search_form(); ?>
		                    	<br />
		                    	<iframe width="640" height="480" src="https://www.youtube-nocookie.com/embed/ZZ5LpwO-An4?autoplay=1" frameborder="0" allowfullscreen></iframe>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
