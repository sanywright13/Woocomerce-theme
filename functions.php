<?php
 function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
  add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function startwordpress_scripts() {
    wp_enqueue_style('fontsawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
   
       wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
       wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');

       wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
  
      wp_enqueue_script( 'boot2','https://code.jquery.com/jquery-3.4.1.slim.min.js', array( 'jquery' ),'',true );
      wp_enqueue_script( 'boot1','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array( 'jquery' ),'',true );

      wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array( 'jquery' ),'',true );
   wp_enqueue_style( 'google_web_fonts1', 'https://fonts.googleapis.com/css2?family=Bitter:ital@1&display=swap' );
   wp_enqueue_style( 'google_web_fonts2', 'https://fonts.googleapis.com/css2?family=Kanit' );
   wp_enqueue_style( 'google_web_fonts3', 'https://fonts.googleapis.com/css2?family=Baloo+Chettan+2&display=swap' );

  }
  
//specific images sizes 
add_image_size('products_front_page',250,350,true);
add_image_size('category_sizes',500,283,true);
add_action( 'woocommerce_after_shop_loop_item', 'remove_woocommerce_template_loop_product_link_close',2);
function remove_woocommerce_template_loop_product_link_close(){
  if(is_front_page()){
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
  }
}
add_action('storefront_header','remove_brand');
function remove_brand(){
  remove_action('storefront_header', 'storefront_site_branding',20);

}

add_action('storefront_header','remove_cost');
function remove_cost(){
  remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );

}
add_action('storefront_header','remove_prev_navigation');
function remove_prev_navigation(){
  remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
}

add_action( 'storefront_header', 'remove_storefront_header_cart');

function remove_storefront_header_cart(){
 remove_action( 'storefront_header', 'storefront_header_cart', 60 );

}
add_action( 'website_header', 'website_header_cart',10);
if ( ! function_exists( 'website_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function website_header_cart() {
		if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
		<ul id="site-header-cart" class="site-header-cart menu">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<li>
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</li>
		</ul>
			<?php
		}
	}
}

//add menu 
add_action('init','bio_add_header_menu');
function bio_add_header_menu(){
  register_nav_menu('header_menu',__( 'Header menu' ));
}
function add_new_header_nav(){
?> 


<div class="navbar navbar-expand-lg navbar-light bg-light" >
 
 
 <div class="row" style="width:100%">
 <div class="  call col-lg-2 col-md-4 col-sm-4 ">
 <i class="fas fa-phone-square-alt pr-2"></i>0650481844
</div>

<div class="col-lg-2 offset-lg-3 col-md-4 col-sm-8">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/Untitled-1-1.jpg" class="img-fluid" alt="">
</div>

<div class="col-lg-3 offset-lg-12 col-md-4 ml-auto">
<?php do_action('website_header');?>

</div>

 <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"><i class="fas fa-list-alt"></i></span>
</button>

    <?php
    wp_nav_menu(
      array(
        'theme_location'  => 'header_menu',
        'container' => 'div',
        'container_class'=>'collapse navbar-collapse',
        'container_id'      => 'navbarTogglerDemo01',
        'menu_class'=>' navbar-nav mr-auto mt-2 mt-lg-0',
 )
    );

    ?>
  </div>
  
  </div><!-- #site-navigation -->
  <?php
}


add_action('storefront_header','add_new_header_nav',50);

//add search into nav list li 
add_filter('wp_nav_menu_items','add_search_tags_nav_header',10,2);

function add_search_tags_nav_header($items, $args){
 if($args->theme_location=="header_menu")
  $items .= '</ul><ul class="navbar-nav">
 
  <li id="menu-item-128" class="menu-item menu-item-type-post_type  menu-item-128">
<form role="search" method="get" class="woocommerce-product-search form-inline my-2 my-lg-0" action="'.esc_url( home_url( '/' ) ).'">
	<label class="screen-reader-text" for="woocommerce-product-search-field-">'.esc_html_e( '', 'woocommerce' ).'</label>
	<input type="search" id="woocommerce-product-search-field-" class="search-field form-control mr-sm-2" placeholder="'.esc_attr__( 'Search products&hellip;', 'woocommerce' ).'" value="'.get_search_query().'" name="s" />
	<button type="submit" class="btn btn-success my-2 my-sm-0" value="'.esc_attr_x( 'Search', 'submit button', 'woocommerce' ).'">'.esc_html_x( 'Search', 'submit button', 'woocommerce' ).'</button>
	<input type="hidden" name="post_type" value="product" />
</form></li></ul>
';  
 

return $items;
}


