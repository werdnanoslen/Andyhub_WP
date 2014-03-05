<?php
/**
 * @package Andyhub_WP
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_search()) : // Don't display excerpt_image for Search ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php echo get_post_custom_values('excerpt_image')[0]; ?>
        </a>
    <?php endif; ?>
    
    <?php if (!is_front_page()) : //Don't show title on Home page ?>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
        </header><!-- .entry-header -->
    <?php endif; ?>

	<div class="entry-<?php echo (is_search() ? "summary" : "content") ?>">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'andyhub_wp' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'andyhub_wp' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'andyhub_wp' ), __( '1 Comment', 'andyhub_wp' ), __( '% Comments', 'andyhub_wp' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'andyhub_wp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
