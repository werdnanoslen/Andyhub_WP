<?php
/**
 * @package Andyhub_WP
 */
if ( has_post_thumbnail() ) {
        $img = get_the_post_thumbnail_url();
} else if ( get_post_custom_values('excerpt_image')[0] ) {
        $img = get_post_custom_values('excerpt_image')[0];
}
$client = get_post_custom_values('client')[0];
$dates = get_post_custom_values('dates')[0];
$tags = get_the_tag_list('',', ','');
$url = get_post_custom_values('url')[0];
$hasCaseAttributes = (!!$excerpt_image | !!$client | !!$dates | !!$tags | !!$url);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (!is_front_page()) : //Don't show title on Home page ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
    <?php endif; ?>

	<div class="entry-content">
        <div class="case-attributes">
            <?php if ($hasCaseAttributes): ?>
            <?php if ($img): ?>
				<?php if ($url): ?>
					<a href="<?php echo $url; ?>">
						<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" class="size-full" />
					</a>
				<?php else: ?>
					<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" class="size-full" />
				<?php endif; ?>
            <?php endif; ?>
            <table>
                <?php if ($client): ?>
                <tr>
                    <td>Client:</td>
                    <td><?php echo $client; ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($dates): ?>
                <tr>
                    <td>Dates:</td>
                    <td><?php echo $dates; ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($tags): ?>
                <tr>
                    <td>Skills/Subjects:</td>
                    <td><?php echo $tags; ?></td>
                </tr>
                <?php endif; ?>
                <?php if ($url): ?>
                <tr>
                    <td>URL:</td>
                    <td>
                        <a href="<?php echo $url; ?>">
                            <?php echo $url; ?>
                        </a>
                    </td>
                </tr>
                <?php endif; ?>
            </table>
            <?php endif; ?>
        </div>

		<h2><?php if($post->post_excerpt) echo get_the_excerpt(); ?></h2>
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
