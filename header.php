<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class( 'site-wrapper' ); ?>>
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header class="site-header bg-gray-200 py-12">
		<div class="flex justify-between container my-0">

			<div class="site-branding">

				<?php the_custom_logo(); ?>

				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title text-4xl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="no-underline" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title text-4xl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="no-underline" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
				?>
					<p class="site-description no-underline"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'mobile' ) ) : ?>
				<button type="button" class="off-canvas-open" aria-expanded="false" aria-label="<?php esc_html_e( 'Open Menu', '_s' ); ?>">
					<span class="hamburger"></span>
				</button>
			<?php endif; ?>
		</div><!-- .container -->

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', '_s' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'fallback_cb'    => false,
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'menu dropdown container',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation-->
	</header><!-- .site-header-->
