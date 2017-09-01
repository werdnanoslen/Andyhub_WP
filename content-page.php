<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Andyhub_WP
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_front_page()) : //Don't show title on Home page ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <?php if ($img): ?>
            <div class="excerpt_image">
                <img src="<?php echo $img; ?>" alt="<?php the_title(); ?>"/>
            </div>
        <?php endif; ?>
    <?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'andyhub_wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'andyhub_wp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
