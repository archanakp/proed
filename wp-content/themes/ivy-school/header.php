<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?><!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<script type="text/javascript">
/*
  Turn Visual Composer Image Carousel into Visual Composer Infinite Image Carousel
  Include before the </head> tag on yout theme's header.php 
  Read the detailed step-by-step at https://humbertosilva.com/visual-composer-infinite-image-carousel/
*/

    // auxiliary code to create triggers for the add and remove class for later use
    (function($){
    $.each(["addClass","removeClass"],function(i,methodname){
        var oldmethod = $.fn[methodname];
        $.fn[methodname] = function(){
              oldmethod.apply( this, arguments );
              this.trigger(methodname+"change");
              return this;
        }
    });
    })(jQuery);
  
    // main function for the infinite loop
    function vc_custominfiniteloop_init(vc_cil_element_id){

      var vc_element = '#' + vc_cil_element_id; // because we're using this more than once let's create a variable for it
      window.maxItens = jQuery(vc_element).data('per-view'); // max visible items defined
      window.addedItens = 0; // auxiliary counter for added itens to the end 
             
      // go to slides and duplicate them to the end to fill space
      jQuery(vc_element).find('.vc_carousel-slideline-inner').find('.vc_item').each(function(){
        // we only need to duplicate the first visible images
        if (window.addedItens < window.maxItens) {
          if (window.addedItens == 0 ) {
            // the fisrt added slide will need a trigger so we know it ended and make it "restart" without animation
            jQuery(this).clone().addClass('vc_custominfiniteloop_restart').removeClass('vc_active').appendTo(jQuery(this).parent());            
          } else {
            jQuery(this).clone().removeClass('vc_active').appendTo(jQuery(this).parent());         
          }
          window.addedItens++;
        }
      });

      // add the trigger so we know when to "restart" the animation without the user knowing about it
      jQuery('.vc_custominfiniteloop_restart').bind('addClasschange', null, function(){
        
        // navigate to the carousel element , I know, its ugly ...
        var vc_carousel = jQuery(this).parent().parent().parent().parent();

        // first we temporarily change the animation speed to zero
        jQuery(vc_carousel).data('vc.carousel').transition_speed = 0;

        // make the slider go to the first slide without animation and because the fist set of images shown
        // are the same that are being shown now the slider is now "restarted" without that being visible 
        jQuery(vc_carousel).data('vc.carousel').to(0);

        // allow the carousel to go to the first image and restore the original speed 
        setTimeout("vc_cil_restore_transition_speed('"+jQuery(vc_carousel).prop('id')+"')",100);
      });

    }

    // restore original speed setting of vc_carousel
    function vc_cil_restore_transition_speed(element_id){
    // after inspecting the original source code the value of 600 is defined there so we put back the original here
    jQuery('#' + element_id).data('vc.carousel').transition_speed = 600; 
    }

    // init     
    jQuery(document).ready(function(){    
      // find all vc_carousel with the defined class and turn them into infine loop
      jQuery('.vc_custominfiniteloop').find('div[data-ride="vc_carousel"]').each(function(){
        // allow time for the slider to be built on the page
        // because the slider is "long" we can wait a bit before adding images and events needed  
        var vc_cil_element = jQuery(this).prop("id");
        setTimeout("vc_custominfiniteloop_init('"+vc_cil_element+"')",2000);      
      });    
    });

</script>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'thim_before_body' ); ?>

<div id="wrapper-container" <?php thim_wrapper_container_class(); ?>>

	<?php if ( ! is_page_template( 'templates/comingsoon.php' ) ) : ?>

	<?php
      global $post;
      if( $post->ID == 3320 || $post->ID == 3325 || $post->ID == 3332 || $post->ID == 3327 || $post->ID == 3328 || $post->ID == 3331 || $post->ID == 3336) 
      {
        ?>
        <div class="container">
      	 <a class="no-sticky-logo" href="https://www.proedworld.com" title="proed - Proed" rel="home">
          <img class="logo" src="https://www.proedworld.com/wp-content/uploads/2020/06/proed-logo.png" alt="proed"></a>
        </div>
        <?php
      }
      else
      {
        ?>
        <?php do_action( 'thim_topbar' ) ?>
        <header id="masthead" class="site-header affix-top<?php thim_header_layout_class(); ?> <?php echo get_theme_mod('size_header','default'); ?>">
		<?php get_template_part( 'templates/header/' . get_theme_mod( 'header_style', 'header_v2' ) ); ?>
    	</header><!-- #masthead -->
    
    	<nav class="visible-xs mobile-menu-container mobile-effect" itemscope itemtype="http://schema.org/SiteNavigationElement">
    		<?php get_template_part( 'templates/header/mobile-menu' ); ?>
    	</nav><!-- nav.mobile-menu-container -->
        <?php
      }
    ?>
	

	<?php endif; ?>
    <?php
        $custom_class_main_content = get_theme_mod('main-content_custom_class');
    ?>
	<div id="main-content" <?php if($custom_class_main_content ): ?> class="<?php echo esc_html($custom_class_main_content) ?>" <?php endif; ?> >


