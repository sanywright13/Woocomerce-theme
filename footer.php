<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->
	

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-3 footer-about wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
		        			<h3>About us</h3>
		        			<p>
		        				We are a young company always looking for new and creative ideas to help you with our products in your everyday work.
		        			</p>
		        			<p>© Company Inc.</p>
	                    </div>
		        		<div class="col-md-4 offset-md-1 footer-contact wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
		        			<h3>Contact</h3>
		                	<p><i class="fas fa-map-marker-alt"></i> Via Rossini 10, 10136 Turin Italy</p>
		                	<p><i class="fas fa-phone"></i> Phone: (0039) 333 12 68 347</p>
		                	<p><i class="fas fa-envelope"></i> Email: <a href="mailto:hello@domain.com">hello@domain.com</a></p>
		                	<p><i class="fab fa-skype"></i> Skype: you_online</p>
	                    </div>
	                    <div class="col-md-4 footer-links wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
	                    	<div class="row">
	                    		<div class="col">
	                    			<h3>Links</h3>
	                    		</div>
	                    	</div>
	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<p><a class="scroll-link" href="#top-content">Home</a></p>
	                    			<p><a href="#">Features</a></p>
	                    			<p><a href="#">How it works</a></p>
	                    			<p><a href="#">Our clients</a></p>
	                    		</div>
	                    		<div class="col-md-6">
	                    			<p><a href="#">Plans &amp; pricing</a></p>
	                    			<p><a href="#">Affiliates</a></p>
	                    			<p><a href="#">Terms</a></p>
	                    		</div>
	                    	</div>
	                    </div>
		            </div>
		        </div>
	        </div>
	        <div class="footer-bottom">
	        	<div class="container">
	        		<div class="row">
	           			<div class="col footer-social">
	                    	<a href="#"><i class="fab fa-facebook-f"></i></a> 
							<a href="#"><i class="fab fa-twitter"></i></a> 
							<a href="#"><i class="fab fa-google-plus-g"></i></a> 
							<a href="#"><i class="fab fa-instagram"></i></a> 
							<a href="#"><i class="fab fa-pinterest"></i></a>
	                    </div>
	           		</div>
	        	</div>
	        </div>
        </footer>

	<?php do_action( 'storefront_after_footer' ); 


	?>

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
			
		$('.top-produits .special-product').each(function(){
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

       $('a.added_to_cart').addClass('btn');     

</script>

<script>
	   new WOW().init();

	</script>
<?php  wp_footer(); ?>

</body>
</html>