add_action( 'storefront_header', 'remove_storefront_primary_navigation_wrapper_close');
function remove_storefront_primary_navigation_wrapper_close(){
 remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close',68);

}
add_action( 'storefront_header', 'remove_storefront_product_search' );

function remove_storefront_product_search(){
remove_action( 'storefront_header', 'storefront_product_search', 40 );

}

add_action( 'storefront_homepage', 'remove_storefront_homepage_header',9);
if(! function_exists('remove_storefront_homepage_header')){
  function remove_storefront_homepage_header(){
    remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
  }
}
add_action( 'storefront_page', 'remove_storefront_page_header');
if(! function_exists('remove_storefront_page_header')){
  function remove_storefront_page_header(){
    remove_action( 'storefront_page', 'storefront_page_header', 10 );
  }
}


//add a filter to hook the title of shop page and change iterator_apply
function change_title_shop(){
 if(is_archive('shop')){?>
		<h1 class="woocommerce-products-header__title page-title"><?php echo 'Nos Produits'; ?></h1>

<?php
}

}
add_filter('woocommerce_show_page_title','change_title_shop');
//change the number of product in shop page
add_filter('loop_shop_per_page','new_loop_shop_per_page',20);
if(!function_exists('new_loop')){
  function new_loop_shop_per_page($col){
if(is_archive('product')){
  $col=9;
  return $col;
}
  }
}
// change number of product per row 

add_filter('loop_shop_columns','numbers_products_per_row',999);
if(!function_exists('numbers_products_per_row')){

  function numbers_products_per_row(){
    if(is_archive('product')){
      return 4;

    }
  }
}
// try to change code of html 

//remove home page title
add_action( 'wp', 'remove_title_from_home_default_template' );
 
function remove_title_from_home_default_template() {
   if ( is_front_page() ) remove_action( 'storefront_page', 'storefront_page_header', 10 );
}

add_filter('sanstore_product_category_title','change_title_category');

function change_title_category(){
$tr=get_queried_object()->name;?>
<h1 class="woocommerce-products-header__title page-title"><?php echo $tr;?></h1>
<?php
}

/*
add_action('storefront_content_top','theme_description',14);
function theme_description(){
  if(is_front_page()){
    echo "<h1 class='p-5 desc '>Parce que prendre soin de son corps, c'est prendre soin de son esprit. 
    RARE ARGAN vous partage quelques rituels de beauté et vous accompagne dans vos petits moments de détente.</h1>";
  }
}
*/
add_action('storefront_content_top','bio_theme_categories',10);

function bio_theme_categories(){
if(is_front_page()){?>
  <section class="bio_category_desc animate__animated row mt-3 ">
		  <div class="container mt-5" >
<div class="row">
<div class="col-lg-6">
<a href="http://localhost/wordpresse2/wordpress/product-category/beaute/">
<?php $image=wp_get_attachment_image_src(157, 'category_sizes');
?>

<img src="<?php echo $image[0];?>" alt="" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>" style="width: 509px;
height: 326px;">
<!--
  <p class="des-front">Tous les produits ma Bio sont bio et purs
  Chaulmoogra Seed Oil And its Many Skin Benefits If you’ve never heard of chaulmoogra seed oil, then it’s time t
  </p>
-->
  <span class="save">Save 20%</span>
<div class="sadiq">Voir Categorie</div>
</a>
</div>

<div class="col-lg-6">
  <?php $image=wp_get_attachment_image_src(158, 'category_sizes');?>

<a href="http://localhost/wordpresse2/wordpress/product-category/beaute/">
<img src="<?php echo $image[0];?>" alt="" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>" style="width: 509px;
height: 326px;">
<!--
<p class="des-front">Achetez maintenant et économisez 20%
Chaulmoogra Seed Oil And its Many Skin Benefits If you’ve never heard of chaulmoogra seed oil, then it’s time t
</p>
-->
<span class="save">Save 20%</span>
<div class="sadiq">Voir Categorie</div>


</a>
</div>
</div>
</div>
          </section>
<?php }

}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Ajouter Au Panier', 'woocommerce' );
}
/*
add_action('storefront_page','section_categories',21);

function section_categories(){
  if(is_front_page()){?>
  <section class="categories">
  Hi
  </section>
  <?php
}
}
*/

