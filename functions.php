<?php
 function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
  add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function startwordpress_scripts() {
  wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
  wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

  wp_enqueue_style('owl-carousel2','http://localhost/wordpresse2/wordpress/wp-content/themes/subchild/js/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css');
 wp_enqueue_style('fontsawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
       wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');
       wp_enqueue_style( 'font',  'https://fonts.googleapis.com/css2?family=Almarai&display=swap' );

 
   wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array( 'jquery' ),'',true );
   wp_enqueue_script( 'boot1','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array( 'jquery' ),'',true );

   wp_enqueue_script('san','http://localhost/wordpresse2/wordpress/wp-content/themes/subchild/js/OwlCarousel2-2.3.4/dist/owl.carousel.min.js');
   wp_enqueue_script('wow','http://localhost/wordpresse2/wordpress/wp-content/themes/subchild/js/WOW-master/dist/wow.min.js');
  }


//specific images sizes 
add_image_size('products_front_page',250,350,true);
add_image_size('category_sizes',500,283,true);
add_action( 'woocommerce_after_shop_loop_item', 'remove_woocommerce_template_loop_product_link_close',2);
function remove_woocommerce_template_loop_product_link_close(){
  if(is_front_page()){
    if(!is_admin())
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
  }
}
add_action('storefront_header','remove_brand');
function remove_brand(){
  if(!is_admin())
  remove_action('storefront_header', 'storefront_site_branding',20);

}

add_action('storefront_header','remove_cost');
function remove_cost(){
  if(!is_admin())
  remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );

}
add_action('storefront_header','remove_prev_navigation');
function remove_prev_navigation(){
  if(!is_admin())
  remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
}

add_action( 'storefront_header', 'remove_storefront_header_cart');

function remove_storefront_header_cart(){
  if(!is_admin())
 remove_action( 'storefront_header', 'storefront_header_cart', 60 );

}

//add menu 
add_action('init','bio_add_header_menu');
function bio_add_header_menu(){
  register_nav_menu('header_menu',__( 'Header menu' ));
}
?> 

<?php
//add search into nav list li 

add_filter('wp_nav_menu_items','add_search_tags_nav_header',10,2);

function add_search_tags_nav_header($items, $args){
  if(!is_admin())
 if($args->theme_location=="header_menu")

  $items .= '</ul><ul class="navbar-nav">
 
  <li id="menu-item-128" class="menu-item menu-item-type-post_type  menu-item-128">
<form role="search" method="get" class="woocommerce-product-search form-inline my-2 my-lg-0" action="'.esc_url( home_url( '/' ) ).'">
	<label class="screen-reader-text" for="woocommerce-product-search-field-">'.esc_html_e( '', 'woocommerce' ).'</label>
	<input type="search" id="woocommerce-product-search-field-" class="search-field form-control mr-sm-2" placeholder="بحث عن منتوج" value="'.get_search_query().'" name="s" />
	<button type="submit" class="btn btn-success my-2 my-sm-0" value="'.esc_attr_x( 'Search', 'submit button', 'woocommerce' ).'">ابحث</button>
	<input type="hidden" name="post_type" value="product" />
</form></li>
';  
 

return $items;
}


add_action( 'storefront_header', 'remove_storefront_primary_navigation_wrapper_close');
function remove_storefront_primary_navigation_wrapper_close(){
  if(!is_admin())
 remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close',68);

}
add_action( 'storefront_header', 'remove_storefront_product_search' );

function remove_storefront_product_search(){
  if(!is_admin())
remove_action( 'storefront_header', 'storefront_product_search', 40 );

}

add_action( 'storefront_homepage', 'remove_storefront_homepage_header',9);
if(! function_exists('remove_storefront_homepage_header')){
  function remove_storefront_homepage_header(){
    if(!is_admin())
    remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
  }
}
add_action( 'storefront_page', 'remove_storefront_page_header');
if(! function_exists('remove_storefront_page_header')){
  function remove_storefront_page_header(){
    if(!is_admin())
    remove_action( 'storefront_page', 'storefront_page_header', 10 );
  }
}


