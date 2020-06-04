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
<?php do_action('emails_form')?>
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

	<?php do_action( 'storefront_after_footer' ); ?>

	<script>
/*
    Carousel
*/
  
$(document).ready(function($) {
	console.log('hellop');
$('#carousel-example').on('slide.bs.carousel', function (e) {
 
    var $e = $(e.relatedTarget);
    var idx = $e.index();
	console.log(idx);
    var itemsPerSlide = 5;
	console.log(itemsPerSlide);
    var totalItems = $('.carousel-item').length;
 console.log( totalItems);
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});
//image hover



});
</script>
<?php wp_footer(); ?>

</body>
</html>
