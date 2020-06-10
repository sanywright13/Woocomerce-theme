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
	
<?php  endif; 



?>
</header>

<div class="container">
<div class="row">
<?php //do_action( 'woocommerce_before_shop_loop_2' );
 ?>
	<div class="col-lg-3">
Filter by :
	<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" name="price">price</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" name="popularity">popularity</a>
    </div>
  </div>
  
</div>
	</div>
<div class="col-lg-9">

<?php 


//var_dump($wp_query);
do_action('woocommerce_loop_category');


?>
</div>
</div>
</div>
<script>
	$(document).ready(function () {

let elt=$('#v-pills-tab>*');

elt.map( (i,v ) => {
  console.log(v.id + " "+v.name);
  const lien_class=v.id;
  const order=v.name;
$("#"+lien_class).on('click',function(){

  let url="http://localhost/wordpresse2/wordpress/product-category/clothing?orderby="+order;
  document.location = url ;

});
  
});
/*
$('#v-pills-tab').on("click",function(){

	
//GET the url 
window.location="http://localhost/wordpresse2/wordpress/product-category/clothing/";

let url=window.location+"?orderby=price";
document.location = url
console.log(url);


});
*/
	});
	
	</script>
<?php


get_footer( 'shop' );
