<?php
add_shortcode('personality_test_series', 'personality_test_series');
function personality_test_series()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	?>
	<style>
		.red
		{
			background-color: red !important;
		}
		.grey_color
		{
			background-color: #8e8d8d !important;
		}
		.grey_color:after
		{
			background-color: #8e8d8d !important;
		}
	</style>
	<ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
		<?php
		$exam_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6");
		if(!empty($exam_6))
		{
			?>
			<li class="nav-item bg-success">
				<a class="nav-link active" id="home-tab-md" data-toggle="tab" role="tab" aria-controls="home-md"
			  aria-selected="true">Personality</a>
			</li>
			<?php
		}
		else
		{
			?>
			<li class="nav-item grey_color">
				<a class="nav-link active" id="home-tab-md" data-toggle="tab" role="tab" aria-controls="home-md"
			  aria-selected="true">Personality</a>
			</li>
			<?php
		}
		$site_url = site_url();
		?>
		<li class="nav-item bg-danger">
			<a class="nav-link" role="tab" aria-controls="profile-md"
		  aria-selected="false">Ability</a>
		</li>
		<li class="nav-item bg-danger">
			<a class="nav-link" role="tab" aria-controls="contact-md"
		  aria-selected="false">Interests</a>
		</li>
		<li class="nav-item bg-danger">
			<a class="nav-link" role="tab" aria-controls="multiple-intellegence"
		  aria-selected="false">Multiple Intellegence</a>
		</li>
		<li class="nav-item bg-danger">
			<a class="nav-link" role="tab" aria-controls="learning-style"
		  aria-selected="false">Learning Style</a>
		</li>
		<li class="nav-item bg-danger">
			<a class="nav-link" role="tab" aria-controls="logical-reasoning"
		  aria-selected="false">Logical Reasoning</a>
		</li>
	</ul>
	<div class="tab-content card pt-5" id="myTabContentMD">
		<div class="tab-pane fade show active red" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
			<?php
			echo do_shortcode('[watupro 6]');
			?>
		</div>
	  	<div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
	    	<?php
			//echo do_shortcode('[watupro 7]');
			?>
	  	</div>
	  	<div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
	  		<?php
			//echo do_shortcode('[watupro 8]');
			?>
	  	</div>
	  	<div class="tab-pane fade" id="multiple-intellegence" role="tabpanel" aria-labelledby="multiple-intellegence-tab-md">
	    	<?php
			//echo do_shortcode('[watupro 9]');
			?>
	  	</div>
	  	<div class="tab-pane fade" id="learning-style" role="tabpanel" aria-labelledby="learning-style-tab-md">
	    	<?php
			//echo do_shortcode('[watupro 10]');
			?>
	  	</div>
	  	<div class="tab-pane fade" id="logical-reasoning" role="tabpanel" aria-labelledby="logical-reasoning-tab-md">
	    	<?php
			//echo do_shortcode('[watupro 11]');
			?>
	  	</div>
	</div>
	<?php
}
?>