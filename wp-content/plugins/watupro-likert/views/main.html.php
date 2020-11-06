<div class="wrap">
	<h1><?php _e('Create Likert Scale Survey', 'watuprolik');?></h1>
	
	<p><?php _e('This is a quick way to create Likert Scale surveys. Essentially they are just quizzes with single-choice survey questions. You can create such surveys manually but this page is letting you do it much easier and quicker.', 'watuprolik');?></p>
	<p><?php _e('The user interface here is simplified and no rich text editor is used on questions. Once the survey is created you will be able to edit all the questions and the quiz settings individually and publish the quiz.', 'watuprolik');?></p>
	
	<form method="post" onsubmit="return validateLikertForm(this);">
		<div style="display:<?php echo empty($_POST['quiz_id']) ? 'block': 'none';?>">
			<p><label><?php _e('Survey title:', 'watuprolik');?></label> <input type="text" name="title" size="60" value="<?php echo @$_POST['title']?>"></p>
			
			<p><input type="checkbox" name="all_required" value="1"> <?php _e('All questions in this survey are required.', 'watuprolik');?></p>
			
			<p><label><?php _e('Show bar chart from the answers:', 'watuprolik')?></label> <select name="barchart">
				<option value=""><?php _e("Don't show", 'watuprolik');?></option>
				<option value="global"><?php _e("One global chart", 'watuprolik');?></option>
				<option value="cats"><?php _e("One chart for each question category", 'watuprolik');?></option>				
			</select> <?php _e('(This can be changed later.)', 'watuprolik')?></p>
		</div>	
		
		<?php if(!empty($_POST['quiz_id'])):?>
			<h2><?php _e('Adding More Questions to the Survey', 'watuprolik');?></h2>
		<?php endif;?>
		
		<h3><?php _e('Scale options', 'watuprolik');?></h3>
		
		<p><?php _e('The scale options are valid for all the questions you are adding on this page. You can add many sets of questions with the same options. You can also add different sets of questions with different options by pressing "Add more questions" button and changing the options on the next page.', 'watuprolik');?></p>
		
		<p><label><?php _e('Scale', 'watuprolik')?></label> <select name="scale" onchange="changeLikertScale(this.form, this.value);">
			<option value="agreement" <?php if(!empty($_POST['scale']) and $_POST['scale'] == 'agreement') echo 'selected'?>><?php _e('Agreement', 'watuprolik');?></option>
			<option value="frequency" <?php if(!empty($_POST['scale']) and $_POST['scale'] == 'frequency') echo 'selected'?>><?php _e('Frequency', 'watuprolik');?></option>
			<option value="importance" <?php if(!empty($_POST['scale']) and $_POST['scale'] == 'importance') echo 'selected'?>><?php _e('Importance', 'watuprolik');?></option>
			<option value="likelihood" <?php if(!empty($_POST['scale']) and $_POST['scale'] == 'likelihood') echo 'selected'?>><?php _e('Likelihood', 'watuprolik');?></option>
			<option value="custom" <?php if(!empty($_POST['scale']) and $_POST['scale'] == 'custom') echo 'selected'?>><?php _e('Custom', 'watuprolik');?></option>
		</select> <span id="customNumber" style="display:<?php echo (empty($_POST['scale']) or $_POST['scale']!= 'custom') ? 'none': 'inline'?>;"><input type="text" size="3" value="<?php echo empty($_POST['custom_num']) ? 5 : $_POST['custom_num']?>" name="custom_num" onkeyup="changeCustomNum(this.value);" maxlength="2"></span></p>
		
		<div id="likertScaleOptions">
			<?php switch($scale):
				case 'frequency': ?>
					<input type="text" name="choices[]" value="<?php _e('Always', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Frequently', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Occasionally', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Rarely', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Never', 'watuprolik');?>" size="30"> 
				<?php break;
				case 'importance':?>
					<input type="text" name="choices[]" value="<?php _e('Very Important', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Important', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Moderately Important', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Of Little Importance', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Unimportant', 'watuprolik');?>" size="30">
				<?php break;
				case 'likelihood':?>
					<input type="text" name="choices[]" value="<?php _e('Almost Always True', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Usually True', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Occasionally True', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Usually Not True', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Almost Never True', 'watuprolik');?>" size="30">
				<?php break;
				case 'custom':
					for($i=1;$i<= $_POST['custom_num']; $i++):?>
					<input type="text" name="choices[]" value="<?php echo $_POST['choices'][$i-1]?>" size="30"> <br>
					<?php endfor;
				break;
				case 'agreement':
				default:?>
					<input type="text" name="choices[]" value="<?php _e('Strongly Agree', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Agree', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Neutral', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Disagree', 'watuprolik');?>" size="30"> <br>
					<input type="text" name="choices[]" value="<?php _e('Strongly Disagree', 'watuprolik');?>" size="30"> 											 
			<?php endswitch;?>		
		</div>
		
		<p><?php _e('Low end of the scale:', 'watuprolik');?> <input type="text" name="low_end" value="-2" size="2" maxlength="3"> 
		<?php _e('Scale increments with:', 'watuprolik');?> <input type="text" name="step" size="3" maxlength="3" value="1"><br>
		<?php _e('Usually likert scales start with -2 or 0 and increment with 1 so you get -2,-1,0,1,2 points or 1,2,3,4,5 points. But you can also use any other numbers and decimals.', 'watuprolik')?></p>
		
		
		
		<h3><?php _e('Add Your Questions', 'watuprolik')?></h3>
		
		<p><?php _e('Add one question per box', 'watuprolik');?></p>
		
		<?php include(WATUPROLIKERT_PATH."/views/questions.html.php");?>
		
		<p ><input type="submit" name="add_more" value="<?php _e('Add more questions', 'watuprolik');?>">
		<input type="submit" name="done" value="<?php _e('Done. Create the survey', 'watuprolik');?>"></p>
		
		<input type="hidden" name="ok" value="1">
		<input type="hidden" name="quiz_id" value="<?php echo $exam_id?>">
	</form>
