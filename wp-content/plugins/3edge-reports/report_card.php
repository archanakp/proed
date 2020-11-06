<?php
add_shortcode('report_card', 'display_report_card');
function display_report_card()
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$user_id = get_current_user_id();
	$user = wp_get_current_user($user_id);
	// $counsellor_report_pdf_download = counsellor_report_pdf();
	// $student_report_pdf_download = student_report_pdf();
	// echo "<pre>";
	// print_r($counsellor_report_pdf_download);
	// echo "</pre>";
	// die;
	ob_start();
	?>
	<div class="wrap-element">
		<div class="row mt-4">
			<div class="col-sm-6 col-lg-4 mb-4">
				<p>You can now view and download the detail of your result.</p>
			</div>
			<div class="col-sm-6 col-lg-3 mb-4">
				<p class="view_result blue-btn">View Result</p>
			</div>
			<?php
			$user_id = get_current_user_id();
			$user = wp_get_current_user($user_id);
			$name = $user->data->display_name;
			?>
			<div class="col-sm-6 col-lg-3 mb-4">
				<p class="view_result blue-btn">
					<?php
						$url = site_url().'/wp-content/uploads/user_reports/'.$name.'.pdf';
					?>
					<a class="blue-btn" href="<?php echo $url;?>" download>Download</a>
				</p>
			</div>
		</div>
		<div class="" id="view_result">
			<?php
			// and exam_id = 9 and exam_id = 8 and exam_id = 7 and exam_id = 6 and exam_id = 10
			$exams_6 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 6 ");
			$exams_7 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 7 ");
			$exams_8 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 8 ");
			$exams_9 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 9 ");
			$exams_10 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 10 ");
			$exams_11 = $wpdb->get_row("SELECT * FROM ".$prefix."watupro_taken_exams where user_id = ".$user_id." and exam_id = 11 ");
			if(empty($exams_6) && empty($exams_7) && empty($exams_8) && empty($exams_9) && empty($exams_10) && empty($exams_11))
			{ 
				?>
				<div class="">
					<p>Please Complete all your quizzes to view your result.</p>
				</div>
				<?php
			}
			else
			{
				?>
				<div class="mb-4">
		            <div class="">
						<div class="pageHeading">
							<?php 
							$user_id = get_current_user_id();
							$user = wp_get_current_user();
							?>
							<h3>Dear <?php echo $user->data->user_login; ?>, </h3>
						</div>
						<hr>
						<div>
							<p><b>Thank you for submitting the Assessment Test!</b></p>
						</div>
						<div>
							<p>The analysis of your score suggests the following:</p>
						</div>
					</div>
				</div>
				<div class="">
					<?php
					echo do_shortcode('[databoxes]');
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
					?>
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
													?>
													<div class="col-sm-12 col-lg-12 mb-4">
														<?php 
														if($quiz->ID == 11)
														{
															
														}
														else
														{
															?>
															<span><h3 class="heading_back"><?php echo $quiz->name; ?></h3></span>
															<?php
														}
														?>
														<div class="">
															<div class="">
																<?php 
				foreach($child_categories as $c_key => $cats) 
				{

					$cat_id = '';
					$flag = '';
					$cats_idd[] = $cats->ID;
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
				if($flag == 'true')
				{
					if($quiz->ID == 6)
					{
						?>
						<!-- <div id="columnChartForID6" class="mt-4" style="height: 360px; width: 90%; margin: 0 auto;"></div> -->
						<div class="mt-4">
							<canvas id="barChart_6" style="height: 360px !important; width: 90% !important; margin: 0 auto;">
							</canvas>
						</div>			
						<?php
					}
					if($quiz->ID == 7)
					{
						?>
						<!-- <div id="columnChartForID7" class="mt-4" style="height: 360px; width: 90%; margin: 0 auto;"></div> -->
						<div class="mt-4">
							<canvas id="barChart_7" style="height: 360px !important; width: 90% !important; margin: 0 auto;">
							</canvas>
						</div>
						<?php
					}
					if($quiz->ID == 8)
					{
						?>
						<!-- <div id="columnChartForID8" class="mt-4" style="height: 360px; width: 90%; margin: 0 auto;"></div> -->
						<div class="mt-4">
							<canvas id="barChart_8" style="height: 360px !important; width: 90% !important; margin: 0 auto;">
							</canvas>
						</div>
						<?php
					}
					if($quiz->ID == 9)
					{
						?>
						<!-- <div id="columnChartForID9" class="mt-4" style="height: 360px; width: 90%;margin: 0 auto;"></div> -->
						<div class="mt-4">
							<canvas id="barChart_9" style="height: 360px !important; width: 90% !important; margin: 0 auto;">
							</canvas>
						</div>
						<?php
					}
					if($quiz->ID == 10)
					{
						?>
						<!-- <div id="columnChartForID10" class="mt-4" style="height: 360px; width: 90%; margin: 0 auto;"></div> -->
						<div class="mt-4">
							<canvas id="barChart_10" style="height: 360px !important; width: 90% !important; margin: 0 auto;">
							</canvas>
						</div>	
						<?php
					}
					$total_pointss = $total_points;
				}
				else
				{
					$total_pointss = 0;	
					?>
			      	<div class="bar" style="--bar-value:<?php echo $total_pointss.'%'; ?>;" data-name="<?php echo $cats->name;?>" title="<?php echo $cats->name;?> <?php echo $total_pointss.'%'; ?>">
			      	</div>
					<?php
				}
																?>
															</div>
														</div>
													</div>
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

					$chart_6 = columnChartForID6($cat_6_array_2[0][0], $cat_6_array_3[0][0], $cat_6_array_8[0][0], $cat_6_array_9[0][0], $cat_6_array_12[0][0]);
					$chart_7 = columnChartForID7($cat_7_array_13[0][0], $cat_7_array_14[0][0], $cat_7_array_15[0][0], $cat_7_array_16[0][0], $cat_7_array_17[0][0], $cat_7_array_18[0][0], $cat_7_array_19[0][0], $cat_7_array_20[0][0], $cat_7_array_21[0][0]);
					$chart_8 = columnChartForID8($cat_8_array_34[0][0], $cat_8_array_35[0][0], $cat_8_array_36[0][0], $cat_8_array_37[0][0], $cat_8_array_38[0][0], $cat_8_array_39[0][0], $cat_8_array_40[0][0], $cat_8_array_41[0][0], $cat_8_array_42[0][0], $cat_8_array_43[0][0], $cat_8_array_44[0][0], $cat_8_array_45[0][0], $cat_8_array_46[0][0], $cat_8_array_47[0][0]);
					$chart_9 = columnChartForID9($cat_9_array_22[0][0], $cat_9_array_23[0][0], $cat_9_array_24[0][0], $cat_9_array_25[0][0], $cat_9_array_26[0][0], $cat_9_array_27[0][0], $cat_9_array_28[0][0], $cat_9_array_29[0][0], $cat_9_array_30[0][0]);
					$chart_10 = columnChartForID10($cat_10_array_31[0][0], $cat_10_array_32[0][0], $cat_10_array_33[0][0]);
					?>
				</div>
				<?php
				echo create_a_pie_chart_for_overll($cat_6_top3, $cat_7_top3, $cat_8_top3, $cat_9_top3, $cat_10_top3);
				
				// $student = $name.'.pdf';
				// $counsellor = $name.'-councellor.pdf';
				echo send_councellor_and_user_report_by_mail();
				?>
				<div class="">
					<?php
						$url = site_url().'/wp-content/uploads/user_reports/'.$name.'.pdf';
					?>
					<a target="_blank" href="<?php echo $url;?>" class="blue-btn pull-right">View Full Report</a>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
?>