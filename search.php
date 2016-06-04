<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Andyhub_WP
 */

get_header();
global $wp_query;
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                <?php get_search_form(); ?>
				<h3 class="page-title"><?php printf( __( 'I\'ve got exactly %s things for that:', 'andyhub_wp' ), '<span>' . $wp_query->found_posts . '</span>' ); ?></h3>
			</header><!-- .page-header -->
            <br />
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php andyhub_wp_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
