<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

<header id="masthead" class="<?php if (is_front_page()){?> header-container background-costume" <?php }else { echo '"';};?> role="banner" style="<?php storefront_header_styles();  if (is_front_page()):
 echo 'background-image:url(//cdn.shopify.com/s/files/1/0193/6285/t/105/assets/slideshow_1.jpg?v=4186571754059371032)';endif; ?>" >

		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' );
	if(is_front_page()){
		?>
		<div class="container">
		<div class="shop-now">
		<h3 class="col-lg-8 titre">Prenez soin de vous avec des produits 100% Marocains naturel certifie et Bio</h3>
<div class="col-lg-3 ">

<button class="btn buy"><a href="http://localhost/wordpresse2/wordpress/shop/" class="">SHOP NOW</a></button>
<?php 

?>
</div>
</div>
</div>
<?php }	?>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="" tabindex="-1">
	
		<?php
		do_action( 'storefront_content_top' );?>
