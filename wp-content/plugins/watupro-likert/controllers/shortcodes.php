<?php
// add your custom shortcode handling here
// don't forget that shortcodes must be declared by calling add_shortcode() in wautprocustom_init()
class WatuPROLikertShortcodes {
	// outputs global chart of the results of the user
	static function barchart($atts) {
		global $wpdb;
		
		$chart_type = @$atts['type'];
				
		// get the answers by the taking ID (taking ID is POST global)
		$answers = $wpdb->get_results($wpdb->prepare("SELECT tA.answer as answer, tA.points as points, 
			tA.question_id as question_id, tQ.question as question, tC.name as category, tQ.cat_id as cat_id
			FROM ".WATUPRO_STUDENT_ANSWERS." tA JOIN ".WATUPRO_QUESTIONS." tQ ON tQ.ID = tA.question_id
			LEFT JOIN ".WATUPRO_QCATS." tC ON tC.ID = tQ.cat_id
			WHERE tA.taking_id=%d ORDER BY tA.ID", $_POST['watupro_current_taking_id']));
			
		if(!sizeof($answers)) return '';	
			
		$output = '';	
			
		switch($chart_type) {		
			
			case 'cats':
				// charts for each category. For each category we have to select the scale (choices) from the 1st question
				$cats = array();
				$cat_ids = array();
				$has_uncategorized = false;
				foreach($answers as $answer) {
					if($answer->cat_id and !in_array($answer->cat_id, $cat_ids)) $cats[] = array("ID"=>$answer->cat_id, "name" => $answer->category, "first_q_id"=>$answer->question_id);
					if(empty($answer->category) and !$has_uncategorized) {
						$uncategorized = array("ID"=>$answer->cat_id, 
							"name" => __('Uncategorized', 'watuprolik'), "first_q_id"=>$answer->question_id);
						$has_uncategorized = true;
					}
					
					$cat_ids[] = $answer->cat_id;
				}
				
				// add uncategorized at the end?
				if($has_uncategorized) $cats[] = $uncategorized;
				
				// now for each category create chart
				foreach($cats as $cat) {
					$output .= "<h3>".stripslashes($cat['name'])."<h3>";
					
					// select the choices for this category
					$chocies = $wpdb->get_results($wpdb->prepare("SELECT answer, point FROM ".WATUPRO_ANSWERS."
					WHERE question_id=%d ORDER BY sort_order DESC, ID DESC", $cat['first_q_id']));

					// construct cat_answers
					$cat_answers = array();
					foreach($answers as $answer) {
						if($answer->cat_id == $cat['ID']) $cat_answers[] = $answer;
					}					
					
					$output .= self :: construct_chart($chocies, $cat_answers);	
				}
			break;
			
			case 'global':
			default:
				// this chart will get the textual & numeric values of the choices from the 1st question
				// it's users responsibility not to mix different scales
				$chocies = $wpdb->get_results($wpdb->prepare("SELECT answer, point FROM ".WATUPRO_ANSWERS."
					WHERE question_id=%d ORDER BY sort_order DESC, ID DESC", $answers[0]->question_id));
				$output .= self :: construct_chart($chocies, $answers);	
			break;
		}	
		
		return $output;
	} // end chart
	
	// helper function to return single chart based on $choices and $answers
	// used from chart() method for global and cats cases
	static function construct_chart($chocies, $answers) {		
		$table = '<table class="watupro-likert-chart"><tr><th>'.__('Question', 'watuprolik').'</th>';
		foreach($chocies as $choice) {
			$table .= "<th>".stripslashes($choice->answer)."</th>";
		}
		$table .= "</tr>";
		
		// now add the answers
		foreach($answers as $answer) {
			$table .= "<tr><td>".stripslashes($answer->question)."</td>";
			foreach($chocies as $choice) {				
				$style = ($answer->points >= $choice->point) ? "background-color:#aaa;" : "";				
				$table .= '<td style="'.$style.'">&nbsp;</td>';
			}
			$table .= "</tr>";
		}
		
		$table .= "</table>";
		
		return $table;
	}
}