</div>

<script type="text/javascript" >
function changeLikertScale(frm, val) {
	var html = '';
	jQuery('#customNumber').hide();
	
	switch(val) {
		case 'agreement':
			var vals = ["<?php _e('Strongly Agree', 'watuprolik');?>",
							"<?php _e('Agree', 'watuprolik');?>",
							"<?php _e('Neutral', 'watuprolik');?>",							 
							"<?php _e('Disagree', 'watuprolik');?>",
							"<?php _e('Strongly Disagree', 'watuprolik');?>",]
		break;	
		
		case 'frequency':
			var vals = ["<?php _e('Always', 'watuprolik');?>", 
							"<?php _e('Frequently', 'watuprolik');?>",
							"<?php _e('Occasionally', 'watuprolik');?>",
							"<?php _e('Rarely', 'watuprolik');?>",
							"<?php _e('Never', 'watuprolik');?>"]
		break;
		
		case 'importance':
			var vals = ["<?php _e('Very Important', 'watuprolik');?>", 
							"<?php _e('Important', 'watuprolik');?>",
							"<?php _e('Moderately Important', 'watuprolik');?>",
							"<?php _e('Of Little Importance', 'watuprolik');?>",
							"<?php _e('Unimportant', 'watuprolik');?>"]
		break;
		
		case 'likelihood':
			var vals = ["<?php _e('Almost Always True', 'watuprolik');?>", 
							"<?php _e('Usually True', 'watuprolik');?>",
							"<?php _e('Occasionally True', 'watuprolik');?>",
							"<?php _e('Usually Not True', 'watuprolik');?>",
							"<?php _e('Almost Never True', 'watuprolik');?>"]
		break;		
	}
	
	if(val == 'custom') {
		jQuery('#customNumber').show();	
		// cutom scale should output empty boxes
		for(i=0; i < frm.custom_num.value; i++) {
			html += '<input type="text" name="choices[]" value="" size="30"> <br>';
		}
	} else {
		for(i=0; i < vals.length; i++) {
			html += '<input type="text" name="choices[]" value="'+vals[i]+'" size="30"> <br>';
		}
	}
	
	jQuery('#likertScaleOptions').html(html);
}

function changeCustomNum(val) {
	var html = '';
		
	for(i=0; i < val; i++) {
			html += '<input type="text" name="choices[]" value="" size="30"> <br>';
	}
		
	jQuery('#likertScaleOptions').html(html);	
}

function validateLikertForm(frm) {
	if(frm.title.value == '') {
		alert("<?php _e('Please enter survey title.', 'watuprolik')?>");
		frm.title.focus();
		return false;
	}
	
	if(isNaN(frm.low_end.value) || isNaN(frm.step.value)) {
		alert("<?php _e('The scale low end and increment values must be numeric.', 'watuprolik');?>");
		if(isNaN(frm.low_end.value)) frm.low_end.focus();
		else frm.step.focus();
		return false;
	}
	
	return true;
}
</script>