<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );


do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">

<?php if ( apply_filters( 'sanstore_product_category_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"></h1>
	
<?php  endif; ?>
</header>

<div class="container">
<div class="row">
	<div class="col-lg-3"><?php do_action( 'woocommerce_before_shop_loop' );
 ?></div>
<div class="col-lg-9">
<?php 

if(have_posts()){
	echo '<div class="row">';
while(have_posts()){
	echo '<div class="col-lg-3">';
	the_post();
	
	echo '<div><a href="'.get_permalink( $product->get_id() ).'">'.$product->get_image().'</a></div>';
	echo '<div>'.$product->get_name().'</div>';
	echo '<div>'.$product->get_price().' DH</div>';
	echo'<div class="p-2">'. do_action( 'woocommerce_after_shop_loop_item' ).'</div>';

	echo '</div>';

?>

<?php
}
echo '</div>';
}
?>
</div>
</div>
</div>

<?php





get_footer( 'shop' );