add_action('storefront_page','section_laivraison',22);
function section_laivraison(){
  if(is_front_page()){
$args=array(
	'post_type' => 'product',
  'posts_per_page'=>'8',
  
) ;
$loop=new WP_Query($args);

if($loop->have_posts()):
  ?>
  <section class="produits container ">
<h2 class="text-center mini-title m-4">Nouveaux Produits
</h2>
<div class="row mt-5">
              <?php
              while($loop->have_posts()):
                  $loop->the_post();?>
                   <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 product-item">
                   <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ),"products_front_page");
                  ?>
                 
                                    <span class="new-box"><span class="new-label">Neuf</span></span>
                                    <div class="produit-details">
              <?php  echo '<a href="'.get_permalink( $loop->post->ID).'">
              <img src="'.$image[0].'" class="hvr-bounce-out">
              </a>';
              ?>  
              <div class="product_info">
                <div class="titre-produit "><?php echo the_title() ;?>
              </div>
             
              <?php do_action( 'woocommerce_after_shop_loop_item_title' );
                    do_action( 'woocommerce_after_shop_loop_item' );?>
  </div>
                </div>
              </div>
               
              <?php endwhile; ?>
            </div>
          </section>
        
        
     
<?php
endif;
}
}
add_action('woocommerce_before_add_to_cart_quantity','quantity_title');
function quantity_title(){
  echo '<div class=" qte">Quantite</div>';
}
// Remove the product description Title
add_filter('woocommerce_product_tabs','remove_description_tabs');
function remove_description_tabs($tabs){
  if(isset($tabs['description'])) unset($tabs['description']);
  return $tabs;
}
 

add_action('woocommerce_loop_category','add_loop_category',10);
if(!function_exists('add_loop_category')){
  function add_loop_category(){
    global $wp_query;
    global $post;
   //var_dump($wp_query);
if(have_posts()){?>
<div class="row">
   <?php while(have_posts()){
     the_post();?>
   <div class="product-item col-lg-4 mb-4">
 
   <?php
      $price = get_post_meta($post->ID,'_price',true);?>
<a href="<?php echo get_the_permalink();?>" >
<?php          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),"products_front_page");

echo '<a href="'.get_permalink( $post->ID).'">
              <img src="'.$image[0].'" class="hvr-bounce-out" style="margin:auto;">
              </a>';
              ?> 
</a>
    <div class=" text-center">
    <div class="ft">
<?php
  
echo the_title().' ';?>
</div>
<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>

<?php
woocommerce_external_add_to_cart();?>

</div>
</div>
<?php
}?>
</div>
  <?php }
  }
}
// Disable all payment gateways on the checkout page and replace the "Pay" button by "Place order"
add_filter( 'woocommerce_cart_needs_payment', '__return_false' );
add_action( 'woocommerce_before_main_content', 'remove_storefront_before_content');

function remove_storefront_before_content(){
 remove_action( 'woocommerce_before_main_content', 'storefront_before_content', 10 );

}
add_action( 'woocommerce_before_main_content', 'change_bio_before_content');

function change_bio_before_content(){?>
  <div id="primary" class="container">
			<main id="main" class="site-main" role="main">
		<?php
}
 add_action( 'woocommerce_after_cart_table_change','after_bio_cart_items' ); 
 if(!function_exists ('after_bio_cart_items')){
   function after_bio_cart_items(){?>
<section class=" zone animate__animated">
		  <div class="row">
<div class="col-2 offset-md-1 " style="border-right: 1px solid #c6c6c6;
margin-bottom: 13px;">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/57376501-bio-icon.jpg" style="width: 132px;">
<div>All Our products Re 100% pure</div>
</div>
<div class="col-2 offset-md-1 " style="border-right: 1px solid #c6c6c6;
margin-bottom: 13px;">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/call-icon-vector-noisy-phone-flat-calling-symbol-isolated-white-background-163818838.jpg" style="width: 146px;">
<div>24 X 7 Clients Support</div>
</div>
<div class="col-2 offset-md-1 " style="border-right: 1px solid #c6c6c6;
margin-bottom: 13px;">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/860302-200.png" style="width: 152px;">
<div>Free Shipping And fast Delivery </div>
</div>
<div class="col-2 offset-md-1" style="border-right: 1px solid #c6c6c6;
margin-bottom: 13px;">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/index.png" style="width: 152px;">
<div>Cash On delivrey</div>
</div>
</div>

		  </section>
<?php
   }
 }
 add_action( 'storefront_page', 'remove_storefront_page_header',10);
 function remove_storefront_page_header(){
 
  remove_action( 'storefront_page', 'storefront_page_header', 10 );
   
}
/*
add_filter('woocommerce_form_field','edit_form_fields_checkout_page',10,3);
if(!function_exists('edit_form_fields_checkout_page')){
  function edit_form_fields_checkout_page($key,$args,$value){


  }
}
*/


