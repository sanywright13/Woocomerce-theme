<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
	<div id="primary" class="<?php if(is_cart() || is_checkout() || is_product() || is_tax('shop')){?>container mt-5<?php }?>">
		<main id="main" class="site-main " role="main">
<?php if(is_cart()){

	}
?>
			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php	 if(is_cart() && !WC()->cart->is_empty()) {
			do_action( 'woocommerce_after_cart_table_change');
	do_action('display_featured_products');
	
	?>
	
	<?php 
} ?>
<?php
//do_action( 'storefront_sidebar' );
get_footer();
