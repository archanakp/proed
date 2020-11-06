<?php
/**
 * Plugin Name: 3edge Reports
 * Plugin URI: https://www.3edgetechnovision.com/
 * Description: A custom plugin provided by 3edge Technovision to extend the functionality of this site to users.
 * Version: 2.2.6
 * Author: Puneet Mahajan
 * Author URI: https://www.3edgetechnovision.com/
 */
function add_theme_scripts() 
{
	wp_enqueue_style( 'custom_css', plugins_url().'/3edge-reports/css/3edge_custom.css', array(), '1.1', 'all');
	wp_enqueue_style( 'chart_css', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css', array(), '1.1', 'all');
	wp_enqueue_style( 'custom_css_less', plugins_url().'/3edge-reports/css/3edge_custom_less.css', array(), '1.1', 'all');
 	wp_enqueue_script( 'canva_script', 'http://canvasjs.com/assets/script/canvasjs.min.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_filter( 'wp_nav_menu_items', 'change_home_page_home_button', 10, 2 );
function change_home_page_home_button( $items, $args ) 
{
    if(is_user_logged_in())
    {
        if($args->menu->name == 'Top Menu')
        {
            $user_id = get_current_user_id();
            $user = new WP_User( $user_id );
            $log_out_url = wp_logout_url();
            $site_url = site_url();
            $new_items = '<li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2198 tc-menu-item tc-menu-depth-0 tc-menu-align-left tc-menu-layout-default"><a href="'.$site_url.'/my-account">'.$user->data->user_login.'</a></li>';
            $get = $items . $new_items;
            return $get;
        }
    }
    else
    {
        /*$site_url = site_url();
        if($args->menu->name == 'Top Menu')
        {
            $new_items =  '<li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item"><a href="'.$site_url.'/login">Login</a></li>';
             $get = $items . $new_items;
            return $get;
        }*/
    }
    return $items;
}

add_shortcode('my-account-code', 'my_account_code');
function my_account_code()
{
	?>
	<div class="row account_container">
		<div class="col-md-4">
			<div class="personnel_details details">
				Personal Details
			</div>
			<div class="Logout_url details">
				Logout
			</div>
			<div class="Reports_section details">
				View Reports
			</div>
		</div>
		<div class="col-md-8">
			<div id="personnel_details">
				<?php
				$user_id = get_current_user_id();
				$user = wp_get_current_user($user_id);
				$log_out_url = wp_logout_url();
				$report_url = site_url();
				?>
				<p>
					<label>Name: </label>
					<?php echo $user->data->user_login; ?>
				</p>
				<p>
					<label>Email: </label>
					<?php echo $user->data->user_email; ?>
				</p>
			</div>
			<div id="Logout_url">
				You are currently logged in as 
				<?php echo $user->data->user_login; ?>. <a href="<?php echo $log_out_url; ?>">Log out »</a>
			</div>
			<div id="Reports_section">
				<?php
				$url = site_url();
				?>
				<p>To view your Report click here</p>
				<a href="<?php echo $url.'/career-possibility-assessment-test/#1593256360254-ccaa502c-48e2'?>">View Report</a>
			</div>
		</div>
	</div>
	<?php
}

add_action('wp_footer', 'display_my_account_tabs');
function display_my_account_tabs()	
{
	?>
	<script>
		jQuery("#Logout_url").hide();
		jQuery("#Reports_section").hide();
		jQuery(".personnel_details").on('click',function()
		{
			jQuery("#Logout_url").hide();
			jQuery("#Reports_section").hide();
			jQuery("#personnel_details").show();
		});
		jQuery(".Logout_url").on('click',function()
		{
			jQuery("#Logout_url").show();
			jQuery("#Reports_section").hide();
			jQuery("#personnel_details").hide();
		});
		jQuery(".Reports_section").on('click',function()
		{
			jQuery("#Logout_url").hide();
			jQuery("#Reports_section").show();
			jQuery("#personnel_details").hide();
		});

		jQuery('.horizontal .progress-fill span').each(function()
		{
			var percent = jQuery(this).html();
		  	jQuery(this).parent().css('width', percent);
		});

		jQuery("#view_result").hide();
		jQuery(".view_result").on('click', function()
		{
			jQuery("#view_result").toggle();
		});
	</script>
        
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<!-- <script>
		var canvas1 = document.getElementById('ChartForID6');
		var dataURL1 = canvas1.toDataURL("image/png");
		var canvas2 = document.getElementById('ChartForID7');
		var dataURL2 = canvas2.toDataURL("image/png");
		var canvas3 = document.getElementById('ChartForID8');
		var dataURL3 = canvas3.toDataURL("image/png");
		var canvas4 = document.getElementById('ChartForID9');
		var dataURL4 = canvas4.toDataURL("image/png");
		var canvas5 = document.getElementById('ChartForID10');
		var dataURL5 = canvas5.toDataURL("image/png");
		var ajax_url = "<?php //echo admin_url('admin-ajax.php'); ?>";
                
		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : ajax_url,
			data : {action: "save_base_encoded_image", dataURL1 : dataURL1, dataURL2: dataURL2, dataURL3 : dataURL3, dataURL4 : dataURL4, dataURL5 : dataURL5},
			success: function(response) 
			{
			}
		});
	</script> -->
	<?php
}

include_once('personality_test.php');
include_once('ability_test.php');
include_once('interest_test.php');
include_once('multiple_intellegence_test.php');
include_once('learning_style_test.php');
include_once('logical_reasoning_test.php');
include_once('report_card.php');

function user_report_card()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user();
	ob_start();
	$data = '<div class="row" id="view_result">
			<div class="col-md-12">
			<div class="pageHeading">';
	$data .= '<h3>Dear '.$user->data->user_login.'';
	$data .= ', </h3>
			</div>
			<hr>
			<div>
				<p>Thank you for submitting the Assessment Test!</p>
			</div>
			<div>
				<p>The analysis of your score suggests the following:</p>
			</div>';
	$data .= '<div class="row">';
				$quizzes = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_master");
				foreach($quizzes as $key => $quiz) 
				{
					$question_cat = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 0");
					foreach($question_cat as $key => $categories) 
					{
						if($quiz->name == 'Personality Survey' && $categories->name == 'Personality Type')
						{
							$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 1");
						}
						if($quiz->name == 'Ability Survey' && $categories->name == 'Ability Type')
						{
							$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 4");
						}
						if($quiz->name == 'Interests Survey' && $categories->name == 'Interest Type')
						{
							$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 5");
						}
						if($quiz->name == 'Multiple Intellegence Survey' && $categories->name == 'Multiple Intelligences Type')
						{
							$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 6");
						}
						if($quiz->name == 'Learning Style Survey' && $categories->name == 'Learning Style Type')
						{
							$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 7");
						}
					}
					$exam_taken = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = ".$quiz->ID."");
					$questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM ".$prefix."watupro_student_answers as answer inner join ".$prefix."watupro_question as question on answer.question_id = question.ID where answer.user_id = ".$user_id." and answer.exam_id = ".$exam_taken->exam_id." and answer.taking_id = ".$exam_taken->ID." group by question.cat_id order by cat_id ASC ");
					$data .='<div class="col-lg-5 col-md-5 col-sm-5">
			            <div class="panel panel-warning">
			            	<div class="panel-heading">
			            		<div class="panel-title">
			            			<h3>'.$quiz->name.'</h3>
			            		</div>
			            	</div>
			            </div>
			            <div class="container_g horizontal rounded">
							<h3>'.$quiz->name.'(%) </h3>';
							foreach($child_categories as $c_key => $cats) 
							{
								$cat_id = '';
								$flag = '';
								foreach($questions_answered as $a_key => $answered) 
								{
									$cat_id = $answered->cat_id;
									if($cats->ID == $cat_id)
									{
										$flag = 'true';
										if($quiz->ID == 6)
										{
											if($cats->ID == 2)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 2");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 3)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 3");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 8)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 8");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 9)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 9");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 12)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 12");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
										}
										if($quiz->ID == 7)
										{
											if($cats->ID == 13)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 13");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 14)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 14");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 15)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 15");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 16)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 16");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 17)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 17");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 18)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 18");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 19)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 19");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 20)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 20");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 21)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 21");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}			
										}
										if($quiz->ID == 8)
										{
											if($cats->ID == 34)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 34");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 35)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 35");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 36)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 36");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 37)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 37");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 38)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 38");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 39)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 39");
												
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 40)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 40");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 41)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 41");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 42)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 42");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 43)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 43");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												};
											}
											if($cats->ID == 44)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 44");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 45)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 45");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 46)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 46");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 47)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 47");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 4;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
										}
										if($quiz->ID == 9)
										{
											if($cats->ID == 22)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 22");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 23)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 23");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 24)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 24");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 25)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 25");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 26)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 26");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 27)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 27");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 28)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 28");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 29)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 29");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 30)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 30");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 5;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
										}
										if($quiz->ID == 10)
										{
											if($cats->ID == 31)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 31");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 3;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 32)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 32");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 3;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
											if($cats->ID == 33)
											{
												$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 33");
												$count_cat_questions = count($questions);
												$total = $count_cat_questions * 3;
												if(!empty($total) && $total != 0)
												{
													$total_points = round(($answered->total_points / $total) * 100) ;
													continue;
												}
												else
												{
													$total_points = '';
												}
											}
										}
										break;
									}
								}
								if($flag == 'true')
								{
									$total_pointss = $total_points;
									$data .='<div>'.$cats->name.'</div>
									<div class="progress-bar horizontal">
										<div class="progress-track">
											<div class="progress-fill">
												<span>'.$total_pointss.'%</span>
											</div>
										</div>
									</div>';
								}
								else
								{
									$total_pointss = 0;	
									$data .= '<div>'.$cats->name.'</div>
									<div class="progress-bar horizontal">
										<div class="progress-track">
											<div class="progress-fill">
												<span>'.$total_pointss.'%</span>
											</div>
										</div>
									</div>';
								}
							}
						$data .= '</div>
			        </div>';
				}
	$data .='</div>';
	$data .= '</div>
			</div>';
	ob_get_clean();
	return $data;
}

add_action('wp_footer', 'hide_header_and_footer');
function hide_header_and_footer()
{
	global $post, $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	if( $post->ID == 3320 || $post->ID == 3325 || $post->ID == 3332 || $post->ID == 3327 || $post->ID == 3328 || $post->ID == 3331 || $post->ID == 3336)
	{
		?>
		<style>
			#colophon {
			    display: none;
			}
			#thimHeaderTopBar {
				display: none;	
			}
			#primaryMenu {
			    display: none;
			}
		</style>
		<?php
	}
}

add_shortcode('username', 'display_username');
function display_username()
{
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	$name = $user->data->display_name;
	?>
	<div class="">
		<h3>Dear <?php echo $name; ?>,</h3> 
	</div>
	<?php
}

