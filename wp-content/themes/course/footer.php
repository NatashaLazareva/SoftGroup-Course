<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Course
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu' ) ); ?>

        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
            <div id="secondary" class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        <?php endif; ?>

        <ul class="social-list">
            <li class="icon-1"><a href="<?php echo get_theme_mod( 'social-link-1' ); ?>" target="_blank"><img src="<?php echo get_theme_mod('social-icon-1'); ?>" alt=""></a></li>
            <li class="icon-2"><a href="<?php echo get_theme_mod( 'social-link-2' ); ?>" target="_blank"><img src="<?php echo get_theme_mod('social-icon-2'); ?>" alt=""></a></li>
            <li class="icon-3"><a href="<?php echo get_theme_mod( 'social-link-3' ); ?>" target="_blank"><img src="<?php echo get_theme_mod('social-icon-3'); ?>" alt=""></a></li>
            <li class="icon-4"><a href="<?php echo get_theme_mod( 'social-link-4' ); ?>" target="_blank"><img src="<?php echo get_theme_mod('social-icon-4'); ?>" alt=""></a></li>
        </ul>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'course' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'course' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'course' ), 'course', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->



<?php wp_footer(); ?>

</body>
</html>
