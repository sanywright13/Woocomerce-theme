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
<div class="row second-title">
		  <div class="overlay"></div>

	<div class="col-lg-6 wow bounceInUp">
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
				 
<div class="text-center mini-title"><span class="bc">المنتوجات الاكتر مبيعا</span></div>
<div class="row top-produits">
<div class="col-lg-3 col-md-5 col-sm-12 mt-5">

<div class="special-product">
<div class="short-images">
<?php 
$product=wc_get_product(103);
$description=$product->get_description();


$image_prod=wp_get_attachment_image_src(151,'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink(103));?>">
<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out">
<?php echo $description; ?>
</a>
</div>
<div class="f-titre">
	<?php echo ucwords(get_the_title(103) ); ?>
<?php $prix=$product->get_price() ; 
echo $prix;?>
</div>
</div>
</div>
</div>
</div>
</section>
<?php	  do_action( 'woocommerce_after_cart_table_change'); ?>

<?php
}?>
</article><!-- #post-## -->