add_shortcode('databoxes', 'databoxes_callback');
function databoxes_callback()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	$quizzes = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_master");
	$exams_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6 ");
	$exams_7 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 7 ");
	$exams_8 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 8 ");
	$exams_9 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 9 ");
	$exams_10 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 10 ");
	?>
	<style>
		.mydesign 
		{
			margin-bottom: 30px;
		}
		.pricing-item 
		{
			/*box-shadow: 1px 0px 15px 5px #cccccc;*/
			background-color: #ffffff;
			border-radius: 5px;
			height: 100%;
			padding: 0px;
			border: 1px solid #000000;
		}
		.background_my {
		    background-color: #85b920;
    		border-radius: 5px 5px 0 0;
		    padding: 1px;
		    text-align: center;
		    margin-bottom: 5px;
		    color: #ffffff;
		}
		div.bp-element-pricing-table.layout-3 .wrap-element .pricing-item .description {
			margin-bottom: 25px;
			padding: 20px;
		}
	</style>
	<div class="vc_row wpb_row vc_row-fluid bp-background-size-auto">
		<div class="wpb_column vc_column_container vc_col-sm-12 bp-background-size-auto">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					<div class="vc_empty_space" style="height: 32px">
						<span class="vc_empty_space_inner"></span>
					</div>
					<div class="bp-element bp-element-pricing-table layout-3 number-columns-3">     
						<div class="wrap-element">
							<div class="row">
								<?php
								$cat_6_max = '';
								$cat_7_max = '';
								$cat_8_max = '';
								$cat_9_max = '';
								$cat_10_max = '';

								$cat_6_array_2 = array();
								$cat_6_array_3 = array();
								$cat_6_array_8 = array();
								$cat_6_array_9 = array();
								$cat_6_array_12 = array();

								$cat_7_array_13 = array();
								$cat_7_array_14 = array();
								$cat_7_array_15 = array();
								$cat_7_array_16 = array();
								$cat_7_array_17 = array();
								$cat_7_array_18 = array();
								$cat_7_array_19 = array();
								$cat_7_array_20 = array();
								$cat_7_array_21 = array();

								$cat_8_array_34 = array();
								$cat_8_array_35 = array();
								$cat_8_array_36 = array();
								$cat_8_array_37 = array();
								$cat_8_array_38 = array();
								$cat_8_array_39 = array();
								$cat_8_array_40 = array();
								$cat_8_array_41 = array();
								$cat_8_array_42 = array();
								$cat_8_array_43 = array();
								$cat_8_array_44 = array();
								$cat_8_array_45 = array();
								$cat_8_array_46 = array();
								$cat_8_array_47 = array();

								$cat_9_array_22 = array();
								$cat_9_array_23 = array();
								$cat_9_array_24 = array();
								$cat_9_array_25 = array();
								$cat_9_array_26 = array();
								$cat_9_array_27 = array();
								$cat_9_array_28 = array();
								$cat_9_array_29 = array();
								$cat_9_array_30 = array();

								$cat_10_array_31 = array();
								$cat_10_array_32 = array();
								$cat_10_array_33 = array();
								foreach($quizzes as $key => $quiz) 
								{
									$question_cat = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 0");
										foreach($question_cat as $key => $categories) 
										{
											if($quiz->name == 'Personality' && $categories->name == 'Personality Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 1");
											}
											if($quiz->name == 'Ability' && $categories->name == 'Ability Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 4");
											}
											if($quiz->name == 'Interests' && $categories->name == 'Interest Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 5");
											}
											if($quiz->name == 'Multiple Intelligence' && $categories->name == 'Multiple Intelligences Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 6");
											}
											if($quiz->name == 'Learning Style' && $categories->name == 'Learning Style Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 7");
											}
										}
										$exam_taken = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = ".$quiz->ID."");
										$questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM ".$prefix."watupro_student_answers as answer inner join ".$prefix."watupro_question as question on answer.question_id = question.ID where answer.user_id = ".$user_id." and answer.exam_id = ".$exam_taken->exam_id." and answer.taking_id = ".$exam_taken->ID." group by question.cat_id order by cat_id ASC ");
										if($quiz->ID == 11)
										{
											
										}
										else
										{
											?>
											<div class="col-sm-6 col-lg-4 mb-4">
												<div class="pricing-item mydesign">
													<div class="background_my">
					            						<div class="back-ground"></div>
					            						<?php
					            						if($quiz->ID == 6)
					            						{
					            							$text = "Top 3 Personality Traits";
					            						}
					            						if($quiz->ID == 7)
					            						{
					            							$text = "Top 3 Abilities";
					            						}
					            						if($quiz->ID == 8)
					            						{
					            							$text = "Top 3 Interest Areas";
					            						}
					            						if($quiz->ID == 9)
					            						{
					            							$text = "Top 3 Intelligence Types";
					            						}
					            						if($quiz->ID == 10)
					            						{
					            							$text = "Top Learning Style";
					            						}
					            						?>
					            						<h4 class="title"><?php echo $text; ?>
					                    				</h4>
					                				</div>
					                				<?php 
													foreach($child_categories as $c_key => $cats) 
														{
														$cat_id = '';
														$flag = '';
														foreach($questions_answered as $a_key => $answered) 
														{
															$cat_id = $answered->cat_id;
															$cats_id[] = $answered->cat_id;
															if($cats->ID == $cat_id)
															{
																$flag = 'true';
																if($quiz->ID == 6)
																{
																	if($cats->ID == 2)
																	{
																		$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 2");
																		$count_cat_questions = count($questions);
																		$total = $count_cat_questions * 5;
																		if(!empty($total) && $total != 0)
																		{
																			$total_points = round(($answered->total_points / $total) * 100) ;
																			array_push($cat_6_array_2, array($total_points, $cats->ID));
																			continue;
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 3)
																	{
																		$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 3");
																		$count_cat_questions = count($questions);
																		$total = $count_cat_questions * 5;
																		if(!empty($total) && $total != 0)
																		{
																			$total_points = round(($answered->total_points / $total) * 100) ;
																			array_push($cat_6_array_3, array($total_points, $cats->ID));
																			continue;
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 8)
																	{
																		$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 8");
																		$count_cat_questions = count($questions);
																		$total = $count_cat_questions * 5;
																		if(!empty($total) && $total != 0)
																		{
																			$total_points = round(($answered->total_points / $total) * 100) ;
																			array_push($cat_6_array_8, array($total_points, $cats->ID));
																			continue;
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 9)
																	{
																		$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 9");
																		$count_cat_questions = count($questions);
																		$total = $count_cat_questions * 5;
																		if(!empty($total) && $total != 0)
																		{
																			$total_points = round(($answered->total_points / $total) * 100) ;
																			array_push($cat_6_array_9, array($total_points, $cats->ID));
																			continue;
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 12)
																	{
																		$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 12");
																		$count_cat_questions = count($questions);
																		$total = $count_cat_questions * 5;
																		if(!empty($total) && $total != 0)
																		{
																			$total_points = round(($answered->total_points / $total) * 100) ;
																			array_push($cat_6_array_12, array($total_points, $cats->ID));
																			continue;
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																}
																if($quiz->ID == 7)
																{
																	if($cats->ID == 13)
																	{
																		// form perception
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (38, 116, 117, 126) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_13, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 14)
																	{
																		//clerical perception
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (107, 114) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 10;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_14, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 15)
																	{
																		// spatial perception
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (39, 121, 125, 131) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_15, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 16)
																	{
																		// finger dexterity
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (42, 110, 123, 124, 128, 134 ) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 30;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_16, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 17)
																	{
																		// manual desxterity
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (115, 137, 138) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 15;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_17, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 18)
																	{
																		// numerical ability
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (40, 41, 106, 120, 127, 132, 136) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 35;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_18, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 19)
																	{
																		// verbal ability
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (111, 119, 122) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 15;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_19, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 20)
																	{
																		// motor coordination
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (108, 112, 118, 130, 133) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 25;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_20, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 21)
																	{
																		//general learning ability
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (105, 109, 113, 129, 135) and user_id = ".$user_id." and taking_id = ".$exams_7->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 25;
																			$total_points = round($divide * 100);
																			array_push($cat_7_array_21, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}			
																}
																if($quiz->ID == 8)
																{
																	if($cats->ID == 34)
																	{
																		//technology
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 45, 165, 170, 171, 183, 197) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 28;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_34, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 35)
																	{
																		// social science
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (191, 200, 190, 175, 167, 169, 163, 158, 172) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 36;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_35, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 36)
																	{
																		//science
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 45, 164, 165, 166, 178, 179, 193, 206) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 36;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_36, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 37)
																	{
																		//public servce
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (200, 205, 189, 190, 186, 185, 177, 172, 167, 158) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 40;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_37, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 38)
																	{
																		// multimedia
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (198, 46) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 8;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_38, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 39)
																	{
																		// legal
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (199, 205, 185, 186, 47) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_39, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 40)
																	{
																		// healthcare
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 180, 167, 194, 208) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_40, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 41)
																	{
																		// finance
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (195, 181, 168, 43) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 16;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_41, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 42)
																	{
																		// engineering
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 45, 164, 165, 178, 179, 192, 207) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 32;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_42, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 43)
																	{
																		// education
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (202, 189, 190, 188, 161) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_43, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 44)
																	{
																		// culnary
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 160, 174) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 12;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_44, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 45)
																	{
																		// commumnications
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (46, 162, 173, 176, 184, 189, 203) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 28;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_45, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 46)
																	{
																		// business
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (43, 44, 168, 182, 196) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_46, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 47)
																	{
																		//arts
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (159, 173, 187, 201) and user_id = ".$user_id." and taking_id = ".$exams_8->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 16;
																			$total_points = round($divide * 100);
																			array_push($cat_8_array_47, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																}
																if($quiz->ID == 9)
																{
																	if($cats->ID == 22)
																	{
																		//Naturalist (nature smart-NS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (212, 214, 247) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 15;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_22, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 23)
																	{
																		//Musical (sound smart-MS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (263, 252, 248, 231, 215, 222, 236) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 35;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_23, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 24)
																	{
																		//Logical-mathematical (number/reasoning smart-RS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (50, 232, 223, 228, 268, 235, 241, 229, 255, 256, 265) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 55;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_24, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 25)
																	{
																		//Existential (life smart-LS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (253, 254, 240, 238, 232, 227, 224, 225) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 40;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_25, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 26)
																	{
																		// Interpersonal (people smart- IPS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (217, 234, 249, 260, 266, 52, 221) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 35;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_26, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 27)
																	{
																		// Bodily-kinesthetic (body smart-BS)
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (49, 219, 251, 243, 259, 261, 264) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 35;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_27, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 28)
																	{
																		// linguistic
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (262, 258, 246, 230, 220, 213, 210) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 35;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_28, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 29)
																	{
																		// intra personal
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (267, 250, 242, 239, 229, 216, 211, 48) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 40;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_29, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 30)
																	{
																		// spatial
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (257, 245, 226, 51) and user_id = ".$user_id." and taking_id = ".$exams_9->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 20;
																			$total_points = round($divide * 100);
																			array_push($cat_9_array_30, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																}
																if($quiz->ID == 10)
																{
																	if($cats->ID == 31)
																	{
																		// doer
																		//$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (55, 139, 140, 142, 154, 155, 156, 157, 150, 152, 153, 155, 157) and user_id = ".$user_id." and taking_id = ".$exams_10->ID." and exam_id = ".$quiz->ID."");
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (55, 139, 140, 142, 145, 146, 147, 148, 150, 152, 153, 155, 157) and user_id = ".$user_id." and taking_id = ".$exams_10->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 39;
																			$total_points = round($divide * 100);
																			array_push($cat_10_array_31, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 32)
																	{
																		// listener
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (143, 57, 141, 144, 151, 154, 157) and user_id = ".$user_id." and taking_id = ".$exams_10->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 21;
																			$total_points = round($divide * 100);
																			array_push($cat_10_array_32, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																	if($cats->ID == 33)
																	{
																		// seen
																		$sql = $wpdb->get_results("SELECT points FROM ".$prefix."watupro_student_answers WHERE question_id IN (54, 56, 143, 149) and user_id = ".$user_id." and taking_id = ".$exams_10->ID." and exam_id = ".$quiz->ID."");
																		$tot = array();
																		foreach($sql as $key => $value) 
																		{
																			$tot[] = $value->points;
																		}
																		$answer_total = array_sum($tot);
																		if(!empty($answer_total))
																		{
																			$divide = $answer_total / 12;
																			$total_points = round($divide * 100);
																			array_push($cat_10_array_33, array($total_points, $cats->ID));
																		}
																		else
																		{
																			$total_points = '';
																		}
																	}
																}
																break;
															}
														}
													}
													$cat_6_array = array($cat_6_array_2[0], $cat_6_array_3[0], $cat_6_array_8[0], $cat_6_array_9[0], $cat_6_array_12[0]);
													$cat_7_array = array($cat_7_array_13[0], $cat_7_array_14[0], $cat_7_array_15[0], $cat_7_array_16[0], $cat_7_array_17[0], $cat_7_array_18[0], $cat_7_array_19[0], $cat_7_array_20[0], $cat_7_array_21[0]);
													$cat_8_array = array($cat_8_array_34[0], $cat_8_array_35[0], $cat_8_array_36[0], $cat_8_array_37[0], $cat_8_array_38[0], $cat_8_array_39[0], $cat_8_array_40[0], $cat_8_array_41[0], $cat_8_array_42[0], $cat_8_array_43[0], $cat_8_array_44[0], $cat_8_array_45[0], $cat_8_array_46[0], $cat_8_array_47[0]);
													$cat_9_array = array($cat_9_array_22[0], $cat_9_array_23[0], $cat_9_array_24[0], $cat_9_array_25[0], $cat_9_array_26[0], $cat_9_array_27[0], $cat_9_array_28[0], $cat_9_array_29[0], $cat_9_array_30[0]);
													$cat_10_array = array($cat_10_array_31[0], $cat_10_array_32[0], $cat_10_array_33[0]);
													rsort($cat_6_array);
													rsort($cat_7_array);
													rsort($cat_8_array);
													rsort($cat_9_array);
													rsort($cat_10_array);
													$cat_6_top3 = array_slice($cat_6_array, 0, 3);
													$cat_7_top3 = array_slice($cat_7_array, 0, 3);
													$cat_8_top3 = array_slice($cat_8_array, 0, 3);
													$cat_9_top3 = array_slice($cat_9_array, 0, 3);
													$cat_10_top3 = array_slice($cat_10_array, 0, 1);
													?>
													<?php
													if($quiz->ID == 6)
													{
														?>
														<div class="description">
						                					<ul>
						                						<?php
						                						$url = site_url().'/wp-content/plugins/3edge-reports/images.png';
						                						foreach ($cat_6_top3 as $key => $cat_6_val)
						                						{
						                							$data = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_6_val[1]." ");
						                							?>
						                							<li>
						                								<img height="15px" width="15px" src="<?php echo $url; ?>">
						                								<?php echo $data->name; ?>
						                							</li>
						                							<?php
						                						}
																?>
						                					</ul>           
						                				</div>
						                				<?php
						                			}
						                			if($quiz->ID == 7)
													{
														?>
														<div class="description">
						                					<ul>
						                						<?php
						                						foreach ($cat_7_top3 as $key => $cat_7_val)
						                						{
						                							$data = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_7_val[1]." ");
						                							?>
						                							<li>
						                								<img height="15px" width="15px" src="<?php echo $url; ?>">
						                								<?php echo $data->name; ?>
						                							</li>
						                							<?php
						                						}
																?>
						                					</ul>           
						                				</div>
						                				<?php
						                			}
						                			if($quiz->ID == 8)
													{
														?>
														<div class="description">
						                					<ul>
						                						<?php
						                						foreach ($cat_8_top3 as $key => $cat_8_val)
						                						{
						                							$data = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_8_val[1]." ");
						                							?>
						                							<li>
						                								<img height="15px" width="15px" src="<?php echo $url; ?>">
						                								<?php echo $data->name; ?>
						                							</li>
						                							<?php
						                						}
																?>
						                					</ul>           
						                				</div>
						                				<?php
						                			}
						                			if($quiz->ID == 9)
													{
														?>
														<div class="description">
						                					<ul>
						                						<?php
						                						foreach ($cat_9_top3 as $key => $cat_9_val)
						                						{
						                							$data = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_9_val[1]." ");
						                							?>
						                							<li>
						                								<img height="15px" width="15px" src="<?php echo $url; ?>">
						                								<?php echo $data->name; ?></li>
						                							<?php
						                						}
																?>
						                					</ul>           
						                				</div>
						                				<?php
						                			}
						                			if($quiz->ID == 10)
													{
														?>
														<div class="description">
						                					<ul>
						                						<?php
						                						foreach ($cat_10_top3 as $key => $cat_10_val)
						                						{
						                							$data = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_10_val[1]." ");
						                							?>
						                							<li>
						                								<img height="15px" width="15px" src="<?php echo $url; ?>">
						                								<?php echo $data->name; ?></li>
						                							<?php
						                						}
																?>
						                					</ul>           
						                				</div>
						                				<?php
						                			}
						                			?>
					                            </div>
											</div>
											<?php
										}
										?>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

add_shortcode('databoxes_report', 'databoxes_callback_for_report');
function databoxes_callback_for_report()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	$quizzes = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_master");
	/*	<style>
		.mydesign 
		{
			margin-bottom: 30px;
		}
		.pricing-item 
		{
			box-shadow: 1px 0px 15px 5px #cccccc;
			background-color: #ffffff;
			border-radius: 5px;
			height: 100%;
			padding: 20px;
		}
		.background_my {
		    background-color: #5aa1e3;
		    padding: 1px;
		    text-align: center;
		    margin-bottom: 5px;
		    color: #ffffff;
		}
	</style>*/
	ob_start();
	$data = '<div class="vc_row wpb_row vc_row-fluid bp-background-size-auto">
		<div class="wpb_column vc_column_container vc_col-sm-12 bp-background-size-auto">
			<div class="vc_column-inner">
				<div class="wpb_wrapper">
					<div class="vc_empty_space" style="height: 32px">
						<span class="vc_empty_space_inner"></span>
					</div>
					<div class="bp-element bp-element-pricing-table layout-3 number-columns-3">     
						<div class="wrap-element">
							<div class="row">';
								$cat_6_max = '';
								$cat_7_max = '';
								$cat_8_max = '';
								$cat_9_max = '';
								$cat_10_max = '';

								$cat_6_array_2 = array();
								$cat_6_array_3 = array();
								$cat_6_array_8 = array();
								$cat_6_array_9 = array();
								$cat_6_array_12 = array();

								$cat_7_array_13 = array();
								$cat_7_array_14 = array();
								$cat_7_array_15 = array();
								$cat_7_array_16 = array();
								$cat_7_array_17 = array();
								$cat_7_array_18 = array();
								$cat_7_array_19 = array();
								$cat_7_array_20 = array();
								$cat_7_array_21 = array();

								$cat_8_array_34 = array();
								$cat_8_array_35 = array();
								$cat_8_array_36 = array();
								$cat_8_array_37 = array();
								$cat_8_array_38 = array();
								$cat_8_array_39 = array();
								$cat_8_array_40 = array();
								$cat_8_array_41 = array();
								$cat_8_array_42 = array();
								$cat_8_array_43 = array();
								$cat_8_array_44 = array();
								$cat_8_array_45 = array();
								$cat_8_array_46 = array();
								$cat_8_array_47 = array();

								$cat_9_array_22 = array();
								$cat_9_array_23 = array();
								$cat_9_array_24 = array();
								$cat_9_array_25 = array();
								$cat_9_array_26 = array();
								$cat_9_array_27 = array();
								$cat_9_array_28 = array();
								$cat_9_array_29 = array();
								$cat_9_array_30 = array();

								$cat_10_array_31 = array();
								$cat_10_array_32 = array();
								$cat_10_array_33 = array();
								foreach($quizzes as $key => $quiz) 
								{
									$question_cat = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 0");
										foreach($question_cat as $key => $categories) 
										{
											if($quiz->name == 'Personality Survey' && $categories->name == 'Personality Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 1");
											}
											if($quiz->name == 'Ability Survey' && $categories->name == 'Ability Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 4");
											}
											if($quiz->name == 'Interests Survey' && $categories->name == 'Interest Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 5");
											}
											if($quiz->name == 'Multiple Intellegence Survey' && $categories->name == 'Multiple Intelligences Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 6");
											}
											if($quiz->name == 'Learning Style Survey' && $categories->name == 'Learning Style Type')
											{
												$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 7");
											}
										}
										$exam_taken = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = ".$quiz->ID."");
										$questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM ".$prefix."watupro_student_answers as answer inner join ".$prefix."watupro_question as question on answer.question_id = question.ID where answer.user_id = ".$user_id." and answer.exam_id = ".$exam_taken->exam_id." and answer.taking_id = ".$exam_taken->ID." group by question.cat_id order by cat_id ASC ");
										$data .= '<div class="col-sm-6 col-lg-4">
											<div class="pricing-item mydesign" style="margin-bottom: 30px; box-shadow: 1px 0px 15px 5px #cccccc; background-color: #ffffff; border-radius: 5px; height: 100%; padding: 20px;">
												<div class="background_my" style="background-color: #5aa1e3; padding: 1px; text-align: center; margin-bottom: 5px; color: #ffffff;">
				            						<div class="back-ground"></div>';
				            						if($quiz->ID == 6)
				            						{
				            							$text = "Top 3 Personality Traits";
				            						}
				            						if($quiz->ID == 7)
				            						{
				            							$text = "Top 3 Abilities";
				            						}
				            						if($quiz->ID == 8)
				            						{
				            							$text = "Top 3 Interest Areas";
				            						}
				            						if($quiz->ID == 9)
				            						{
				            							$text = "Top 3 Intelligence Types";
				            						}
				            						if($quiz->ID == 10)
				            						{
				            							$text = "Top 3 Learning Style";
				            						}
				            						$data .= '<h4 class="title">'.$text.'
				                    				</h4>
				                				</div>';
												foreach($child_categories as $c_key => $cats) 
												{
													$cat_id = '';
													$flag = '';
													foreach($questions_answered as $a_key => $answered) 
													{
														$cat_id = $answered->cat_id;
														$cats_id[] = $answered->cat_id;
														if($cats->ID == $cat_id)
														{
															$flag = 'true';
															if($quiz->ID == 6)
															{
																if($cats->ID == 2)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 2");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_6_array_2, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 3)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 3");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_6_array_3, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 8)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 8");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_6_array_8, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 9)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 9");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_6_array_9, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 12)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 12");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_6_array_12, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
															}
															if($quiz->ID == 7)
															{
																if($cats->ID == 13)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 13");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_13, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 14)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 14");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_14, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 15)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 15");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_15, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 16)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 16");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_16, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 17)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 17");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_17, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 18)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 18");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_18, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 19)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 19");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_19, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 20)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 20");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_20, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 21)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 21");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_7_array_21, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}			
															}
															if($quiz->ID == 8)
															{
																if($cats->ID == 34)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 34");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_34, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 35)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 35");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_35, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 36)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 36");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_36, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 37)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 37");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_37, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 38)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 38");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_38, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 39)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 39");
																	
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_39, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 40)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 40");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_40, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 41)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 41");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_41, array($total_points, $cats->ID));
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 42)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 42");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_42, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 43)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 43");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_43, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	};
																}
																if($cats->ID == 44)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 44");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_44, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 45)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 45");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_45, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 46)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 46");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_46, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 47)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 47");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 4;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_8_array_47, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
															}
															if($quiz->ID == 9)
															{
																if($cats->ID == 22)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 22");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_22, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 23)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 23");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_23, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 24)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 24");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_24, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 25)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 25");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_25, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 26)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 26");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_26, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 27)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 27");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_27, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 28)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 28");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_28, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 29)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 29");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_29, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 30)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 30");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 5;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_9_array_30, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
															}
															if($quiz->ID == 10)
															{
																if($cats->ID == 31)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 31");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 3;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_10_array_31, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 32)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 32");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 3;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_10_array_32, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
																if($cats->ID == 33)
																{
																	$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 33");
																	$count_cat_questions = count($questions);
																	$total = $count_cat_questions * 3;
																	if(!empty($total) && $total != 0)
																	{
																		$total_points = round(($answered->total_points / $total) * 100) ;
																		array_push($cat_10_array_33, array($total_points, $cats->ID));
																		continue;
																	}
																	else
																	{
																		$total_points = '';
																	}
																}
															}
															break;
														}
													}
												}
												$cat_6_array = array($cat_6_array_2[0], $cat_6_array_3[0], $cat_6_array_8[0], $cat_6_array_9[0], $cat_6_array_12[0]);
												$cat_7_array = array($cat_7_array_13[0], $cat_7_array_14[0], $cat_7_array_15[0], $cat_7_array_16[0], $cat_7_array_17[0], $cat_7_array_18[0], $cat_7_array_19[0], $cat_7_array_20[0], $cat_7_array_21[0]);
												$cat_8_array = array($cat_8_array_34[0], $cat_8_array_35[0], $cat_8_array_36[0], $cat_8_array_37[0], $cat_8_array_38[0], $cat_8_array_39[0], $cat_8_array_40[0], $cat_8_array_41[0], $cat_8_array_42[0], $cat_8_array_43[0], $cat_8_array_44[0], $cat_8_array_45[0], $cat_8_array_46[0], $cat_8_array_47[0]);
												$cat_9_array = array($cat_9_array_22[0], $cat_9_array_23[0], $cat_9_array_24[0], $cat_9_array_25[0], $cat_9_array_26[0], $cat_9_array_27[0], $cat_9_array_28[0], $cat_9_array_29[0], $cat_9_array_30[0]);
												$cat_10_array = array($cat_10_array_31[0], $cat_10_array_32[0], $cat_10_array_33[0]);
												rsort($cat_6_array);
												rsort($cat_7_array);
												rsort($cat_8_array);
												rsort($cat_9_array);
												rsort($cat_10_array);
												$cat_6_top3 = array_slice($cat_6_array, 0, 3);
												$cat_7_top3 = array_slice($cat_7_array, 0, 3);
												$cat_8_top3 = array_slice($cat_8_array, 0, 3);
												$cat_9_top3 = array_slice($cat_9_array, 0, 3);
												$cat_10_top3 = array_slice($cat_10_array, 0, 3);
												if($quiz->ID == 6)
												{
													$data .= '<div class="description">
					                					<ul>';
				                						foreach ($cat_6_top3 as $key => $cat_6_val)
				                						{
				                							$data_s = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_6_val[1]." ");
				                							$data .= '<li>'.$data_s->name.' </li>';
				                						}
					                					$data .= '</ul>           
					                				</div>';
					                			}
					                			if($quiz->ID == 7)
												{
													$data .= '<div class="description">
					                					<ul>';
					                						foreach ($cat_7_top3 as $key => $cat_7_val)
					                						{
					                							$data_s = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_7_val[1]." ");
					                							$data .= '<li>'.$data_s->name.'</li>';
					                						}
					                					$data .= '</ul>           
					                				</div>';
					                			}
					                			if($quiz->ID == 8)
												{
													$data .= '<div class="description">
					                					<ul>';
					                						foreach ($cat_8_top3 as $key => $cat_8_val)
					                						{
					                							$data_s = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_8_val[1]." ");
					                							$data .= '<li>'.$data_s->name.'</li>';
					                						}
					                					$data .= '</ul>           
					                				</div>';
					                			}
					                			if($quiz->ID == 9)
												{
													$data .'<div class="description">
					                					<ul>';
					                						foreach ($cat_9_top3 as $key => $cat_9_val)
					                						{
					                							$data_s = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_9_val[1]." ");
					                							$data .= '<li>'.$data_s->name.'</li>';
					                						}
					                					$data .= '</ul>           
					                				</div>';
					                			}
					                			if($quiz->ID == 10)
												{
													$data .= '<div class="description">
					                					<ul>';
					                						foreach ($cat_10_top3 as $key => $cat_10_val)
					                						{
					                							$data_s = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_10_val[1]." ");
					                							$data .= '<li>'.$data_s->name.'</li>';
					                						}
					                					$data .= '</ul>           
					                				</div>';
					                			}
				                            $data .= '</div>
										</div>';
								}
							$data .= '</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
	ob_get_clean();
}

