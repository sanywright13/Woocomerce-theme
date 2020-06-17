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
	</div><!-- #page -->
</div>

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); 


	?>

	<script>
/*
    Carousel
*/
  
jQuery(document).ready(function($){

  function  check_if_in_view (){
 
$('.animate__animated').each(function(){
	element_high=$(this).offset().top+$(this).outerHeight();

	window_scroll=$(window).scrollTop()+$(window).height();
	
	if($(this).offset().top<=window_scroll && element_high>=$(window).scrollTop()){
		console.log($(this)[0]);
		console.log($('.bio_category_desc')[0]);
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

	$('.zone .col-2 ').on('hover',function(){
	  $(this).toggleClass('animate__animated animate__headShake')
	  
  })
  $('.attachment-post-thumbnail').on('hover',function(){
	$(this).toggleClass('animate__animated animate__pulse')
	  
  })

});
</script>


<?php  wp_footer(); ?>

</body>
</html>
