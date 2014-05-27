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
                    <object type="application/x-shockwave-flash" data="http://thebest404pageever.com/swf/hey.swf" width="640" height="480" id="object_404">
                        <param name="allowScriptAccess" value="sameDomain" />
                        <param name="movie" value="http://thebest404pageever.com/swf/hey.swf" />
                        <param name="menu" value="false" />
                        <param name="quality" value="high" />
                        <embed src="http://thebest404pageever.com/swf/hey.swf" menu="false" quality="high" width="640" height="480" id="embed_404" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
                    </object>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