function create_a_pie_chart($cat_6_max, $cat_7_max, $cat_8_max, $cat_9_max, $cat_10_max)
{
	?>
	<style>
		.venn 
		{
			position: relative;
			z-index: 0;
			display: block;
			margin: 0 auto;
			padding: 0;
			width: 308px;
			height: 330px;
			top: 5px;
		}
		.venn-item 
		{
			position: absolute;
			display: block;
			margin: 0;
			padding: 0;
			width: 180px;
			height: 180px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
			background: rgba(0, 51, 102, 0.4);
			color: #036;
			text-align: center;
			text-shadow: 1px 1px #fff;
			font-size: 21px;
			font-family: sans-serif;
		}
		.venn-item:after 
		{
			position: absolute;
			top: 0;
			left: 0;
			z-index: -1;
			width: 180px;
			height: 180px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
			background: white;
			box-shadow: 5px 5px 5px -5px #999;
			content: "";
		}
		.venn-item-1 
		{
			top: 0;
			left: 60px; 
			padding-top: 63px;
			padding-right: 36px;
			padding-left: 36px;
			width: 108px;
			height: 117px;
			background-color: #ffa50080;
		}
		.venn-item-2,
		.venn-item-3, .venn-item-4, .venn-item-5 
		{
			bottom: 0;
			padding-top: 81px;
			width: 108px;
			height: 99px;
		}
		.venn-item-2 
		{
			left: 0;
		  	padding-right: 63px;
		  	padding-left: 9px;
		  	background-color: #ff000070;
		}
		.venn-item-5 
		{
			left: 0;
			padding-right: 63px;
			padding-left: 9px;
		}
		.venn-item-3 
		{
			right: 0;
		  	padding-right: 9px;
		  	padding-left: 63px;
		  	background-color: rgba(0, 51, 102, 0.4);
		}
		.venn-item.venn-item-4 
		{
			right: 0;
			padding-right: 9px;
			padding-left: 63px;
		  	top: 70px;
		  	background-color: #9cf19cd9;
		}
		.venn-item.venn-item-5 
		{
			top: 70px;
			background-color: #e8f19cb5;
		}
		.venn_item_1
		{
			position: relative;
		    top: -25px;
		    left: 10px;
		}
		.venn_item_2
		{
			position: relative;
		    top: 110px;
		    left: 325px;
		}
		.venn_item_3
		{
			position: relative;
		    top: 200px;
		    left: 325px;
		}
		.venn_item_4
		{
			position: relative;
		    top: 170px;
    		right: 325px;
		}
		.venn_item_5
		{
			position: relative;
		    top: 0px;
		    right: 325px;
		}
		.overall_diagram 
		{
		    margin-top: 25px;
		}
	</style>
	<div class="overall_diagram">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="panel-title">
					<h3 style="background-color: #5aa1e3; padding: 0px 15px; margin-top: 15px;">Overall Analysis
					</h3>
					<div style="margin-top: 20px;">
						<p style="padding: 5px; border-radius: 5px;"></p>
					</div>
				</div>
			</div>
		</div>
		<ul class="venn">
			<span class="venn_item_1">Has an Innovative Personality <b>(<?php echo $cat_6_max; ?>%)</b></span>
		    <li class="venn-item venn-item-1"></li>
		    <span class="venn_item_2">Has realtively strong form perception and verbal ability <b>(<?php echo $cat_7_max; ?>%)</b></span>
		    <li class="venn-item venn-item-2"></li>
		    <span class="venn_item_3">Has very strong interest towards courses within Finance Stream <b>(<?php echo $cat_8_max; ?>%)</b></span>
		    <li class="venn-item venn-item-3"></li>
		    <span class="venn_item_4">Has good intra personal intellegence and is pictire smart <b>(<?php echo $cat_9_max; ?>%)</b></span>
		    <li class="venn-item venn-item-4"></li>
		    <span class="venn_item_5">Clearly is someone who learns and grasps faster by doing <b>(<?php echo $cat_10_max; ?>%)</b></span>
		    <li class="venn-item venn-item-5"></li>
		</ul>
	</div>
	<?php
}

function councellor_report_card()
{
	ob_start();
	echo '<div class="">
		Report Started
	</div>';
	ob_get_clean();
}

function create_a_pie_chart_2($cat_6_max, $cat_7_max, $cat_8_max, $cat_9_max, $cat_10_max)
{
	$data = '<div class="overall_diagram" style="margin-top: 25px;">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="panel-title">
					<h3 style="background-color: #f33333; padding: 0px 15px; margin-top: 15px;">Overall Analysis
					</h3>
					<div style="margin-top: 20px;">
						<p style="padding: 5px; border-radius: 5px;"></p>
					</div>
				</div>
			</div>
		</div>
		<ul class="venn" style="position: relative;z-index: 0; display: block; margin: 0 auto; padding: 0; width: 308px; height: 330px; top: 5px;">';
			$data .= '<span class="venn_item_1" style="position: relative; top: -25px; left: 10px;">Has an Innovative Personality <b>('. $cat_6_max.'%)</b></span>';
		    $data .= '<li class="venn-item venn-item-1" style="position: absolute; display: block; margin: 0; padding: 0; width: 180px; height: 180px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background: rgba(0, 51, 102, 0.4); color: #036; text-align: center; text-shadow: 1px 1px #fff; font-size: 21px; font-family: sans-serif; top: 0; left: 60px; padding-top: 63px; padding-right: 36px; padding-left: 36px; width: 108px; height: 117px; background-color: #ffa50080;"></li>
		    <span class="venn_item_2" style="position: relative; top: 110px; left: 325px;">Has realtively strong form perception and verbal ability <b>('.$cat_7_max.'%)</b></span>
		    <li class="venn-item venn-item-2" style="position: absolute; display: block; margin: 0; padding: 0; width: 180px; height: 180px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background: rgba(0, 51, 102, 0.4); color: #036; text-align: center; text-shadow: 1px 1px #fff; font-size: 21px; font-family: sans-serif; left: 0; padding-right: 63px; padding-left: 9px; background-color: #ff000070;"></li>
		    <span class="venn_item_3" style="position: relative; top: 200px; left: 325px;">Has very strong interest towards courses within Finance Stream <b>('.$cat_8_max.'%)</b></span>
		    <li class="venn-item venn-item-3" style="position: absolute; display: block; margin: 0; padding: 0; width: 180px; height: 180px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background: rgba(0, 51, 102, 0.4); color: #036; text-align: center; text-shadow: 1px 1px #fff; font-size: 21px; font-family: sans-serif; right: 0; padding-right: 9px; padding-left: 63px; background-color: rgba(0, 51, 102, 0.4);"></li>
		    <span class="venn_item_4" style="position: relative; top: 170px; right: 325px;">Has good intra personal intellegence and is pictire smart <b>('.$cat_9_max.'%)</b></span>
		    <li class="venn-item venn-item-4" style="position: absolute; display: block; margin: 0; padding: 0; width: 180px; height: 180px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background: rgba(0, 51, 102, 0.4); color: #036; text-align: center; text-shadow: 1px 1px #fff; font-size: 21px; font-family: sans-serif; right: 0; padding-right: 9px; padding-left: 63px; top: 70px; background-color: #9cf19cd9;"></li>
		    <span class="venn_item_5" style="position: relative; top: 0px; right: 325px;">Clearly is someone who learns and grasps faster by doing <b>('.$cat_10_max.'%)</b></span>
		    <li class="venn-item venn-item-5" style="position: absolute; display: block; margin: 0; padding: 0; width: 180px; height: 180px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; background: rgba(0, 51, 102, 0.4); color: #036; text-align: center; text-shadow: 1px 1px #fff; font-size: 21px; font-family: sans-serif; top: 70px; background-color: #e8f19cb5;"></li>
		</ul>
	</div>';
	return $data;
}

function overall_report_chart()
{
	?>
	<style>
		.highcharts-figure, .highcharts-data-table table {
		    min-width: 320px; 
		    max-width: 700px;
		    margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #EBEBEB;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}
		.highcharts-data-table caption {
		    padding: 1em 0;
		    font-size: 1.2em;
		    color: #555;
		}
		.highcharts-data-table th {
			font-weight: 600;
		    padding: 0.5em;
		}
		.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
		    padding: 0.5em;
		}
		.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
		    background: #f8f8f8;
		}
		.highcharts-data-table tr:hover {
		    background: #f1f7ff;
		}
	</style>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/venn.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script>
		Highcharts.chart('container', {
	    accessibility: {
	        point: {
	            descriptionFormatter: function (point) {
	                var intersection = point.sets.join(', '),
	                    name = point.name,
	                    ix = point.index + 1,
	                    val = point.value;
	                return ix + '. Intersection: ' + intersection + '. ' +
	                    (point.sets.length > 1 ? name + '. ' : '') + 'Value ' + val + '.';
	            }
	        }
	    },
	    series: [{
	        type: 'venn',
	        name: 'The Unattainable Triangle',
	        data: [{
	            sets: ['Good'],
	            value: 2
	        }, {
	            sets: ['Fast'],
	            value: 2
	        }, {
	            sets: ['Cheap'],
	            value: 2
	        },{
	            sets: ['Low'],
	            value: 2
	        }, {
	            sets: ['High'],
	            value: 2
	        },{
	            sets: ['Good', 'Fast'],
	            value: 1,
	            name: ''
	        }, {
	            sets: ['Good', 'Cheap'],
	            value: 1,
	            name: ''
	        }, {
	            sets: ['Good', 'Low'],
	            value: 1,
	            name: ''
	        }, {
	            sets: ['Good', 'High'],
	            value: 1,
	            name: ''
	        }]
	    }],
	    title: {
	        text: 'The Unattainable Triangle'
	    }
	});
	</script>
	<?php
}

add_action("wp_ajax_save_base_encoded_image", "save_base_encoded_image");
function save_base_encoded_image()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$base_6 = $_POST['dataURL6'];
	$base_7 = $_POST['dataURL7'];
	$base_8 = $_POST['dataURL8'];
	$base_9 = $_POST['dataURL9'];
	$base_10 = $_POST['dataURL10'];
	$data_get = $_POST['data_get'];

    // for 6
    if(!empty($base_6))
    {
	    $image_parts_6 = explode(";base64,", $base_6);
	    $image_type_aux_6 = explode("image/", $image_parts_6[0]);
	    $image_type = $image_type_aux_6[1];
	    $image_base6 = base64_decode($image_parts_6[1]);
	    $file_6 = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-img_6.png';
	    file_put_contents($file_6, $image_base6);
	    $wpdb->update('wp_watupro_taken_exams', array('image_graph_url'=> $base_6), array('user_id'=> $user_id, 'exam_id' => 6));
	}

    // for 7
    if(!empty($base_7))
    {
	    $image_parts_7 = explode(";base64,", $base_7);
	    $image_type_aux_7 = explode("image/", $image_parts_7[0]);
	    $image_type = $image_type_aux_7[1];
	    $image_base7 = base64_decode($image_parts_7[1]);
	    $file_7 = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-img_7.png';
	    file_put_contents($file_7, $image_base7);
	    $wpdb->update('wp_watupro_taken_exams', array('image_graph_url'=> $base_7), array('user_id'=> $user_id, 'exam_id' => 7));
	}

    // for 8
    if(!empty($base_8))
    {
	    $image_parts_8 = explode(";base64,", $base_8);
	    $image_type_aux_8 = explode("image/", $image_parts_8[0]);
	    $image_type = $image_type_aux_8[1];
	    $image_base8 = base64_decode($image_parts_8[1]);
	    $file_8 = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-img_8.png';
	    file_put_contents($file_8, $image_base8);
	    $wpdb->update('wp_watupro_taken_exams', array('image_graph_url'=> $base_8), array('user_id'=> $user_id, 'exam_id' => 8));
	}

    // for 9
    if(!empty($base_9))
    {
	    $image_parts_9 = explode(";base64,", $base_9);
	    $image_type_aux_9 = explode("image/", $image_parts_9[0]);
	    $image_type = $image_type_aux_9[1];
	    $image_base9 = base64_decode($image_parts_9[1]);
	    $file_9 = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-img_9.png';
	    file_put_contents($file_9, $image_base9);
	    $wpdb->update('wp_watupro_taken_exams', array('image_graph_url'=> $base_9), array('user_id'=> $user_id, 'exam_id' => 9));
	}

	// for 10
    if(!empty($base_10))
    {
	    $image_parts_10 = explode(";base64,", $base_10);
	    $image_type_aux_10 = explode("image/", $image_parts_10[0]);
	    $image_type = $image_type_aux_10[1];
	    $image_base10 = base64_decode($image_parts_10[1]);
	    $file_10 = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-img_10.png';
	    file_put_contents($file_10, $image_base10);
	    $wpdb->update('wp_watupro_taken_exams', array('image_graph_url'=> $base_10), array('user_id'=> $user_id, 'exam_id' => 10));
	}

	// for overall
    if(!empty($data_get))
    {
	    $image_parts_overall = explode(";base64,", $data_get);
	    $image_type_aux_overall = explode("image/", $image_parts_overall[0]);
	    $image_type = $image_type_aux_overall[1];
	    $image_base_overall = base64_decode($image_parts_overall[1]);
	    $file = '/home4/proeds3f/public_html/wp-content/uploads/user_reports/'.$user_id.'-overall.png';
	    file_put_contents($file, $image_base_overall);
	    $check_data_exists = $wpdb->get_row("select * from wp_overall_report where user_id = ".$user_id."");
	    if(!empty($check_data_exists))
	    {
	    	$wpdb->update('wp_overall_report', array('imag_url'=> $data_get), array('user_id'=> $user_id));
	    }
	    else
	    {
	    	$wpdb->insert('wp_overall_report', array('user_id'=> $user_id, 'image_url' => $data_get));	
	    }
	}

	/*$exams_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6 ");
	$exams_7 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 7 ");
	$exams_8 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 8 ");
	$exams_9 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 9 ");
	$exams_10 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 10 ");
	$exams_11 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 11 ");
	if(!empty($exams_6) && !empty($exams_7) && !empty($exams_8) && !empty($exams_9) && !empty($exams_10) && !empty($exams_11))
	{
		$user_id = get_current_user_id();
		$user = wp_get_current_user($user_id);
		$name = $user->data->display_name;
		$counsellor_report_pdf_download = counsellor_report_pdf();
		$student_report_pdf_download = student_report_pdf();
		ob_start();
		require('vendor/autoload.php');
		// Councellor pdf generation
		$councellor_mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 20,'margin_right' => 20,'margin_top' => 20,'margin_bottom' => 20,'margin_header' => 20,'margin_footer' => 20]);
		$councellor_mpdf->WriteHTML(trim(mb_convert_encoding($counsellor_report_pdf_download, 'UTF-8')));
		$filename_councellor = '/home/demo3ed/public_html/proedworld/wp-content/uploads/user_reports/'.$name.'-councellor.pdf';
		$councellor_mpdf->Output($filename_councellor,'F');

		// student pdf generation
		$student_mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 20,'margin_right' => 20,'margin_top' => 20,'margin_bottom' => 20,'margin_header' => 20,'margin_footer' => 20]);
		$student_mpdf->WriteHTML(trim(mb_convert_encoding($student_report_pdf_download, 'UTF-8')));
		$filename_councellor = '/home/demo3ed/public_html/proedworld/wp-content/uploads/user_reports/'.$name.'.pdf';
		$student_mpdf->Output($filename_councellor,'F');
		ob_end_flush();
	}*/
}

