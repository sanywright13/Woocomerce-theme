<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $notices ) {
	return;
}
$all_notices  = WC()->session->get( 'wc_notices', array() );
//var_dump($all_notices);
//var_dump($all_notices['success'][0]['notice']);
$all_notices['success'][0]['notice']="";
?>

<?php foreach ( $notices as $notice ) : ?>
	<div class="woocommerce-message"<?php echo wc_get_notice_data_attr( $notice ); ?> role="alert">

		<?php 
		if(is_product())

		echo '
		<div class="d-flex bd-highlight">
		<div class="flex-grow-1">
		<span> تمت إضافة المنتج إلى سلة التسوق الخاصة بك </span> 
		</div>
		<div>
		<a href="'.wc_get_cart_url().'"> ادهب الى السلة<a/>
		</div>
		</div>'; 
		else {
if(is_cart())
			echo 'تم مسح هدا المنتج من السلة';
		}?>
	</div>
<?php endforeach; ?>