//add a filter to hook the title of shop page and change iterator_apply
function change_title_shop(){
 if(is_archive('shop') && !is_search()){?>
		<h1 class="mini-title"><span class="bc"><?php echo 'كل منتوجاتنا'; ?></span></h1>

<?php
}


}
add_filter('woocommerce_show_page_title','change_title_shop');
//change the number of product in shop page
add_filter('loop_shop_per_page','new_loop_shop_per_page',20);
if(!function_exists('new_loop')){
  function new_loop_shop_per_page($col){
if(is_archive('product')){
  $col=12;
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
   if ( is_front_page() && !is_admin()) remove_action( 'storefront_page', 'storefront_page_header', 10 );
}

add_filter('sanstore_product_category_title','change_title_category');

function change_title_category(){
$tr=get_queried_object()->name;?>
<h1 class="mini-title"><?php echo 'Produits '.$tr;?></h1>
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

add_action('storefront_content_top','bio_theme_categories',10);

function bio_theme_categories(){
if(is_front_page()){?>
  <section class="bio_category_desc animate__animated row mt-3 ">
		  <div class="container mt-5" >
<div class="row">
<div class="col-lg-6">
<a href="http://localhost/wordpresse2/wordpress/product-category/bio/">
<?php $image=wp_get_attachment_image_src(157, 'category_sizes');
?>

<img src="<?php echo $image[0];?>" alt="" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>" style="width: 509px;
height: 326px;">
<!--
  <p class="des-front">Tous les produits ma Bio sont bio et purs
  Chaulmoogra Seed Oil And its Many Skin Benefits If you’ve never heard of chaulmoogra seed oil, then it’s time t
  </p>
-->
  <span class="save">تخفيطات %20</span>
<div class="sadiq">انظر الان</div>
</a>
</div>

<div class="col-lg-6">
  <?php $image=wp_get_attachment_image_src(158, 'category_sizes');?>

<a href="http://localhost/wordpresse2/wordpress/product-category/bio/">
<img src="<?php echo $image[0];?>" alt="" width="<?php echo $image[1];?>" height="<?php echo $image[2];?>" style="width: 509px;
height: 326px;">
<!--
<p class="des-front">Achetez maintenant et économisez 20%
Chaulmoogra Seed Oil And its Many Skin Benefits If you’ve never heard of chaulmoogra seed oil, then it’s time t
</p>
-->
<span class="save">تخفيطات %20</span>
<div class="sadiq">انظر الان</div>


</a>
</div>
</div>
</div>
          </section>
<?php }

}
*/
// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Ajouter Au Panier', 'woocommerce' );
}

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
<h2 class="text-center mini-title m-4"><span class="bc">المنتوجات الجديدة
</span>
</h2>
<div class="row mt-5">
              <?php
              while($loop->have_posts()):
                  $loop->the_post();?>
                   <div class="col-6 col-sm-6 col-md-4 col-lg-3  mb-3">
                   <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ),"products_front_page");
                  ?>
                 <div class="product-item">
                                   <!-- <span class="new-box"><span class="new-label">Neuf</span></span>-->
                                    <div class="produit-details">
              <?php  echo '<a href="'.get_permalink( $loop->post->ID).'">
              <img src="'.$image[0].'" class="hvr-bounce-out">
              </a>';
              ?>  
              <div class="product_info">
                <div class="titre-produit "><h2><?php echo the_title() ;?></h2>
              </div>
             
              <?php do_action( 'woocommerce_after_shop_loop_item_title' );
                    do_action( 'woocommerce_after_shop_loop_item' );?>
  </div>
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
  echo '<div class=" qte">الكمية</div>';
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
  if(!is_admin())
 remove_action( 'woocommerce_before_main_content', 'storefront_before_content', 10 );

}

 add_action( 'woocommerce_after_cart_table_change','after_bio_cart_items' ); 
 if(!function_exists ('after_bio_cart_items')){
   function after_bio_cart_items(){?>
<section class=" zone animate__animated">

<div class=" d-flex  justify-content-around">
  <div class="p-2  bd-highlight"><div class="ban wow animate__animated ">
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/57376501-bio-icon.jpg" style="width: 132px;">
<div class="ban_mini_title">كل منتجاتنا طبيعية 100%</div>
</div></div>
  <div class="p-2  bd-highlight"><div class="ban  wow animate__animated ">
  <img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/call-icon-vector-noisy-phone-flat-calling-symbol-isolated-white-background-163818838.jpg" style="width: 146px;">
<div class="ban_mini_title">خدمة الزبناء عبر الهاتف </div>
</div></div>
  <div class="p-2  bd-highlight">
    <div class="ban  wow animate__animated ">
    <img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/860302-200.png" style="width: 152px;">
<div class="ban_mini_title">التوصيل مجاني و سريع</div>
</div></div>
<div class="p-2  bd-highlight">
    <div class="ban  wow animate__animated ">
    <img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/index.png" style="width: 152px;">
<div class="ban_mini_title" >اثمنة في المتناول</div>
</div></div>
</div>


		  </section>
<?php
   }
 }
 add_action( 'storefront_page', 'remove_storefront_page_header',10);
 function remove_storefront_page_header(){
 if(!is_admin())
  remove_action( 'storefront_page', 'storefront_page_header', 10 );
   
}

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
  if(is_checkout() && !is_admin()){
  remove_all_actions( 'storefront_header' );
  remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
  remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
  }
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
 
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


 
add_action( 'woocommerce_checkout_billing', 'bbloomer_checkout_step2' );
 