function create_a_pie_chart_for_overll($cat_6_max, $cat_7_max, $cat_8_max, $cat_9_max, $cat_10_max)
{	
	global $wpdb; 
	$prefix = $wpdb->prefix;
	$data_6 = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_6_max[0][1]." ");
	$data_7 = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_7_max[0][1]." ");
	$data_8 = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_8_max[0][1]." ");
	$data_9 = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_9_max[0][1]." ");
	$data_10 = $wpdb->get_row("select * from ".$prefix."watupro_qcats where ID = ".$cat_10_max[0][1]." ");
	?>
	<div class="panel panel-warning">
		<div class="panel-heading">
			<div class="panel-title">
				<h3 class="heading_back">Overall Analysis
				</h3>
				<div style="margin-top: 20px;">
					<p style="padding: 5px; border-radius: 5px;"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="overall_chart">
		<canvas id="oilChart" width="100%" height="500"></canvas>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var chart_6_name = "<?php echo $data_6->name; ?>";
		var chart_6_point = "<?php echo $cat_6_max[0][0]; ?>";
		var chart_6_total = chart_6_name+' ( '+chart_6_point+'% ) ';
		
		var chart_7_name = "<?php echo $data_7->name; ?>";
		var chart_7_point = "<?php echo $cat_7_max[0][0]; ?>";
		var chart_7_total = chart_7_name+' ( '+chart_7_point+'% ) ';

		var chart_8_name = "<?php echo $data_8->name; ?>";
		var chart_8_point = "<?php echo $cat_8_max[0][0]; ?>";
		var chart_8_total = chart_8_name+' ( '+chart_8_point+'% ) ';

		var chart_9_name = "<?php echo $data_9->name; ?>";
		var chart_9_point = "<?php echo $cat_9_max[0][0]; ?>";
		var chart_9_total = chart_9_name+' ( '+chart_9_point+'% ) ';

		var chart_10_name = "<?php echo $data_10->name; ?>";
		var chart_10_point = "<?php echo $cat_10_max[0][0]; ?>";
		var chart_10_total = chart_10_name+' ( '+chart_10_point+'% ) ';
	
		var oilCanvas = document.getElementById("oilChart");
		Chart.defaults.global.defaultFontFamily = "Lato";
		Chart.defaults.global.defaultFontSize = 18;
		//Chart.defaults.global.legend.display = true;
		var oilData = {
		    labels: [
		        chart_6_total,
		        chart_7_total,
		        chart_8_total,
		        chart_9_total,
		        chart_10_total
		    ],
		    datasets: [
	        {
	            data: [chart_6_point, chart_7_point, chart_8_point, chart_9_point, chart_10_point],
	            backgroundColor: [
	                "#f0c0d8",
	                "#a8d8d8",
	                "#f0d8f0",
	                "#d8f0d8",
	                "#c0d1f0"
	            ]
	        }]
		};
		var pieChart = new Chart(oilCanvas, {
		 	type: 'pie',
		 	data: oilData,
		  	options: {
				responsive: true,
				maintainAspectRatio: false,
	  			animation: {
				    onComplete: done_overall
				},
				tooltips: {
			         enabled: false
			    },
				legend: {
		            display: true,
		            labels: {
		                fontSize: 20
		            }
		        },
			},
		});

		function done_overall()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			var radius = pieChart.outerRadius;
			var midX = oilCanvas.width/2;
			var midY = oilCanvas.height/2;
			var textSize = oilCanvas.width/10;

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					var startAngle = bar._model.startAngle;
			        var endAngle = bar._model.endAngle;
			        var middleAngle = startAngle + ((endAngle - startAngle)/2);
			        // Compute text location
			        var posX = (radius/2) * Math.cos(middleAngle) + midX;
			        var posY = (radius/2) * Math.sin(middleAngle) + midY;
					// Text offside by middle
			        var w_offset = ctx.measureText(data).width/2;
			        var h_offset = textSize/4;
					ctx.fillText(data, posX - w_offset, posY + h_offset);
				});
			});
			var url = pieChart.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", data_get : url},
				success: function(response) 
				{
				}
			});
		}
	</script>
	<?php
}

function columnChartForID6($data_1, $data_2, $data_3, $data_4, $data_5)
{
	if(!empty($data_1)){
		$data_1 = $data_1;
	}else{
		$data_1 = 0;
	}
	if(!empty($data_2)){
		$data_2 = $data_2;
	}else{
		$data_2 = 0;
	}
	if(!empty($data_3)){
		$data_3 = $data_3;
	}else{
		$data_3 = 0;
	}
	if(!empty($data_4)){
		$data_4 = $data_4;
	}else{
		$data_4 = 0;
	}
	if(!empty($data_5)){
		$data_5 = $data_5;
	}else{
		$data_5 = 0;
	}
	$get_highest = array('0' => $data_1, '1' => $data_2, '2' => $data_3, '3' => $data_4, '4' => $data_5);
	$highest = array_keys($get_highest,max($get_highest));
	$high_value = $highest[0];
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var data_1 = "<?php echo $data_1; ?>";
		var data_2 = "<?php echo $data_2; ?>";
		var data_3 = "<?php echo $data_3; ?>";
		var data_4 = "<?php echo $data_4; ?>";
		var data_5 = "<?php echo $data_5; ?>";
		var highest = "<?php echo $high_value; ?>";
			
		var DEFAULT_DATASET_SIZE = 7,
		addedCount = 0,
	    color = Chart.helpers.color;
		var barData = 
		{
			labels: ["Directive", "Social", "Methodical", "Objective", "Innovative"],
			datasets: [{
				label: 'Personality Data Set',
					backgroundColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
		        ],
		        borderColor : [
					"#f0c0d8",
					'#a8d8d8',
					"#f0d8f0",
					"#d8f0d8",
					"#f0c0d8",
		        ],
				borderWidth: 1,
				data: [
					data_1,data_2,data_3,data_4,data_5
				]
			}]
		};
		var ctx = document.getElementById("barChart_6").getContext("2d");
		var	myNewChart_6 = new Chart(ctx, {
			type: 'bar',
			data: barData,
			options: {
				responsive: true,
				showTooltips: false,
	  			maintainAspectRation: false,
	  			animation: {
				    onComplete: done_6
				},
				scales: {
			        xAxes: [{
			            ticks: {
			                fontSize: 15,
			                minRotation: 90,
			            }
			        }],
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			                max: 100,
			            }
			        }]
			    },
			},
		});
		
		myNewChart_6.data.datasets[0].backgroundColor[highest] = "#fb2891";
		myNewChart_6.update();
		
		function done_6()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});

			var url = myNewChart_6.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", dataURL6 : url},
				success: function(response) 
				{
				}
			});
		}
	</script>
	<?php
}

function columnChartForID7($data_1, $data_2, $data_3, $data_4, $data_5, $data_6, $data_7, $data_8, $data_9)
{
	if(!empty($data_1)){
		$data_1 = $data_1;
	}else{
		$data_1 = 0;
	}
	if(!empty($data_2)){
		$data_2 = $data_2;
	}else{
		$data_2 = 0;
	}
	if(!empty($data_3)){
		$data_3 = $data_3;
	}else{
		$data_3 = 0;
	}
	if(!empty($data_4)){
		$data_4 = $data_4;
	}else{
		$data_4 = 0;
	}
	if(!empty($data_5)){
		$data_5 = $data_5;
	}else{
		$data_5 = 0;
	}
	if(!empty($data_6)){
		$data_6 = $data_6;
	}else{
		$data_6 = 0;
	}
	if(!empty($data_7)){
		$data_7 = $data_7;
	}else{
		$data_7 = 0;
	}
	if(!empty($data_8)){
		$data_8 = $data_8;
	}else{
		$data_8 = 0;
	}
	if(!empty($data_9)){
		$data_9 = $data_9;
	}else{
		$data_9 = 0;
	}
	$get_highest = array('0' => $data_1, '1' => $data_2, '2' => $data_3, '3' => $data_4, '4' => $data_5, '5' => $data_6, '6' => $data_7, '7' => $data_8, '8' => $data_9);
	$highest = array_keys($get_highest,max($get_highest));
	$high_value = $highest[0];
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var data_1 = "<?php echo $data_1; ?>";
		var data_2 = "<?php echo $data_2; ?>";
		var data_3 = "<?php echo $data_3; ?>";
		var data_4 = "<?php echo $data_4; ?>";
		var data_5 = "<?php echo $data_5; ?>";
		var data_6 = "<?php echo $data_6; ?>";
		var data_7 = "<?php echo $data_7; ?>";
		var data_8 = "<?php echo $data_8; ?>";
		var data_9 = "<?php echo $data_9; ?>";
		var highest = "<?php echo $high_value; ?>";
			
		var DEFAULT_DATASET_SIZE = 15,
	    color = Chart.helpers.color;
		var barData = 
		{
			labels: ['Form Perception', 'Clerical Perception', 'Spatial Perception', 'Finger Dexterity', 'Manual Dexterity', 'Numerical Ability', 'Verbal Ability', 'Motor Coordination', 'General Learning Ability'],
			datasets: [{
				label: 'Ability Data Set',
					backgroundColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
		        ],
		        borderColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
		        ],
				borderWidth: 1,
				data: [
					data_1, data_2, data_3, data_4, data_5, data_6, data_7,data_8, data_9
				]
			}]
		};
		var ctx = document.getElementById("barChart_7").getContext("2d");
		var	myNewChart_7 = new Chart(ctx, {
			type: 'bar',
			data: barData,
			options: {
				responsive: true,
				showTooltips: false,
	  			maintainAspectRation: false,
	  			animation: {
				    onComplete: done_7
				},
				scales: {
			        xAxes: [{
			            ticks: {
			                fontSize: 15,
			                minRotation: 90,
			                // maxRotation: 0,
			                // autoSkip: false,
			    //             callback: function(label, index, labels) 
			    //             {
			    //             	if (/\s/.test(labels[index])) 
			    //             	{
			    //             		var break_label = labels[0].split(" ");
			    //             		var half_label_1 = break_label[0];
			    //             		var half_label_2 = break_label[1];
			    //             		console.log(half_label_1);
			    //             		console.log(half_label_2);
			    //             		return half_label_1 + '\n' + half_label_2;
							// 		//return labels[index].split(" ");
							// 	}
							// },
			            }
			        }],
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			                max: 100,
			            }
			        }]
			    },
			},
		});
		myNewChart_7.data.datasets[0].backgroundColor[highest] = "#fb2891";
		/*myNewChart_7.data.labels.forEach(function(e, i, a) 
		{
			console.log(e.split(/\n/));
            a[i] = e.split(/\n/);
        });*/
		myNewChart_7.update();
		function done_7()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});

			var url = myNewChart_7.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", dataURL7 : url},
				success: function(response) 
				{
				}
			});
		}
	</script>
	<?php
}

function columnChartForID8($data_1, $data_2, $data_3, $data_4, $data_5, $data_6, $data_7, $data_8, $data_9, $data_10, $data_11, $data_12, $data_13, $data_14)
{
	if(!empty($data_1)){
		$data_1 = $data_1;
	}else{
		$data_1 = 0;
	}
	if(!empty($data_2)){
		$data_2 = $data_2;
	}else{
		$data_2 = 0;
	}
	if(!empty($data_3)){
		$data_3 = $data_3;
	}else{
		$data_3 = 0;
	}
	if(!empty($data_4)){
		$data_4 = $data_4;
	}else{
		$data_4 = 0;
	}
	if(!empty($data_5)){
		$data_5 = $data_5;
	}else{
		$data_5 = 0;
	}
	if(!empty($data_6)){
		$data_6 = $data_6;
	}else{
		$data_6 = 0;
	}
	if(!empty($data_7)){
		$data_7 = $data_7;
	}else{
		$data_7 = 0;
	}
	if(!empty($data_8)){
		$data_8 = $data_8;
	}else{
		$data_8 = 0;
	}
	if(!empty($data_9)){
		$data_9 = $data_9;
	}else{
		$data_9 = 0;
	}
	if(!empty($data_10)){
		$data_10 = $data_10;
	}else{
		$data_10 = 0;
	}
	if(!empty($data_11)){
		$data_11 = $data_11;
	}else{
		$data_11 = 0;
	}
	if(!empty($data_12)){
		$data_12 = $data_12;
	}else{
		$data_12 = 0;
	}
	if(!empty($data_13)){
		$data_13 = $data_13;
	}else{
		$data_13 = 0;
	}
	if(!empty($data_14)){
		$data_14 = $data_14;
	}else{
		$data_14 = 0;
	}
	$get_highest = array('0' => $data_1, '1' => $data_2, '2' => $data_3, '3' => $data_4, '4' => $data_5, '5' => $data_6, '6' => $data_7, '7' => $data_8, '8' => $data_9, '9' => $data_10, '10' => $data_11, '11' => $data_12, '12' => $data_13, '13' => $data_14);
	$highest = array_keys($get_highest,max($get_highest));
	$high_value = $highest[0];
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var data_1 = "<?php echo $data_1; ?>";
		var data_2 = "<?php echo $data_2; ?>";
		var data_3 = "<?php echo $data_3; ?>";
		var data_4 = "<?php echo $data_4; ?>";
		var data_5 = "<?php echo $data_5; ?>";
		var data_6 = "<?php echo $data_6; ?>";
		var data_7 = "<?php echo $data_7; ?>";
		var data_8 = "<?php echo $data_8; ?>";
		var data_9 = "<?php echo $data_9; ?>";
		var data_10 = "<?php echo $data_10; ?>";
		var data_11 = "<?php echo $data_11; ?>";
		var data_12 = "<?php echo $data_12; ?>";
		var data_13 = "<?php echo $data_13; ?>";
		var data_14 = "<?php echo $data_14; ?>";
		var highest = "<?php echo $high_value; ?>";
			
		var DEFAULT_DATASET_SIZE = 15,
	    color = Chart.helpers.color;
		var barData = 
		{
			labels: ["Technology", "Social Science", "Science", "Public Service", "Multimedia", "Legal", "Healthcare", "Finance", "Engineering", "Education", "Culinary", "Communications", "Business", "Arts"],
			datasets: [{
				label: 'Interest Data Set',
					backgroundColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
		        ],
		        borderColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
		        ],
				borderWidth: 1,
				data: [
					data_1, data_2, data_3, data_4, data_5, data_6, data_7,data_8, data_9, data_10, data_11, data_12, data_13, data_14 
				]
			}]
		};
		var ctx = document.getElementById("barChart_8").getContext("2d");
		var	myNewChart_8 = new Chart(ctx, {
			type: 'bar',
			data: barData,
			options: {
				responsive: true,
				showTooltips: false,
	  			maintainAspectRation: true,
	  			animation: {
				    onComplete: done_8
				},
				scales: {
			        xAxes: [{
			            ticks: {
			                fontSize: 15,
			                minRotation: 90,
			                //maxRotation: 0,
			                //autoSkip: false,
			            }
			        }],
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			                max: 100,
			            }
			        }]
			    },
			},
		});
		myNewChart_8.data.datasets[0].backgroundColor[highest] = "#fb2891";
		myNewChart_8.update();
		function done_8()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});

			var url = myNewChart_8.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", dataURL8 : url},
				success: function(response) 
				{
				}
			});
		}
	</script>
	<?php
}

function columnChartForID9($data_1, $data_2, $data_3, $data_4, $data_5, $data_6, $data_7, $data_8, $data_9)
{
	if(!empty($data_1)){
		$data_1 = $data_1;
	}else{
		$data_1 = 0;
	}
	if(!empty($data_2)){
		$data_2 = $data_2;
	}else{
		$data_2 = 0;
	}
	if(!empty($data_3)){
		$data_3 = $data_3;
	}else{
		$data_3 = 0;
	}
	if(!empty($data_4)){
		$data_4 = $data_4;
	}else{
		$data_4 = 0;
	}
	if(!empty($data_5)){
		$data_5 = $data_5;
	}else{
		$data_5 = 0;
	}
	if(!empty($data_6)){
		$data_6 = $data_6;
	}else{
		$data_6 = 0;
	}
	if(!empty($data_7)){
		$data_7 = $data_7;
	}else{
		$data_7 = 0;
	}
	if(!empty($data_8)){
		$data_8 = $data_8;
	}else{
		$data_8 = 0;
	}
	if(!empty($data_9)){
		$data_9 = $data_9;
	}else{
		$data_9 = 0;
	}
	$get_highest = array('0' => $data_1, '1' => $data_2, '2' => $data_3, '3' => $data_4, '4' => $data_5, '5' => $data_6, '6' => $data_7, '7' => $data_8, '8' => $data_9);
	$highest = array_keys($get_highest,max($get_highest));
	$high_value = $highest[0];
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var data_1 = "<?php echo $data_1; ?>";
		var data_2 = "<?php echo $data_2; ?>";
		var data_3 = "<?php echo $data_3; ?>";
		var data_4 = "<?php echo $data_4; ?>";
		var data_5 = "<?php echo $data_5; ?>";
		var data_6 = "<?php echo $data_6; ?>";
		var data_7 = "<?php echo $data_7; ?>";
		var data_8 = "<?php echo $data_8; ?>";
		var data_9 = "<?php echo $data_9; ?>";
		var highest = "<?php echo $high_value; ?>";
			
		var DEFAULT_DATASET_SIZE = 15,
	    color = Chart.helpers.color;
		var barData = 
		{
			labels: ["Naturalist (nature smart-NS)", "Musical (sound smart-MS)", "Logical-mathematical (number/reasoning smart-RS)", "Existential (life smart-LS)", "Interpersonal (people smart- IPS)", "Bodily-kinesthetic (body smart-BS)", "Linguistic (word smart-WS)", "Intra-personal (self smart-SS)", "Spatial (picture smart-PS)"],
			datasets: [{
				label: 'Multiple Intelligence Data Set',
					backgroundColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
		        ],
		        borderColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
					'#d8f0d8',
					'#f0c0d8',
		        ],
				borderWidth: 1,
				data: [
					data_1, data_2, data_3, data_4, data_5, data_6, data_7,data_8, data_9 
				]
			}]
		};
		var ctx = document.getElementById("barChart_9").getContext("2d");
		var	myNewChart9 = new Chart(ctx, {
			type: 'bar',
			data: barData,
			options: {
				responsive: true,
				showTooltips: false,
	  			maintainAspectRation: false,
	  			animation: {
				    onComplete: done9
				},
				scales: {
			        xAxes: [{
			            ticks: {
			                fontSize: 15,
			                minRotation: 90,
			                //maxRotation: 0,
			                //autoSkip: false,
			            }
			        }],
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			                max: 100,
			            }
			        }]
			    },
			},
		});
		myNewChart9.data.datasets[0].backgroundColor[highest] = "#fb2891";
		myNewChart9.update();
		function done9()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});

			var url = myNewChart9.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", dataURL9 : url},
				success: function(response) 
				{
				}
			});
		}
	</script>
	<?php
}

