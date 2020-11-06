<?php
// the liker scale maker 
class WatuPROLikert {
	static function create() {
		global $wpdb, $user_ID;
		
		// default to 0
		$exam_id = 0;
		
		if(!empty($_POST['ok'])) {
			// create the quiz or just add more questions to it
			if(empty($_POST['quiz_id'])) {
				// prepare final screen
				$final_screen = __('Thank you for completing this survey. ', 'watuprolik');
	
				if(!empty($_POST['barchart'])) $final_screen .= '<br>[watuprolikert-barchart type="'.$_POST['barchart'].'"]';
															
				// create new quiz
				$wpdb->query($wpdb->prepare("INSERT INTO ".WATUPRO_EXAMS." SET
					name=%s, final_screen=%s, added_on=NOW(), is_active=1, single_page=1, mode='live',
					editor_id=%d", $_POST['title'], $final_screen, $user_ID));
				
				$exam_id = $wpdb->insert_id;
				$_POST['quiz_id'] = $exam_id; 	
			}
			else $exam_id = $_POST['quiz_id'];
			
			// construct scale (answers) for the questions on this page
			$choices = array();
			
			// calculate high end of the scale
			$high_end = (sizeof($_POST['choices']) - 1) * $_POST['step'] + $_POST['low_end'];			
			
			foreach($_POST['choices'] as $cnt=>$choice) {
				$points = $high_end - $cnt * $_POST['step'];
				$choices[] = array("answer"=>$choice, "points"=>$points);
			}
			
			// now add the questions and answers
			$is_required = empty($_POST['all_required']) ? 0 : 1;
			foreach($_POST['questions'] as $cnt=>$question) {
				if(empty($question)) continue;
				$wpdb->query($wpdb->prepare("INSERT INTO ".WATUPRO_QUESTIONS." SET
					exam_id=%d, question=%s, answer_type='radio', cat_id=%d, is_required=%d, is_survey=1",
					$exam_id, $question, $_POST['cat_ids'][$cnt], $is_required));
				$qid = $wpdb->insert_id;
				
				// now insert choices
				foreach($choices as $ct=>$choice) {
					$wpdb->query($wpdb->prepare("INSERT INTO ".WATUPRO_ANSWERS." SET
						question_id=%d, answer=%s, point=%f, sort_order=%d",
						$qid, $choice['answer'], $choice['points'], ($ct+1)));
				}	
			}
			
			// if done, redirect to the quiz setup page
			if(!empty($_POST['done'])) watupro_redirect("admin.php?page=watupro_exam&quiz=".$exam_id."&action=edit");
		}
		
		// select question categories
		$qcats = $wpdb->get_results("SELECT * FROM ".WATUPRO_QCATS." ORDER BY name");
		
		$scale = empty($_POST['scale']) ? 'agreement': $_POST['scale'];
		
		if(empty($_GET['id'])) include(WATUPROLIKERT_PATH."/views/main.html.php"); 
		else include(WATUPROLIKERT_PATH."/views/add-questions.html.php");
	}
}