<?php 
global $post;

?>

<div class="container">
  <div class="row">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
   <div class="logo-left"><div class="uni-logo"> <img src="<?php the_field('university_logo'); ?>" alt="univercity-logo" /> </div></div>
    <div class="col-sm-6">
      <div class="featurd-logo-img">
		  <?php the_post_thumbnail();  ?>
		</div>
    </div>
    <div class="dest-right col-sm-6">
      <div class="row">
      <div class="col-sm-12">
      <h4>
        <?php the_title(); ?>
      </h4>
      <div class="univrst-cont"> <strong>Location:</strong>
        <?php the_field('location') ?>
      </div>
     
     </div>
        <div class="col-sm-12 mt-4">
        
          <?php the_content(); ?>
          <div class="btn-wrap">
          <a class="webbtn-gradient" href="https://www.proedworld.com/registration/">Online Application Form</a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php //get_sidebar(); ?>
  </div>
	
	
	    <div class="search_form_for_locations text-center col-sm-12 mt-5">
        <h4><?php _e( 'Search Other University', 'textdomain' ); ?></h4>
			<div class="text-left-outer">
				
			
        <select name="study_location" class="text-left" id="study_location">
            <option value="">Select Country</option>
            <?php
            $taxonomy = 'destination_category';
            $terms = get_terms($taxonomy);
            $all_locations = array();
            foreach( $terms as $key => $post ) 
            {
              if($post->name == 'study in USA' || $post->name == 'study in UK' || $post->name == 'study in Canada' || $post->name == 'study in Europe' || $post->name == 'Study in Malaysia' || $post->name == 'study in Uae' || $post->name == 'Study in India' || $post->name == 'study in Singapore' || $post->name == 'study in Switzerland') {
                ?>
                <option value="<?php echo $post->term_id; ?>"><?php echo $post->name; ?></option>
                <?php
            }
            }
            ?>
        </select>
        <select name="post_destination" class="text-left" id="post_destination">
            <option value="">Select University</option>
        </select>
        <input type="submit" id="searchsubmit_loc" value="Search" />
        <div class="onemorefiled" style="display:none; color:red;padding:15px 0 0 0;">One More Filed Required.</div>
    </div>
	</div>
	
	
</div>

<script>
    jQuery("#study_location").on('change', function()
    {
        var loc = jQuery(this).val();
        var ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : ajax_url,
            data : {action: "change_destination", loc : loc},
            success: function(response) 
            {
                jQuery('#post_destination').html('<option val="">Select University</option>');
                //alert(Object.keys(response).length); 
                jQuery.each( response, function( key, value ) 
                {
                    jQuery('#post_destination').append(jQuery('<option>', { 
                        value: value.post_name,
                        text : value.post_title 
                    }));
                });
            }
        });
    });
    jQuery("#searchsubmit_loc").on('click', function()
    {
      //jQuery("#post_destination").val()
       var study_location = jQuery("#study_location").val(); 
       var desti = jQuery("#post_destination").val();
       //alert(desti);
       if(study_location == '' || desti == '' || desti == 'Select University'){
          jQuery('.onemorefiled').show();
       }
       else { 
       window.location.href = "https://www.proedworld.com/study_destination/"+desti;
     }
    });
</script>