function columnChartForID10($data_1, $data_2, $data_3)
{
	if(!empty($data_1)){
		$data_1 = $data_1;
	}else{
		$data_1 = 0;
	}
	if(!empty($data_2)){
		$data_2 = $data_2;
	}else{
		$data_2 = 0;
	}
	if(!empty($data_3)){
		$data_3 = $data_3;
	}else{
		$data_3 = 0;
	}
	$get_highest = array('0' => $data_1, '1' => $data_2, '2' => $data_3);
	$highest = array_keys($get_highest,max($get_highest));
	$high_value = $highest[0];
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<script>
		var data_1 = "<?php echo $data_1; ?>";
		var data_2 = "<?php echo $data_2; ?>";
		var data_3 = "<?php echo $data_3; ?>";
		var highest = "<?php echo $high_value; ?>";
			
		var DEFAULT_DATASET_SIZE = 15,
	    color = Chart.helpers.color;
		var barData = 
		{
			labels: ["Doer", "Listener", "Seer"],
			datasets: [{
				label: 'Learning Style Data Set',
					backgroundColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
		        ],
		        borderColor : [
					'#f0c0d8',
					'#a8d8d8',
					'#f0d8f0',
		        ],
				borderWidth: 1,
				data: [
					data_1, data_2, data_3
				]
			}]
		};
		var ctx = document.getElementById("barChart_10").getContext("2d");
		var	myNewChart10 = new Chart(ctx, {
			type: 'bar',
			data: barData,
			options: {
				responsive: true,
				showTooltips: false,
	  			maintainAspectRation: false,
	  			animation: {
				    onComplete: done10
				},
				scales: {
			        xAxes: [{
			            ticks: {
			                fontSize: 15,
			                minRotation: 90,
			                //maxRotation: 0,
			            }
			        }],
			        yAxes: [{
			            ticks: {
			                beginAtZero: true,
			                max: 100,
			            }
			        }]
			    },
			},
		});
		myNewChart10.data.datasets[0].backgroundColor[highest] = "#fb2891";
		myNewChart10.update();
		function done10()
		{
			var chartInstance = this.chart,
			ctx = chartInstance.ctx;

			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
			ctx.textAlign = 'center';
			ctx.textBaseline = 'bottom';

			this.data.datasets.forEach(function(dataset, i) 
			{
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function(bar, index) {
					var data = dataset.data[index]+'%';
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});

			var url = myNewChart10.toBase64Image();
			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : ajax_url,
				data : {action: "save_base_encoded_image", dataURL10 : url},
				success: function(response) 
				{
					console.log("Graph 10 ajax run successfully");
				}
			});
		}
	</script>
	<?php
}

function show_my_fields( $user ) 
{
   	$wp_pro_contact_number = get_user_meta( $user->ID, 'wp_pro_contact_number', true );
   	$wp_pro_school = get_user_meta( $user->ID, 'wp_pro_school', true ); 
   	$wp_pro_curriculam = get_user_meta( $user->ID, 'wp_pro_curriculam', true ); 
   	$wp_pro_high_school_graduation_year = get_user_meta( $user->ID, 'wp_pro_high_school_graduation_year', true ); 
   	$wp_pro_nationality = get_user_meta( $user->ID, 'wp_pro_nationality', true );
   	?>
   	<span style="font-weight: 700; margin-right: 115px;"><?php _e('Contact Number') ?></span>
   	<span><input name="wp_pro_contact_number" style="width:25em;" type="text" id="wp_pro_contact_number" value="<?php echo esc_attr($wp_pro_contact_number); ?>" placeholder="Contact Number"/></span>
   	<br>
   	<span style="font-weight: 700; margin-right: 176px;"><?php _e('School') ?></span>
   	<span><input name="wp_pro_school" style="width:25em; margin-top:15px;" type="text" id="wp_pro_school" value="<?php echo esc_attr($wp_pro_school); ?>" placeholder="School"/></span>
   	<br>
   	<span style="font-weight: 700; margin-right: 150px;"><?php _e('Curriculam') ?></span>
   	<span><input name="wp_pro_curriculam" style="width:25em; margin-top:15px;" type="text" id="wp_pro_curriculam" value="<?php echo esc_attr($wp_pro_curriculam); ?>" placeholder="Curriculam"/></span>
   	<br>
   	<span style="font-weight: 700; margin-right: 40px;"><?php _e('High School Graduation Year') ?></span>
   	<span><input name="wp_pro_high_school_graduation_year" style="width:25em; margin-top:15px;" type="text" id="wp_pro_high_school_graduation_year" value="<?php echo esc_attr($wp_pro_high_school_graduation_year); ?>" placeholder="High School Graduation Year"/></span>
   	<br>
   	<span style="font-weight: 700; margin-right: 148px;"><?php _e('Nationality') ?></span>
   	<span><input name="wp_pro_nationality" style="width:25em; margin-top:15px;" type="text" id="wp_pro_nationality" value="<?php echo esc_attr($wp_pro_nationality); ?>" placeholder="Nationality"/></span>
	<?php
}
add_action( 'show_user_profile', 'show_my_fields' );
add_action( 'edit_user_profile', 'show_my_fields' );
add_action( 'user_new_form', 'show_my_fields' );

function save_my_form_fields( $user_id ) 
{
    update_user_meta( $user_id, 'wp_pro_contact_number', $_POST['wp_pro_contact_number'] );
    update_user_meta( $user_id, 'wp_pro_school', $_POST['wp_pro_school'] );
    update_user_meta( $user_id, 'wp_pro_curriculam', $_POST['wp_pro_curriculam'] );
    update_user_meta( $user_id, 'wp_pro_high_school_graduation_year', $_POST['wp_pro_high_school_graduation_year'] );
    update_user_meta( $user_id, 'wp_pro_nationality', $_POST['wp_pro_nationality'] );
}
add_action( 'personal_options_update', 'save_my_form_fields' );
add_action( 'edit_user_profile_update', 'save_my_form_fields' );
add_action( 'user_register', 'save_my_form_fields' );

