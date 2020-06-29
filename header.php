<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- <div id="page" class="hfeed site">-->
<div id="page">
<div class="dd">    <a href="tel:0689202835">0689202835</a> / <a href="tel:0772960667">0772960667</a>للطلب او الاستفسار  </div>
<div class="navbar navbar-expand-lg navbar-light" >
<img src="http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/logo.png" class="img-fluid" alt="" style="max-width: 95px;">

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
    );?>

	
  </div>
  
  </div><!-- #site-navigation -->

<?php if(is_front_page()){ ?>

  <div id="owl-demo" class="owl-carousel owl-theme">
     
	 <div class="item">
		 <div class="header-container background-costume" style="background-image:url(http://localhost/wordpresse2/wordpress/wp-content/uploads/2020/06/ff.png)">
	<div class="container">
<div class="row shop-now">
	<div class="fi">
	<div class="col-md-12">
<h3>ختار لي بغيتي و كلشي يوصلك حتى للدار فأقل من <span class="sd">48 </span>ساعة</h3>
</div>

<div class="col-md-12">
	<a class="btn button" style="color: black;">اشتري الان</a>
</div>
</div>
</div>
</div>

   </div>
</div>

</div>
<?php }?>

	<!-- #masthead -->

	<?php
	do_action( 'storefront_before_content' );
	?>

<div id="content" class="site-content" tabindex="-1">
<div class="<?php if(is_cart()){?> fd <?php }?>">
	
		<?php if(!is_cart())
		do_action( 'storefront_content_top' );?>
