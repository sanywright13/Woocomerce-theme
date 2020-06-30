<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

if(is_cart()){
	do_action( 'woocommerce_before_cart' );


}



	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */


	do_action( 'storefront_page' );
	
	do_action('homefront_page_edit');


if(is_front_page()){?>

<section class="mb-4">
          <div class="featured-image3 " style="background-image:url(http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/christin-hume-0MoF-Fe0w0A-unsplash-scaled.jpg);">
		  <div class=" container ">
<div class="row second-title  wow animate__animated bounceInUp">

	<div class="col-lg-6">
<p>	نختار منتجاتنا بعناية من الطبيعة ، نسعى دائما لإرضاء زبنائنا و الاهتمام بهم سواء عبر تقديم المنتجات الطبيعية الخالية من المواد المضرة و الكميائية او عبر خدمة التوصيل المجانية حتى منزلك</p>
	
<p>	 بشهادة جميع مستعملي منتجاتنا فإن شركة ماربيو تتوفر على اجود المنتجات الطبيعية للعناية بالبشرة و الجسم، صنعت بكل فخر لكم
</p>
</div>
<div class="col-lg-12" style="margin: auto;">
<a class="btn btn-info" href="http://localhost/wordpresse2/wordpress/shop/">اشتري الان</a>
</div>
</div>
</div>
              </div>
          
          </section>
 <section class="conta">
			  <div class="container">
				 <?php 
				 // get the most sales products
				 $query = new WC_Product_Query( array(
					'posts_per_page'=>'4',
					'orderby'        => 'meta_value_num',
					 'order'=>'DESC',
					'meta_key'       => 'total_sales',
				) );
				$products = $query->get_products();
?>
				
<div class="text-center mini-title"><span class="bc">المنتوجات الاكتر مبيعا</span></div>
<div class="row top-produits">
	<?php 	foreach ( $products as $product_ ) :?>
<div class="col-lg-3 col-md-5 col-sm-12 mt-5">

<div class="special-product wow animate__animated bounceInUp">
<div class="short-images">
<?php 
$product=wc_get_product($product_->get_id());
$description=$product->get_description();
$image_prod=wp_get_attachment_image_src(get_post_thumbnail_id($product_->get_id()),'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink($product_->get_id()));?>">
<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out">
<span class="st"><?php echo $description; ?></span>
</a>
</div>
<div class="f-titre">
	<?php echo ucwords(get_the_title($product_->get_id()) ); ?>
<?php $prix=$product->get_price() ; 
echo $prix;?>
</div>

</div>

</div>
	<?php endforeach;?>
	<?php wp_reset_query(); ?>
<!-- produit 2 -->



</div>
</div>
</section>
<?php	  do_action( 'woocommerce_after_cart_table_change'); ?>

<?php
}?>
</article><!-- #post-## -->