function bbloomer_checkout_step2() {
   echo '<p class="steps">الخطوة 1</p>';
}
 
add_action( 'woocommerce_checkout_before_order_review_heading', 'bbloomer_checkout_step3' );
 
function bbloomer_checkout_step3() {
   echo '<p class="steps">الخطوة 2</p>';
}

function wc_remove_checkout_fields( $fields ) {
  // Billing fields
  if(!is_admin()){
  unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_state']);
  unset( $fields['billing']['billing_company'] );
  unset( $fields['billing']['billing_address_2'] );
  unset( $fields['billing']['billing_address_1'] );
  unset( $fields['billing']['billing_email'] );
  }
  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');
function custom_override_checkout_fields($fields){
  if(!is_admin()){
  $fields['billing']['billing_first_name']['label']='الاسم';
  $fields['billing']['billing_city']['label']='المدينة';
  $fields['billing']['billing_phone']['label']='رقم الهاتف';
  return $fields;
  }
}
add_filter('woocommerce_default_address_fields','edit_required_field_email');
function edit_required_field_email($address_field){
  if(!is_admin()){
  $address_field['address_1']['required'] = false;
  return $address_field;
  }
}

add_action( 'storefront_page', 'storefront_page_header', 10 );
function storefront_page_header(){
  if(is_checkout()){
    if(!is_wc_endpoint_url( 'order-received' ) ){
echo'<div class="title-checkout">المرجو ادخال معلوماتك </div>';  }
    }
    else {
      if(is_cart()){
        if(!WC()->cart->is_empty()){
       echo '<div class="title-checkout mt-5">سلة مشترياتكم</div>';  
       echo '<span class="cart_mes">'; 
		
        echo 'ملحوظة : التوصيل مجاني لجميع مدن المغرب' ;
       
       echo '</span>';
      }
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
    <div class="featured-products text-center">منتجات مشابهة</div>
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
  if(is_archive() && !is_admin())
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
  if(!is_admin())

remove_action( 'woocommerce_after_single_product_summary', 'storefront_single_product_pagination', 30 );
}
add_action( 'wp', function() {
  if(!is_admin())
{
  remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
  remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
}
} );
add_action( 'woocommerce_shop_loop_item_title', 'remove_woocommerce_template_loop_product_title', 9 );
function remove_woocommerce_template_loop_product_title(){
  if(!is_admin())

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
}

add_action('woocommerce_shop_loop_item_title','edit_shop_title_product',10);
if ( ! function_exists( 'edit_shop_title_product' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function edit_shop_title_product() {
		echo '<div class="titre-produit"><h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2></div>';
	}
}
add_filter('woocommerce_product_add_to_cart_text','changer_add_to_cart_text_loop');
function changer_add_to_cart_text_loop(){
  $button_text='أضف إلى السلة';
  return $button_text;
}

add_filter( 'woocommerce_get_script_data', 'change_js_view_cart_button', 10, 2 ); 
function change_js_view_cart_button( $params, $handle )  {
    if( 'wc-add-to-cart' !== $handle ) return $params;

    $params['i18n_view_cart'] = esc_attr__( 'ادهب الى السلة', "woocommerce"); // Text

    return $params;
}
//change subtotal name to arabic
add_action( 'woocommerce_widget_shopping_cart_total', 'remove_change_woocommerce_widget_shopping_cart_subtotal',9 );
function remove_change_woocommerce_widget_shopping_cart_subtotal(){
  if(!is_admin())

  remove_action( 'woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal', 10 );

}

add_action( 'woocommerce_widget_shopping_cart_total', 'change_woocommerce_widget_shopping_cart_subtotal', 10 );

if ( ! function_exists( 'change_woocommerce_widget_shopping_cart_subtotal' ) ) {

function change_woocommerce_widget_shopping_cart_subtotal() {
		echo '<strong> المجموع :</strong> ' . WC()->cart->get_cart_subtotal();
	}
}
 // change viw cart in mini cart 

add_action( 'woocommerce_widget_shopping_cart_buttons', 'remove_woocommerce_widget_shopping_cart_button_view_cart',9);
function remove_woocommerce_widget_shopping_cart_button_view_cart(){
  if(!is_admin())

  remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'change_woocommerce_widget_shopping_cart_button_view_cart', 10 );

 if ( ! function_exists( 'change_woocommerce_widget_shopping_cart_button_view_cart' ) ) {

	function change_woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">ادهب الى السلة </a>';
	}
}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'remove_woocommerce_widget_shopping_cart_proceed_to_checkout', 11 );
function remove_woocommerce_widget_shopping_cart_proceed_to_checkout(){
  if(!is_admin())

remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'edit_widget_shopping_cart_proceed_to_checkout', 20 );

if ( ! function_exists( 'edit_widget_shopping_cart_proceed_to_checkout' ) ) {


	function edit_widget_shopping_cart_proceed_to_checkout() {
		echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward"> تأكيد الطلب </a>';
	}
}
add_filter('woocommerce_order_button_text','order_button_text');
function order_button_text($order_button_text){
  $order_button_text="اطلب الان";
 return $order_button_text;
}


 add_filter('woocommerce_thankyou_order_received_text','change_text_thankyou',10,2);
 function change_text_thankyou($text,$order){
   $text="شكرا لك. تم استلام طلبك";
return $text;
 }

add_action('woocommerce_before_main_content', 'remove_product_storefront_before_content', 9 );
function remove_product_storefront_before_content(){
  if(is_product()){
    if(!is_admin())

remove_action('woocommerce_before_main_content', 'storefront_before_content', 10 );
  }
}
add_action('woocommerce_before_main_content','add_new_before_site');
function add_new_before_site(){
  if(is_product()){
  
  ?>
  <div id="primary" class="container">
			<main id="main" class="site-main" role="main">
<?php } 
}

add_filter('woocommerce_product_single_add_to_cart_text','change_text_single_product',10);
function change_text_single_product($text){
$text="اشتري الان";
return $text;
}
add_filter('woocommerce_reviews_title','change_text_review',10,3);
function change_text_review($reviews_title, $count, $product){
  $reviews_title="أراء الزبناء";
echo '<h2 class="text-center mb-5 "><span class="bc">'.$reviews_title.'</span></h2>';
}


add_filter( 'woocommerce_product_review_comment_form_args', 'filter_function_name_5512' );
function filter_function_name_5512( $comment_form ){

//var_dump($comment_form);
unset( $comment_form['fields']['email']);

unset($comment_form['fields']['must_log_in']);
$comment_form['label_submit']="إرسال";
$comment_form['fields']['author']='
<p class="comment-form-author"><label for="author">الاسم<span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required /></p>';
$comment_form['fields']['cookies']='<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent">احفظ اسمي والبريد الإلكتروني في المتصفح لتعليقي التالي</label></p>';
  
return $comment_form;
}

add_action( 'woocommerce_before_single_product', 'remove_woocommerce_output_all_notices');
function remove_woocommerce_output_all_notices(){
  if(!is_admin())
  remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );

}

add_action( 'woocommerce_cart_is_empty', 'remove_wc_empty_cart_message', 9);
function remove_wc_empty_cart_message(){
  if(!is_admin())

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message',10);

}
add_action( 'woocommerce_cart_is_empty', 'edit_wc_empty_cart_message', 10);

function edit_wc_empty_cart_message() {
	echo '<div class="cart-empty woocommerce-info">' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'سلة المشتريات فارغة حاليا', 'woocommerce' ) ) ) . '</div>';
}
add_action( 'woocommerce_before_main_content', 'remove_shop_storefront_before_content', 9);
function remove_shop_storefront_before_content(){
  if(is_tax('shop')){
    if(!is_admin())
remove_action( 'woocommerce_before_main_content', 'storefront_before_content', 10 );
  }
}
add_action( 'woocommerce_before_main_content', 'edit_shop_storefront_before_content',10);

