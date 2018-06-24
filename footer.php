<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Andyhub_WP
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

<footer class="site-footer" role="contentinfo">
	<div id="colophon">
		<div>
			<ul>
				<li>
					<a href="https://twitter.com/werdnanoslen">
						<img src="<?php bloginfo('template_url'); ?>/img/twitter.svg"
								alt="twitter" title="twitter" />
					</a>
				</li>
				<li>
					<a href="https://www.linkedin.com/in/andrewdouglasnelson">
						<img src="<?php bloginfo('template_url'); ?>/img/linkedin.svg"
								alt="linkedin" title="linkedin" />
					</a>
				</li>
				<li>
					<a href="https://github.com/werdnanoslen">
						<img src="<?php bloginfo('template_url'); ?>/img/github.svg"
								alt="github" title="github" />
					</a>
				</li>
				<li>
					<a href="<?php echo get_page_link(get_page_by_title('Contact &amp; Availability')->ID); ?>">
						<img src="<?php bloginfo('template_url'); ?>/img/email.svg"
								alt="email" title="email" />
					</a>
				</li>
			</ul>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
