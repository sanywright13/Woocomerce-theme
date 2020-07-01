</div><!-- .col-full -->
	</div><!-- #content -->
	

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-4 footer-about wow fadeInUp">
		        			<h3>معلومات عنا</h3>
		        			<p>
							شركة مغربية تعنى بجلب أجود المنتوجات الطبيعية الخالية من اي مواد مضرة صنعت بكل فخر لكم ، ارضائكم هو هدفنا		        			<p>© Company Inc.</p>
	                    </div>
		        		<div class="col-md-3 offset-md-1 offset-md-1 footer-contact wow fadeInDown" >
		        			<h3>للتواصل معنا</h3>
		                	<p><i class="fas fa-map-marker-alt"></i> Via Rossini 10, 10136 Turin Italy</p>
		                	<p> الهاتف :  <a href="tel:0689202835">0689202835</a> / <a href="tel:0772960667">0772960667</a><i class="pl-2 fas fa-phone"></i></p>
		                	<p><i class="fas fa-envelope"></i> Email: <a href="mailto:hello@domain.com">hello@domain.com</a></p>
		                	<p><i class="fab fa-skype"></i> Skype: you_online</p>
	                    </div>
	                    <div class="col-md-3 offset-md-1 footer-links wow fadeInUp">
	                    	<div class="">
	                    		<div class="">
	                    			<h3>الروابط</h3>
	                    		</div>
	                    	</div>
	                    	<div class="">
	                    		<div class="">
	                    			<p><a class="scroll-link" href="<?php echo get_bloginfo('wpurl');?>">الرئيسية</a></p>
	                    			<p><a href="<?php echo get_the_permalink(get_page_by_title('shop')->ID);?>">كل المنتجات</a></p>
	                    			<p><a href="<?php echo get_the_permalink(get_page_by_title('cart')->ID);?>">السلة</a></p>
	                    		</div>
	                    		
	                    	</div>
	                    </div>
		            </div>
		        </div>
	        </div>
        </footer>

	<?php do_action( 'storefront_after_footer' ); 


	?>
<script>
	   var wow = new WOW();
  wow.init();

	</script>
	<script>

jQuery(document).ready(function($){

  $("#owl-demo").owlCarousel({
		loop:true,
		 nav : true, // Show next and prev buttons
		 pagination:true,
		 autoplay: true,
		 slideSpeed : .100,
		 paginationSpeed : 400,
		 lazyLoad:true,
		 items : 1, 
		 itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false,
	  dots:true,
	  transitionStyle : "fade",
	  animateOut: 'animate__fadeOut',
    animateIn: 'animate__fadeIn',
	
	 });

});

</script>


<?php  wp_footer(); ?>

</body>
</html>
