<?php
add_shortcode('councellor_reportcard', 'display_councellor_report_card');
function display_councellor_report_card() {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $user_id = get_current_user_id();
    $user = wp_get_current_user($user_id);
    //ob_start();
    ?>
    <style>
        .primary
        {
            background: #dfdff1 !important;
        }
        .secondary 
        {
            background: #acabe2 !important;
        }
        .tertiary 
        {
            background: #8482dc !important;
        }
        .fiery
        {
            background: #524fb9 !important;
        }
        .passionary 
        {
            background: #201e65 !important;
        }
    </style>
    <style>
        .chart-wrap {
            margin-left: 50px;
            font-family: sans-serif;
            height: 650px;
            width: 300px;
        }
        .chart-wrap .title {
            font-weight: bold;
            font-size: 1.62em;
            padding: 0.5em 0 1.8em 0;
            text-align: center;
            white-space: nowrap;
        }
        .chart-wrap.vertical .grid {
            transform: translateY(-175px) translateX(175px) rotate(-90deg);
        }
        .chart-wrap.vertical .grid .bar::after {
            transform: translateY(-50%) rotate(45deg);
            display: block;
        }
        .chart-wrap.vertical .grid::before,
        .chart-wrap.vertical .grid::after {
            transform: translateX(-0.2em) rotate(90deg);
        }
        .chart-wrap .grid {
            position: relative;
            padding: 5px 0 5px 0;
            height: 100%;
            width: 100%;
            border-left: 2px solid #aaaaaa;
            background: repeating-linear-gradient(90deg, transparent, transparent 19.5%, rgba(170, 170, 170, 0.7) 20%);
        }
        .chart-wrap .grid::before {
            font-size: 0.8em;
            font-weight: bold;
            content: '0%';
            position: absolute;
            left: -0.5em;
            top: -1.5em;
        }
        .chart-wrap .grid::after {
            font-size: 0.8em;
            font-weight: bold;
            content: '100%';
            position: absolute;
            right: -1.5em;
            top: -1.5em;
        }
        .chart-wrap .bar {
            width: var(--bar-value);
            height: 10px;
            margin: 30px 0;
            background-color: #f16335;
            border-radius: 0 3px 3px 0;
        }
        .chart-wrap .bar:hover {
            opacity: 0.7;
        }
        .chart-wrap .bar::after {
            content: attr(data-name);
            margin-left: 100%;
            padding: 10px;
            display: inline-block;
            white-space: nowrap;
        }
        .chart-wrap .yellow_bar
        {
            background-color: #e9f715;
        }
        .chart-wrap .green_bar
        {
            background-color: #08fb04;
        }
        .chart-wrap .red_bar
        {
            background-color: #fb3204;
        }
        .chart-wrap .blue_bar
        {
            background-color: #0439fb;
        }
    </style>
    <div class="not_given_test">
        <div class="" id="view_result">
            <?php
            $exams_6 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 6 ");
            $exams_7 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 7 ");
            $exams_8 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 8 ");
            $exams_9 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 9 ");
            $exams_10 = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = 10 ");
            if (empty($exams_6) && empty($exams_7) && empty($exams_8) && empty($exams_9) && empty($exams_10)) {
                ?>
                <div class="">
                    <p>Please Complete all your quizzes to view your result.</p>
                </div>
                <?php
            } else {
                ?>
                <div class="">
                <?php
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
                ?>
                    <div class="vc_row wpb_row vc_row-fluid bp-background-size-auto">
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
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <h3 style="background-color: #f33333; padding: 0px 15px; margin-top: 15px; color:#ffffff;">CAREER POSSIBILITES ASSESSMENT– STUDENT REPORT FOR COUNSELOR
                                                            </h3>
                                                            <div style="margin-top: 20px;">
                                                                <p style="padding: 5px; border-radius: 5px;"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        <?php
        foreach ($quizzes as $key => $quiz) {
            $question_cat = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 0");
            foreach ($question_cat as $key => $categories) {
                if ($quiz->name == 'Personality Survey' && $categories->name == 'Personality Type') {
                    $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 1");
                }
                if ($quiz->name == 'Ability Survey' && $categories->name == 'Ability Type') {
                    $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 4");
                }
                if ($quiz->name == 'Interests Survey' && $categories->name == 'Interest Type') {
                    $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 5");
                }
                if ($quiz->name == 'Multiple Intellegence Survey' && $categories->name == 'Multiple Intelligences Type') {
                    $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 6");
                }
                if ($quiz->name == 'Learning Style Survey' && $categories->name == 'Learning Style Type') {
                    $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 7");
                }
            }
            $exam_taken = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = " . $quiz->ID . "");
            $questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM " . $prefix . "watupro_student_answers as answer inner join " . $prefix . "watupro_question as question on answer.question_id = question.ID where answer.user_id = " . $user_id . " and answer.exam_id = " . $exam_taken->exam_id . " and answer.taking_id = " . $exam_taken->ID . " group by question.cat_id order by cat_id ASC ");
            if ($quiz->ID == 6) {
                ?>
                                                        <span>
                                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of <?php echo $quiz->name; ?>
                                                            </h4>
                                                        </span>
                                                        <p><b>Personality</b> is basically “who you are�?. It is very basic to everyone; nobody can change his/her personality entirely though modifications can always be made with time. It plays a vital role in choosing the right career.
                                                        </p>
                                                        <span>
                                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                                        </span>
                                                        <?php
                                                    }
                                                    if ($quiz->ID == 7) {
                                                        ?>
                                                        <span>
                                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of <?php echo $quiz->name; ?>
                                                            </h4>
                                                        </span>
                                                        <p><b>Ability</b> refers to possessing more of a natural talent for a task, even if that talent is not yet fully developed. Whereas ability indicates something a person is able to do well, specifically ‘what you are good at’. One can develop an ability to do something without the natural aptitude for it, through hard work and adaptation.
                                                        </p>
                                                        <span>
                                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                                        </span>
                                                        <?php
                                                    }
                                                    if ($quiz->ID == 8) {
                                                        ?>
                                                        <span>
                                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of <?php echo $quiz->name; ?>
                                                            </h4>
                                                        </span>
                                                        <p><b>Career interest</b>This assessment analysis helps you to judge the most appropriate career for you based on ‘What are your interests’ among the various choices available.
                                                        </p>
                                                        <span>
                                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                                        </span>
                                                        <?php
                                                    }
                                                    if ($quiz->ID == 9) {
                                                        ?>
                                                        <span>
                                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of <?php echo $quiz->name; ?>
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
                                                        <p>Interpersonal intelligence is the ability to understand and interact effectively with others. It involves effective verbal and nonverbal communication, the ability to note distinctions among others, sensitivity to the moods and temperaments of others, and the ability to entertain multiple perspectives. Teachers, social workers, actors, and politicians all exhibit interpersonal intelligence. Young adults with this kind of intelligence are leaders among their peers, are good at communicating, and seem to understand others’ feelings and motives.
                                                        </p>
                                                        <p><h4><b>Bodily-Kinesthetic Intelligence</b></h4></p>
                                                        <p>Bodily kinesthetic intelligence is the capacity to manipulate objects and use a variety of physical skills. This intelligence also involves a sense of timing and the perfection of skills through mind–body union. Athletes, dancers, surgeons, and crafts people exhibit well-developed bodily kinesthetic intelligence.
                                                        </p>
                                                        <p><h4><b>Linguistic Intelligence</b></h4></p>
                                                        <p>Linguistic intelligence is the ability to think in words and to use language to express and appreciate complex meanings. Linguistic intelligence allows us to understand the order and meaning of words and to apply meta-linguistic skills to reflect on our use of language. Linguistic intelligence is the most widely shared human competence and is evident in poets, novelists, journalists, and effective public speakers. Young adults with this kind of intelligence enjoy writing, reading, telling stories or doing crossword puzzles.
                                                        </p>
                                                        <p><h4><b>Intra-personal Intelligence</b></h4></p>
                                                        <p>Intra-personal intelligence is the capacity to understand oneself and one’s thoughts and feelings, and to use such knowledge in planning and directing one’s life. Intra-personal intelligence involves not only an appreciation of the self, but also of the human condition. It is evident in psychologist, spiritual leaders, and philosophers. These young adults may be shy. They are very aware of their own feelings and are self-motivated.
                                                        </p>
                                                        <p><h4><b>Spatial Intelligence</b></h4></p>
                                                        <p>Spatial intelligence is the ability to think in three dimensions. Core capacities include mental imagery, spatial reasoning, image manipulation, graphic and artistic skills, and an active imagination. Sailors, pilots, sculptors, painters, and architects all exhibit spatial intelligence. Young adults with this kind of intelligence may be fascinated with mazes or jigsaw puzzles, or spend free time drawing or daydreaming.
                                                        </p>
                                                        <span>
                                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                                        </span>
                <?php
            }
            if ($quiz->ID == 10) {
                ?>
                                                        <span>
                                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of <?php echo $quiz->name; ?>
                                                            </h4>
                                                        </span>
                                                        <p><h4><b>Kinesthetic Learner- Learning by Doing</b></h4></p>
                                                        <p>learners need to touch or experience something in order to remember it. If you fall into this classification, you may have faced greater challenges in the academic environment. Most formal learning is not set up to include physical movement and activities. Nevertheless, if this is your strength, you could benefit from the following activities: making models, visiting museums, giving a demonstration, participating in a simulation, and studying on the floor, bed or any place that feels comfortable. You can also relate to physical activities, direct involvement, hands-on activities, displays, demonstrations, and experiments. 
                                                        </p>
                                                        <p><h4><b>Visual Learner – Learning by Seeing</b></h4></p>
                                                        <p>Visual learners need to see something in order to learn best. if you fall into this category, you will benefit from the following activities: copying from the board, writing and rewriting notes, highlighting key information in the textbook, making mind maps, using flashcards, and watching videos. You can also learn easily from graphics, posters, charts, maps, and photographs. 
                                                        </p>
                                                        <p><h4><b>Auditory Learner – Learning by Listening</b></h4></p>
                                                        <p>Auditory learners need to hear something in order to learn well. If you fall into this group, doing the following will help you learn more easily: pay attention in class, make recordings of learning material, repeat facts with your eyes closed, ask questions, explain the subject matter to another student, record lectures, participate in group discussions, and study in a quiet environment. Auditory learners like to listen to audio books, lectures, debates, and music
                                                        </p>
                                                        <span>
                                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                                        </span>
                <?php
            }
            ?>
                                                    <span><p><?php echo $desc; ?></p></span>
                                                    <div class="">
                                                        <div class="">
            <?php
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
                if ($flag == 'true') {
                    $total_pointss = $total_points;
                    if ($total_pointss < '20') {
                        ?>
                                                                        <div class="bar red_bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?> (<?php echo $total_pointss . '%'; ?>) " title="<?php echo $cats->name; ?>  <?php echo $total_pointss . '%'; ?>">
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if ($total_pointss >= '21' && $total_pointss < '40') {
                                                                        ?>
                                                                        <div class="bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?> (<?php echo $total_pointss . '%'; ?>) " title="<?php echo $cats->name; ?>  <?php echo $total_pointss . '%'; ?>">
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if ($total_pointss >= '41' && $total_pointss < '60') {
                                                                        ?>
                                                                        <div class="bar yellow_bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?> (<?php echo $total_pointss . '%'; ?>) " title="<?php echo $cats->name; ?>  <?php echo $total_pointss . '%'; ?>">
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if ($total_pointss >= '61' && $total_pointss < '80') {
                                                                        ?>
                                                                        <div class="bar blue_bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?> (<?php echo $total_pointss . '%'; ?>) " title="<?php echo $cats->name; ?>  <?php echo $total_pointss . '%'; ?>">
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if ($total_pointss >= '81' && $total_pointss < '100') {
                                                                        ?>
                                                                        <div class="bar green_bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?> (<?php echo $total_pointss . '%'; ?>) " title="<?php echo $cats->name; ?>  <?php echo $total_pointss . '%'; ?>">
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    $total_pointss = 0;
                                                                    ?>
                                                                    <div class="bar" style="--bar-value:<?php echo $total_pointss . '%'; ?>;" data-name="<?php echo $cats->name; ?>" title="<?php echo $cats->name; ?> <?php echo $total_pointss . '%'; ?>">
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                            <?php
                                                            if ($quiz->ID == 6) {
                                                                ?>
                                                        <p><h4><b>Objective</b></h4></p>
                                                        <p>Objective persons enjoy working with tools, equipment, instruments and machinery. They like to repair and/or fabricate things from various materials according to specifications and using established techniques. Objective persons are interested in finding out how things operate and how they are built.
                                                        </p>
                                                        <p><h4><b>Social</b></h4></p>
                                                        <p>Individuals who are a social are dedicated leaders, humanistic, responsible and supportive. They use feelings, words and ideas to work with people rather than physical activity to do things. They enjoy closeness, sharing, groups, unstructured activity and being in charge. Social persons like dealing with people. They enjoy caring for and assisting others in identifying their needs and solving their concerns. Social persons like working and co-operating with others. They prefer to be involved in work that requires interpersonal contact..
                                                        </p>
                                                        <p><h4><b>Innovative</b></h4></p>
                                                        <p>Innovative persons like to explore things in depth and arrive at solutions to problems by experimenting. They are interested in initiating and creating different ways to solve questions and present information. They enjoy scientific subjects. Innovative persons prefer to be challenged with new and unexpected experiences. They adjust to change easily.
                                                        </p>
                                                        <p><h4><b>Methodical</b></h4></p>
                                                        <p>Methodical persons like to have clear rules and organized methods to guide their activities. They prefer working under the direction or supervision of others according to given instructions, or to be guided by established policies and procedures. Methodical persons like to work on one thing until it is completed. They enjoy following a set routine and prefer work that is free from the unexpected.
                                                        </p>
                                                        <p><h4><b>Directive</b></h4></p>
                                                        <p>Directive persons like to take charge and control situations. They like to take responsibility for projects that require planning, decision making and coordinating the work of others. They are able to give direction and instructions easily. They enjoy organizing their own activities. They see themselves as independent and self-directing.
                                                        </p>
                                                                <?php
                                                            }
                                                            if ($quiz->ID == 7) {
                                                                ?>
                                                        <p>
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
                                                            Ability to think visually about geometric forms and comprehend the two-dimensional representation of three dimensional objects; to recognize the relationships resulting from the movement of objects in space. May be used in such tasks as blueprint reading and in solving geometry problems. Frequently described as the ability to "visualize" objects of two or three dimensions.
                                                        </p>
                                                        <p>
                                                        <h4><b>Finger Dexterity</b></h4>
                                                        </p>
                                                        <p>
                                                            Ability to demonstrate tasks that involve coordination of small muscles, in movements—usually involving the synchronization of hands and fingers—with the eyes.
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
                                                            It is an ability, commonly referred to as the "G" score, defined as the ability to "catch on" or understand instructions and underlying principles with an ability to reason out and make judgements.
                                                        </p>
                                                                <?php
                                                            }
                                                            if ($quiz->ID == 8) {
                                                                ?>
                                                        <div class="">
                                                            <table>
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
                                                                        <td><b>Art</b></td>
                                                                        <td>Art has a wide variety of career categories. You might want to consider what category of art you are interested in and then research careers based on that. For example, the performing arts includes any physical performing art such as theater (like acting), music, or dance. Literature is also considered an art as this is a way to express one-self in a creative way, such as screenwriting, poetry, or a work of fiction. Then, there is the visual arts. The visual arts include painting, drawing, sculpting, photography, fashion design, and even film to name a few. To make the arts more diverse, there is also the technology component. If you scored high in technology and art, you might enjoy a career in multimedia.</td>
                                                                        <td>courses in art, theater, music, and computers can help prepare you for college courses.</td>
                                                                        <td>Theatre actor, architect, archivist, historic conservationist, artist, choreographer, cosmetologist, curator, dancer, event planner, fashion designer, film editor, graphic designer, interior designer, multimedia artist, music director, musician, photographer, producer or director, set designer, singer, video game designer, Fine Arts Specialist,</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Business</b></td>
                                                                        <td>The competitive field looks for more in their business hires; more know-how, more abilities, and more potential. The baseline skills for a businessman to be successful include, communication skills, organization, effective planning and execution, supervisory abilities and management, problem solving and the ability to build strong relationships. If you relate to most or all of these characteristics then  any of the specialized fields of business management are best suited for you.</td>
                                                                        <td>courses in math/commercial math, economics, English along with computer course would be helpful. Consider working on your public speaking skill as well. If you are able, consider joining a school club and taking a leadership role.
                                                                        </td>
                                                                        <td>entrepreneur, executive, fundraiser, Consultant, Project management professional, labor relations specialist, logistician, market research analyst, property manager, public relations, realtor, sales, statistician, supply chain manager, wholesale retail buyers, advertising sales agent, compensation analyst, economist.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Communications</b></td>
                                                                        <td>Communication is virtually impossible to ignore; it is a way that people share or exchange important information or ideas in addition to providing entertainment to consumers. This career field encompasses face-to-face communications as well as verbal, written, and even broadcasted media. There are career opportunities that are behind the scenes and others where you will be in the public eye.
                                                                        </td>
                                                                        <td>computer courses and public speaking may be helpful to prepare you for college. You may also benefit from art and English courses. There are various ways to communicate, so practice how to deliver various messages in a visual, written, and oral way. Learning sign language and another language can also be helpful!</td>
                                                                        <td>marketing and advertising, Journalist, sales, public relation specialist, fundraiser, technical writer, librarian, reporter, and interpreter/translator, Broadcast/ TV professional, editor</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Culinary</b></td>
                                                                        <td>The hospitality industry entails a number of professionals working in different settings. Executive Chefs, Sous Chefs, Banquet Chefs, Pastry Chefs, Food Production Managers, Institutional Food Service Providers, Dietary Managers, etc are some of the possible opportunities that are open to you after a degree in culinary arts.  The intent of your education will be to amplify your innate abilities of senses; sight, sound, smell, taste, and touch that will help expand your repertoire, enhance your in classical culinary technique and kitchen skills
                                                                        </td>
                                                                        <td>Chemistry, business, math, and art classes are all helpful to prepare you for culinary school.</td>
                                                                        <td>baker, chef, pastry chef, food scientist, and food service Manager ,Hospitality
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Education</b></td>
                                                                        <td>There are a lot of different roles in education, requiring different skills. These include communication that might be verbal, written, or via any other route from practical demonstrations to artistic interpretation, patience to tackle with challenging tasks, being creative; finding novel and enjoyable ways to achieve your goals and being dedicated and organized in your approach. </td>
                                                                        <td>concentrating on core academic classes are beneficial if considering teaching younger students. If interested in teaching a specific subject area however, it is beneficial to take as many elective courses in that field as possible. Also consider learning a second language and sign language. This skill may be extremely useful in the setting you wish to work.</td>
                                                                        <td>Preschool Teacher, Elementary School Teacher, Middle School Teacher, High School Teacher, Special Needs Teacher, GED Teacher, Postsecondary Teacher, College Professor, Guidance Counselor, Librarian, Tutor, Teacher's Aid, Instructional Designer, Career Advisor, Training Developer, Training Manager, Instructional Designer, Distance Learning Coordinator, and Corporate Trainer.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <b>Engineering</b>
                                                                        </td>
                                                                        <td><p>Engineering is a blend of science, technology, and math so engineers can create or design innovative machines, structures, and technology. If you enjoy math, science, and technology, and are curious about how things work, a career in engineering may be a good fit!</p>
                                                                            <p>There are many types of engineers and the career field varies by their specialty. For example, you have aerospace, agriculture, biomedical, chemical, civil, computer, electrical, environmental, geological, health and safety, locomotive, marine, material, mechanical, nuclear, petroleum, and sales engineers, and this doesn't even cover it all!</p>
                                                                            <p>If you scored over 60% on this career test in engineering, you likely enjoy solving problems. Friends and family may describe you as analytical and curious. Do you find yourself wondering how a gadget works, how a plane flies, how to fix a car, or construct a building? If so, you may consider researching a career in engineering.</p>
                                                                            <p>Engineers solve real-world problems. They design product improvements, develop new prototypes, test new materials, and can even save lives by improving safety. Engineers are vital in all industries, so there are various types of engineers. Every engineer has a specialty, from aerospace, mechanics, electrical, materials, environmental, agricultural, biomedical, and many more. Do your research, and you'll discover the engineering career that's right for you.</p>
                                                                            <p>Successful engineers learn to pay close attention to detail, be creative problem solvers, document their work, and communicate effectively. They tend to work on cross-functional teams, so collaboration and teamwork is vital. Engineers use advanced math, science, and technology daily.</p></td>
                                                                        <td>Math, science, and technology are challenging courses. Keep up the effort. Once you grasp the fundamentals, you may find you enjoy them. If able, take trigonometry, calculus, and physics before graduation. Once in college studying to become an engineer, you'll want to gain hands-on experience before you graduate. When researching college programs, ask about their internship and job placement programs.</td>
                                                                        <td>Big Data Engineer, Mining Safety Engineer, Biomedical engineer, civil engineer, chemical engineer, computer engineer, geological engineer, health & safety engineer, construction engineer, marine engineer, naval architect, material engineer, mechanical engineer, petroleum engineer, nuclear engineer, robotics engineer, aerospace engineer, satellite engineer, electrical engineer, environmental engineer, agriculture engineer, aeronautical engineer, space engineer, automotive engineer</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Finance</b></td>
                                                                        <td>Many people may only think of accountants or investors when thinking of finance careers. However, there are so many more options that you may be interested in. There are appraisers who basically estimate the value of a real estate and other high value items. Budget analysts will help businesses and individuals set a budget and get their finances on track. There are also careers where you get to buy and purchase products and even be in the negotiation and contract process</td>
                                                                        <td>consider taking courses in business and math. It’s also beneficial to take any computer courses your school may offer.
                                                                        </td>
                                                                        <td>
                                                                            accountant, actuary, appraiser, auditor, brokerage clerk, budget analyst, buyer and purchasing agent, claims adjuster, cost estimator, economist, financial advisor, financial analyst, financial examiner, insurance underwriter, loan officer, real estate appraiser, and revenue agent.
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Healthcare</b></td>
                                                                        <td><p>Medical professionals help the sick, empower people to make positive changes, educate communities to stay healthy, and research new vaccines and treatments. They may not be miracle workers, but they sure come close. They save lives.<p>
                                                                            <p>Healthcare workers must have a blend of stamina, determination, and critical thinking to complement their caring nature. However, one of the toughest decisions all healthcare professionals must make is choosing their medical specialty. There are hundreds of medical careers to choose from.</p></td>
                                                                        <td>Consider taking courses in Anatomy, Biology (and human biology), Chemistry,
                                                                            Math, Physics, and Nutrition. Put energy into these subjects so you can be competitive when applying for acceptance into college Medical Programs.</td>
                                                                        <td>If you want to start your career as soon as possible, research certification programs that require a few months of training, such as Nursing Assistant, Phlebotomy Technician, and Medical Coder and Biller. Other programs take two years to complete, such as imaging technicians, vet technicians, surgical technicians, registered nurses, physical therapy assistants, and dental hygienists. If you can commit four or more years to your education, you can unlock significantly more career options.
                                                                            Doctors, Nursing, Clinical technician, researcher, dietician, therapist, medical science, manager, nuclear medicine, nutritionist, radiologist, dentist,</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Legal</b></td>
                                                                        <td>Legal careers are crucial to ensure fairness in a judicial system. There are a wide variety of legal areas one can focus on as well. Examples include criminal law, constitutional law, property law, civil rights law, family or juvenile justice law, corporate law, copyright and trademark law, international law, environmental law, arbitration, and even sentencing.</td>
                                                                        <td>courses in Public Speaking, Sociology, Psychology, American Government, Criminology, Ethics, or International Studies would be helpful for you to prepare for college.</td>
                                                                        <td>Judicial clerk, barrister, lawyer, mediator or arbitrator, paralegal, legal researcher, Judge, Legislator, politician, Litigator, Solicitor, Advocate</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>
                                                                                Multimedia
                                                                            </b></td>
                                                                        <td>Careers in multimedia are unique in that you must be tech savvy, good with written and verbal communication, and an artist. If you scored high in this area, then you must be interested in all three. Multimedia artists have to learn many skillsets to do their job and there is also opportunity to move laterally across different types of positions as you learn an additional skill.</td>
                                                                        <td>Computer Course and Art Course</td>
                                                                        <td>graphic design, multimedia artist, video game designer, website developer.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <b>Public Service</b>
                                                                        </td>
                                                                        <td>Public service careers are crucial for the protection and assistance to members of our society. Careers may include fighting fires, tending to emergencies, investigating fraudulent claims, providing security, and even planning for natural disasters.</td>
                                                                        <td>courses in first aid, CPR, sociology, psychology, and even learning a second language can be helpful to prepare you for college. Some of these careers require you to be in good physical shape as well, so playing on your school’s sports teams or taking up an activity outside of school that keeps you fit and active is a plus.</td>
                                                                        <td>Government Officer, Politics, Legislator, Forensic Sciences Engineer, Police services, Investigation officer, Security services, transportation service, Fire services,</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Science</b></td>
                                                                        <td>The field of Science is vast, which opens a multitude of career opportunities. Some of these include planning and conducting experiments, recording and analyzing data, carrying out fieldwork, writing research papers, reports, reviews and summaries, etc. If you are a dedicated person with strong scientific and numerical skills, teamwork and interpersonal skills with meticulous attention to detail and accuracy, then the vast array with a degree in any of the Science subjects would be a great fit.</td>
                                                                        <td>Working hard to learn concepts in your math and science courses is important. Taking any additional science course as an elective (if able) is also helpful. Science and math go hand-in-hand, so studying both will help prepare you for college.</td>
                                                                        <td>Agriculture, Architect, Astronomer, Biochemist, Biofuels, Biologist, Biophysicist, Cartographer, Chemist, Conservation Scientist, Engineer, Food Scientist, Genetic Counselor, Geographer, Geologist, Herpetologist, Hydrologist, Marine Biologist, Microbiologist, Oceanographer, Physicist, Seismologist, Zookeeper, Zoologist.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>
                                                                                Social Science
                                                                            </b></td>
                                                                        <td>Social science is a broad category that involves the social interactions and relationships among individuals and society. There are a variety of career opportunities that differ. These careers include helping those cope through life events or mental health issues to careers that contribute to research. You can also find careers that analyze world events and cultures. If you are the type of person that likes to observe human interaction, wonder why humans behave the way we do, and learn about other cultures, a career in social science may be a great fit!</td>
                                                                        <td>Sociology, Psychology, World History, Political Science, and Ethics could form a good base for college. These courses help you learn about human behavior while also teaching you about other cultures.</td>
                                                                        <td>Anthropologist, Archeologist, Archivist, Counselor, Music Therapist, Organizational Psychologist, Human Resource,  Psychologist, Political Scientist, Sociologist, and Therapist</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>
                                                                                Technology
                                                                            </b></td>
                                                                        <td>There are technology careers in healthcare, art, and even business. For example, if you scored high in technology and like art, you may find yourself leaning to a degree in multimedia arts and visual effects. Designing for mobile technology is also in demand due to companies competing for customers online.</td>
                                                                        <td>any computer courses to write code, having a strong math foundation is beneficial so take all the math classes. You may also want to use technology to create apps, websites, or graphic design</td>
                                                                        <td>computer engineer, computer installation tech, computer programmer, computer research analyst, computer support specialist, database administrator, IT project manager, network administrator, network architect, security analyst, software developer, and website developer.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="">
                <?php
                $url = site_url() . '/wp-content/plugins/3edge-reports/';
                ?>
                                                                <span>
                                                                    <h4>STEM Venn Diagram
                                                                    </h4>
                                                                </span>
                                                                <p>STEM stands for Science, Technology, Engineering, and Math. Many STEM careers share aspects of other STEM careers. For instance, many math careers use technology, science relies on math, and engineering careers often use science, technology, and math. If you scored high in Science, Technology, Engineering, or Math (Math is the ‘Finance’ category on your results), you can use the following STEM Career Venn Diagram to explore careers you may be interested in. You can research careers from the ‘Careers’ page in the navigation. Many careers contain helpful career videos you can watch as well.</p>
                                                                <p>
                                                                    <img src="<?php echo $url; ?>Picture1.png" alt="STEM Venn Diagram">
                                                                </p>
                                                            </div>
                                                        </div>
                <?php
            }
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
        ?>
                </div>
        <?php
    }
    ?>
    <?php
    $chart = create_a_pie_chart($cat_6_max, $cat_7_max, $cat_8_max, $cat_9_max, $cat_10_max);
    echo $chart;
    ?>
        </div>
    </div>
    <?php
    //ob_get_clean();
}

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
    if (empty($exams_6) && empty($exams_7) && empty($exams_8) && empty($exams_9) && empty($exams_10)) 
    {
        $data .= '<div class="">
					<p>Please Complete all your quizzes to view your result.</p>
				</div>';
    } 
    else 
    {
        $data .= '<div class="">';
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
												<div class="panel panel-warning">
													<div class="panel-heading">
														<div class="panel-title">
															<h3 style="background-color: #f33333; padding: 0px 15px; margin-top: 15px; color:#ffffff;">CAREER POSSIBILITES ASSESSMENT– STUDENT REPORT FOR COUNSELOR
															</h3>
															<div style="margin-top: 20px;">
																<p style="padding: 5px; border-radius: 5px;"></p>
															</div>
														</div>
													</div>
												</div>';
                                foreach ($quizzes as $key => $quiz) {
                                    $question_cat = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 0");
                                    foreach ($question_cat as $key => $categories) {
                                        if ($quiz->name == 'Personality Survey' && $categories->name == 'Personality Type') {
                                            $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 1");
                                        }
                                        if ($quiz->name == 'Ability Survey' && $categories->name == 'Ability Type') {
                                            $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 4");
                                        }
                                        if ($quiz->name == 'Interests Survey' && $categories->name == 'Interest Type') {
                                            $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 5");
                                        }
                                        if ($quiz->name == 'Multiple Intellegence Survey' && $categories->name == 'Multiple Intelligences Type') {
                                            $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 6");
                                        }
                                        if ($quiz->name == 'Learning Style Survey' && $categories->name == 'Learning Style Type') {
                                            $child_categories = $wpdb->get_results("SELECT * FROM " . $prefix . "watupro_qcats where parent_id = 7");
                                        }
                                    }
                                    $exam_taken = $wpdb->get_row("SELECT * FROM " . $prefix . "watupro_taken_exams where user_id = " . $user_id . " and exam_id = " . $quiz->ID . "");
                                    $questions_answered = $wpdb->get_results("SELECT *, SUM(answer.points) as total_points FROM " . $prefix . "watupro_student_answers as answer inner join " . $prefix . "watupro_question as question on answer.question_id = question.ID where answer.user_id = " . $user_id . " and answer.exam_id = " . $exam_taken->exam_id . " and answer.taking_id = " . $exam_taken->ID . " group by question.cat_id order by cat_id ASC ");
                                        if ($quiz->ID == 6) {
                                            $data .= '<span>
                                            <h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
                                            </h4>
                                            </span>
                                            <p><b>Personality</b> is basically “who you are�?. It is very basic to everyone; nobody can change his/her personality entirely though modifications can always be made with time. It plays a vital role in choosing the right career.
                                            </p>
                                            <span>
                                            <p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                            </span>';
                                        }
                                        if ($quiz->ID == 7) {
                                            $data .= '<span>
                                        	<h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
                                        	</h4>
                                            </span>
                                            <p><b>Ability</b> refers to possessing more of a natural talent for a task, even if that talent is not yet fully developed. Whereas ability indicates something a person is able to do well, specifically ‘what you are good at’. One can develop an ability to do something without the natural aptitude for it, through hard work and adaptation.
                                            </p>
                                            <span>
                                            	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                            </span>';
                                        }
                                        if ($quiz->ID == 8) {
                                            $data . '<span>
                                            	<h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
                                            	</h4>
                                            </span>
                                            <p><b>Career interest</b>This assessment analysis helps you to judge the most appropriate career for you based on ‘What are your interests’ among the various choices available.
                                            </p>
                                            <span>
                                            	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                            </span>';
                                        }
                                        if ($quiz->ID == 9) {
                                            $data . '<span>
                                            	<h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
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
                                            <p>Interpersonal intelligence is the ability to understand and interact effectively with others. It involves effective verbal and nonverbal communication, the ability to note distinctions among others, sensitivity to the moods and temperaments of others, and the ability to entertain multiple perspectives. Teachers, social workers, actors, and politicians all exhibit interpersonal intelligence. Young adults with this kind of intelligence are leaders among their peers, are good at communicating, and seem to understand others’ feelings and motives.
                                            </p>
                                            <p><h4><b>Bodily-Kinesthetic Intelligence</b></h4></p>
                                            <p>Bodily kinesthetic intelligence is the capacity to manipulate objects and use a variety of physical skills. This intelligence also involves a sense of timing and the perfection of skills through mind–body union. Athletes, dancers, surgeons, and crafts people exhibit well-developed bodily kinesthetic intelligence.
                                            </p>
                                            <p><h4><b>Linguistic Intelligence</b></h4></p>
                                            <p>Linguistic intelligence is the ability to think in words and to use language to express and appreciate complex meanings. Linguistic intelligence allows us to understand the order and meaning of words and to apply meta-linguistic skills to reflect on our use of language. Linguistic intelligence is the most widely shared human competence and is evident in poets, novelists, journalists, and effective public speakers. Young adults with this kind of intelligence enjoy writing, reading, telling stories or doing crossword puzzles.
                                            </p>
                                            <p><h4><b>Intra-personal Intelligence</b></h4></p>
                                            <p>Intra-personal intelligence is the capacity to understand oneself and one’s thoughts and feelings, and to use such knowledge in planning and directing one’s life. Intra-personal intelligence involves not only an appreciation of the self, but also of the human condition. It is evident in psychologist, spiritual leaders, and philosophers. These young adults may be shy. They are very aware of their own feelings and are self-motivated.
                                            </p>
                                            <p><h4><b>Spatial Intelligence</b></h4></p>
                                            <p>Spatial intelligence is the ability to think in three dimensions. Core capacities include mental imagery, spatial reasoning, image manipulation, graphic and artistic skills, and an active imagination. Sailors, pilots, sculptors, painters, and architects all exhibit spatial intelligence. Young adults with this kind of intelligence may be fascinated with mazes or jigsaw puzzles, or spend free time drawing or daydreaming.
                                            </p>
                                            <span>
                                            	<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
                                            </span>';
                                        }
                                        if ($quiz->ID == 10) {
                                            $data .= ' <span>
                                        		<h4 style="background-color:#f33333; padding: 5px; border-radius: 5px; color: #ffffff;">Analysis of ' . $quiz->name . '
                                        		</h4>
                                        	</span>
                                        	<p><h4><b>Kinesthetic Learner- Learning by Doing</b></h4></p>
                                        	<p>learners need to touch or experience something in order to remember it. If you fall into this classification, you may have faced greater challenges in the academic environment. Most formal learning is not set up to include physical movement and activities. Nevertheless, if this is your strength, you could benefit from the following activities: making models, visiting museums, giving a demonstration, participating in a simulation, and studying on the floor, bed or any place that feels comfortable. You can also relate to physical activities, direct involvement, hands-on activities, displays, demonstrations, and experiments. 
                                        	</p>
                                        	<p><h4><b>Visual Learner – Learning by Seeing</b></h4></p>
                                        	<p>Visual learners need to see something in order to learn best. if you fall into this category, you will benefit from the following activities: copying from the board, writing and rewriting notes, highlighting key information in the textbook, making mind maps, using flashcards, and watching videos. You can also learn easily from graphics, posters, charts, maps, and photographs. 
                                        	</p>
                                        	<p><h4><b>Auditory Learner – Learning by Listening</b></h4></p>
                                        	<p>Auditory learners need to hear something in order to learn well. If you fall into this group, doing the following will help you learn more easily: pay attention in class, make recordings of learning material, repeat facts with your eyes closed, ask questions, explain the subject matter to another student, record lectures, participate in group discussions, and study in a quiet environment. Auditory learners like to listen to audio books, lectures, debates, and music
                                        	</p>
                                        	<span>
                                        		<p style="background-color: #bbbbbb; padding: 5px 10px; border-radius: 5px;">Graphical representation </p>
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
                                        if ($flag == 'true') 
                                        {
                                            if ($quiz->ID == 6) {
                                                $data .= '<div id="columnChartForID6" style="height: 360px; width: 100%;"></div>';
                                                $data .= '<div id="123ab"><img src="" id="chart_66"></div>';
                                            }
                                            if ($quiz->ID == 7) {
                                                $data .= '<div id="columnChartForID7" style="height: 360px; width: 100%;"></div>';
                                                $data .= '<img src="" id="chart_77">';
                                            }
                                            if ($quiz->ID == 8) {
                                                $data .= '<div id="columnChartForID8" style="height: 360px; width: 100%;"></div>';
                                                $data .= '<img src="" id="chart_88">';
                                            }
                                            if ($quiz->ID == 9) {
                                                $data .= '<div id="columnChartForID9" style="height: 360px; width: 100%;"></div>';
                                                $data .= '<img src="" id="chart_99">';
                                            }
                                            if ($quiz->ID == 10) {
                                                $data .= '<div id="columnChartForID10" style="height: 360px; width: 100%;"></div>';
                                                $data .= '<img src="" id="chart_100">';
                                            }
                                        } else {
                                            $total_pointss = 0;
                                            $data .= '<div class="bar" style="--bar-value:' . $total_pointss . '%" data-name="' . $cats->name . ' (' . $total_pointss . '%)" title="' . $cats->name . ' ' . $total_pointss . '%">';
                                            $data .= '</div>';
                                        }
                                    }
                                    $data .= '</div>
                        													</div>';
    if ($quiz->ID == 6) {
        $data .= '<p><h4><b>Objective</b></h4></p>
    	<p>Objective persons enjoy working with tools, equipment, instruments and machinery. They like to repair and/or fabricate things from various materials according to specifications and using established techniques. Objective persons are interested in finding out how things operate and how they are built.
    	</p>
    	<p><h4><b>Social</b></h4></p>
    	<p>Individuals who are a social are dedicated leaders, humanistic, responsible and supportive. They use feelings, words and ideas to work with people rather than physical activity to do things. They enjoy closeness, sharing, groups, unstructured activity and being in charge. Social persons like dealing with people. They enjoy caring for and assisting others in identifying their needs and solving their concerns. Social persons like working and co-operating with others. They prefer to be involved in work that requires interpersonal contact..
    	</p>
    	<p><h4><b>Innovative</b></h4></p>
    	<p>Innovative persons like to explore things in depth and arrive at solutions to problems by experimenting. They are interested in initiating and creating different ways to solve questions and present information. They enjoy scientific subjects. Innovative persons prefer to be challenged with new and unexpected experiences. They adjust to change easily.
    	</p>
    	<p><h4><b>Methodical</b></h4></p>
    	<p>Methodical persons like to have clear rules and organized methods to guide their activities. They prefer working under the direction or supervision of others according to given instructions, or to be guided by established policies and procedures. Methodical persons like to work on one thing until it is completed. They enjoy following a set routine and prefer work that is free from the unexpected.
    	</p>
    	<p><h4><b>Directive</b></h4></p>
    	<p>Directive persons like to take charge and control situations. They like to take responsibility for projects that require planning, decision making and coordinating the work of others. They are able to give direction and instructions easily. They enjoy organizing their own activities. They see themselves as independent and self-directing.
    	</p>';
    }
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
													Ability to think visually about geometric forms and comprehend the two-dimensional representation of three dimensional objects; to recognize the relationships resulting from the movement of objects in space. May be used in such tasks as blueprint reading and in solving geometry problems. Frequently described as the ability to "visualize" objects of two or three dimensions.
												</p>
												<p>
													<h4><b>Finger Dexterity</b></h4>
												</p>
												<p>
													Ability to demonstrate tasks that involve coordination of small muscles, in movements—usually involving the synchronization of hands and fingers—with the eyes.
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
													It is an ability, commonly referred to as the "G" score, defined as the ability to "catch on" or understand instructions and underlying principles with an ability to reason out and make judgements.
												</p>';
    }
    if ($quiz->ID == 8) {
        $data .= '<div class="">
													<table>
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
																<td><b>Art</b></td>
																<td>Art has a wide variety of career categories. You might want to consider what category of art you are interested in and then research careers based on that. For example, the performing arts includes any physical performing art such as theater (like acting), music, or dance. Literature is also considered an art as this is a way to express one-self in a creative way, such as screenwriting, poetry, or a work of fiction. Then, there is the visual arts. The visual arts include painting, drawing, sculpting, photography, fashion design, and even film to name a few. To make the arts more diverse, there is also the technology component. If you scored high in technology and art, you might enjoy a career in multimedia.</td>
																<td>courses in art, theater, music, and computers can help prepare you for college courses.</td>
																<td>Theatre actor, architect, archivist, historic conservationist, artist, choreographer, cosmetologist, curator, dancer, event planner, fashion designer, film editor, graphic designer, interior designer, multimedia artist, music director, musician, photographer, producer or director, set designer, singer, video game designer, Fine Arts Specialist,</td>
															</tr>
															<tr>
																<td><b>Business</b></td>
																<td>The competitive field looks for more in their business hires; more know-how, more abilities, and more potential. The baseline skills for a businessman to be successful include, communication skills, organization, effective planning and execution, supervisory abilities and management, problem solving and the ability to build strong relationships. If you relate to most or all of these characteristics then  any of the specialized fields of business management are best suited for you.</td>
																<td>courses in math/commercial math, economics, English along with computer course would be helpful. Consider working on your public speaking skill as well. If you are able, consider joining a school club and taking a leadership role.
																</td>
																<td>entrepreneur, executive, fundraiser, Consultant, Project management professional, labor relations specialist, logistician, market research analyst, property manager, public relations, realtor, sales, statistician, supply chain manager, wholesale retail buyers, advertising sales agent, compensation analyst, economist.</td>
															</tr>
															<tr>
																<td><b>Communications</b></td>
																<td>Communication is virtually impossible to ignore; it is a way that people share or exchange important information or ideas in addition to providing entertainment to consumers. This career field encompasses face-to-face communications as well as verbal, written, and even broadcasted media. There are career opportunities that are behind the scenes and others where you will be in the public eye.
																</td>
																<td>computer courses and public speaking may be helpful to prepare you for college. You may also benefit from art and English courses. There are various ways to communicate, so practice how to deliver various messages in a visual, written, and oral way. Learning sign language and another language can also be helpful!</td>
																<td>marketing and advertising, Journalist, sales, public relation specialist, fundraiser, technical writer, librarian, reporter, and interpreter/translator, Broadcast/ TV professional, editor</td>
															</tr>
															<tr>
																<td><b>Culinary</b></td>
																<td>The hospitality industry entails a number of professionals working in different settings. Executive Chefs, Sous Chefs, Banquet Chefs, Pastry Chefs, Food Production Managers, Institutional Food Service Providers, Dietary Managers, etc are some of the possible opportunities that are open to you after a degree in culinary arts.  The intent of your education will be to amplify your innate abilities of senses; sight, sound, smell, taste, and touch that will help expand your repertoire, enhance your in classical culinary technique and kitchen skills
																</td>
																<td>Chemistry, business, math, and art classes are all helpful to prepare you for culinary school.</td>
																<td>baker, chef, pastry chef, food scientist, and food service Manager ,Hospitality
																</td>
															</tr>
															<tr>
																<td><b>Education</b></td>
																<td>There are a lot of different roles in education, requiring different skills. These include communication that might be verbal, written, or via any other route from practical demonstrations to artistic interpretation, patience to tackle with challenging tasks, being creative; finding novel and enjoyable ways to achieve your goals and being dedicated and organized in your approach. </td>
																<td>concentrating on core academic classes are beneficial if considering teaching younger students. If interested in teaching a specific subject area however, it is beneficial to take as many elective courses in that field as possible. Also consider learning a second language and sign language. This skill may be extremely useful in the setting you wish to work.</td>
																<td>Preschool Teacher, Elementary School Teacher, Middle School Teacher, High School Teacher, Special Needs Teacher, GED Teacher, Postsecondary Teacher, College Professor, Guidance Counselor, Librarian, Tutor, Teachers Aid, Instructional Designer, Career Advisor, Training Developer, Training Manager, Instructional Designer, Distance Learning Coordinator, and Corporate Trainer.</td>
															</tr>
															<tr>
																<td>
																	<b>Engineering</b>
																</td>
																<td><p>Engineering is a blend of science, technology, and math so engineers can create or design innovative machines, structures, and technology. If you enjoy math, science, and technology, and are curious about how things work, a career in engineering may be a good fit!</p>
																<p>There are many types of engineers and the career field varies by their specialty. For example, you have aerospace, agriculture, biomedical, chemical, civil, computer, electrical, environmental, geological, health and safety, locomotive, marine, material, mechanical, nuclear, petroleum, and sales engineers, and this doesnt even cover it all!</p>
																<p>If you scored over 60% on this career test in engineering, you likely enjoy solving problems. Friends and family may describe you as analytical and curious. Do you find yourself wondering how a gadget works, how a plane flies, how to fix a car, or construct a building? If so, you may consider researching a career in engineering.</p>
																<p>Engineers solve real-world problems. They design product improvements, develop new prototypes, test new materials, and can even save lives by improving safety. Engineers are vital in all industries, so there are various types of engineers. Every engineer has a specialty, from aerospace, mechanics, electrical, materials, environmental, agricultural, biomedical, and many more. Do your research, and youll discover the engineering career thats right for you.</p>
																<p>Successful engineers learn to pay close attention to detail, be creative problem solvers, document their work, and communicate effectively. They tend to work on cross-functional teams, so collaboration and teamwork is vital. Engineers use advanced math, science, and technology daily.</p></td>
																<td>Math, science, and technology are challenging courses. Keep up the effort. Once you grasp the fundamentals, you may find you enjoy them. If able, take trigonometry, calculus, and physics before graduation. Once in college studying to become an engineer, youll want to gain hands-on experience before you graduate. When researching college programs, ask about their internship and job placement programs.</td>
																<td>Big Data Engineer, Mining Safety Engineer, Biomedical engineer, civil engineer, chemical engineer, computer engineer, geological engineer, health & safety engineer, construction engineer, marine engineer, naval architect, material engineer, mechanical engineer, petroleum engineer, nuclear engineer, robotics engineer, aerospace engineer, satellite engineer, electrical engineer, environmental engineer, agriculture engineer, aeronautical engineer, space engineer, automotive engineer</td>
															</tr>
															<tr>
																<td><b>Finance</b></td>
																<td>Many people may only think of accountants or investors when thinking of finance careers. However, there are so many more options that you may be interested in. There are appraisers who basically estimate the value of a real estate and other high value items. Budget analysts will help businesses and individuals set a budget and get their finances on track. There are also careers where you get to buy and purchase products and even be in the negotiation and contract process</td>
																<td>consider taking courses in business and math. It’s also beneficial to take any computer courses your school may offer.
																</td>
																<td>
																	accountant, actuary, appraiser, auditor, brokerage clerk, budget analyst, buyer and purchasing agent, claims adjuster, cost estimator, economist, financial advisor, financial analyst, financial examiner, insurance underwriter, loan officer, real estate appraiser, and revenue agent.
																</td>
															</tr>
															<tr>
																<td><b>Healthcare</b></td>
																<td><p>Medical professionals help the sick, empower people to make positive changes, educate communities to stay healthy, and research new vaccines and treatments. They may not be miracle workers, but they sure come close. They save lives.<p>
																<p>Healthcare workers must have a blend of stamina, determination, and critical thinking to complement their caring nature. However, one of the toughest decisions all healthcare professionals must make is choosing their medical specialty. There are hundreds of medical careers to choose from.</p></td>
																<td>Consider taking courses in Anatomy, Biology (and human biology), Chemistry,
																Math, Physics, and Nutrition. Put energy into these subjects so you can be competitive when applying for acceptance into college Medical Programs.</td>
																<td>If you want to start your career as soon as possible, research certification programs that require a few months of training, such as Nursing Assistant, Phlebotomy Technician, and Medical Coder and Biller. Other programs take two years to complete, such as imaging technicians, vet technicians, surgical technicians, registered nurses, physical therapy assistants, and dental hygienists. If you can commit four or more years to your education, you can unlock significantly more career options.
																Doctors, Nursing, Clinical technician, researcher, dietician, therapist, medical science, manager, nuclear medicine, nutritionist, radiologist, dentist,</td>
															</tr>
															<tr>
																<td><b>Legal</b></td>
																<td>Legal careers are crucial to ensure fairness in a judicial system. There are a wide variety of legal areas one can focus on as well. Examples include criminal law, constitutional law, property law, civil rights law, family or juvenile justice law, corporate law, copyright and trademark law, international law, environmental law, arbitration, and even sentencing.</td>
																<td>courses in Public Speaking, Sociology, Psychology, American Government, Criminology, Ethics, or International Studies would be helpful for you to prepare for college.</td>
																<td>Judicial clerk, barrister, lawyer, mediator or arbitrator, paralegal, legal researcher, Judge, Legislator, politician, Litigator, Solicitor, Advocate</td>
															</tr>
															<tr>
																<td><b>
																	Multimedia
																</b></td>
																<td>Careers in multimedia are unique in that you must be tech savvy, good with written and verbal communication, and an artist. If you scored high in this area, then you must be interested in all three. Multimedia artists have to learn many skillsets to do their job and there is also opportunity to move laterally across different types of positions as you learn an additional skill.</td>
																<td>Computer Course and Art Course</td>
																<td>graphic design, multimedia artist, video game designer, website developer.</td>
															</tr>
															<tr>
																<td>
																	<b>Public Service</b>
																</td>
																<td>Public service careers are crucial for the protection and assistance to members of our society. Careers may include fighting fires, tending to emergencies, investigating fraudulent claims, providing security, and even planning for natural disasters.</td>
																<td>courses in first aid, CPR, sociology, psychology, and even learning a second language can be helpful to prepare you for college. Some of these careers require you to be in good physical shape as well, so playing on your school’s sports teams or taking up an activity outside of school that keeps you fit and active is a plus.</td>
																<td>Government Officer, Politics, Legislator, Forensic Sciences Engineer, Police services, Investigation officer, Security services, transportation service, Fire services,</td>
															</tr>
															<tr>
																<td><b>Science</b></td>
																<td>The field of Science is vast, which opens a multitude of career opportunities. Some of these include planning and conducting experiments, recording and analyzing data, carrying out fieldwork, writing research papers, reports, reviews and summaries, etc. If you are a dedicated person with strong scientific and numerical skills, teamwork and interpersonal skills with meticulous attention to detail and accuracy, then the vast array with a degree in any of the Science subjects would be a great fit.</td>
																<td>Working hard to learn concepts in your math and science courses is important. Taking any additional science course as an elective (if able) is also helpful. Science and math go hand-in-hand, so studying both will help prepare you for college.</td>
																<td>Agriculture, Architect, Astronomer, Biochemist, Biofuels, Biologist, Biophysicist, Cartographer, Chemist, Conservation Scientist, Engineer, Food Scientist, Genetic Counselor, Geographer, Geologist, Herpetologist, Hydrologist, Marine Biologist, Microbiologist, Oceanographer, Physicist, Seismologist, Zookeeper, Zoologist.</td>
															</tr>
															<tr>
																<td><b>
																	Social Science
																</b></td>
																<td>Social science is a broad category that involves the social interactions and relationships among individuals and society. There are a variety of career opportunities that differ. These careers include helping those cope through life events or mental health issues to careers that contribute to research. You can also find careers that analyze world events and cultures. If you are the type of person that likes to observe human interaction, wonder why humans behave the way we do, and learn about other cultures, a career in social science may be a great fit!</td>
																<td>Sociology, Psychology, World History, Political Science, and Ethics could form a good base for college. These courses help you learn about human behavior while also teaching you about other cultures.</td>
																<td>Anthropologist, Archeologist, Archivist, Counselor, Music Therapist, Organizational Psychologist, Human Resource,  Psychologist, Political Scientist, Sociologist, and Therapist</td>
															</tr>
															<tr>
																<td><b>
																	Technology
																</b></td>
																<td>There are technology careers in healthcare, art, and even business. For example, if you scored high in technology and like art, you may find yourself leaning to a degree in multimedia arts and visual effects. Designing for mobile technology is also in demand due to companies competing for customers online.</td>
																<td>any computer courses to write code, having a strong math foundation is beneficial so take all the math classes. You may also want to use technology to create apps, websites, or graphic design</td>
																<td>computer engineer, computer installation tech, computer programmer, computer research analyst, computer support specialist, database administrator, IT project manager, network administrator, network architect, security analyst, software developer, and website developer.</td>
															</tr>
														</tbody>
													</table>
													<div class="">
															<span>
																<h4>STEM Venn Diagram
																</h4>
															</span>
															<p>STEM stands for Science, Technology, Engineering, and Math. Many STEM careers share aspects of other STEM careers. For instance, many math careers use technology, science relies on math, and engineering careers often use science, technology, and math. If you scored high in Science, Technology, Engineering, or Math (Math is the ‘Finance’ category on your results), you can use the following STEM Career Venn Diagram to explore careers you may be interested in. You can research careers from the ‘Careers’ page in the navigation. Many careers contain helpful career videos you can watch as well.</p>
															<p>
																<img src="' . site_url() . '/wp-content/plugins/3edge-reports/Picture1.png" alt="STEM Venn Diagram">
															</p>
														</div>
												</div>';
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
    }
    $data .= create_a_pie_chart_2($cat_6_max, $cat_7_max, $cat_8_max, $cat_9_max, $cat_10_max);
    $chart_6 = columnChartForID6($cat_6_array_2[0], $cat_6_array_3[1], $cat_6_array_8[2], $cat_6_array_9[3], $cat_6_array_12[4]);
    $chart_7 = columnChartForID7($cat_7_array_13[0], $cat_7_array_14[0], $cat_7_array_15[0], $cat_7_array_16[0], $cat_7_array_17[0], $cat_7_array_18[0], $cat_7_array_19[0], $cat_7_array_20[0], $cat_7_array_21[0]);
    $chart_8 = columnChartForID8($cat_8_array_34[0], $cat_8_array_35[0], $cat_8_array_36[0], $cat_8_array_37[0], $cat_8_array_38[0], $cat_8_array_39[0], $cat_8_array_40[0], $cat_8_array_41[0], $cat_8_array_42[0], $cat_8_array_43[0], $cat_8_array_44[0], $cat_8_array_45[0], $cat_8_array_46[0], $cat_8_array_47[0]);
    $chart_9 = columnChartForID9($cat_9_array_22[0], $cat_9_array_23[0], $cat_9_array_24[0], $cat_9_array_25[0], $cat_9_array_26[0], $cat_9_array_27[0], $cat_9_array_28[0], $cat_9_array_29[0], $cat_9_array_30[0]);
    $chart_10 = columnChartForID10($cat_10_array_31[0], $cat_10_array_32[0], $cat_10_array_33[0]);
    $data .= '</div>
	</div>';
    return $data;
}
?>