function edit_shop_storefront_before_content() {
  if(is_tax('shop')){
		?>
		<div id="primary" class="container">
			<main id="main" class="site-main" role="main">
		<?php
	}
}

add_shortcode('woo_mini_cart','woo_mini_cart');
function woo_mini_cart(){
  ob_start();
  $cart_url = wc_get_cart_url();?>
  <div class="mini-cart">
  <a href="<?php echo $cart_url; ?>">

    <span> السلة </span> 
    <span> <?php $cart_count = WC()->cart->cart_contents_count;
    echo  $cart_count; ?>
    <i class="fas fa-shopping-cart"></i>
    </span>
    </a>
</div>
  <?php
      return ob_get_clean();
}

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
  ob_start();
  $cart_url = wc_get_cart_url();?>
  <div class="mini-cart">
    <a href="<?php echo $cart_url; ?>">
    <span> السلة</span> <span> <?php $cart_count = WC()->cart->cart_contents_count;
    echo  $cart_count; ?><i class="fas fa-shopping-cart"></i></span>
    </a>
</div>
<?php 
$fragments['div.mini-cart'] = ob_get_clean();

return $fragments;
}



add_filter( 'wp_nav_menu_items', 'woo_cart_but_icon', 12, 2 ); // Change menu to suit - example uses 'top-menu'