function counsellor_report_pdf() 
{
    global $wpdb;
    $prefix = $wpdb->prefix;
    $user_id = get_current_user_id();
    $user = wp_get_current_user($user_id);
    $data = '<div class="not_given_test">
		<div class="" id="view_result">';
    $exams_6 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 6 ");
    $exams_7 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 7 ");
    $exams_8 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 8 ");
    $exams_9 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 9 ");
    $exams_10 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 10 ");
    $exams_11 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 11 ");
    if(!empty($exams_6) && !empty($exams_7) && !empty($exams_8) && !empty($exams_9) && !empty($exams_10) && !empty($exams_11))
    {
	    $data .= '<div class="">';
	    $data .= "<div id='test'></div>";
	    $quizzes = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_master");
	    $cat_6_max = '';
	    $cat_7_max = '';
	    $cat_8_max = '';
	    $cat_9_max = '';
	    $cat_10_max = '';

	    $cat_6_array_2 = array();
	    $cat_6_array_3 = array();
	    $cat_6_array_8 = array();
	    $cat_6_array_9 = array();
	    $cat_6_array_12 = array();

	    $cat_7_array_13 = array();
	    $cat_7_array_14 = array();
	    $cat_7_array_15 = array();
	    $cat_7_array_16 = array();
	    $cat_7_array_17 = array();
	    $cat_7_array_18 = array();
	    $cat_7_array_19 = array();
	    $cat_7_array_20 = array();
	    $cat_7_array_21 = array();

	    $cat_8_array_34 = array();
	    $cat_8_array_35 = array();
	    $cat_8_array_36 = array();
	    $cat_8_array_37 = array();
	    $cat_8_array_38 = array();
	    $cat_8_array_39 = array();
	    $cat_8_array_40 = array();
	    $cat_8_array_41 = array();
	    $cat_8_array_42 = array();
	    $cat_8_array_43 = array();
	    $cat_8_array_44 = array();
	    $cat_8_array_45 = array();
	    $cat_8_array_46 = array();
	    $cat_8_array_47 = array();

	    $cat_9_array_22 = array();
	    $cat_9_array_23 = array();
	    $cat_9_array_24 = array();
	    $cat_9_array_25 = array();
	    $cat_9_array_26 = array();
	    $cat_9_array_27 = array();
	    $cat_9_array_28 = array();
	    $cat_9_array_29 = array();
	    $cat_9_array_30 = array();

	    $cat_10_array_31 = array();
	    $cat_10_array_32 = array();
	    $cat_10_array_33 = array();
	    $data .= '<div class="vc_row wpb_row vc_row-fluid bp-background-size-auto">
						<div class="wpb_column vc_column_container vc_col-sm-12 bp-background-size-auto">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_empty_space" style="height: 32px">
										<span class="vc_empty_space_inner">
										</span>
									</div>
									<div class="bp-element bp-element-pricing-table layout-3 number-columns-3">     
										<div class="wrap-element">
											<div class="row">
											<div style="text-align:center;">
												<img src="'.site_url().'/wp-content/plugins/3edge-reports/proed-logo.png">
												</div>
												<h3 style="background-color: #85b920; padding: 0px 15px; margin-top: 15px; color:#ffffff;">CAREER POSSIBILITES ASSESSMENT STUDENT REPORT FOR COUNSELOR
												</h3>';
												$wp_pro_contact_number = get_user_meta( $user->ID, 'wp_pro_contact_number', true );
								   	$wp_pro_school = get_user_meta( $user->ID, 'wp_pro_school', true ); 
								   	$wp_pro_curriculam = get_user_meta( $user->ID, 'wp_pro_curriculam', true ); 
								   	$wp_pro_high_school_graduation_year = get_user_meta( $user->ID, 'wp_pro_high_school_graduation_year', true ); 
								   	$wp_pro_nationality = get_user_meta( $user->ID, 'wp_pro_nationality', true );
								   	if(!empty($wp_pro_contact_number) || !empty($wp_pro_school) || !empty($wp_pro_curriculam) || !empty($wp_pro_high_school_graduation_year) || !empty($wp_pro_nationality))
								   	{
	                                	$date_6_start = strtotime($exams_6->start_time);
										$date_6_end = strtotime($exams_6->end_time);
										$date_6 = number_format(abs($date_6_end - $date_6_start)/60, 2);

										$date_7_start = strtotime($exams_7->start_time);
										$date_7_end = strtotime($exams_7->end_time);
										$date_7 = number_format(abs($date_7_end - $date_7_start)/60, 2);

										$date_8_start = strtotime($exams_8->start_time);
										$date_8_end = strtotime($exams_8->end_time);
										$date_8 = number_format(abs($date_8_end - $date_8_start)/60, 2);

										$date_9_start = strtotime($exams_9->start_time);
										$date_9_end = strtotime($exams_9->end_time);
										$date_9 = number_format(abs($date_9_end - $date_9_start)/60, 2);

										$date_10_start = strtotime($exams_10->start_time);
										$date_10_end = strtotime($exams_10->end_time);
										$date_10 = number_format(abs($date_10_end - $date_10_start)/60, 2);

										$date_11_start = strtotime($exams_11->start_time);
										$date_11_end = strtotime($exams_11->end_time);
										$date_11 = number_format(abs($date_11_end - $date_11_start)/60, 2);

										$total_time = $date_6 + $date_7 + $date_8 + $date_9 + $date_10 + $date_11;

										$createDate = new DateTime($exams_10->end_time);
										$strip = $createDate->format('Y-m-d');
										$data .='<table><tbody><tr>
											<td><b>Student Name : </b></td>
											<td>'.$user->user_login.'</td>
											</tr><tr>
											<td><b>Contact Number : </b></td>
											<td>'.$wp_pro_contact_number.'</td>
											</tr><tr>
											<td><b>Email : </b></td>
											<td>'.$user->user_email.'</td>
											</tr><tr>
											<td><b>Test Date : </b></td>
											<td>'.$strip.'</td>
											</tr><tr>
											<td><b>High School Graduation Year : </b></td>
											<td>'.$wp_pro_high_school_graduation_year.'</td>
											</tr><tr>
											<td><b>School : </b></td>
											<td>'.$wp_pro_school.'</td>
											</tr><tr>
											<td><b>Curriculam : </b></td>
											<td>'.$wp_pro_curriculam.'</td>
											</tr><tr>
											<td><b>Nationality : </b></td>
											<td>'.$wp_pro_nationality.'</td>
											</tr><tr><td><b>Total Time taken for Test : </b></td>
											<td>'.$total_time.' Min</td></tr></tbody></table>';
										}
	                            foreach ($quizzes as $key => $quiz) {
	                                $question_cat = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 0");
	                                foreach ($question_cat as $key => $categories) {
	                                    if ($quiz->name == 'Personality' && $categories->name == 'Personality Type') {
	                                        $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 1");
	                                    }
	                                    if ($quiz->name == 'Ability' && $categories->name == 'Ability Type') {
	                                        $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 4");
	                                    }
	                                    if ($quiz->name == 'Interests' && $categories->name == 'Interest Type') {
	                                        $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 5");
	                                    }
	                                    if ($quiz->name == 'Multiple Intelligence' && $categories->name == 'Multiple Intelligences Type') {
	                                        $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 6");
	                                    }
	                                    if ($quiz->name == 'Learning Style' && $categories->name == 'Learning Style Type') {
	                                        $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 7");
	                                    }
	                                }
	                                $exam_taken = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = " . $quiz->ID . "");
	                                $questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM " . $prefix . "watupro_student_answers as answer inner join " . $prefix . "watupro_question as question on answer.question_id = question.ID where answer.user_id = " . $user_id . " and answer.exam_id = " . $exam_taken->exam_id . " and answer.taking_id = " . $exam_taken->ID . " group by question.cat_id order by cat_id ASC ");

	                                	// personality
	                                    if ($quiz->ID == 6) {
	                                        $data .= '<span>
	                                        <h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
	                                        </h4>
	                                        </span>
	                                        <p><b>Personality</b> is basically who you are. It is very basic to everyone; nobody can change his/her personality entirely though modifications can always be made with time. It plays a vital role in choosing the right career.
	                                        </p>
	                                        <span>
	                                        <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Personality Data Set</p>
	                                        </span>';
	                                    }
	                                    // ability
	                                    if ($quiz->ID == 7) {
	                                    	$data .= '<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>';
	                                        $data .= '<span>
	                                    	<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
	                                    	</h4>
	                                        </span>
	                                        <p><b>Ability</b> refers to possessing more of a natural talent for a task, even if that talent is not yet fully developed. Whereas aptitude indicates something a person is able to do well, specifically what you are good at. One can develop an ability to do something without the natural aptitude for it, through hard work and adaptation.
	                                        </p>
	                                        <span>
	                                        	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Aptitude and Ability Data Set</p>
	                                        </span>';
	                                    }
	                                    //interest
	                                    if ($quiz->ID == 8) {
	                                    	$data .= '<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>';
	                                        $data .= '<span>
	                                        	<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
	                                        	</h4>
	                                        </span>
	                                        <p><b>Career interest</b> This assessment analysis helps you to judge the most appropriate career for you based on What are your interests among the various choices available.
	                                        </p>
	                                        <span>
	                                        	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Interests Data Set</p>
	                                        </span>';
	                                    }
	                                    // multiple intellegence
	                                    if ($quiz->ID == 9) {
	                                    	$data .= '<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>';
	                                        $data .= '<span>
	                                        	<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
	                                        	</h4>
	                                        </span>
	                                        <p><h4><b>Naturalist Intelligence</b></h4></p>
	                                        <p>Naturalist intelligence designates the human ability to discriminate among living things (plants, animals) as well as sensitivity to other features of the natural world (clouds, rock configurations). This ability was clearly of value in our evolutionary past as hunters, gatherers, and farmers; it continues to be central in such roles as botanist or chef. 
	                                        </p>
	                                        <p><h4><b>Musical Intelligence</b></h4></p>
	                                        <p>Musical intelligence is the capacity to discern pitch, rhythm, timbre, and tone. This intelligence enables us to recognize, create, reproduce, and reflect on music, as demonstrated by composers, conductors, musicians, vocalist, and sensitive listeners. Interestingly, there is often an affective connection between music and the emotions; and mathematical and musical intelligences may share common thinking processes. Young adults with this kind of intelligence are usually singing or drumming to themselves. They are usually quite aware of sounds others may miss.
	                                        </p>
	                                        <p><h4><b>Logical-Mathematical Intelligence</b></h4></p>
	                                        <p>Logical-mathematical intelligence is the ability to calculate, quantify, consider propositions and hypotheses, and carry out complete mathematical operations. It enables to perceive relationships and connections and to use abstract, symbolic thought; sequential reasoning skills; and inductive and deductive thinking patterns. Logical intelligence is usually well developed in mathematicians, scientists, and detectives. Young adults with lots of logical intelligence are interested in patterns, categories, and relationships. They are drawn to arithmetic problems, strategy games and experiments.
	                                        </p>
	                                        <p><h4><b>Existential Intelligence</b></h4></p>
	                                        <p>Sensitivity and capacity to tackle deep questions about human existence, such as the meaning of life, why we die, and how did we get here.
	                                        </p>
	                                        <p><h4><b>Interpersonal Intelligence</b></h4></p>
	                                        <p>Interpersonal intelligence is the ability to understand and interact effectively with others. It involves effective verbal and nonverbal communication, the ability to note distinctions among others, sensitivity to the moods and temperaments of others, and the ability to entertain multiple perspectives. Teachers, social workers, actors, and politicians all exhibit interpersonal intelligence. Young adults with this kind of intelligence are leaders among their peers, are good at communicating, and seem to understand others feelings and motives.
	                                        </p>
	                                        <p><h4><b>Bodily-Kinesthetic Intelligence</b></h4></p>
	                                        <p>Bodily kinesthetic intelligence is the capacity to manipulate objects and use a variety of physical skills. This intelligence also involves a sense of timing and the perfection of skills through mind body union. Athletes, dancers, surgeons, and crafts people exhibit well-developed bodily kinesthetic intelligence.
	                                        </p>
	                                        <p><h4><b>Linguistic Intelligence</b></h4></p>
	                                        <p>Linguistic intelligence is the ability to think in words and to use language to express and appreciate complex meanings. Linguistic intelligence allows us to understand the order and meaning of words and to apply meta-linguistic skills to reflect on our use of language. Linguistic intelligence is the most widely shared human competence and is evident in poets, novelists, journalists, and effective public speakers. Young adults with this kind of intelligence enjoy writing, reading, telling stories or doing crossword puzzles.
	                                        </p>
	                                        <p><h4><b>Intra-personal Intelligence</b></h4></p>
	                                        <p>Intra-personal intelligence is the capacity to understand oneself and one thoughts and feelings, and to use such knowledge in planning and directing one life. Intra-personal intelligence involves not only an appreciation of the self, but also of the human condition. It is evident in psychologist, spiritual leaders, and philosophers. These young adults may be shy. They are very aware of their own feelings and are self-motivated.
	                                        </p>
	                                        <p><h4><b>Spatial Intelligence</b></h4></p>
	                                        <p>Spatial intelligence is the ability to think in three dimensions. Core capacities include mental imagery, spatial reasoning, image manipulation, graphic and artistic skills, and an active imagination. Sailors, pilots, sculptors, painters, and architects all exhibit spatial intelligence. Young adults with this kind of intelligence may be fascinated with mazes or jigsaw puzzles, or spend free time drawing or daydreaming.
	                                        </p>';
	                                        $data .= '<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>';
	                                        $data .='<span>
	                                        	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Multiple Intelligence Data Set</p>
	                                        </span>';
	                                    }
	                                    //learning
	                                    if ($quiz->ID == 10) {
	                                    	$data .= '<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>
	                                        	<p></p>';
	                                        $data .= ' <span>
	                                    		<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
	                                    		</h4>
	                                    	</span>
	                                    	<p><h4><b>Kinesthetic Learner- Learning by Doing</b></h4></p>
	                                    	<p>Kinesthetic learners need to touch or experience something in order to remember it. If you fall into this classification, you may have faced greater challenges in the academic environment. Most formal learning is not set up to include physical movement and activities. Nevertheless, if this is your strength, you could benefit from the following activities: making models, visiting museums, giving a demonstration, participating in a simulation, and studying on the floor, bed or any place that feels comfortable. You can also relate to physical activities, direct involvement, hands-on activities, displays, demonstrations, and experiments. 
	                                    	</p>
	                                    	<p><h4><b>Visual Learner - Learning by Seeing</b></h4></p>
	                                    	<p>Visual learners need to see something in order to learn best. if you fall into this category, you will benefit from the following activities; copying from the board, writing and rewriting notes, highlighting key information in the textbook, making mind maps, using flashcards, and watching videos. You can also learn easily from graphics, posters, charts, maps, and photographs. 
	                                    	</p>
	                                    	<p><h4><b>Auditory Learner - Learning by Listening</b></h4></p>
	                                    	<p>Auditory learners need to hear something in order to learn well. If you fall into this group, doing the following will help you learn more easily; pay attention in class, make recordings of learning material, repeat facts with your eyes closed, ask questions, explain the subject matter to another student, record lectures, participate in group discussions, and study in a quiet environment. Auditory learners like to listen to audio books, lectures, debates, and music
	                                    	</p>
	                                    	<span>
	                                    		<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Learning Style Data Set</p>
	                                    	</span>';
	                                    }
	                                    $data .= '<div class="">
		  									<div class="">';
	                                foreach ($child_categories as $c_key => $cats) {
	                                    $cat_id = '';
	                                    $flag = '';
	                                    foreach ($questions_answered as $a_key => $answered) {
	                                        $cat_id = $answered->cat_id;
	                                        if ($cats->ID == $cat_id) {
	                                            $flag = 'true';
	                                            if ($quiz->ID == 6) {
	                                                if ($cats->ID == 2) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 2");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_6_array_2, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 3) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 3");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_6_array_3, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 8) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 8");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_6_array_8, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 9) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 9");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_6_array_9, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 12) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 12");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_6_array_12, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                            }
	                                            if ($quiz->ID == 7) {
	                                                if ($cats->ID == 13) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 13");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_13, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 14) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 14");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_14, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 15) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 15");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_15, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 16) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 16");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_16, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 17) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 17");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_17, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 18) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 18");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_18, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 19) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 19");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_19, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 20) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 20");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_20, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 21) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 21");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_7_array_21, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                            }
	                                            if ($quiz->ID == 8) {
	                                                if ($cats->ID == 34) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 34");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_34, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 35) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 35");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_35, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 36) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 36");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_36, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 37) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 37");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_37, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 38) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 38");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_38, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 39) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 39");

	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_39, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 40) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 40");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_40, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 41) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 41");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_41, $total_points);
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 42) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 42");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_42, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 43) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 43");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_43, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    };
	                                                }
	                                                if ($cats->ID == 44) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 44");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_44, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 45) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 45");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_45, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 46) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 46");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_46, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 47) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 47");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 4;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_8_array_47, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                            }
	                                            if ($quiz->ID == 9) {
	                                                if ($cats->ID == 22) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 22");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_22, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 23) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 23");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_23, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 24) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 24");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_24, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 25) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 25");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_25, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 26) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 26");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_26, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 27) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 27");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_27, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 28) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 28");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_28, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 29) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 29");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_29, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 30) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 30");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 5;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_9_array_30, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                            }
	                                            if ($quiz->ID == 10) {
	                                                if ($cats->ID == 31) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 31");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 3;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_10_array_31, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 32) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 32");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 3;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_10_array_32, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                                if ($cats->ID == 33) {
	                                                    $questions = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_question where cat_id = 33");
	                                                    $count_cat_questions = count($questions);
	                                                    $total = $count_cat_questions * 3;
	                                                    if (!empty($total) && $total != 0) {
	                                                        $total_points = round(($answered->total_points / $total) * 100);
	                                                        array_push($cat_10_array_33, $total_points);
	                                                        continue;
	                                                    } else {
	                                                        $total_points = '';
	                                                    }
	                                                }
	                                            }
	                                            break;
	                                        }
	                                    }
	                                }
	                                if ($flag == 'true') 
	                                {
	                                	if ($quiz->ID == 6) {
	                                        $data .= '<div id="columnChartForID6" style="width: 100%;"></div>';
	                                        $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_6.png"></div>';
	                                    }
	                                    elseif ($quiz->ID == 7) {
	                                        $data .= '<div id="columnChartForID7" style="width: 100%;"></div>';
	                                        $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_7.png"></div>';
	                                    }
	                                    elseif ($quiz->ID == 8) {
	                                        $data .= '<div id="columnChartForID8" style="width: 100%;"></div>';
	                                        $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_8.png"></div>';
	                                    }
	                                    elseif ($quiz->ID == 9) {
	                                        $data .= '<div id="columnChartForID9" style="width: 100%;"></div>';
	                                        $data .= '<div style="position:relative; left: 50px; width: 90%;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_9.png"></div>';
	                                    }
	                                    else
	                                    {
	                                        $data .= '<div id="columnChartForID10" style="width: 100%;"></div>';
	                                        $data .= '<div style="position:relative; margin-left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_10.png"></div>';
	                                    }
	                                } else {
	                                    $total_pointss = 0;
	                                    $data .= '<div class="bar" style="--bar-value:' . $total_pointss . '%" data-name="' . $cats->name . ' (' . $total_pointss . '%)" title="' . $cats->name . ' ' . $total_pointss . '%">';
	                                    $data .= '</div>';
	                                }
									$data .= '</div>
									</div>';
									// personality
								    if ($quiz->ID == 6) {
								        $data .= '<p><h4><b>Objective</b></h4></p>
								    	<p>Objective persons enjoy working with tools, equipment, instruments and machinery. They like to repair and/or fabricate things from various materials according to specifications and using established techniques. Objective persons are interested in finding out how things operate and how they are built.
								    	</p>
								    	<p><h4><b>Social</b></h4></p>
								    	<p>Individuals who are social and are dedicated leaders, humanistic, responsible and supportive. They use feelings, words and ideas to work with people rather than engaging in physical activities to get  things done. They enjoy closeness, sharing, groups, unstructured activity and being in charge. Social people like dealing with other individuals. They enjoy caring for and assisting others in identifying their needs and solving their concerns. Social people like working and co-operating with others. They prefer to be involved in work that requires interpersonal contact.
								    	</p>
								    	<p><h4><b>Innovative</b></h4></p>
								    	<p>Innovative people like to explore things in depth and arrive at solutions to problems by experimenting. They are interested in initiating and creating different ways to solve questions and present information. They enjoy scientific subjects. Innovative people prefer to be challenged with new and unexpected experiences. They adjust to change easily.
								    	</p>
								    	<p><h4><b>Methodical</b></h4></p>
								    	<p>Methodical people like to have clear rules and organized methods to guide their activities. They prefer working under the direction or supervision of others according to given instructions, or to be guided by established policies and procedures. Methodical people like to work on one thing until it is completed. They enjoy following a set routine and prefer work that is free from the unexpected.
								    	</p>
								    	<p><h4><b>Directive</b></h4></p>
								    	<p>Directive people like to take charge and control situations. They like to take responsibility for projects that require planning, decision making and coordinating the work of others. They are able to give direction and instructions easily. They enjoy organizing their own activities. They see themselves as independent and self-directing.
								    	</p>';
								    }
								    // ability
								    if ($quiz->ID == 7) {
								        $data .= '<p>
											<h4><b>Form Perception</b></h4>
										</p>
										<p>
											Ability to perceive pertinent detail in objects and in pictorial and graphic material; to make visual comparisons and discriminations and to see slight differences in shapes and shadings of figures and widths and lengths of lines.
										</p>
										<p>
											<h4><b>Clerical Perception</b></h4>
										</p>
										<p>
											Ability to perceive pertinent detail in verbal or tabular material; to observe differences in copy, to proofread words and numbers, and to avoid perceptual errors in arithmetical computation.
										</p>
										<p>
											<h4><b>Spatial Perception</b></h4>
										</p>
										<p>
											Ability to think visually about geometric forms and comprehend the two-dimensional representation of three dimensional objects; to recognize the relationships resulting from the movement of objects in space. It may be used in tasks such as blueprint reading and in solving geometry problems. Frequently described as the ability to "visualize" objects of two or three dimensions.
										</p>
										<p>
											<h4><b>Finger Dexterity</b></h4>
										</p>
										<p>
											Ability to demonstrate tasks that involve coordination of small muscles, in movements usually involving the synchronization of hands and fingers with the eyes.
										</p>
										<p>
											<h4><b>Manual Dexterity</b></h4>
										</p>
										<p>
											Ability to demonstrate tasks that use hands in a skillful, coordinated way with muscles controlled by nervous system, to grasp and manipulate objects and demonstrate small, precise movements.
										</p>
										<p>
											<h4><b>Verbal Ability</b></h4>
										</p>
										<p>
											Ability to understand the meaning of words and the ideas associated with them, and to use them effectively; to comprehend language, to understand relationships between words and to understand the meaning of whole sentences and paragraphs; to present information or ideas clearly. 
										</p>
										<p>
											<h4><b>Numerical Ability</b></h4>
										</p>
										<p>
											Ability to execute tasks relating to the handling of numbers. It is one of several cognitive abilities that a person can have a strong preference for, or capacity, to perform. A person with numerical aptitude can perform mathematical computations quickly.
										</p>
										<p>
											<h4><b>Motor Co-ordination</b></h4>
										</p>
										<p>
											Ability to co-ordinate eyes, hands and fingers rapidly and accurately when required to respond with precise movements.
										</p>
										<p>
											<h4><b>General Learning Ability</b></h4>
										</p>
										<p>
											It is an ability, commonly referred to as the "G" score, defined as the ability to "catch on" or understand instructions and underlying principles with an ability to reason out and make judgements	.
										</p>';
								    }
								    // interest
								    if ($quiz->ID == 8) {
								        $data .= '<div class="">
											<table style="text-align: justify; padding:5px;" border="1" colspan="">
												<thead>
													<tr>
														<th>COURSE CATEGORY</th>
														<th>DESCRIPTION</th>
														<th>HIGH SCHOOL PREP SUGGESTION (SUBJECTS/ COURSES)</th>
														<th>RELEVANT PROFESSIONS</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td style="padding:10px;"><b>Art</b></td>
														<td style="padding:10px;">Art has a wide variety of career categories. You might want to consider what category of art you are interested in and then research careers based on that. For example, the performing arts includes any physical performing art such as theater (like acting), music, or dance. Literature is also considered an art as this is a way to express one-self in a creative way, such as screenwriting, poetry, or a work of fiction. Then, there is the visual arts. The visual arts include painting, drawing, sculpting, photography, fashion design, and even film making to name a few. To make the arts more diverse, there is also the technology component. If you scored high in technology and art, you might enjoy a career in multimedia.</td>
														<td style="padding:10px;">Courses in Art, Theater, Music, and Computers can help you prepare for college courses.</td>
														<td style="padding:10px;">Theatre Actor, Architect, Archivist, Historic Conservationist, Artist, Choreographer, Cosmetologist, Curator, Dancer, Event Planner, Fashion Designer, Film Editor, Graphic Designer, Interior Designer, Multimedia Artist, Music Director, Musician, Photographer, Producer Or Director, Set Designer, Singer, Video Game Designer, Fine Arts Specialist</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Business</b></td>
														<td style="padding:10px;">The competitive field looks for more in their business hires; more know-how, more abilities, and more potential. The baseline skills for a businessman / businesswomen to be successful include, communication skills, organization, effective planning and execution, supervisory abilities and management, problem solving and the ability to build strong relationships. If you relate to most or all of these characteristics then  any of the specialized fields of business management are best suited for you.</td>
														<td style="padding:10px;">Courses in Math/Commercial Math, Economics, English along with Computer Course would be helpful. Consider working on your public speaking skill as well. Consider joining a school club and taking a leadership role.
														</td>
														<td style="padding:10px;">Entrepreneur, Executive, Fundraiser, Consultant, Project Management Professional, Labor Relations Specialist, Logistician, Market Research Analyst, Property Manager, Public Relations, Realtor, Sales, Statistician, Supply Chain Manager, Wholesale Retail Buyers, Advertising Sales Agent, Compensation Analyst, Economist.</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Communications</b></td>
														<td style="padding:10px;">Communication is virtually impossible to ignore; it is a way that people share or exchange important information or ideas in addition to providing entertainment to consumers. This career field encompasses face-to-face communications as well as verbal, written, and even broadcasted media. There are career opportunities that are behind the scenes and others where you will be in the public eye.
														</td>
														<td style="padding:10px;">Computer courses and public speaking may be helpful to prepare you for college. You may also benefit from art and English courses. There are various ways to communicate, so practice how to deliver various messages in a visual, written, and oral way. Learning sign language and another language can also be helpful!</td>
														<td style="padding:10px;">Marketing And Advertising, Journalist, Sales, Public Relation Specialist, Fundraiser, Technical Writer, Librarian, Reporter, And Interpreter/translator, Broadcast / Tv Professional, Editor</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Culinary</b></td>
														<td style="padding:10px;">The hospitality industry entails a number of professionals working in different settings. Executive Chefs, Sous Chefs, Banquet Chefs, Pastry Chefs, Food Production Managers, Institutional Food Service Providers, Dietary Managers, etc are some of the possible opportunities that are open to you after a degree in culinary arts.  The intent of your education will be to amplify your innate abilities of senses; sight, sound, smell, taste, and touch that will help expand your repertoire, enhance your in classical culinary technique and kitchen skills
														</td>
														<td style="padding:10px;">Chemistry, business, math, and art classes are all helpful to prepare you for culinary school.</td>
														<td style="padding:10px;">Baker, Chef, Pastry Chef, Food Scientist, And Food Service Manager ,Hospitality
														</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Education</b></td>
														<td style="padding:10px;">There are a lot of different roles in education, requiring different skills. These include communication that might be verbal, written, or via any other route from practical demonstrations to artistic interpretation, patience to tackle with challenging tasks, being creative; finding novel and enjoyable ways to achieve your goals and being dedicated and organized in your approach. </td>
														<td style="padding:10px;">Concentrating on core academic classes are beneficial if you are considering teaching younger students. If you are interested in teaching a specific subject area , it is beneficial to take as many elective courses in that field as possible. Also consider learning a second language and sign language. This skill may be extremely useful in the setting you wish to work.</td>
														<td style="padding:10px;">Preschool Teacher, Elementary School Teacher, Middle School Teacher, High School Teacher, Special Needs Teacher, GED Teacher, Postsecondary Teacher, College Professor, Guidance Counselor, Librarian, Tutor, Teachers Aid, Instructional Designer, Career Advisor, Training Developer, Training Manager, Instructional Designer, Distance Learning Coordinator, and Corporate Trainer.</td>
													</tr>
													<tr>
														<td style="padding:10px;">
															<b>Engineering</b>
														</td>
														<td style="padding:10px;"><p>Engineering is a blend of science, technology, and math so engineers can create or design innovative machines, structures, and technology. If you enjoy math, science, and technology, and are curious about how things work, a career in engineering may be a good fit!</p>
														<p>There are many types of engineers and the career field varies by their specialty. For example, you have aerospace, agriculture, biomedical, chemical, civil, computer, electrical, environmental, geological, health and safety, locomotive, marine, material, mechanical, nuclear, petroleum, and sales engineers, and this doesnt even cover it all!</p>
														<p>If you scored over 60% on this career test in engineering, you likely enjoy solving problems. Friends and family may describe you as analytical and curious. Do you find yourself wondering how a gadget works, how a plane flies, how to fix a car, or construct a building? If so, you may consider researching a career in engineering.</p>
														<p>Engineers solve real-world problems. They design product improvements, develop new prototypes, test new materials, and can even save lives by improving safety. Engineers are vital in all industries, so there are various types of engineers. Every engineer has a specialty, from aerospace, mechanics, electrical, materials, environmental, agricultural, biomedical, and many more. Do your research, and youll discover the engineering career thats right for you.</p>
														<p>Successful engineers learn to pay close attention to detail, be creative problem solvers, document their work, and communicate effectively. They tend to work on cross-functional teams, so collaboration and teamwork is vital. Engineers use advanced math, science, and technology daily.</p></td>
														<td style="padding:10px;">Math, science, and technology are challenging courses. Keep up the effort. Once you grasp the fundamentals, you may find them interesting. So,  take up courses that include trigonometry, calculus, and physics before graduation. Once in begin your course to become an engineer, you want to gain hands-on experience before you graduate. This includes participating in research programs at the university level, look for internships in your relevent field of interest and gain an in-depth understanding of the subject.</td>
														<td style="padding:10px;">Big Data Engineer, Mining Safety Engineer, Biomedical Engineer, Civil Engineer, Chemical Engineer, Computer Engineer, Geological Engineer, Health & Safety Engineer, Construction Engineer, Marine Engineer, Naval Architect, Material Engineer, Mechanical Engineer, Petroleum Engineer, Nuclear Engineer, Robotics Engineer, Aerospace Engineer, Satellite Engineer, Electrical Engineer, Environmental Engineer, Agriculture Engineer, Aeronautical Engineer, Space Engineer, Automotive Engineer</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Finance</b></td>
														<td style="padding:10px;">Many people may only think of accountants or investors when thinking of finance careers. However, there are so many more options that you may be interested in. There are appraisers who basically estimate the value of a real estate and other high value items. Budget analysts will help businesses and individuals set a budget and get their finances on track. There are also careers where you get to buy and purchase products and even be in the negotiation and contract process</td>
														<td style="padding:10px;">Consider taking courses in business and math. Its also beneficial to take any computer courses your school may offer.
														</td>
														<td style="padding:10px;">Accountant, Actuary, Appraiser, Auditor, Brokerage Clerk, Budget Analyst, Buyer And Purchasing Agent, Claims Adjuster, Cost Estimator, Economist, Financial Advisor, Financial Analyst, Financial Examiner, Insurance Underwriter, Loan Officer, Real Estate Appraiser, And Revenue Agent.
														</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Healthcare</b></td>
														<td style="padding:10px;"><p>Medical professionals help the sick, empower people to make positive changes, educate communities to stay healthy, and research new vaccines and treatments. They may not be miracle workers, but they sure come close. They save lives.<p>
														<p>Healthcare workers must have a blend of stamina, determination, and critical thinking to complement their caring nature. However, one of the toughest decisions all healthcare professionals must make is choosing their medical specialty. There are hundreds of medical careers to choose from.</p></td>
														<td style="padding:10px;">Consider taking courses in Anatomy, Chemistry,
														Math, Physics, and Nutrition. Into these subjects so you can be competitive when applying for acceptance into college Medical Programs.</td>
														<td style="padding:10px;">If you want to start your career as soon as possible, research certification programs that require a few months of training, such as Nursing Assistant, Phlebotomy Technician, and Medical Coder and Biller. Other programs take two years to complete, such as imaging Technicians, vet Technicians, Surgical Technicians, Registered Nurses, Physical Therapy Assistants, and Dental Hygienists. If you can commit four or more years to your education, you can unlock significantly more career options. Doctors, Nursing, Clinical Technician, Researcher, Dietician, Therapist, Medical Science, Manager, Nuclear Medicine, Nutritionist, Radiologist, Dentist,</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Legal</b></td>
														<td style="padding:10px;">Legal careers are crucial to ensure fairness in a judicial system. There are a wide variety of legal areas one can focus on as well. Examples include criminal law, constitutional law, property law, civil rights law, family or juvenile justice law, corporate law, copyright and trademark law, international law, environmental law, arbitration, and even sentencing.</td>
														<td style="padding:10px;">Courses in Public Speaking, Sociology, Psychology, American Government, Criminology, Ethics, or International Studies would be helpful for you to prepare for college.</td>
														<td style="padding:10px;">Judicial Clerk, Barrister, Lawyer, Mediator Or Arbitrator, Paralegal, Legal Researcher, Judge, Legislator, Politician, Litigator, Solicitor, Advocate</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>
															Multimedia
														</b></td>
														<td style="padding:10px;">Careers in multimedia are unique in a way that they require you to be tech savvy. It requires you to have adequate written and verbal communication along with a natural acumen for creativity. Multimedia artists learn multiple transferable skill sets to perform their tasks. </td>
														<td style="padding:10px;">Computer Course and Art Course</td>
														<td style="padding:10px;">Graphic Design, Multimedia Artist, Video Game Designer, Website Developer.</td>
													</tr>
													<tr>
														<td style="padding:10px;">
															<b>Public Service</b>
														</td>
														<td style="padding:10px;">Public service careers are crucial for the protection and assistance members of our society. Careers may include fighting fires, attending to emergencies, investigating fraudulent claims, providing security, and even planning for natural disasters.</td>
														<td style="padding:10px;">Courses in first aid, CPR, sociology, psychology, and even learning a second language can be helpful to prepare you for college. Some of these careers require you to be in good physical shape as well, so playing for your school sports teams or taking up an activity outside of school that keeps you fit is an addition.</td>
														<td style="padding:10px;">Government Officer, Politics, Legislator, Forensic Sciences Engineer, Police Services, Investigation Officer, Security Services, transportation Service, Fire Services,</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>Science</b></td>
														<td style="padding:10px;">The field of Science is vast, which opens a multitude of career opportunities. Some of these include planning and conducting experiments, recording and analyzing data, carrying out fieldwork, writing research papers, reports, reviews and summaries, etc. If you are a dedicated person with strong scientific and numerical skills, teamwork and interpersonal skills with meticulous attention to detail and accuracy, then the vast array with a degree in any of the Science subjects would be a great fit.</td>
														<td style="padding:10px;">Working hard to learn concepts in your math and science courses is important. Taking any additional science course as an elective (if possible) is also helpful. Science and math go hand-in-hand, so studying both will help prepare you for college level preparation.</td>
														<td style="padding:10px;">Agriculture, Architect, Astronomer, Biochemist, Biofuels, Biologist, Biophysicist, Cartographer, Chemist, Conservation Scientist, Engineer, Food Scientist, Genetic Counselor, Geographer, Geologist, Herpetologist, Hydrologist, Marine Biologist, Microbiologist, Oceanographer, Physicist, Seismologist, Zookeeper, Zoologist.</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>
															Social Science
														</b></td>
														<td style="padding:10px;">Social science is a broad category that involves the social interactions and relationships among individuals and society. There are a variety of career opportunities that differ. These careers include helping those cope through life events or mental health issues to careers that contribute to research. You can also find careers that analyze world events and cultures. If you are the type of person that likes to observe human interaction, wonder why humans behave the way we do, and learn about other cultures, a career in social science may be a great fit!</td>
														<td style="padding:10px;">Economics, Sociology, Psychology, World History, Political Science, and Ethics could form a good base for college. These courses help you learn about human behavior while also teaching you about other cultures.</td>
														<td style="padding:10px;">Anthropologist, Archeologist, Archivist, Counselor, Music Therapist, Organizational Psychologist, Human Resource,  Psychologist, Political Scientist, Sociologist, and Therapist</td>
													</tr>
													<tr>
														<td style="padding:10px;"><b>
															Technology
														</b></td>
														<td style="padding:10px;">There are technology careers in healthcare, art, and even business. For example, if you scored high in technology and like art, you may find yourself leaning to a degree in multimedia arts and visual effects. Designing for mobile technology is also in demand due to companies competing for customers online.</td>
														<td style="padding:10px;">Taking up any computer courses that involves writing codes, learning computing languages, etc along with having a strong foundation in math would be beneficial. You may want to delve deeper into science of technology that is used to create apps, develop websites, or graphic design. </td>
														<td style="padding:10px;">Computer Engineer, Computer Installation Tech, Computer Programmer, Computer Research Analyst, Computer Support Specialist, Database Administrator, It Project Manager, Network Administrator, Network Architect, Security Analyst, Software Developer, And Website Developer.</td>
													</tr>
												</tbody>
											</table>
											<div class="">
													<span>
														<h4>STEM Venn Diagram
														</h4>
													</span>
													<p>STEM stands for Science, Technology, Engineering, and Math. Many STEM careers share aspects of other STEM careers. For instance, many math careers use technology, science relies on math, and engineering careers often use science, technology, and math. If you scored high in Science, Technology, Engineering, or Math, you can use the following STEM Career Venn Diagram to explore careers you may be interested in. You can research careers from the Careers page in the navigation. Many careers contain helpful career videos you can watch as well.</p>
													<p>
														<img src="' . site_url() . '/wp-content/plugins/3edge-reports/image1.png" alt="STEM Venn Diagram">
													</p>
												</div>
										</div>';
								    }
								    // multiple intellegence
								    if ($quiz->ID == 9) {
								    }
								    //learning
								    if ($quiz->ID == 10) {
								    }
	                            }
	                                        $data .= '</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			        </div>';
	    $cat_6_array = array($cat_6_array_2[0], $cat_6_array_3[0], $cat_6_array_8[0], $cat_6_array_9[0], $cat_6_array_12[0]);
	    $cat_7_array = array($cat_7_array_13[0], $cat_7_array_14[0], $cat_7_array_15[0], $cat_7_array_16[0], $cat_7_array_17[0], $cat_7_array_18[0], $cat_7_array_19[0], $cat_7_array_20[0], $cat_7_array_21[0]);
	    $cat_8_array = array($cat_8_array_34[0], $cat_8_array_35[0], $cat_8_array_36[0], $cat_8_array_37[0], $cat_8_array_38[0], $cat_8_array_39[0], $cat_8_array_40[0], $cat_8_array_41[0], $cat_8_array_42[0], $cat_8_array_43[0], $cat_8_array_44[0], $cat_8_array_45[0], $cat_8_array_46[0], $cat_8_array_47[0]);
	    $cat_9_array = array($cat_9_array_22[0], $cat_9_array_23[0], $cat_9_array_24[0], $cat_9_array_25[0], $cat_9_array_26[0], $cat_9_array_27[0], $cat_9_array_28[0], $cat_9_array_29[0], $cat_9_array_30[0]);
	    $cat_10_array = array($cat_10_array_31[0], $cat_10_array_32[0], $cat_10_array_33[0]);
	    $cat_6_max = max($cat_6_array);
	    $cat_7_max = max($cat_7_array);
	    $cat_8_max = max($cat_8_array);
	    $cat_9_max = max($cat_9_array);
	    $cat_10_max = max($cat_10_array);
	    $data . '</div>';
	    $data .= '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>';
	    $exams_11 = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where exam_id = 11");
		$my_exam_11 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_master where ID = 11");
		$get = match_answers($exams_11, $my_exam_11, $user_id);
		$data .= '<span>
	            <h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Logical Reasoning Responses
	            </h4>
	            </span>';
	    $data .= '<div class="student_response" style="width: 100%; display: flex; flex-wrap: wrap; background: #f3e8e8;">';
		foreach ($get as $key => $value) 
		{
			$data .= $value->q_answers[0]->snapshot;
		}
		$data .= '</div>';
	    $data .= '<span>
	            <h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Overall Analysis
	            </h4>
	            </span>';
	    $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-overall.png"></div>';
	    $data .= '</div>
		</div>';
	}
	else
	{
		$data .= '<div class="">
					<p>Please Complete all your quizzes to view your result.</p>
				</div>';
	}
	return $data;
}

