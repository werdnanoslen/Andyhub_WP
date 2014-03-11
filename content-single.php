<?php
/**
 * @package Andyhub_WP
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!is_front_page()) : //Don't show title on Home page ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
    <?php endif; ?>

	<div class="entry-content">
        <div class="case-attributes">
            <img src="<?php echo get_post_custom_values('excerpt_image')[0]; ?>" 
                     alt="<?php the_title(); ?>" class="size-full" />
            <table>
                <tr>
                    <td>Client:</td>
                    <td><?php echo get_post_custom_values('client')[0]; ?></td>
                </tr>
                <tr>
                    <td>Dates:</td>
                    <td><?php echo get_post_custom_values('dates')[0]; ?></td>
                </tr>
                <tr>
                    <td>Skills/Subjects:</td>
                    <td><?php echo get_the_tag_list('',', ','') ?></td>
                </tr>
                <tr>
                    <td>URL:</td>
                    <td>
                        <a href="<?php echo get_post_custom_values('url')[0]; ?>">
                            <?php echo get_post_custom_values('url')[0]; ?>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'andyhub_wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'andyhub_wp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
