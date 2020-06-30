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
	   new WOW().init();

	</script>
	<script>

jQuery(document).ready(function($){

  function  check_if_in_view (){
 
$('.animate__animated').each(function(){
	element_high=$(this).offset().top+$(this).outerHeight();

	window_scroll=$(window).scrollTop()+$(window).height();
	
	if($(this).offset().top<=window_scroll && element_high>=$(window).scrollTop()){
	
if($(this)[0]==$('.bio_category_desc')[0]){
$(this).addClass('animate__fadeInLeft')
}
	if($(this)[0]==$('.zone')[0]){
		$(this).addClass('animate__slideInUp')
	}


}

})
 }
 
	$(window).on('scroll resize', check_if_in_view);
	function animate_front_page_image(){
			
		$('.ss').each(function(){
			element_high=$(this).offset().top+$(this).outerHeight();

	window_scroll=$(window).scrollTop()+$(window).height();
	
			element_high=$(this).offset().top+$(this).outerHeight();

	window_scroll=$(window).scrollTop()+$(window).height();
	if($(this).offset().top<=window_scroll && element_high>=$(window).scrollTop()){
			$(this).addClass('animate__animated animate__fadeInUpBig')	;
			}
		})
	}
$(window).on('scroll resize',animate_front_page_image);
	$('.zone .col-2 ').on('hover',function(){
	  $(this).toggleClass('animate__animated animate__headShake')
	  
  })
  $('.attachment-post-thumbnail').on('hover',function(){
	$(this).toggleClass('animate__animated animate__pulse')
	  
  });
 

   
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
