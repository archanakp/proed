<div class="wrap watupro-wrap">
	<h2 class="nav-tab-wrapper">
		<a class='nav-tab nav-tab-active' href='admin.php?page=watupro_help&tab=main'><?php _e('Help / User Manual', 'watupro')?></a>
		<a class='nav-tab' href='admin.php?page=watupro_help&tab=email_log'><?php _e('Raw Email Log', 'watupro')?></a>
	</h2>
	<h1><?php _e('Watu PRO Help', 'watupro')?></h1>
	
	<p><?php _e('Because most of the Watu PRO screens are self-explaining, this page is not meant to be a comprehensive user manual. Its intent is only to further clarify some of the functionality in the plugin. Also check the <a href="http://calendarscripts.info/watupro/howto.html" target="_blank">online Help &amp; How-To page</a>', 'watupro')?></p>
	
	<p><?php printf(__('If you want to <b>upgrade to a new version</b>, please <a href="%s" target="_blank">check this</a>.', 'watupro'), 'http://blog.calendarscripts.info/how-to-upgrade-watu-pro/');?> <?php printf(__('If you want to <b>copy your %s from one site to another</b>,', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL)?> <a href="http://blog.calendarscripts.info/how-to-copy-watupro-data-from-one-site-to-another/" target="_blank"><?php _e('see this', 'watupro');?></a>.</p>
	
	<?php if(!empty($watu_exams) and count($watu_exams)):?>
		<h2><?php _e('Upgrading from Watu', 'watupro');?></h2>
		
		<p><?php printf(__('If you are upgrading from the free Watu plugin you can easily transfer your quizzes to WatuPRO. Visit the <a href="%s">WatuPRO Settings</a> page and scroll to the bottom - you will find a section called "Quizzes from Watu Basic".', 'watupro'), 'admin.php?page=watupro_options');?></p>
	<?php endif;?>
	
	<h2><?php _e('Getting Started', 'watupro');?></h2>
	<p><strong><?php _e('Here is how to start really quick:', 'watupro');?></strong> (<a href="http://blog.calendarscripts.info/watupro-quick-getting-started-guide/" target="_blank"><?php _e('See this guide with pictures', 'watupro');?></a>)</p>
	<ol>
		<li><?php _e('Go to', 'watupro');?> <a href="admin.php?page=watupro_exam&action=new"><?php printf(__('Create new %s', 'watupro'), WATUPRO_QUIZ_WORD)?></a> <?php _e('page.', 'watupro');?></li>
		<li><?php printf(__('You can skip filling almost everything - just entering quiz name is enough. However you may want to check at least the "Final page / %s output" tab. It gives you full control over what the user sees when they submit the %s. Maybe there is something you want to add or remove there.', 'watupro'), ucfirst(WATUPRO_QUIZ_WORD), WATUPRO_QUIZ_WORD);?></li>
		<li><?php _e('If you want to create grades, click on Show/Hide link next to "Grading" on the same form', 'watupro');?></li>
		<li><?php _e("Once the test is saved you'll be taken to a page to create questions. Please add some, a test makes no sense without any questions.", 'watupro');?></li>
		<li><?php printf(__('Go back to edit the %s. Check the checkbox saying "Automatically publish this %s in new post once I hit the "Save" button." to have the %s automatically published when you save it.', 'watupro'), WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD);?></li>
		<li><?php printf(__('You can view who submitted your new %s by clicking on the hyperlinked number under the "View results" column. You will see all the details, and you can filter through them, import, export them, etc.', 'watupro'), WATUPRO_QUIZ_WORD);?></li>
		<li><?php printf(__("That's it! Feel free to create %s categories and question categories, certificates, and user groups.", 'watupro'), WATUPRO_QUIZ_WORD);?></li>
	</ol>	
	
	<h2><?php _e('How to see the results of my students?', 'watupro');?></h2>
	
	<p><?php printf(__('There are multiple types of data and reports you can see. Check <a href="%s" target="_blank">this pictorial</a>.', 'watupro'), 'http://blog.calendarscripts.info/how-to-see-quiz-results-and-reports-of-students-in-watupro/');?></p>
	
	<h2><?php _e('Shortcodes in Watu PRO', 'watupro')?></h2>
	
	<ul>
		<li><input type="text" value="[watupro X]" onclick="this.select();" readonly="readonly"> <?php _e('is the shortcode to publish an exam in a post or page. Instead of X you need to use the test ID. The full dynamically generated shortcode can be copied from "Manage quizzes" page.', 'watupro')?> <br>
		<?php printf(__('If you are using difficulty levels you can pull questions from a specific level by passing the <b>%1$s</b> attribute like this: <b>%2$s</b>. If you are using question categories you can pull questions from a specific question category passing the <b>%3$s</b> attribute like this: <b>%4$s</b>. You can also use both attributes together.', 'watupro'), 'difficulty_level', '[watupro X difficulty_level="Easy"]', 'category_id', '[watupro X category_id="15]"');?> <br>
		<?php printf(__('You can also limit to questions that contain any of a list of tags by passing attribute "tags" to the shortcode. Separate multiple tags by comma. Example: <b>%s</b>', 'watupro'), '[watupro 5 tags="business, investing"]');?> <br>
		<?php printf(__('The "pull X random questions" setting can be overridden by passing the <b>%1$s</b> attribute to the shortcode like this: <b>%2$s</b>.', 'watupro'), 'pull_random', '[watupro 1 pull_random=3]');?> <br>
		<?php printf(__('<a href="%1$s" target="_blank">Click here</a> for a full list of shortcode attributes which can overwrite %2$s properties.', 'watupro'), 'https://blog.calendarscripts.info/overwrite-test-attributes-from-shortcode-in-watupro/', WATUPRO_QUIZ_WORD);?></li>
		<li><input type="text" value="[watuprolist cat_id=X]" onclick="this.select();" readonly="readonly"> <?php _e('is the shortcode to display links to all published quizzes from a selected category. X should be replaced with category ID so please copy the dynamic code from Categories page.', 'watupro')?> <br><a href="https://blog.calendarscripts.info/list-quizzes-in-watupro" target="_blank"><?php _e('Learn more and see examples', 'watupro');?></a></li>
		<li><input type="text" value='[watuprolist cat_id="ALL"]' onclick="this.select();" readonly="readonly"> <?php _e('lists links to all published quizzes in the system.', 'watupro')?> <?php _e('Use [watuprolist cat_id="ALL" orderby="title"] to show them ordered by title or [watuprolist cat_id="ALL" orderby="latest"] to order them latest on top. The same format can be used in the above shortcode as well.', 'watupro')?> <span style="color:red;"><b><?php printf(__('The shortcode will NOT display %s that are not published!', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL);?></b></span> <?php printf(__('A published %s is a %s whose shortcode is placed inside a post or page - either manually or using the "auto publish" option.', 'watupro'), WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD);?> <br><a href="https://blog.calendarscripts.info/list-quizzes-in-watupro" target="_blank"><?php _e('Learn more and see examples', 'watupro');?></a></li>
		<li><input type="text" value="[watupro-myexams]" onclick="this.select();" readonly="readonly"> <?php _e('lets you replicate the logged in user "My Quizzes" page outside of Wordpress admin area.', 'watupro')?> <?php _e('You can restrict this by categories as shown on the <a href="admin.php?page=watupro_cats">categories page</a>.', 'watupro');?> <?php _e('You can define sorting - by title or latest on top like this:', 'watupro')?> <b>[watupro-myexams ALL title]</b>, <b>[watupro-myexams ALL latest]</b><br>
		<?php printf(__('You can pass argument "reorder_by_latest_taking" to reorder the completed %s by latest completed on top. This works together with the sorting argument because the %s to complete will remain sorted by it. Example of passing this argument: [watupro-myexams ALL title reorder_by_latest_taking=1].', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL);?><br>
		<?php printf(__('You can also pass a named argument "status" to show only completed %s or %s to complete. This argument should come after all unnamed arguments. It can contain "completed" to list the completed %s, or "todo" to list %s to complete. Example usage: <b>[watupro-myexams status="completed"], [watupro-myexams ALL title status="todo"]</b>. If you want to list both types of %s (default behavior), just do not add the status argument.', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL);?> <br>
		<?php _e("If you don't want the 'View details' link to open in a pop-up window you can add <b>details_no_popup=1</b> in the shortcode.", 'watupro');?></li>
		<li><input type="text" value="[watupro-mycertificates]" onclick="this.select();" readonly="readonly"> <?php _e('lets you replicate the logged in user "My Certificates" page.', 'watupro');?> </li>
		<li><input type="text" value="[watupro-leaderboard]" onclick="this.select();" readonly="readonly"> <?php _e('or', 'watupro');?> <input type="text" value="[watupro-leaderboard X]" onclick="this.select();" readonly="readonly"></b> <?php _e('prints out a basic leaderboard of users who collected top number of points. In the second example X is the number of users, otherwise 10 is used. More configurable leaderboards are available in the WatuPRO Play plugin.', 'watupro');?></li>
		<li><input type="text" value="[watupro-userinfo]" onclick="this.select();" readonly="readonly"> <?php printf(__('lets you display any information from the user profile. More info <a href="%s" target="_blank">here</a>.', 'watupro'), 'http://blog.calendarscripts.info/user-info-shortcodes-from-watupro-version-4-1-1/')?></li>
		<li><input type="text" value='[watupro-result what="points" quiz_id=X user_id=Y]' onclick="this.select();" readonly="readonly"> <?php _e('shows the result achieved by user with ID Y on quiz with ID X. You can retrieve points, percent correct, achieved grade, or the whole "final screen" by passing one of the following values to the "what" argument: points, percent, percent_points, grade, details.<br> You can omit the user_id attribute: then the current logged user result will be shown. If the user has completed the quiz multiple times, their latest result will be shown.<br>
		You can omit the quiz_id attribute: then the latest attempt for the user regardless on which quiz it is, will be shown.', 'watupro');?><br />
		<?php printf(__('If you pass the parameter <b>%1$s</b> you can have the results shown for a specific question category. Note that for this to work you should either have used the %2$s variable in the final screen or enabled the "Always calculate category grades" option.', 'watupro'), 'cat_id', '%%CATGRADES%%');?><br>
		<?php printf(__('You can pass the parameter <b>%s</b> to be shown if the result is empty.', 'watupro'), 'placeholder');?></li>
		<li><input type="text" value="[watupro-basic-chart]" onclick="this.select();" readonly="readonly"> <?php _e('generates a basic bar chart of "your points vs average collected points" and "your % correct answer vs average % correct answer". The shortcode accepts arguments:', 'watupro');?> <b>show</b> <?php _e('(can contain "points", "percent", or "both"),', 'watupro');?> <b>your_color</b> <?php _e("for the color of the bar with user's data,", 'watupro');?> <b>avg_color</b> <?php _e('for the color of the bar with average data,', 'watupro');?> <b>bar_width</b> <?php _e('for the bar width in pixels, which defaults to 100px. Example usage:', 'watupro');?> [watupro-basic-chart show="both" your_color="green" avg_color="#FF55AA"]. <?php printf(__('The same chart can also be used to create an overview of your latest attempts on this %s. More info about all attributes is available <a href="%s" target="_blank">here</a>.', 'watupro'), WATUPRO_QUIZ_WORD, 'http://blog.calendarscripts.info/watupro-basic-bar-chart/');?></li>
		<li><input type="text" value='[watupro-quiz-attempts quiz_id=X show="total|left"]' onclick="this.select();" readonly="readonly"> <?php printf(__('shows the number of attempts allowed on the %s: total or number left for the given user. Place the %s ID instead of X and pass "total" or "left" to the "show" parameter. If the %s also limits attempts per IP address this limit will be shown instead of the limit per user account. Example usage:', 'watupro'), WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD);?> [watupro-quiz-attempts quiz_id=2 show="left"]</li>
		<li><input type="text" value='[watupro-users-completed quiz_id=X]' onclick="this.select();" readonly="readonly"> <?php printf(__('Displays the number of users (attempts) who completed a %s. Passing quiz_id parameter is required. There are also the following optional parameters: return, grade_id, catgrade_id, points and percent_correct. The parameters points and percent_correct should be passed along with >, >=, <, <=, or = character to specify what kind of comparison we are making. Example usage: %s', 'watupro'), WATUPRO_QUIZ_WORD, '[watupro-users-completed quiz_id=1 grade_id=2 points="< 10" percent_correct=">= 65"]');?><br>
		<?php _e('The optional parameter "return" can contain "number" or "percent" and defines whether the shortcode will return the number of users (attempts) who met the desired conditions or the percentage of such submissions vs. the total number of quiz submissions. Defaults to "number".', 'watupro');?> <br>
		<?php _e('The parameter "catgrade_id" lets you calculate this number or percent for users who achieved a specific category grade. It is best suited for tests with category grades.', 'watupro');?><br>
		<?php _e('The parameters "points" and "percent_correct" can be used only as filters of the result on the whole test: they will not work as filter for the specified question category by catgrade_id parameter.', 'watupro');?></li>
		<li><input type="text" value='[watupro-calculator]' onclick="this.select();" readonly="readonly"> <?php printf(__('can be used on the "Final screen" of the %s to perform basic math on user answers on two questions. You can add, subtract, multiply or delete the two values and show the result. You can even assign the result to a variable that can be used in the another shortcode call on the same final screen. Learn how this shortcode works <a href="%s" target="_blank">here</a>.', 'watupro'), WATUPRO_QUIZ_WORD, 'https://blog.calendarscripts.info/basic-math-based-on-user-answers-in-watupro/');?></li>
		<li><input type="text" value='[watupro-retake]' onclick="this.select();" readonly="readonly"> <?php _e('can be used at the "Final screen" to display a link or button to re-take the quiz. The shortcode accepts parameters: <b>type</b> which can be "link" or "button", <b>class</b> which can be a CSS class of your choice, and <b>text</b> which can overwrite the default "Try again" text that appears on the link or the button.', 'watupro');?><br>
		<?php _e('If you want to display this link/button only when the user fails the quiz for example, insert it in the grade description of the non-successful grade(s) instead of directly using the shortcode in the final screen. Then in the final screen use the %%GDESC%% variable to display the achieved grade description.', 'watupro');?></li>
		<li><input type="text" value='[watupro-segment-stats question_id=X]' onclick="this.select();" readonly="readonly"> <?php printf(__('Outputs average points or percent correct answers for a group of respondents. The segmentation of the group is based on how they answered a specific question. The shortcode can also return the %% of the group achieved the same grade on the %s or category grade in specific question category. <a href="%s" target="_blank">Learn more here</a>.', 'watupro'), WATUPRO_QUIZ_WORD, 'http://blog.calendarscripts.info/segment-performance-shortcode-in-watupro/');?></li>
		<li><input type="text" value='[watupro-paginator]' onclick="this.select();" readonly="readonly"> <?php printf(__('Can be used to display the questions paginator outside of the quiz - for example in a sidebar, in a separate block designed by you etc. The shortcode is smart and knows when a single quiz is displayed on the page and will display nothing on homepage, archives, category pages, etc. However it does not know when the quiz is started so it might not be the best for quizzes using start button. By default it shows the questions paginator, but you can use it for category paginator like this: <b>%s</b>. You can also make the paginator vertical by passing attribute vertical=1 like this: <b>%s</b>. <b>When using the external paginator shortcode make sure that it is NOT also enabled for the %s in the %s settings.</b>', 'watupro'), '[watupro-paginator paginator="categories"]', '[watupro-paginator vertical="1"]', WATUPRO_QUIZ_WORD, WATUPRO_QUIZ_WORD);?></li>
	</ul>
	
	<?php if(watupro_intel()):?>
	<h2><?php printf(__('For Personality %s', 'watupro'), ucfirst(WATUPRO_QUIZ_WORD_PLURAL));?></h2>

	<p><?php printf(__('A basic guide to personality %s is available <a href="%s" target="_blank">here</a>.', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL, 'http://blog.calendarscripts.info/personality-quizzes-in-watupro/');?></p>	
	
	<p><?php printf(__('The following shortcode can be used <b>only in the "Final Screen" and email box</b> to improve the content shown to the user on personality %s. Many personality %s work better when displaying not just the assigned personality type but also information how many answers the user gave for the other types. Here is how to use it with an example:', 'watupro'), WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL);?></p>
	<p><b>[watupro-expand-personality-result sort="best" limit=3 empty="false" chart=0]</b><br>
		<?php printf(__('For personality type %s you collected %s points (%s%% of all).', 'watupro'), '{{{personality-type}}}', '{{{num-answers}}}', '{{{percent-answers}}}');?><br>
		&lt;p&gt;{{{personality-type-description}}}&lt;/p&gt;<br>
		<b>[/watupro-expand-personality-result]</b></p>
	<p><?php _e('The text inside the shortcode will be repeated for every personality type. All the arguments in the shortcodes are optional:', 'watupro');?></p>
	<ul>
		<li><b>sort</b> <?php _e('defines how the types are sorted. You can sort by "best" (most answers collected type on top), "worst" (least on top), "alpha" (alphabetically by type title). If you do not specify the parameter the types will be sorted by the order you created them.', 'watupro');?></li>
		<li><b>limit</b> <?php _e("can be used to limit the number of personality types shown after sorting. Will be useful if you have tens of personality types and want to show only the ones that user gave most answers for. Or set to '1' to display information only for the type they received as result. If you don't include this parameter all the existing types will be shown.", 'watupro');?></li>
		<li><b>empty</b> <?php _e('defines whether the personality types that got 0 answers will be shown. When the parameter is skipped, they will be shown. When set to "false" they will be excluded.', 'watupro');?></li>
		<li><b>rank</b> <?php _e("lets you limit to only one of the personalities you rank for. For example use rank=2 and you'll display only the information of the second-matched personality. <b>This attribute does not work in chart mode.</b>", 'watupro');?></li>
		<li><b>personality</b> <?php _e('does the same as rank, but matches the name of the personality. <b>This attribute does not work in chart mode.</b>', 'watupro');?></li>
	</ul>
		
	<p><?php _e('If you set the argument <b>chart</b> to 1, the shortcode will produce a basic vertical bar chart and the text will be shown as explanation under each bar.', 'watupro');?></p>
	
	<p><input type="text" value="[watupro-personality-chart]" onclick="this.select();" readonly="readonly"> <?php printf(__('lets you print a bar chart based on the number of points collected for each personality type. Learn more about the parameters of this shortcode <a href="%s" target="_blank">here</a>.', 'watupro'), 'https://blog.calendarscripts.info/personality-quizzes-in-watupro/');?> </p>
	<?php endif;?>
	
	<?php if(watupro_module('reports')):?>
	<h2><?php _e('The Reporting Module', 'watupro');?></h2>
	<a name="reporting"></a>
	<p><?php _e('As a supervisor you can reach every user reports from your <a href="users.php">WordPress Users</a> page. You will see two extra columns added by WatuPRO there.', 'watupro');?></p>
	<p><?php _e('You can also use the following shortcodes to display reports on the front-end:', 'watupro');?></p>
	
	<ul>
		<li><input type="text" value="[WATUPROR OVERVIEW]" onclick="this.select();" readonly="readonly"> <?php _e('or', 'watupro');?> <input type="text" value="[WATUPROR OVERVIEW X]" onclick="this.select();" readonly="readonly"> <?php _e('shows the Overview page from the reports. You can pass user ID for X or leave it empty to display reports to the currently logged user.', 'watupro');?></li>
		<li><input type="text" value="[WATUPROR TESTS]" onclick="this.select();" readonly="readonly"><?php _e('or', 'watupro');?> <input type="text" value="[WATUPROR TESTS X]" onclick="this.select();" readonly="readonly"> <?php _e('displays the Tests page from the reports.', 'watupro');?></li>
		<li><input type="text" value="[WATUPROR SKILLS]" onclick="this.select();" readonly="readonly"> <?php _e('or', 'watupro');?> <input type="text" value="[WATUPROR SKILLS X]" onclick="this.select();" readonly="readonly"> <?php _e('displays the Skills page from the reports. You can pass argument "chart_orientation" - horizontal or vertical, to specify the orientation of the chart.', 'watupro');?></li>
		<li><input type="text" value="[WATUPROR HISTORY]" onclick="this.select();" readonly="readonly"> <?php _e('or', 'watupro');?> <input type="text" value="[WATUPROR HISTORY X]" onclick="this.select();" readonly="readonly"> <?php _e('displays the History page from the reports.', 'watupro');?></li>
		<li><input type="text" value='[watupror-poll question_id="X"]' onclick="this.select();" readonly="readonly"> <?php _e('displays poll-like stats showing how everyone answered on a question. By default it loads "correct/incorrect"
chart on all question types except on "single answer" and "multiple answer" questions where it loads chart per each answer. You can force it to always show correct / incorrect by adding parameter to the shortcode:', 'watupro')?> [watupro-poll question_id="X" mode="correct"]. <?php _e('You can also control the colors used in the chart like this:', 'watupro');?> [watupror-poll question_id="X" correct_color="green" wrong_color="#FF0000"]. <br>
	  <?php printf(__('The optional parameter <b>%1$s</b> lets you show which is the current user answer when the shortcode is used in the "Final page". You can pass any text or even HTML code (when using HTML make sure the rich text editor is in Text mode) and it will be shown next to the corresponding answer(s) or correct / incorrect stats. If you pass "CHECK" to the attribute we will generate a checkmark. Example: %2$s', 'watupro'), 'user_choice', '[watupror-poll question_id="X" user_choice="CHECK"]');?></li>
		<li><input type="text" value='[watupror-user-cat-chart]' onclick="this.select();" readonly="readonly"> <?php printf(__('generates a bar chart from the user performance per question category in a single quiz attempt. The shortcode is typically used in the Quiz Output to show chart from the just submitted %s. You can however pass "taking_id" parameter if you want to use it elsewhere. Other parameters accepted: "from" - "correct" (default, will show %% correct answers per question category), "answered" (will show %% answered questions per category), "points" (will show the number of points earned per category), and "percent_max_points" (displays the %% points achieved from the maximum points in each category). You can also pass "width", "height", and "orientation" (horizontal or vertical). Note that "width" is always the bar thickness and "height" is its length.', 'watupro'), WATUPRO_QUIZ_WORD);?> <br>
		<?php printf(__('The parameter "colors" can be passed to use your own color set instead of the default ones. Separate colors by comma like this: <b>%s</b>', 'watupro'), 'colors="yellow, #F508A9, pink"');?> <br>
		<?php _e('By default this chart <b>does not calculate survey questions</b>. You can however pass attribute <b>include_survey_questions=1</b> to have them included. Not recommended if you have set "from" to "correct" (default setting).', 'watupro');?></li>
		<li><input type="text" value='[watupror-pie-chart]' onclick="this.select();" readonly="readonly"> <?php printf(__('generates a pie chart from the user performance per question category in a single quiz attempt. The shortcode is typically used in the Quiz Output to show chart from the just submitted %s. You can however pass "taking_id" parameter if you want to use it elsewhere. Other parameters accepted: "from" - "points" (default, will generate a single pie chart based on points collected per category), "correct" (will show one pie per each category, showing %% of correct vs. incorrect answers). You can also pass parameter "radius" to define the radius of the pie chart in pixes.', 'watupro'), WATUPRO_QUIZ_WORD);?> <br>
		<?php _e('By default this chart <b>does not calculate survey questions</b>. You can however pass attribute <b>include_survey_questions=1</b> to have them included. Not recommended if you have set "from" to "correct" (default setting).', 'watupro');?><br>
		<?php printf(__('<a href="%s"target="_blank">See here</a> a couple of examples of these charts.', 'watupro'), 'https://blog.calendarscripts.info/using-category-grades-in-watu-pro/#charts');?></li>
		<li><input type="text" value='[watupror-qcat-total]' onclick="this.select();" readonly="readonly">  <?php _e('outputs total points collected or average % correct answer, or % of maximum points for a given user and question category. The shortcode accepts parameter <b>user_id</b>. If omitted it will default to the currently logged in user. The parameter <b>cat_id</b> defines the question category that will be used. If omitted it will default to uncategorized questions. The parameter <b>difficulty_level</b> restricts the stat to a specific difficulty level. The parameter <b>what</b> can contain "percent", "points", or "percent_points" and defaults to points. Note that calculating percentage of points (the "percent_points" value) can require more processing power when there are many questions involved. Example usage:', 'watupro');?> [watupror-qcat-total difficulty_level="Easy" what="percent" cat_id="7"]<br>
		<?php printf(__('You can further limit it to a specific %s by passing parameter "quiz_id".', 'watupro'), WATUPRO_QUIZ_WORD);?><br>
		<?php printf(__('You can further specify that the calculation should be based only on the latest attempt on each %s by passing the parameter latest_attempt="1".', 'watupro'), WATUPRO_QUIZ_WORD);?></li>
		<li><input type="text" value='[watupror-taken-tests]' onclick="this.select();" readonly="readonly"> <?php printf(__('Will display text showing the number of user taken %s vs. number of %s total. The text is configurable by passing the argument <b>%s</b>. You can also pass a category ID in the parameter <b>%s</b> and user ID in the parameter <b>%s</b>. If no user ID is passed, it will use the currently logged user. If no category ID is passed, it will show number of total tests. Example: <b>%s</b>', 'watupro'),
		WATUPRO_QUIZ_WORD_PLURAL, WATUPRO_QUIZ_WORD_PLURAL, 'text', 'cat_id', 'user_id', '[watupror-taken-tests text="You attempted {{num-taken}} tests from {{total}} total tests." cat_id=1]');?></li>
	</ul>
	<?php endif;?>
	
	<h2><?php _e('Translating WatuPRO', 'watupro');?></h2>
	
	<p><?php printf(__('WatuPRO supports translating in all the languages that WordPress supports. We have created a short guide about translating the plugin <a href="%s" target="_blank">here</a>. See also the available <a href="%s" target="_blank">community translations</a>.', 'watupro'), 'http://blog.calendarscripts.info/how-to-translate-a-wordpress-plugin/', 'http://blog.calendarscripts.info/watupro-community-translations/');?> </p>
	
	<h2><?php _e('Troubleshooting', 'watupro');?></h2>
	
	<p><?php printf(__('Before contacting support please do check our <a href="%s" target="_blank">online Help &amp; How-To page</a> on the site as many frequently asked questions are already answered there.', 'watupro'), 'http://calendarscripts.info/watupro/howto.html"');?></p>
	
	<p><?php printf(__('If you have problems with quiz not working on the front-end or not displaying properly please <a href="%s" target="_blank">read this first</a>.', 'watupro'), 'http://blog.calendarscripts.info/watupro-front-end-troubleshooting-guide/');?></p>
	
	<h2><?php _e('Redesigning and Customizing the Views / Templates', 'watupro');?></h2>
	
	<p style="color:red;"><b><?php _e('Only for advanced users!', 'watupro');?></b></p>
	
	<p><?php _e('You can safely customize all files from the "views" folders by placing their copies in your theme folder. Simply create folder "watupro" <b>in your theme root folder</b> and copy the files you want to custom from "views" folder directly there. For files from the Intelligence module, add folder "i" under "watupro" folder, and for files from the Reporting module add folder "reports".', 'watupro');?></p>

	<p><?php _e('For example:', 'watupro');?></p>
	
	<ol>
		<li><?php _e('If you are using the Twenty Sixteen theme, you should create folder "watupro" under it so the structure will now be something like <b>wp-content/themes/twentysixteen/watupro</b>. (The files that are above the new "watupro" folder should remain where they are)', 'watupro');?></li>
		<li><?php _e('Then if you want to modify the "My Quizzes" page copy the file my_exams.php from the plugin "views" folder and place it in the new "watupro" folder so you will have', 'watupro');?>  <b>wp-content/themes/twentyfourteen/watupro/my_exams.php</b></li>
		<li><?php _e('If you want to create your version of the Reports Overview page from the Reporting module, copy it to', 'watupro');?> <b>wp-content/themes/twentyfourteen/watupro/reports/overview.php</b></li>
	</ol>	
	
	<p><?php _e('Similar to the above you can use your own modified version of our main JavaScript file - main.js by placing it as watupro/lib/main.js in your theme folder.', 'watupro');?></p>
	
	<p><?php _e("Don't worry if you use modified WordPress directory structure and don't have 'wp-content' folder. The trick will work with any structure as long as you follow the same logic.", 'watupro');?></p>
	
	<p><?php _e('Then feel free to modify the code, but of course be careful not to mess with the PHP or Javascript inside. This will let you change the design and even part of the functionality and not lose these changes when the plugin is upgraded. Be careful: we can not provide support for your custom versions of our views.', 'watupro');?></p>
	
	<h2><?php _e('Support', 'watupro');?></h2>
	
	<p><?php _e("If you have any questions or issues please send us email at <strong>info@calendarscripts.info</strong> or <b>support@kibokolabs.com</b>. <strong>VERY IMPORTANT:</strong> if you have a problem while using the plugin please <b>do provide the URL where we can observe it</b>. Seeing the URL helps far more than sending long descriptions of the problem. We don't knowingly release anything buggy so you can assume we don't know about the problem you have until you send us your report. Please keep your support emails short.", 'watupro');?></p>
</div>	