function woo_cart_but_icon ( $items, $args ) {
       $items .= do_shortcode('[woo_mini_cart]') ; 
       
       return $items;
} 
add_filter('woocommerce_catalog_orderby','translate_order_by',10);
function translate_order_by($array){
$array=array(
  'menu_order' =>  'ترتيب عشوائي',
'popularity' => __( 'الاكثر مبيعا', 'woocommerce' ),
'rating'     => __( 'الاحسن تقييم', 'woocommerce' ),
'date'       => __( 'ترتيب من الجديد الى القديم', 'woocommerce' ),
'price-desc'      => __( 'من اعلى ثمن الى ارخص ثمن', 'woocommerce' ),
' price' => __( 'من ارخص الى اغلى ثمن', 'woocommerce' ),
);
return $array;
}
add_action( 'storefront_before_content', 'remove_woocommerce_breadcrumb', 9 );
function remove_woocommerce_breadcrumb(){
 
remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}

add_action( 'woocommerce_before_single_product_summary', 'add_single_product_breadcrumb', 10);
function add_single_product_breadcrumb(){
  
  if(is_product()){
    global $post;
  $id = $post->ID;
  $home="http://localhost/wordpresse2/wordpress/";
  echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="'. $home.'">الرئيسية</a></li>
    <li class="breadcrumb-item active" aria-current="page">'.get_the_title($id).'</li>

  </ol>
</nav>';

}
}

