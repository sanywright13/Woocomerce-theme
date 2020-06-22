<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php





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
<div class="overlay"></div>

<div class=" container second-title text-center"><div class="col-lg-6">Treat your skin by piling on the moisture—at every luxurious step.

Pour survivre à leur environnement, les plantes ont développé
 des propriétés parfois étonnantes, qui en font de véritables merveilles de technologie naturelles. 
 

<div class="col-5" style="margin: auto;">
<a class="btn btn-info" href="http://localhost/wordpresse2/wordpress/product/argan-huile/">Voirs Plus</a>
</div>

</div>
              </div>
          
          </section>

		
		  <section class="conta">
			  <div class="container">
				  <div class="row">
				  <div class="col-lg-6 col-md-12 col-sm-12 animate__animated mb-4">
<div class="der">Pour survivre à leur environnement, les plantes ont développé
 des propriétés parfois étonnantes, qui en font de véritables merveilles de technologie naturelles. 
 En incluant ces ingrédients dans ses cosmétiques, Biorosan capitalise sur les vertus et bienfaits de ces plantes. 
 Dans son Grand Livre des Ingrédients, Biorosan vous partage sa passion pour une grande variété d’ingrédients verts
  issus d’un savoir-faire transmis de génération en génération.
  </div>
  </div>
  <div class="col-lg-6 col-md-12 col-sm-12 mb-4 animate__animated" >
<div style="margin-top: 22px;"><img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/HUILE-ARGAN.jpg" style="margin: auto;height: 389px;"></div>
</div>
<div class="text-center col-12 title">Produits Les Plus Vendus</div>
<div class="col-lg-3 col-md-5 col-sm-12 mt-5 special-product">

<div class="f-titre">Argan Oil is a rich source of Vitamin E</div>
<div class="short-images">
<?php 
$product=wc_get_product(103);
$description=$product->get_description();


$image_prod=wp_get_attachment_image_src(151,'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink(103));?>">
<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out animate__animated">
<?php echo $description; ?>
</a>
</div>
</div>
<div class="col-lg-3 col-md-5 col-sm-12 mt-5 special-product">
<div class="f-titre">Argan Oil is a rich source of Vitamin E</div>
<div class="short-images">
<?php 
$product=wc_get_product(117);
$description=$product->get_description();
$image_prod=wp_get_attachment_image_src(150,'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink(117));?>">

<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out animate__animated">
<?php echo $description; ?>

</a>
</div>
</div>
<div class="col-lg-3 col-md-5 col-sm-12 mt-5 special-product">
<div class="f-titre">Argan Oil is a rich source of Vitamin E</div>
<div class="short-images">

<?php 
$product=wc_get_product(118);
$description=$product->get_description();
$image_prod=wp_get_attachment_image_src(153,'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink(118));?>">

<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out animate__animated">
<?php echo $description; ?>

</a>
</div>
</div>
<div class="col-lg-3 col-md-5 col-sm-12  mt-5 special-product">
<div class="f-titre">Argan Oil is a rich source of Vitamin E</div>
<div class="short-images">

<?php 
$product=wc_get_product(118);
$description=$product->get_description();
$image_prod=wp_get_attachment_image_src(153,'products_front_page')?>
<a href="<?php echo esc_url(get_the_permalink(118));?>">

<img src="<?php echo $image_prod[0]; ?>" alt="" height="<?php echo $image_prod[1];?>" width="<?php echo $image_prod[2];?>" class="hvr-bounce-out animate__animated">
<?php echo $description; ?>

</a>
</div>
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
