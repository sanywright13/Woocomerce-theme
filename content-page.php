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

<div class=" container second-title text-center"><div class="col-12">Treat your skin by piling on the moisture—at every luxurious step.

Our Clean Promise: Over 1,500 questionable ingredients are never used in our formulations
10% OFF ON YOUR FIRST ORDER
Beauty & Cosmetic
Hurry Up ! Get Exacting Discount Of All Cosmetic Item. </div>

<div class="col-5" style="margin: auto;">
<a class="btn btn-info" href="http://localhost/wordpresse2/wordpress/product/argan-huile/">Voirs Plus</a>
</div>

</div>
              </div>
          
          </section>

		
	<?php	  do_action( 'woocommerce_after_cart_table_change'); ?>
		  <section class="conta">
			  <div class="container">
				  <div class="row">
					  <div class="col-12">
		  <div class="text-center title">LE GRAND LIVRE DES INGRÉDIENTS</div>
<div class="der">Pour survivre à leur environnement, les plantes ont développé des propriétés parfois étonnantes, qui en font de véritables merveilles de technologie naturelles. En incluant ces ingrédients dans ses cosmétiques, Biorosan capitalise sur les vertus et bienfaits de ces plantes. Dans son Grand Livre des Ingrédients, Biorosan vous partage sa passion pour une grande variété d’ingrédients verts issus d’un savoir-faire transmis de génération en génération.
</div>
</div>
<div class="col-6 " style="margin: auto; margin-top: 1em;">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/HUILE-ARGAN.jpg" >
</div>
</div>
</div>
</section>
<?php do_action('emails_form') ;
}?>
</article><!-- #post-## -->