add_action( 'woocommerce_archive_description', 'edit_woocommerce_breadcrumb', 10 );
function edit_woocommerce_breadcrumb(){
  
if(is_search()){
 if ( have_posts() ) {
  $home="http://localhost/wordpresse2/wordpress/";
  $shop_page="http://localhost/wordpresse2/wordpress/shop/";
  echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="'. $home.'">الرئيسية</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="'.$shop_page.'">كل المنتجات</a></li>
    <li class="breadcrumb-item active" aria-current="page">لقد قمت بالبحت عن '.get_search_query().'</li>


  </ol>
</nav>';
}
 else {
  echo ' " '.get_search_query().' "  لا يوجد منتج مطابق لاختيارك';

 }
}
}

add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() { 
   if (is_cart()) { 
      ?> 
      <script type="text/javascript"> 
         jQuery('div.woocommerce').on('click', 'input.qty', function(){ 
            jQuery("[name='update_cart']").trigger("click"); 
         }); 
      </script> 
      <?php 
   } 
}
/*
add_filter( 'woocommerce_update_cart_action_cart_updated', 'when_cart_updated' ,10);
function when_cart_updated($cart_updated){
if($cart_updated){
               wc_add_notice( __( 'ff.', 'woocommerce' ) );
 
}
return $cart_updated;
}

add_filter( 'woocommerce_cart_item_removed_title', 'removed_from_cart_title', 12, 2);
function removed_from_cart_title( $message, $cart_item ) {
    $product = wc_get_product( $cart_item['product_id'] );

    if( $product )
        $message = sprintf( __('تم مسح هدا المنتج من سلة المشتريات'));

    return $message;
}
*/
add_filter('gettext', 'cart_undo_translation', 35, 3 );
function cart_undo_translation( $translation, $text, $domain ) {

    if( $text === 'Undo?' ) {
        $translation =  __( 'ارجاعه', $domain );
    }
    if( $text === 'removed' ) {
      $translation =  __( 'ارجاعه', $domain );
  }
  if ($text == 'Cart updated.') {
    $translation = 'تم تحديت السلة';
}
    return $translation;
}

add_filter( 'wc_add_to_cart_message_html', 'bbloomer_custom_add_to_cart_message' );
 
function bbloomer_custom_add_to_cart_message() {
$message = '<div class="d-flex bd-highlight">
<div class="flex-grow-1">
<span> تمت إضافة المنتج إلى سلة التسوق الخاصة بك </span> 
</div>
<div>
<a href="'.wc_get_cart_url().'"> ادهب الى السلة<a/>
</div>
</div>' ;
return $message;
}
/*
add_action('woocommerce_after_cart_item_quantity_update','example',20,4);
function example($cart_item_key, $quantity, $old_quantity, $cart){

  if( !is_cart() ) return; // Only on cart page
// Here the quantity limit
$limit = 5;
echo $cart->cart_contents[ $cart_item_key ]['quantity'];

    // Change the quantity to the limit allowed
echo $quantity; // Add a custom notice
    wc_add_notice( __('Quantity limit reached for this item'), 'notice' );

}
*/
add_action( 'template_redirect', 'null_removed_cart_item_message'  );
function null_removed_cart_item_message() {
    if( ! is_cart() ) return;
    $wc_notices = (array) WC()->session->get( 'wc_notices' );
   
    $found      = false; 
    if( isset($wc_notices['success']) && sizeof($wc_notices['success']) ) {
        foreach( $wc_notices['success'] as $key => $wc_notice ) {
       
           if ( strpos($wc_notice['notice'], 'removed') !== false ) {
                unset($wc_notices['success']);
                $found = true;
            }
        }
    }
    if( $found ) {
        WC()->session->set( 'wc_notices', $wc_notices );
    }
  }
  add_action( 'woocommerce_before_shop_loop', 'remove_woocommerce_pagination',9 );
  function remove_woocommerce_pagination(){
    remove_action( 'woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30 );
  }
  add_action( 'woocommerce_after_shop_loop1', 'add_woocommerce_shop_pagination',10 );
  function add_woocommerce_shop_pagination(){
    if ( woocommerce_products_will_display() ) {?>
		<div class="d-flex justify-content-center"><?php	woocommerce_pagination(); ?></div>
   <?php }
    }

?>