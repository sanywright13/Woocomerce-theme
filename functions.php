<?php
 function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
  add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function startwordpress_scripts() {
    wp_enqueue_style('fontsawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
   
       wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
     wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
  
  
  wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.4.1.min.js', array( 'jquery' ),'',false);
      wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
      wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array( 'jquery' ),'',true );
      
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
function add_new_header_nav(){
?> 


 <div id="site-navigation" class="main-navigation container-fluid navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
 <div class="container-fluid ">
 <div class="row" style="width: 100%;">
<div class="col-7 ml-auto" style="">
<a class="navbar-brand" href="#"><img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/Untitled-1-1.jpg" alt="" /></a>
  
</div>

  <div class="col-12">
  <hr>
 <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"><i class="fas fa-list-alt"></i></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <?php
    wp_nav_menu(
      array(
        'theme_location'  => 'primary',
        'container' => 'div',
        'container_class'=>'collapse navbar-collapse',
        'container_id'      => 'navbarResponsive',
        'menu_class'=>' navbar-nav mr-auto mt-2 mt-lg-0',

       
      )
    );

    ?>
       <form class="form-inline my-2 my-lg-0">
 <?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>

    </form>
    </div>
  </div>
  </div>
  </div>
  </div><!-- #site-navigation -->

  <?php
}


add_action('storefront_header','add_new_header_nav',50);


add_action( 'storefront_header', 'remove_storefront_primary_navigation_wrapper_close');
function remove_storefront_primary_navigation_wrapper_close(){
 remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close',68);

}
add_action( 'storefront_header', 'remove_storefront_product_search' );

function remove_storefront_product_search(){
remove_action( 'storefront_header', 'storefront_product_search', 40 );

}


add_action( 'storefront_header', 'remove_storefront_header_cart');
if(! function_exists('remove_storefront_header_cart')){
  function remove_storefront_header_cart(){
remove_action('storefront_header', 'storefront_header_cart', 61);
  } 
}

add_action('storefront_header','add_cart_header',50);
if(!function_exists('add_cart_header')){

  function add_cart_header(){
    if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
      ?>
      <div class="d-flex justify-content-end">
		<ul id="site-header-cart" class="site-header-cart menu  col-3">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<li>
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</li>
    </ul>
    </div>
			<?php
		}

  }
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
		<h1 class="woocommerce-products-header__title page-title"><?php echo 'New Arrivals'; ?></h1>

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
<h2>Explore all of our best product of  <?php echo $tr ; ?> category</h2>
<?php
}
add_action('emails_form','add_homepage_email_form',10);
function add_homepage_email_form(){
 if( is_front_page()){ ?>
<div class="splash"><div class="row"></div><div class="col-lg-12"><div class="">Emails</div></div></div>
 <?php }
}

add_action('storefront_content_top','theme_description');
function theme_description(){
  if(is_front_page()){
    echo "<h1 class='p-5 desc'>Parce que prendre soin de son corps, c'est prendre soin de son esprit. 
    RARE ARGAN vous partage quelques rituels de beauté et vous accompagne dans vos petits moments de détente.</h1>";
  }
}

add_action('storefront_page','section_laivraison',22);
function section_laivraison(){
$args=array(
	'post_type' => 'product',
  'posts_per_page'=>'12',
  'category'=>'clothing'
) ;
$loop=new WP_Query($args);

if($loop->have_posts()):
  ?>
<h2 class="text-center mini-title">Nos Produits</h2>
<div class="top-content">
    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
              <?php $i=1 ;
              while($loop->have_posts()):
                  $loop->the_post();
                  
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ),"medium");
                  ?>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 <?php if($i==1){?>active <?php } ?>">
              <?php  echo '<a href="'.get_permalink( $loop->post->ID).'"><img src="'.$image[0].'" class="img-fluid mx-auto d-block"/></a>';
	echo '<span>'. do_action( 'woocommerce_after_shop_loop_item' ).' <span>';
  ?>
                </div>
               
              <?php $i=$i+1; endwhile; ?>
            </div>
            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<?php
endif;
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

add_action( 'woocommerce_before_shop_loop_2', 'change_woocommerce_catalog_ordering',15);
function change_woocommerce_catalog_ordering(){

  if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
    return;
  }
  $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
  $catalog_orderby_options = apply_filters(
    'woocommerce_catalog_orderby',
    array(
      'menu_order' => __( 'Default sorting', 'woocommerce' ),
      'popularity' => __( 'Sort by popularity', 'woocommerce' ),
      'rating'     => __( 'Sort by average rating', 'woocommerce' ),
      'date'       => __( 'Sort by latest', 'woocommerce' ),
      'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
      'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    )
  );

  $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
  $orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

  if ( wc_get_loop_prop( 'is_search' ) ) {
    $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

    unset( $catalog_orderby_options['menu_order'] );
  }

  if ( ! $show_default_orderby ) {
    unset( $catalog_orderby_options['menu_order'] );
  }

  if ( ! wc_review_ratings_enabled() ) {
    unset( $catalog_orderby_options['rating'] );
  }

  if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
    $orderby = current( array_keys( $catalog_orderby_options ) );
  }

  wc_get_template(
    'loop/orderby.php',
    array(
      'catalog_orderby_options' => $catalog_orderby_options,
      'orderby'                 => $orderby,
      'show_default_orderby'    => $show_default_orderby,
    )
  );
}


add_action('pre_get_posts','order_category_loop',10);

function order_category_loop($query){
 if(is_tax('product_cat') && $query->is_main_query()){
   /*
if(isset($_GET['orderby'])){
  $arg=$_GET['orderby'];

}
else{
  $arg='title';
}

if(isset($arg) &&  esc_html($arg)=="price") {

 

   $query->set('orderby','meta_value_num');
   $query->set('meta_key','_price');
  $query->set('order','ASC');*/
  $query->set('posts_per_page',10);
/*
}
else{

$query->set('orderby','meta_value_num');
$query->set('meta_key',"_price");
$query->set('order','DESC');
$query->set('posts_per_page','20');
} */
 } 

}


add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
function custom_woocommerce_get_catalog_ordering_args( $args ) {
  $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
	if ( 'random_list' == $orderby_value ) {
		$args['orderby'] = 'rand';
		$args['order'] = '';
		$args['meta_key'] = '';
  }
  else{
    if($orderby_value=="price"){
echo $orderby_value;
      $args['orderby'] = 'meta_value_num';
		$args['order'] = 'DESC';
		$args['meta_key'] = '_price';
    }
    else if('popularity' == $orderby_value){
      $args['orderby']  = ['menu_order' => 'DESC', 'meta_value_num' => 'DESC'];
      $args['meta_key'] = 'total_sales';
    }
  }
	return $args;
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
   <div class="col-lg-4">
   <?php
      $price = get_post_meta($post->ID,'_price',true);?>
<a href="<?php echo get_the_permalink();?>" >
<?php if(has_post_thumbnail()){
 echo the_post_thumbnail();
}?>
</a>
<?php
  
echo the_title().' ';
echo $price;
woocommerce_external_add_to_cart();?>
</div>
<?php
}?>
</div>
  <?php }
  }
}
?>