function student_report_pdf()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	$data = '<div class="not_given_test">
		<div class="" id="view_result">';
			$exams_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6 ");
			$exams_7 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 7 ");
			$exams_8 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 8 ");
			$exams_9 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 9 ");
			$exams_10 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 10 ");
			$exams_11 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 11 ");
			if(empty($exams_6) && empty($exams_7) && empty($exams_8) && empty($exams_9) && empty($exams_10) && empty($exams_11))
			{ 
				$data .= '<div class="">
					<p>Please Complete all your quizzes to view your result.</p>
				</div>';
			}
			else
			{
				$data .= '<div class="">';
					$quizzes = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_master");
					$cat_6_max = '';
					$cat_7_max = '';
					$cat_8_max = '';
					$cat_9_max = '';
					$cat_10_max = '';

					$cat_6_array_2 = array();
					$cat_6_array_3 = array();
					$cat_6_array_8 = array();
					$cat_6_array_9 = array();
					$cat_6_array_12 = array();

					$cat_7_array_13 = array();
					$cat_7_array_14 = array();
					$cat_7_array_15 = array();
					$cat_7_array_16 = array();
					$cat_7_array_17 = array();
					$cat_7_array_18 = array();
					$cat_7_array_19 = array();
					$cat_7_array_20 = array();
					$cat_7_array_21 = array();

					$cat_8_array_34 = array();
					$cat_8_array_35 = array();
					$cat_8_array_36 = array();
					$cat_8_array_37 = array();
					$cat_8_array_38 = array();
					$cat_8_array_39 = array();
					$cat_8_array_40 = array();
					$cat_8_array_41 = array();
					$cat_8_array_42 = array();
					$cat_8_array_43 = array();
					$cat_8_array_44 = array();
					$cat_8_array_45 = array();
					$cat_8_array_46 = array();
					$cat_8_array_47 = array();

					$cat_9_array_22 = array();
					$cat_9_array_23 = array();
					$cat_9_array_24 = array();
					$cat_9_array_25 = array();
					$cat_9_array_26 = array();
					$cat_9_array_27 = array();
					$cat_9_array_28 = array();
					$cat_9_array_29 = array();
					$cat_9_array_30 = array();

					$cat_10_array_31 = array();
					$cat_10_array_32 = array();
					$cat_10_array_33 = array();
					$data .= '<div class="vc_row wpb_row vc_row-fluid bp-background-size-auto">
						<div class="wpb_column vc_column_container vc_col-sm-12 bp-background-size-auto">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_empty_space" style="height: 32px">
										<span class="vc_empty_space_inner">
										</span>
									</div>
									<div class="bp-element bp-element-pricing-table layout-3 number-columns-3">     
										<div class="wrap-element">
											<div class="row">
											<div style="text-align:center;">
												<img src="'.site_url().'/wp-content/plugins/3edge-reports/proed-logo.png">
												</div>
												<h3 style="background-color: #85b920; padding: 0px 15px; margin-top: 15px; color:#ffffff;">CAREER POSSIBILITES ASSESSMENT– STUDENT REPORT
												</h3>';
												$wp_pro_contact_number = get_user_meta( $user->ID, 'wp_pro_contact_number', true );
											   	$wp_pro_school = get_user_meta( $user->ID, 'wp_pro_school', true ); 
											   	$wp_pro_curriculam = get_user_meta( $user->ID, 'wp_pro_curriculam', true ); 
											   	$wp_pro_high_school_graduation_year = get_user_meta( $user->ID, 'wp_pro_high_school_graduation_year', true ); 
											   	$wp_pro_nationality = get_user_meta( $user->ID, 'wp_pro_nationality', true );
											   	if(!empty($wp_pro_contact_number) || !empty($wp_pro_school) || !empty($wp_pro_curriculam) || !empty($wp_pro_high_school_graduation_year) || !empty($wp_pro_nationality))
											   	{
											   		$createDate = new DateTime($exams_11->end_time);
													$strip = $createDate->format('Y-m-d');
													$data .='<table><tbody><tr>
														<td><b>Student Name : </b></td>
														<td>'.$user->user_login.'</td>
														</tr><tr>
														<td><b>Contact Number : </b></td>
														<td>'.$wp_pro_contact_number.'</td>
														</tr><tr>
														<td><b>Email : </b></td>
														<td>'.$user->user_email.'</td>
														</tr><tr>
														<td><b>Test Date : </b></td>
														<td>'.$strip.'</td>
														</tr><tr>
														<td><b>High School Graduation Year : </b></td>
														<td>'.$wp_pro_high_school_graduation_year.'</td>
														</tr><tr>
														<td><b>School : </b></td>
														<td>'.$wp_pro_school.'</td>
														</tr><tr>
														<td><b>Curriculam : </b></td>
														<td>'.$wp_pro_curriculam.'</td>
														</tr><tr>
														<td><b>Nationality : </b></td>
														<td>'.$wp_pro_nationality.'</td>
														</tr></tbody></table>';
												}
												foreach($quizzes as $key => $quiz) 
												{
													$question_cat = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 0");
													foreach($question_cat as $key => $categories) 
													{
														if($quiz->name == 'Personality' && $categories->name == 'Personality Type')
														{
															$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 1");
														}
														if($quiz->name == 'Ability' && $categories->name == 'Ability Type')
														{
															$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 4");
														}
														if($quiz->name == 'Interests' && $categories->name == 'Interest Type')
														{
															$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 5");
														}
														if($quiz->name == 'Multiple Intelligence' && $categories->name == 'Multiple Intelligences Type')
														{
															$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 6");
														}
														if($quiz->name == 'Learning Style' && $categories->name == 'Learning Style Type')
														{
															$child_categories = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_qcats where parent_id = 7");
														}
													}
													$exam_taken = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = ".$quiz->ID."");
													$questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM ".$prefix."watupro_student_answers as answer inner join ".$prefix."watupro_question as question on answer.question_id = question.ID where answer.user_id = ".$user_id." and answer.exam_id = ".$exam_taken->exam_id." and answer.taking_id = ".$exam_taken->ID." group by question.cat_id order by cat_id ASC ");
													if($quiz->ID == 6)
													{
														$data .= '<span>
															<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of '.$quiz->name.'
															</h4>
														</span>
														<p><b>Personality</b> is basically who you are. It is very basic to everyone; nobody can change his/her personality entirely though modifications can always be made with time. It plays a vital role in choosing the right career.
														</p>
														<span>
															<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Personality Data Set</p>
														</span>';
													}
													if($quiz->ID == 7)
													{
														$data .= '<p></p><p></p><p></p><p></p><p></p><p></p>';
														$data .= '<span>
															<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of '.$quiz->name.'
															</h4>
														</span>
														<p><b>Ability</b> refers to possessing more of a natural talent for a task, even if that talent is not yet fully developed. Whereas ability indicates something a person is able to do well, specifically ‘what you are good at’. One can develop an ability to do something without the natural aptitude for it, through hard work and adaptation
														</p>
														<span>
															<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Aptitude and Ability Data Set</p>
														</span>';
													}
													if($quiz->ID == 8)
													{
														$data .= '<span>
															<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of '.$quiz->name.'
															</h4>
														</span>
														<p><b>Career interest</b> This assessment analysis helps you to judge the most appropriate career for you based on ‘What are your interests’ among the various choices available.
														</p>
														<span>
															<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Interests Data Set</p>
														</span>';
													}
													if($quiz->ID == 9)
													{
														$data .= '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><span>
															<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of '.$quiz->name.'
															</h4>
														</span>
														<span>
															<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Multiple Intelligence Data Set</p>
														</span>';
													}
													if($quiz->ID == 10)
													{
														$data .= '<span>
															<h4 style="background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of '.$quiz->name.'
															</h4>
														</span>
														<span>
															<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Learning Style Data Set</p>
														</span>';
													}
													$data .= '
													<div class="">
					  									<div class="">';
															foreach($child_categories as $c_key => $cats) 
															{
																$cat_id = '';
																$flag = '';
				foreach($questions_answered as $a_key => $answered) 
				{
					$cat_id = $answered->cat_id;
					if($cats->ID == $cat_id)
					{
						$flag = 'true';
						if($quiz->ID == 6)
						{
							if($cats->ID == 2)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 2");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_6_array_2, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 3)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 3");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_6_array_3, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 8)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 8");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_6_array_8, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 9)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 9");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_6_array_9, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 12)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 12");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_6_array_12, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
						}
						if($quiz->ID == 7)
						{
							if($cats->ID == 13)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 13");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_13, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 14)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 14");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_14, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 15)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 15");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_15, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 16)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 16");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_16, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 17)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 17");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_17, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 18)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 18");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_18, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 19)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 19");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_19, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 20)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 20");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_20, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 21)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 21");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_7_array_21, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}			
						}
						if($quiz->ID == 8)
						{
							if($cats->ID == 34)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 34");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_34, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 35)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 35");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_35, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 36)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 36");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_36, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 37)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 37");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_37, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 38)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 38");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_38, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 39)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 39");
								
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_39, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 40)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 40");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_40, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 41)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 41");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_41, array($total_points, $cats->ID));
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 42)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 42");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_42, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 43)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 43");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_43, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								};
							}
							if($cats->ID == 44)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 44");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_44, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 45)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 45");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_45, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 46)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 46");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_46, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 47)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 47");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 4;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_8_array_47, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
						}
						if($quiz->ID == 9)
						{
							if($cats->ID == 22)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 22");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_22, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 23)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 23");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_23, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 24)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 24");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_24, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 25)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 25");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_25, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 26)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 26");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_26, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 27)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 27");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_27, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 28)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 28");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_28, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 29)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 29");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_29, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 30)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 30");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 5;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_9_array_30, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
						}
						if($quiz->ID == 10)
						{
							if($cats->ID == 31)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 31");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 3;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_10_array_31, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 32)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 32");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 3;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_10_array_32, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
							if($cats->ID == 33)
							{
								$questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where cat_id = 33");
								$count_cat_questions = count($questions);
								$total = $count_cat_questions * 3;
								if(!empty($total) && $total != 0)
								{
									$total_points = round(($answered->total_points / $total) * 100) ;
									array_push($cat_10_array_33, array($total_points, $cats->ID));
									continue;
								}
								else
								{
									$total_points = '';
								}
							}
						}
						break;
					}
				}
				
																		}
						if ($flag == 'true') 
					    {
					        if ($quiz->ID == 6) {
					            $data .= '<div id="columnChartForID6" style="width: 100%;"></div>';
					            $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_6.png"></div>';
					        }
					        elseif ($quiz->ID == 7) {
					            $data .= '<div id="columnChartForID7" style="width: 100%;"></div>';
					            $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_7.png"></div>';
					        }
					        elseif ($quiz->ID == 8) {
					            $data .= '<div id="columnChartForID8" style="width: 100%;"></div>';
					            $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_8.png"></div>';
					        }
					        elseif ($quiz->ID == 9) {
					            $data .= '<div id="columnChartForID9" style="width: 100%;"></div>';
					            $data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_9.png"></div>';
					        }
					        else
					        {
					            $data .= '<div id="columnChartForID10" style="width: 100%;"></div>';
					            $data .= '<div style="position:relative; margin-left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-img_10.png"></div>';
					        }
					    } 
					    else 
					    {
					        $total_pointss = 0;
					        $data .= '<div class="bar" style="--bar-value:' . $total_pointss . '%" data-name="' . $cats->name . ' (' . $total_pointss . '%)" title="' . $cats->name . ' ' . $total_pointss . '%">';
					        $data .= '</div>';
					    }
														$data .= '</div>
													</div>';
												}
											$data .= '</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			        </div>';
					$cat_6_array = array($cat_6_array_2[0], $cat_6_array_3[0], $cat_6_array_8[0], $cat_6_array_9[0], $cat_6_array_12[0]);
					$cat_7_array = array($cat_7_array_13[0], $cat_7_array_14[0], $cat_7_array_15[0], $cat_7_array_16[0], $cat_7_array_17[0], $cat_7_array_18[0], $cat_7_array_19[0], $cat_7_array_20[0], $cat_7_array_21[0]);
					$cat_8_array = array($cat_8_array_34[0], $cat_8_array_35[0], $cat_8_array_36[0], $cat_8_array_37[0], $cat_8_array_38[0], $cat_8_array_39[0], $cat_8_array_40[0], $cat_8_array_41[0], $cat_8_array_42[0], $cat_8_array_43[0], $cat_8_array_44[0], $cat_8_array_45[0], $cat_8_array_46[0], $cat_8_array_47[0]);
					$cat_9_array = array($cat_9_array_22[0], $cat_9_array_23[0], $cat_9_array_24[0], $cat_9_array_25[0], $cat_9_array_26[0], $cat_9_array_27[0], $cat_9_array_28[0], $cat_9_array_29[0], $cat_9_array_30[0]);
					$cat_10_array = array($cat_10_array_31[0], $cat_10_array_32[0], $cat_10_array_33[0]);
					$cat_6_max = max($cat_6_array);
					$cat_7_max = max($cat_7_array);
					$cat_8_max = max($cat_8_array);
					$cat_9_max = max($cat_9_array);
					$cat_10_max = max($cat_10_array);
					rsort($cat_6_array);
					rsort($cat_7_array);
					rsort($cat_8_array);
					rsort($cat_9_array);
					rsort($cat_10_array);
					$cat_6_top3 = array_slice($cat_6_array, 0, 1);
					$cat_7_top3 = array_slice($cat_7_array, 0, 1);
					$cat_8_top3 = array_slice($cat_8_array, 0, 1);
					$cat_9_top3 = array_slice($cat_9_array, 0, 1);
					$cat_10_top3 = array_slice($cat_10_array, 0, 1);
				$data .'</div>';
				$exam_11_overall_questions = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_question where exam_id = 11 ");
				$count_exam_11_questions = count($exam_11_overall_questions);
				$correct_exam_11_answers = $wpdb->get_results("SELECT * FROM ".$prefix."watupro_student_answers where exam_id = 11 and user_id = ".$user_id." and points = 1");
				$correct_answers = count($correct_exam_11_answers);
				$data .= '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>';
				$data .= '<span>
	            <h4 style="margin-top: 20px; background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Logical Reasoning
	            </h4>
	            </span>';
				$data .= '<div style="text-align:center;"><b>'.$user->user_login.' </b>You have scored <b>'.$correct_answers.'/'.$count_exam_11_questions.'</b> in the <b>Logical Reasoning</b></div>';
			}
			$data .= '<span>
            <h4 style="margin-top: 20px; background-color:#85b920; padding: 5px; border-radius: 5px; color: #ffffff;">Overall Analysis
            </h4>
            </span>';
			$data .= '<div style="position:relative; left: 50px; width: 90%; margin: 0 auto;"><img src="'.site_url().'/wp-content/uploads/user_reports/'.$user_id.'-overall.png"></div>';
		$data .= '</div>
	</div>';
	return $data;
}