add_filter('woocommerce_form_field_args','change_behave_form_fields',10,3);
function change_behave_form_fields($args, $key, $value){

//var_dump($args);

if($args['id']=='billing_first_name'){
$args['class'][]="class123";
}

return $args;

}
//remove header ,sidebarmfooter in checkout page
add_action ('wp','remove_header_footer_checkout_page');
function remove_header_footer_checkout_page(){
  if(is_checkout()){
  remove_all_actions( 'storefront_header' );
  remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
  remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
  }
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
 
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


 
add_action( 'woocommerce_checkout_billing', 'bbloomer_checkout_step2' );
 
function bbloomer_checkout_step2() {
   echo '<p class="steps">STEP1</p>';
}
 
add_action( 'woocommerce_checkout_before_order_review_heading', 'bbloomer_checkout_step3' );
 
function bbloomer_checkout_step3() {
   echo '<p class="steps">STEP2</p>';
}

function wc_remove_checkout_fields( $fields ) {
  // Billing fields
  unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_state']);
  unset( $fields['billing']['billing_company'] );
  unset( $fields['billing']['billing_address_2'] );
  unset( $fields['billing']['billing_address_1'] );
  unset( $fields['billing']['billing_email'] );

  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');
function custom_override_checkout_fields($fields){
  $fields['billing']['billing_address_1']['label']='Adresse';
  $fields['billing']['billing_first_name']['label']='Nom Et Prénom';
  return $fields;
}
add_filter('woocommerce_default_address_fields','edit_required_field_email');
function edit_required_field_email($address_field){
  $address_field['address_1']['required'] = false;
  return $address_field;
}

add_action( 'storefront_page', 'storefront_page_header', 10 );
function storefront_page_header(){
  if(is_checkout()){
    the_title('<div class="title-checkout">','</div>');  }
    else {
      if(is_cart()){
        the_title('<div class="title-checkout">','</div>');  

      }
    }
}
add_action('display_featured_products','edit_featured_products',10);
if(!function_exists('edit_featured_products')){
  function edit_featured_products(){
    $meta_query=WC()->query->get_meta_query();
    $tax_query=WC()->query->get_tax_query();
    $tax_query[]=array(
      'taxonomy'=>'product_visibility',
      'field'=>'name',
      'terms'=>'featured',
      'operator'=>'IN',
    );
    $args=array(
      'post_type'=>'product',
      'post_status'=>'publish',
      'posts_per_page'=>'6',
      'meta_query'=>$meta_query,
      'tax_query'=>$tax_query
    );
    $featured_query=New WP_Query($args);
    if($featured_query->have_posts()){?>
    <div class="featured-products text-center">Produits Similaires</div>
    <div class="row justify-content-center mt-5 p-2">
    
    <?php
      while($featured_query->have_posts()){
$featured_query->the_post();?>
<div class="col-lg-2 col-md-4 col-sm-3 col-2 product-item">
<?php $product=wc_get_product($featured_query->post->ID);

$product_img=woocommerce_get_product_thumbnail('woocommerce_thumbnail');?>
<a href="<?php echo esc_url(get_the_permalink($featured_query->post->ID));?>">
<?php echo $product_img;?>
</a><div class="product_info">
       <?php echo '<div class="pro-title ">'.ucwords(get_the_title($featured_query->post->ID)).'</div>';
       echo '<div>'.$product->get_price().'</div>';
       $rating=$product->get_average_rating();?>
      <div class="rating mb-2"><?php echo wc_get_rating_html($rating);?></div>
      <?php do_action( 'woocommerce_after_shop_loop_item' );?>
   
      </div>
</div>
        <?php
      }?>
      </div>
      <?php
    }
  }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'remove_woocommerce_template_loop_product_thumbnail', 2);
function remove_woocommerce_template_loop_product_thumbnail(){
  if(is_archive())
  remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

}

add_action( 'woocommerce_before_shop_loop_item_title', 'add_archive_woocommerce_template_loop_product_thumbnail', 10 );
function add_archive_woocommerce_template_loop_product_thumbnail(){
if(is_archive()){
  global $product;
 
  $image=wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'category_sizes');

?>

<img class="hvr-bounce-out" src="<?php echo $image[0];?>" alt="" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>" style="width: 509px;
height: 326px;">
<?php }
}
add_action('woocommerce_after_single_product_summary','remove_storefront_woocommerce_pagination',22);
function remove_storefront_woocommerce_pagination(){
remove_action( 'woocommerce_after_single_product_summary', 'storefront_single_product_pagination', 30 );
}
add_action( 'wp', function() {
  remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
  remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
} );
?>