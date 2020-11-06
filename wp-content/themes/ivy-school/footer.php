<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #main-content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
$custom_class       = get_theme_mod( 'footer_custom_class', '' ) . ' site-footer';
?>

</div><!-- #main-content -->

<?php if ( ! is_page_template( 'templates/comingsoon.php' ) ) : ?>
    <?php do_action( 'thim_above_footer_area' ); ?>
	<footer id="colophon" class="<?php echo esc_attr($custom_class);?>">
		<?php thim_footer_layout(); ?>
	</footer><!-- #colophon -->
    <?php do_action( 'thim_end_footer_area' ); ?>
<?php endif; ?>
</div><!-- wrapper-container -->

<?php do_action( 'thim_space_body' ); ?>

<?php wp_footer(); ?>

<script>

// jQuery(function() {
//   jQuery('.our-branches li a[href*=#]').on('click', function(e) {
//     e.preventDefault();
//     jQuery('html, body').animate({ scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 120}, 2000);
//   });
// });

jQuery(function() {
  jQuery('.our-branches li a').on('click', function(e) {
    e.preventDefault();
    jQuery('html, body').animate({ scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 120}, 2000);
  });
});

</script>



<script>
 /*Scroll to top when arrow up clicked BEGIN*/
    jQuery(window).scroll(function () {
        var sticky = jQuery('#masthead'),
            scroll = jQuery(window).scrollTop();

        if (scroll >= 150) {
          sticky.addClass('fixed');
            
        } else {
            sticky.removeClass('fixed')   ;
            
        }

   });

</script>
<script>
 /*Scroll to top when arrow up clicked BEGIN*/
    jQuery(window).scroll(function () {
        var sticky = jQuery('#thimHeaderTopBar'),
            scroll = jQuery(window).scrollTop();

        if (scroll >= 150) {
          sticky.addClass('fixed-topbar');
            
        } else {
            sticky.removeClass('fixed-topbar')   ;
            
        }

   });

</script>
</body>
</html>