//add_action("wp_footer", 'send_councellor_and_user_report_by_mail', 20);
function send_councellor_and_user_report_by_mail()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	$name = $user->data->display_name;
	$student = $name.'.pdf';
	$counsellor = $name.'-councellor.pdf';
	$exams_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6 ");
	$exams_7 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 7 ");
	$exams_8 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 8 ");
	$exams_9 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 9 ");
	$exams_10 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 10 ");
	$exams_11 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 11 ");
	if(!empty($exams_6) && !empty($exams_7) && !empty($exams_8) && !empty($exams_9) && !empty($exams_10) && !empty($exams_11))
	{ 
		$user_id = get_current_user_id();
		$user = wp_get_current_user($user_id);
		$name = $user->data->display_name;
		$counsellor_report_pdf_download = counsellor_report_pdf();
		$student_report_pdf_download = student_report_pdf();
		ob_start();
		require('vendor/autoload.php');
		// Councellor pdf generation
		$councellor_mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 20,'margin_right' => 20,'margin_top' => 20,'margin_bottom' => 20,'margin_header' => 20,'margin_footer' => 20]);
		$councellor_mpdf->WriteHTML(trim(mb_convert_encoding($counsellor_report_pdf_download, 'UTF-8')));
		$filename_councellor = '/home/proeds3f/public_html/wp-content/uploads/user_reports/'.$name.'-councellor.pdf';
		$councellor_mpdf->Output($filename_councellor,'F');

		// student pdf generation
		$student_mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 20,'margin_right' => 20,'margin_top' => 20,'margin_bottom' => 20,'margin_header' => 20,'margin_footer' => 20]);
		$student_mpdf->WriteHTML(trim(mb_convert_encoding($student_report_pdf_download, 'UTF-8')));
		$filename_councellor = '/home/proeds3f/public_html/wp-content/uploads/user_reports/'.$name.'.pdf';
		$student_mpdf->Output($filename_councellor,'F');
		ob_end_flush();

		$student_report_pdf = ABSPATH.'wp-content/uploads/user_reports/'.$student;
		$counsellor_report_pdf = ABSPATH.'wp-content/uploads/user_reports/'.$counsellor;
		$check_if_mail_send = get_user_meta($user_id, 'is_report_send_to_user',true);
		if(empty($check_if_mail_send))
		{
			/*include_once(get_template_directory().'/vendor/PHPMailer/src/PHPMailer.php');
			include_once(get_template_directory().'/vendor/PHPMailer/src/SMTP.php');
			include_once(get_template_directory().'/vendor/PHPMailer/src/Exception.php');
			// To User 
			$mail = new PHPMailer\PHPMailer\PHPMailer(true);
			//$mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; 
			//$user->user_email
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; 
			$mail->SMTPAuth = true;
			$mail->Username = 'devtestid009@gmail.com';
			$mail->Password = 'twppdsexbrayrrsp';
			$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;
			$mail->setFrom('husnpreet@proedworld.com', 'Assessment Test');
			$mail->addAddress('sahil@3edgetechnovision.com', $user->user_login);
			$mail->addReplyTo('husnpreet@proedworld.com', 'Assessment Test');
			$mail->addAttachment($student_report_pdf);
			$mail->isHTML(true);
			$mail->Subject = 'Assessment Test Report of'. $user->display_name;
			$mail->Body = 'Please find your Assessment Test Report generated'. $user->display_name;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();*/
			
			//$to = $user->user_email;
			$to = 'assessment@proedworld.com';
			$from = 'assessment@proedworld.com'; 
            $fromName = 'Proedworld.com'; 
            $subject = 'Assessment Test Report of '. $user->display_name;  
            $file = $student_report_pdf; 
            $htmlContent = ' 
                <p>Please find your Assessment Test Report generated : '. $user->display_name .'</p> 
            '; 
            $headers = "From: $fromName"." <".$from.">"; 
            $semi_rand = md5(time());  
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
            if(!empty($file) > 0)
            { 
                if(is_file($file))
                { 
                    $message .= "--{$mime_boundary}\n"; 
                    $fp =    @fopen($file,"rb"); 
                    $data =  @fread($fp,filesize($file)); 
                    @fclose($fp); 
                    $data = chunk_split(base64_encode($data)); 
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
                    "Content-Description: ".basename($file)."\n" . 
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
                } 
            } 
            $message .= "--{$mime_boundary}--"; 
            $returnpath = "-f" . $from; 
            $mail = @mail($to, $subject, $message, $headers, $returnpath); 
			
			// To Admin
			//shefali.kumawat13@gmail.com
			/*$mail = new PHPMailer\PHPMailer\PHPMailer(true);
			//$mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; 
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; 
			$mail->SMTPAuth = true;
			$mail->Username = 'devtestid009@gmail.com';
			$mail->Password = 'twppdsexbrayrrsp';
			$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;
			$mail->setFrom('husnpreet@proedworld.com', 'Admin');
			$mail->addAddress('sahil@3edgetechnovision.com', 'Admin');
			//$mail->addAddress($user->user_email, $user->user_login);
			$mail->addReplyTo('husnpreet@proedworld.com', 'Assessment Test');
			$mail->addAttachment($counsellor_report_pdf);
			$mail->isHTML(true);
			$mail->Subject = 'Assessment Test Report of'. $user->display_name;
			$mail->Body = 'Please find the report generated of user'. $user->display_name;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();*/
			
			//$to = 'husnpreet@proedworld.com';
			$to = 'assessment@proedworld.com';
			$from = 'assessment@proedworld.com'; 
            $fromName = 'Proedworld.com'; 
            $subject = 'Assessment Test Report of '. $user->display_name;  
            $file = $counsellor_report_pdf; 
            $htmlContent = ' 
                <p>Please find the report generated of user : '. $user->display_name .'</p> 
            '; 
            $headers = "From: $fromName"." <".$from.">"; 
            $semi_rand = md5(time());  
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
            if(!empty($file) > 0)
            { 
                if(is_file($file))
                { 
                    $message .= "--{$mime_boundary}\n"; 
                    $fp =    @fopen($file,"rb"); 
                    $data =  @fread($fp,filesize($file)); 
                    @fclose($fp); 
                    $data = chunk_split(base64_encode($data)); 
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
                    "Content-Description: ".basename($file)."\n" . 
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
                } 
            } 
            $message .= "--{$mime_boundary}--"; 
            $returnpath = "-f" . $from; 
            $mail = @mail($to, $subject, $message, $headers, $returnpath); 
			update_user_meta($user_id, 'is_report_send_to_user', 1);
		}
	}
	else
	{
		
	}
}

function match_answers($all_question, $exam, $user_id) 
{
	global $wpdb, $ob;
	$ob = "sort_order,ID";
	if($exam->num_answers) $ob = "correct DESC, RAND()";
	if(!$exam->num_answers and ($exam->randomize_questions==1 or $exam->randomize_questions==3)) $ob = "RAND()";
	$qids = array(0);
	foreach($all_question as $question) $qids[]=$question->ID;
	$qids=implode(",",$qids);
	
	// answers array accordingly to randomization settings
	$all_answers = $wpdb->get_results("SELECT *	FROM wp_watupro_student_answers
	WHERE question_id IN ($qids) and user_id = ".$user_id."");

	// because of survey and true/false, always select ordered by ID
	$all_answers_by_order = $wpdb->get_results("SELECT * FROM wp_watupro_student_answers WHERE question_id IN ($qids) and user_id = ".$user_id."");
	
	foreach($all_question as $cnt=>$question) 
	{
		$all_question[$cnt]->q_answers = array();
		 
		// see whether we use the pre-ordered or randomized questions 	
		if($question->is_survey or $question->truefalse or $question->answer_type == 'matrix' 
			or $question->answer_type == 'nmatrix' or $question->dont_randomize_answers) 
		{
			$answers_for_use = $all_answers_by_order;						
		} 
		else 
		{
			$answers_for_use = $all_answers ;
		}

		foreach($answers_for_use as $answer) 
		{
			if($answer->question_id==$question->ID) 
			{
				$all_question[$cnt]->q_answers[]=$answer;
			}
		}	
		
		// shall we cut number of answers?
		if($exam->num_answers and !$question->is_survey and !$question->truefalse and !$question->dont_randomize_answers
			and $question->answer_type!='matrix' and $question->answer_type!='nmatrix'  and $question->answer_type!='textarea') 
		{
			$all_question[$cnt]->q_answers = array_slice($all_question[$cnt]->q_answers, 0, $exam->num_answers);
			
			// shuffle again to make sure the correct are not on top BUT ONLY if the question is not sticked to non-randomize
			shuffle($all_question[$cnt]->q_answers);
		}

		// let's trick WP engine over-optimizers here with one more shuffle
		if($ob == 'RAND()' and !$question->is_survey and !$question->truefalse and $question->answer_type!='matrix' 
			 and $question->answer_type!='nmatrix'  and $question->answer_type!='textarea' and !$question->dont_randomize_answers) 
			shuffle($all_question[$cnt]->q_answers);
	}
	return $all_question;
}
?>