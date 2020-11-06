<?php
/**
 * Template Name: Registration Page
 *
 **/
get_header();
//echo dirname(__FILE__);

?>
<style>
    .tab-second-step .row{margin:6.7rem 0; font-family:Poppins, sans-serif;}
    #regForm form, #regForm button, #regForm input, #regForm select{font-family:Poppins;}
</style>
	<div id="home-main-content" class="home-content home-page container" role="main">
	<form action="#" method="post" id="regForm" novalidate="novalidate">

<div class="tab">
<div class="row">
<div class="col-md-12">
<div class="form-head">
  <b>Student Information</b>
  </div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Complete Name</b></div>
</div>
<div class="col-md-5">
<input type="text" name="your-name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="First Name">
</div>
<div class="col-md-5">
<input type="text" name="text-374" value="" size="40" aria-invalid="false" placeholder="Last Name">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Home Address</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-218" value="" size="40" aria-invalid="false" placeholder="Street">
</div>
<div class="col-md-2">
<input type="text" name="text-219" value="" size="40" aria-invalid="false" placeholder="City">
</div>
<div class="col-md-2">
<input type="text" name="text-220" value="" size="40" aria-invalid="false" placeholder="State">
</div>
<div class="col-md-2">
<input type="text" name="text-221" value="" size="40" aria-invalid="false" placeholder="ZIP">
</div>
</div>
<div class="row">
<div class="col-md-2">
<div class="form-sub-head">
<b>Student Email</b></div>
</div>
<div class="col-md-4">
<input type="email" name="email-312" value="" size="40" aria-invalid="false" placeholder="Email-Id">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Home Phone</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-222" value="" size="40" aria-invalid="false" placeholder="Phone No">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>First Language</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-223" value="" size="40" aria-invalid="false" placeholder="First Language">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Mobile Phone</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-224" value="" size="40" aria-invalid="false" placeholder="Mobile No">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Gender</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-225" value="" size="40" aria-invalid="false" placeholder="Gender">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Birth Place</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-226" value="" size="40" aria-invalid="false" placeholder="Birth Place">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Ethnicity</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-227" value="" size="40" aria-invalid="false" placeholder="Ethnicity">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Birth Date</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-228" value="" size="40" aria-invalid="false" placeholder="Birth Date">
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-head">
<b>School Information</b>
</div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>School Name</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-229" value="" size="40" aria-invalid="false" placeholder="School Name">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Curriculum</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-230" value="" size="40" aria-invalid="false" placeholder="Curriculum">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Academic Year</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-231" value="" size="40" aria-invalid="false" placeholder="Academic Year">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Current Grades</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-232" value="" size="40"  aria-invalid="false" placeholder="Current Grades">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Predicted Grades</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-233" value="" size="40" aria-invalid="false" placeholder="Predicted Grades">
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-head">
<b>Test Preparations Information (The Ones You Have Taken)</b>
</div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>SAT/ACT</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-234" value="" size="40" aria-invalid="false" placeholder="SAT/ACT">
</div>
<div class="col-md-3">
<input type="text" name="text-235" value="" size="40" aria-invalid="false" placeholder="Date">
</div>
<div class="col-md-3">
<input type="text" name="text-236" value="" size="40" aria-invalid="false" placeholder="Score">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>IELTS/TOEFL</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-237" value="" size="40" aria-invalid="false" placeholder="IELTS/TOEFL/TESL/Pearson Test Score">
</div>
<div class="col-md-3">
<input type="text" name="text-238" value="" size="40" aria-invalid="false" placeholder="Date">
</div>
<div class="col-md-3">
<input type="text" name="text-239" value="" size="40" aria-invalid="false" placeholder="Score">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>UKCAT/BMAT</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-240" value="" size="40" aria-invalid="false" placeholder="UKCAT/BMAT/LNAT/LSAT Score">
</div>
<div class="col-md-3">
<input type="text" name="text-241" value="" size="40" aria-invalid="false" placeholder="Date">
</div>
<div class="col-md-3">
<input type="text" name="text-242" value="" size="40" aria-invalid="false" placeholder="Score">
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-head">
<b>Additional Information</b>
</div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Course Interested</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-243" value="" size="40" aria-invalid="false" placeholder="Course Interested">
</div>
<div class="col-md-2">
<div class="form-sub-head">
<b>Country Interested</b></div>
</div>
<div class="col-md-4">
<input type="text" name="text-244" value="" size="40" aria-invalid="false" placeholder="Country Interested">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head2">
<b>Extra-curricular Activities/<br>Internship/<br>Voluntary Work</b></div>
</div>
<div class="col-md-10">
<textarea name="your-message" cols="40" rows="10" aria-invalid="false" placeholder="Write about Extra-curricular Activities/Internship/Voluntary Work"></textarea>
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head2">
<b>Any Additional <br>Achievements<br> (If Any)</b></div>
</div>
<div class="col-md-10">
<textarea name="textarea-517" cols="40" rows="10" aria-invalid="false" placeholder="Write about Any Additional Achievements (If Any)"></textarea>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-head">
<b>Parent / Guardian Information</b>
</div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head"><b></b></div>
</div>
<div class="col-md-5">
<div class="form-sub-head"><b>Parent / Guardian - 01</b></div>
</div>
<div class="col-md-5">
<div class="form-sub-head"><b>Parent / Guardian - 02</b></div>
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Title</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-245" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Title 01">
</div>
<div class="col-md-5">
<input type="text" name="text-246" value="" size="40" aria-invalid="false" placeholder="Title 02">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>First Name</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-247" value="" size="40" aria-required="true" aria-invalid="false" placeholder="First Name">
</div>
<div class="col-md-5">
<input type="text" name="text-248" value="" size="40" aria-invalid="false" placeholder="First Name">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Last Name</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-249" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Last Name">
</div>
<div class="col-md-5">
<input type="text" name="text-250" value="" size="40" aria-invalid="false" placeholder="Last Name">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Relationship</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-251" value="" size="40"  aria-required="true" aria-invalid="false" placeholder="Relationship">
</div>
<div class="col-md-5">
<input type="text" name="text-252" value="" size="40" aria-invalid="false" placeholder="Relationship">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Home Phone</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-253" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Home Phone"></span>
</div>
<div class="col-md-5">
<input type="text" name="text-254" value="" size="40"  aria-invalid="false" placeholder="Home Phone"></span>
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Work Phone</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-255" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Work Phone">
</div>
<div class="col-md-5">
<input type="text" name="text-256" value="" size="40" aria-invalid="false" placeholder="Work Phone">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Mobile</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-257" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Mobile No.">
</div>
<div class="col-md-5">
<input type="text" name="text-258" value="" size="40" aria-invalid="false" placeholder="Mobile No.">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b>Email Address</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-259" value="" size="40"  aria-required="true" aria-invalid="false" placeholder="Email Id">
</div>
<div class="col-md-5">
<input type="text" name="text-260" value="" size="40" aria-invalid="false" placeholder="Email Id">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head3">
<b>Home<br> Address</b></div>
</div>
<div class="col-md-5">
<input type="text" name="text-261" value="" size="40" aria-invalid="false" placeholder="City"><br>
<input type="text" name="text-262" value="" size="40" aria-invalid="false" placeholder="State"><br>
<input type="text" name="text-263" value="" size="40" aria-invalid="false" placeholder="ZIP">
</div>
<div class="col-md-5">
<input type="text" name="text-264" value="" size="40" aria-invalid="false" placeholder="City"><br>
<input type="text" name="text-265" value="" size="40" aria-invalid="false" placeholder="State"><br>
<input type="text" name="text-266" value="" size="40" aria-invalid="false" placeholder="ZIP">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head">
<b></b></div>
</div>
<div class="col-md-5">
<input type="checkbox" name="checkbox-691[]" value="Send Copy On This Address"><span class="wpcf7-list-item-label">Send Copy On This Address</span>
</div>
<div class="col-md-5">
<span class="wpcf7-list-item first last"><input type="checkbox" name="checkbox-692[]" value="Send Copy On This Address"><span class="wpcf7-list-item-label">Send Copy On This Address</span></span>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-head1">
<b></b></div>
</div>
</div>
<hr>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head2">
<b>Expectations from<br> the Counseling<br> Session</b></div>
</div>
<div class="col-md-10">
<textarea name="textarea-518" cols="40" rows="10" aria-invalid="false" placeholder="Expectations from the Counseling Session"></textarea>
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head4">
<b>How Did You Hear About Us?</b></div>
</div>
<div class="col-md-5">
<select name="menu-39" class="wpcf7-form-control wpcf7-select select2-hidden-accessible" aria-invalid="false" multiple="" tabindex="-1" aria-hidden="true"><option value="">---</option><option value="Internet">Internet</option><option value="Social Media(Facebook,Twitter,Instagram,etc)">Social Media(Facebook,Twitter,Instagram,etc)</option><option value="Search Engines(Google,Yahoo,etc)">Search Engines(Google,Yahoo,etc)</option><option value="Word Of Mouth">Word Of Mouth</option><option value="Print Ads and Materials">Print Ads and Materials</option></select>
</div>
<div class="col-md-5">
</div>
</div>
<div class="row ">
<div class="col-md-2">
<div class="form-sub-head5" style="background-color: #E7E7E7; height: 120px; padding-left: 15px; padding-top: 50px; border-bottom: 1px solid #9DCE41;">
<b>References </b></div>
</div>
<div class="col-md-10">
<textarea name="textarea-519" cols="40" rows="10" aria-invalid="false" placeholder="References (Please provide with Names of Prospective Students/Families and their Contact Details)"></textarea>
</div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
</div>
<p><br><br></p>
</div>
<div class="tab tab-second-step">
    <div class="row">
<div class="col-md-12">
<div class="form-head">
	<br/>
  <b>Statement</b><br/><br/>
  <b>1. This test aids to understanding overall personality, preferences and strengths - which will almost always be a mixture in each individual person.</br>
     2.  The types of intelligence that a person possesses indicates not only a persons capabilities, but also the manner or method in which they prefer to learn and develop their strengths. </br>                                                                                         
     3.  It provides absolutely pivotal and inescapable indication as to people's preferred learning styles, as well as their behavioural and working styles, and their natural strengths. </b><br/>
  <b>Select the score for each statement from the drop down menu : 1 = Mostly Disagree, 2 = Slightly Disagree, 3 = Slightly Agree, 4 = Mostly Agree</b><br/><br/>
  </div>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I like to learn more about myself</b></div>
</div>
<div class="col-md-6">
<select name="statement-1" id="statement-1" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find it easiest to solve problems when I am doing something physical</b></div>
</div>
<div class="col-md-6">
<select name="statement-2" id="statement-2" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find budgeting and managing my money easya</b></div>
</div>
<div class="col-md-6">
<select name="statement-3" id="statement-3" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find it easy to make up stories </b></div>
</div>
<div class="col-md-6">
<select name="statement-4" id="statement-4" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I have always been very co-ordinated</b></div>
</div>
<div class="col-md-6">
<select name="statement-5" id="statement-5" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>When talking to someone, I tend to listen to the words they use not just what they mean</b></div>
</div>
<div class="col-md-6">
<select name="statement-6" id="statement-6" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I enjoy cross words, word searches or other word puzzles</b></div>
</div>
<div class="col-md-6">
<select name="statement-7" id="statement-7" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I don’t like ambiguity, I like things to be clear</b></div>
</div>
<div class="col-md-6">
<select name="statement-8" id="statement-8" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I enjoy logic puzzles such as 'sudoku'</b></div>
</div>
<div class="col-md-6">
<select name="statement-9" id="statement-9" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I like to meditate</b></div>
</div>
<div class="col-md-6">
<select name="statement-10" id="statement-10" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am very interested in psychometrics (personality testing) and IQ tests</b></div>
</div>
<div class="col-md-6">
<select name="statement-11" id="statement-11" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>People behaving irrationally annoy me</b></div>
</div>
<div class="col-md-6">
<select name="statement-12" id="statement-12" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find that the music that appeals to me is often based on how I feel emotionally</b></div>
</div>
<div class="col-md-6">
<select name="statement-13" id="statement-13" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am a very social person and like being with other people</b></div>
</div>
<div class="col-md-6">
<select name="statement-14" id="statement-14" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I like to be systematic and thorough</b></div>
</div>
<div class="col-md-6">
<select name="statement-15" id="statement-15" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find graphs and charts easy to understand </b></div>
</div>
<div class="col-md-6">
<select name="statement-16" id="statement-16" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can throw things well - darts, skimming pebbles, frisbees, etc </b></div>
</div>
<div class="col-md-6">
<select name="statement-17" id="statement-17" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find it easy to remember quotes or phrases </b></div>
</div>
<div class="col-md-6">
<select name="statement-18" id="statement-18" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can always recognise places that I have been before, even when I was very young</b></div>
</div>
<div class="col-md-6">
<select name="statement-19" id="statement-19" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>When I am concentrating I tend to doodle</b></div>
</div>
<div class="col-md-6">
<select name="statement-20" id="statement-20" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I could manipulate people if I choose to</b></div>
</div>
<div class="col-md-6">
<select name="statement-21" id="statement-21" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can predict my feelings and behaviours in certain situations fairly accurately</b></div>
</div>
<div class="col-md-6">
<select name="statement-22" id="statement-22" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find mental arithmetic easy </b></div>
</div>
<div class="col-md-6">
<select name="statement-23" id="statement-23" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can identify most sounds without seeing what causes them</b></div>
</div>
<div class="col-md-6">
<select name="statement-24" id="statement-24" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>At school one of may favourite subject is / was English </b></div>
</div>
<div class="col-md-6">
<select name="statement-25" id="statement-25" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I like to think through a problem carefully, considering all the consequences</b></div>
</div>
<div class="col-md-6">
<select name="statement-26" id="statement-26" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I enjoy debates and discussions</b></div>
</div>
<div class="col-md-6">
<select name="statement-27" id="statement-27" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I love adrenaline sports and scary rides</b></div>
</div>
<div class="col-md-6">
<select name="statement-28" id="statement-28" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I enjoy individual sports best</b></div>
</div>
<div class="col-md-6">
<select name="statement-29" id="statement-29" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I care about how those around me feel</b></div>
</div>
<div class="col-md-6">
<select name="statement-30" id="statement-30" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>My house is full of pictures and photographs</b></div>
</div>
<div class="col-md-6">
<select name="statement-31" id="statement-31" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I enjoy and am good at making things - I'm good with my hands</b></div>
</div>
<div class="col-md-6">
<select name="statement-32" id="statement-32" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I like having music on in the background</b></div>
</div>
<div class="col-md-6">
<select name="statement-33" id="statement-33" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find it easy to remember telephone numbers</b></div>
</div>
<div class="col-md-6">
<select name="statement-34" id="statement-34" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I set myself goals and plans for the future</b></div>
</div>
<div class="col-md-6">
<select name="statement-35" id="statement-35" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am a very tactile person</b></div>
</div>
<div class="col-md-6">
<select name="statement-36" id="statement-36" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can tell easily whether someone likes me or dislikes me</b></div>
</div>
<div class="col-md-6">
<select name="statement-37" id="statement-37" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can easily imagine how an object would look from another perspective</b></div>
</div>
<div class="col-md-6">
<select name="statement-38" id="statement-38" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I never use instructions for flat-pack furniture</b></div>
</div>
<div class="col-md-6">
<select name="statement-39" id="statement-39" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find it easy to talk to new people</b></div>
</div>
<div class="col-md-6">
<select name="statement-40" id="statement-40" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>To learn something new, I need to just get on and try it</b></div>
</div>
<div class="col-md-6">
<select name="statement-41" id="statement-41" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I often see clear images when I close my eyes</b></div>
</div>
<div class="col-md-6">
<select name="statement-42" id="statement-42" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I don’t use my fingers when I count</b></div>
</div>
<div class="col-md-6">
<select name="statement-43" id="statement-43" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I often talk to myself – out loud or in my head</b></div>
</div>
<div class="col-md-6">
<select name="statement-44" id="statement-44" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>At school I loved / love music lessons</b></div>
</div>
<div class="col-md-6">
<select name="statement-45" id="statement-45" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4" class="Statement-select">
<b>When I am abroad, I find it easy to pick up the basics of another language</b></div>
</div>
<div class="col-md-6">
<select name="statement-46" id="statement-46"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find ball games easy and enjoyable</b></div>
</div>
<div class="col-md-6">
<select name="statement-47" id="statement-47" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>My favourite subject at school is / was maths</b></div>
</div>
<div class="col-md-6">
<select name="statement-48" id="statement-48" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I always know how I am feeling</b></div>
</div>
<div class="col-md-6">
<select name="statement-49" id="statement-49" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am realistic about my strengths and weaknesses</b></div>
</div>
<div class="col-md-6">
<select name="statement-50" id="statement-50" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I keep a diary</b></div>
</div>
<div class="col-md-6">
<select name="statement-51" id="statement-51" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am very aware of other people’s body language</b></div>
</div>
<div class="col-md-6">
<select name="statement-52" id="statement-52" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>My favourite subject at school was / is art</b></div>
</div>
<div class="col-md-6">
<select name="statement-53" id="statement-53" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I find pleasure in reading </b></div>
</div>
<div class="col-md-6">
<select name="statement-54" id="statement-54" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I can read a map easily</b></div>
</div>
<div class="col-md-6">
<select name="statement-55" id="statement-55" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>It upsets me to see someone cry and not be able to help</b></div>
</div>
<div class="col-md-6">
<select name="statement-56" id="statement-56" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am good at solving disputes between others</b></div>
</div>
<div class="col-md-6">
<select name="statement-57" id="statement-57" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I have always dreamed of being a musician or singer</b></div>
</div>
<div class="col-md-6">
<select name="statement-58" id="statement-58" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I prefer team sports</b></div>
</div>
<div class="col-md-6">
<select name="statement-59" id="statement-59" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>Singing makes me feel happy</b></div>
</div>
<div class="col-md-6">
<select name="statement-60" id="statement-60" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I never get lost when I am on my own in a new place</b></div>
</div>
<div class="col-md-6">
<select name="statement-61" id="statement-61" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>If I am learning how to do something, I like to see drawings and diagrams of how it works</b></div>
</div>
<div class="col-md-6">
<select name="statement-62" id="statement-62" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>I am happy spending time alone</b></div>
</div>
<div class="col-md-6">
<select name="statement-63" id="statement-63" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row ">
<div class="col-md-6">
<div class="form-sub-head4">
<b>My friends always come to me for emotional support and advice</b></div>
</div>
<div class="col-md-6">
<select name="statement-64" id="statement-64" class="Statement-select"><option value="1">Mostly Disagree</option><option value="2">Slightly Disagree</option><option value="3"> Slightly Agree</option><option value="4">Mostly Agree</option></select>
</div>
</div>
<div class="row">
	<input type="hidden" id="Linguistic" name="Linguistic"/>
	<input type="hidden" id="LogicalMathematical" name="LogicalMathematical"/>
	<input type="hidden" id="BodilyKinesthetic" name="BodilyKinesthetic" />
	<input type="hidden" id="SpatialVisual" name="SpatialVisual" />
	<input type="hidden" id="Interpersonal" name="Interpersonal" />
	<input type="hidden" id="Interpersonal1" name="Interpersonal1" />
</div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
 
<div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
	</div><!-- #home-main-content -->


<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
jQuery('.Statement-select').on('change', function (e) {
var statement4 = jQuery('#statement-4 option:selected').val();
var statement6 = jQuery('#statement-6 option:selected').val();
var statement7 = jQuery('#statement-7 option:selected').val();
var statement18 = jQuery('#statement-18 option:selected').val();
var statement25 = jQuery('#statement-25 option:selected').val();
var statement44 = jQuery('#statement-44 option:selected').val();
var statement46 = jQuery('#statement-46 option:selected').val();
var statement54 = jQuery('#statement-54 option:selected').val();
var Linguistic = parseInt(statement4) + parseInt(statement6) + parseInt(statement7) + parseInt(statement18) + parseInt(statement25) + parseInt(statement44) + parseInt(statement46) + parseInt(statement54);

var statement3 = jQuery('#statement-3 option:selected').val();
var statement8 = jQuery('#statement-8 option:selected').val();
var statement9 = jQuery('#statement-9 option:selected').val();
var statement12 = jQuery('#statement-12 option:selected').val();
var statement15 = jQuery('#statement-15 option:selected').val();
var statement23 = jQuery('#statement-23 option:selected').val();
var statement26 = jQuery('#statement-26 option:selected').val();
var statement34 = jQuery('#statement-34 option:selected').val();
var statement43 = jQuery('#statement-43 option:selected').val();
var statement48 = jQuery('#statement-48 option:selected').val();
var LogicalMathematical = parseInt(statement3) + parseInt(statement8) + parseInt(statement9) + parseInt(statement12) + parseInt(statement15) + parseInt(statement23) + parseInt(statement26) + parseInt(statement34) + parseInt(statement43) + parseInt(statement48);

var statement2 = jQuery('#statement-2 option:selected').val();
var statement5 = jQuery('#statement-5 option:selected').val();
var statement13 = jQuery('#statement-13 option:selected').val();
var statement17 = jQuery('#statement-17 option:selected').val();
var statement28 = jQuery('#statement-28 option:selected').val();
var statement32 = jQuery('#statement-32 option:selected').val();
var statement36 = jQuery('#statement-36 option:selected').val();
var statement39 = jQuery('#statement-39 option:selected').val();
var statement41 = jQuery('#statement-41 option:selected').val();
var statement47 = jQuery('#statement-47 option:selected').val();
var BodilyKinesthetic = parseInt(statement2) + parseInt(statement5) + parseInt(statement13) + parseInt(statement17) + parseInt(statement28) + parseInt(statement32) + parseInt(statement36) + parseInt(statement39) + parseInt(statement41) + parseInt(statement47);

var statement16 = jQuery('#statement-16 option:selected').val();
var statement19 = jQuery('#statement-19 option:selected').val();
var statement20 = jQuery('#statement-20 option:selected').val();
var statement31 = jQuery('#statement-31 option:selected').val();
var statement38 = jQuery('#statement-38 option:selected').val();
var statement42 = jQuery('#statement-42 option:selected').val();
var statement53 = jQuery('#statement-53 option:selected').val();
var statement55 = jQuery('#statement-55 option:selected').val();
var statement61 = jQuery('#statement-61 option:selected').val();
var statement62 = jQuery('#statement-62 option:selected').val();
var SpatialVisual = parseInt(statement16) + parseInt(statement19) + parseInt(statement20) + parseInt(statement31) + parseInt(statement38) + parseInt(statement42) + parseInt(statement53) + parseInt(statement55) + parseInt(statement61) + parseInt(statement62);

var statement14 = jQuery('#statement-14 option:selected').val();
var statement21 = jQuery('#statement-21 option:selected').val();
var statement30 = jQuery('#statement-30 option:selected').val();
var statement37 = jQuery('#statement-37 option:selected').val();
var statement40 = jQuery('#statement-40 option:selected').val();
var statement52 = jQuery('#statement-52 option:selected').val();
var statement56 = jQuery('#statement-56 option:selected').val();
var statement57 = jQuery('#statement-57 option:selected').val();
var statement59 = jQuery('#statement-59 option:selected').val();
var statement64 = jQuery('#statement-64 option:selected').val();
var Interpersonal = parseInt(statement14) + parseInt(statement21) + parseInt(statement30) + parseInt(statement37) + parseInt(statement40) + parseInt(statement52) + parseInt(statement56) + parseInt(statement57) + parseInt(statement59) + parseInt(statement64);

var statement1 = jQuery('#statement-1 option:selected').val();
var statement10 = jQuery('#statement-10 option:selected').val();
var statement11 = jQuery('#statement-11 option:selected').val();
var statement22 = jQuery('#statement-22 option:selected').val();
var statement29 = jQuery('#statement-29 option:selected').val();
var statement35 = jQuery('#statement-35 option:selected').val();
var statement49 = jQuery('#statement-49 option:selected').val();
var statement50 = jQuery('#statement-50 option:selected').val();
var statement51 = jQuery('#statement-51 option:selected').val();
var statement63 = jQuery('#statement-63 option:selected').val();
var Interpersonal1 = parseInt(statement1) + parseInt(statement10) + parseInt(statement11) + parseInt(statement22) + parseInt(statement29) + parseInt(statement35) + parseInt(statement49) + parseInt(statement50) + parseInt(statement51) + parseInt(statement63);
jQuery('#Linguistic').val(Linguistic);
jQuery('#LogicalMathematical').val(LogicalMathematical);
jQuery('#SpatialVisual').val(SpatialVisual);
jQuery('#BodilyKinesthetic').val(BodilyKinesthetic);
jQuery('#Interpersonal').val(Interpersonal);
jQuery('#Interpersonal1').val(Interpersonal1);
});
</script>
<style>





/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
 .row {
    margin-left: -15px;
    margin-right: -15px;
}
.form-head {
    background-color: #9DCE41;
    padding-left: 20px;
    font-size: 16px;
    margin-top: 4px;
}
.form-sub-head {
    background-color: #E7E7E7;
    height: 49px;
    padding-left: 15px;
    padding-top: 14px;
    border-bottom: 1px solid #9DCE41;
}
input[type="text"], input[type="email"], input[type="date"], input[type="tel"], textarea {
    -moz-appearance: none;
    -moz-border-bottom-colors: none;
    color: 
    #000;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color -moz-use-text-color #9dce41;
    border-image: none;
    border-style: none none solid;
    border-width: medium medium 1px;
    font-family: inherit;
    font-size: 15px;
    letter-spacing: 1px;
    line-height: 45px;
    padding-left: 10px;
    width: 100%;
}
.form-sub-head4 {
    background-color: #E7E7E7;
height: 60px;
padding-left: 15px;
padding-top: 10px;
border-bottom: 1px solid
    #9DCE41;
}
textarea {
    height: 120px !important;
    overflow: auto;
}
.row input[type="submit"] {
    border: 3px solid 
    #9dce41;
    font-size: 20px;
    letter-spacing: 2px;
    line-height: 40px;
    width: 60%;
}
.form-head1 {
    background-color: #9DCE41;
    padding-left: 20px;
    box-sizing: border-box;
    height: 20px;
    margin-top: 4px;
}
.form-sub-head2 {
    background-color: #E7E7E7;
    height: 120px;
    padding-left: 15px;
    padding-top: 14px;
    border-bottom: 1px solid #9DCE41;
}
input[type="checkbox"], input[type="radio"] {
    box-sizing: border-box;
    padding: 0;
}
.form-sub-head3 {
    background-color: 
#E7E7E7;
height: 187px;
padding-left: 15px;
padding-top: 60px;
border-bottom: 1px solid
    #9DCE41;
}
body {
    color: #313838 !important;
    font-family: Open Sans;
    font-size: 14px;
}
</style>
<?php

  if($_POST['your-name'] != '') {
    $dirname = dirname(__FILE__) . '/Classes/';
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';
//Including PHPExcel library and creation of its object

$phpExcel = new PHPExcel;

// Setting font to Arial Black

//$phpExcel->getDefaultStyle()->getFont()->setName('Arial Black');

// Setting font size to 14



//Setting description, creator and title

/*$phpExcel ->getProperties()->setTitle("Vendor list");

$phpExcel ->getProperties()->setCreator("Robert");

$phpExcel ->getProperties()->setDescription("Excel SpreadSheet in PHP");*/

// Creating PHPExcel spreadsheet writer object

// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// When creating the writer object, the first sheet is also created

// We will get the already created sheet

$sheet = $phpExcel ->getActiveSheet();
$phpExcel->getActiveSheet()->mergeCells('A1:B1');
$phpExcel->getActiveSheet()->mergeCells('A2:B2');
$phpExcel->getActiveSheet()->mergeCells('A3:B3');
//$phpExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
// Setting title of the sheet
/*$header = 'a1:h1';
//$phpExcel->getActiveSheet()->getStyle($header)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
$style = array(
    'font' => array('bold' => true,),
    'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),
    );
$phpExcel->getStyle($header)->applyFromArray($style);*/
$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(100);
$phpExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(100);
$phpExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(40);
$phpExcel->getActiveSheet()->getRowDimension('69')->setRowHeight(50);
$phpExcel->getActiveSheet()->getStyle('A2:A3'.$phpExcel->getActiveSheet()->getHighestRow())
    ->getAlignment()->setWrapText(true); 
$style = array(
		'font' => array('bold' => true,),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

        )
    );
$style1 = array(
		'font' => array('bold' => true,),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,

        )
    );
    $sheet->getStyle("A71:A76")->applyFromArray($style1);
$phpExcel->getActiveSheet()->getStyle("A1:B76")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
$sheet->setTitle('Worksheet');

// Creating spreadsheet header

$sheet ->getCell('A1')->setValue('Multiple Intelligence Test');

$sheet ->getCell('A2')->setValue("1. This test aids to understanding overall personality, preferences and strengths - which will almost always be a mixture in each individual person. \n 2.  The types of intelligence that a person possesses indicates not only a persons capabilities, but also the manner or method in which they prefer to learn and develop their strengths. \n 3.  It provides absolutely pivotal and inescapable indication as to peoples preferred learning styles, as well as their behavioural and working styles, and their natural strengths.");

$sheet ->getCell('A3')->setValue('Select the score for each statement from the drop down menu : 1 = Mostly Disagree, 2 = Slightly Disagree, 3 = Slightly Agree, 4 = Mostly Agree');
$sheet ->getCell('A4')->setValue('Statement');
$sheet ->getCell('B4')->setValue('Score');
$sheet ->getCell('A5')->setValue('I like to learn more about myself');
$sheet ->getCell('B5')->setValue($_POST['statement-1']);

$sheet ->getCell('A6')->setValue('I find it easiest to solve problems when I am doing something physical');
$sheet ->getCell('B6')->setValue($_POST['statement-2']);

$sheet ->getCell('A7')->setValue('I find budgeting and managing my money easya');
$sheet ->getCell('B7')->setValue($_POST['statement-3']);

$sheet ->getCell('A8')->setValue('I find it easy to make up stories');
$sheet ->getCell('B8')->setValue($_POST['statement-4']);

$sheet ->getCell('A9')->setValue('I have always been very co-ordinated');
$sheet ->getCell('B9')->setValue($_POST['statement-5']);

$sheet ->getCell('A10')->setValue('When talking to someone, I tend to listen to the words they use not just what they mean');
$sheet ->getCell('B10')->setValue($_POST['statement-6']);

$sheet ->getCell('A11')->setValue('I enjoy cross words, word searches or other word puzzles');
$sheet ->getCell('B11')->setValue($_POST['statement-7']);

$sheet ->getCell('A12')->setValue('I don’t like ambiguity, I like things to be clear');
$sheet ->getCell('B12')->setValue($_POST['statement-8']);

$sheet ->getCell('A13')->setValue('I enjoy logic puzzles such as sudoku');
$sheet ->getCell('B13')->setValue($_POST['statement-9']);

$sheet ->getCell('A14')->setValue('I like to meditate');
$sheet ->getCell('B14')->setValue($_POST['statement-10']);

$sheet ->getCell('A15')->setValue('I am very interested in psychometrics (personality testing) and IQ tests');
$sheet ->getCell('B15')->setValue($_POST['statement-11']);

$sheet ->getCell('A16')->setValue('People behaving irrationally annoy me');
$sheet ->getCell('B16')->setValue($_POST['statement-12']);

$sheet ->getCell('A17')->setValue('I find that the music that appeals to me is often based on how I feel emotionally');
$sheet ->getCell('B17')->setValue($_POST['statement-13']);

$sheet ->getCell('A18')->setValue('I am a very social person and like being with other people');
$sheet ->getCell('B18')->setValue($_POST['statement-14']);

$sheet ->getCell('A19')->setValue('I like to be systematic and thorough');
$sheet ->getCell('B19')->setValue($_POST['statement-15']);

$sheet ->getCell('A20')->setValue('I find graphs and charts easy to understand');
$sheet ->getCell('B20')->setValue($_POST['statement-16']);

$sheet ->getCell('A21')->setValue('I can throw things well - darts, skimming pebbles, frisbees, etc');
$sheet ->getCell('B21')->setValue($_POST['statement-17']);

$sheet ->getCell('A22')->setValue('I find it easy to remember quotes or phrases');
$sheet ->getCell('B22')->setValue($_POST['statement-18']);

$sheet ->getCell('A23')->setValue('I can always recognise places that I have been before, even when I was very young');
$sheet ->getCell('B23')->setValue($_POST['statement-19']);

$sheet ->getCell('A24')->setValue('When I am concentrating I tend to doodle');
$sheet ->getCell('B24')->setValue($_POST['statement-20']);

$sheet ->getCell('A25')->setValue('I could manipulate people if I choose to');
$sheet ->getCell('B25')->setValue($_POST['statement-21']);

$sheet ->getCell('A26')->setValue('I can predict my feelings and behaviours in certain situations fairly accurately');
$sheet ->getCell('B26')->setValue($_POST['statement-22']);

$sheet ->getCell('A27')->setValue('I find mental arithmetic easy');
$sheet ->getCell('B27')->setValue($_POST['statement-23']);

$sheet ->getCell('A28')->setValue('I can identify most sounds without seeing what causes them');
$sheet ->getCell('B28')->setValue($_POST['statement-24']);

$sheet ->getCell('A29')->setValue('At school one of may favourite subject is / was English');
$sheet ->getCell('B29')->setValue($_POST['statement-25']);

$sheet ->getCell('A30')->setValue('I like to think through a problem carefully, considering all the consequences');
$sheet ->getCell('B30')->setValue($_POST['statement-26']);

$sheet ->getCell('A31')->setValue('I enjoy debates and discussions');
$sheet ->getCell('B31')->setValue($_POST['statement-27']);

$sheet ->getCell('A32')->setValue('I love adrenaline sports and scary rides');
$sheet ->getCell('B32')->setValue($_POST['statement-28']);

$sheet ->getCell('A33')->setValue('I enjoy individual sports best');
$sheet ->getCell('B33')->setValue($_POST['statement-29']);

$sheet ->getCell('A34')->setValue('I care about how those around me feel');
$sheet ->getCell('B34')->setValue($_POST['statement-30']);

$sheet ->getCell('A35')->setValue('My house is full of pictures and photographs');
$sheet ->getCell('B35')->setValue($_POST['statement-31']);

$sheet ->getCell('A36')->setValue('I enjoy and am good at making things - Im good with my hands');
$sheet ->getCell('B36')->setValue($_POST['statement-32']);

$sheet ->getCell('A37')->setValue('I like having music on in the background');
$sheet ->getCell('B37')->setValue($_POST['statement-33']);

$sheet ->getCell('A38')->setValue('I find it easy to remember telephone numbers');
$sheet ->getCell('B38')->setValue($_POST['statement-34']);

$sheet ->getCell('A39')->setValue('I set myself goals and plans for the future');
$sheet ->getCell('B39')->setValue($_POST['statement-35']);

$sheet ->getCell('A40')->setValue('I can tell easily whether someone likes me or dislikes me');
$sheet ->getCell('B40')->setValue($_POST['statement-36']);

$sheet ->getCell('A41')->setValue('I am a very tactile person');
$sheet ->getCell('B41')->setValue($_POST['statement-37']);

$sheet ->getCell('A42')->setValue('I can easily imagine how an object would look from another perspective');
$sheet ->getCell('B42')->setValue($_POST['statement-38']);

$sheet ->getCell('A43')->setValue('I never use instructions for flat-pack furniture');
$sheet ->getCell('B43')->setValue($_POST['statement-39']);

$sheet ->getCell('A44')->setValue('I find it easy to talk to new people');
$sheet ->getCell('B44')->setValue($_POST['statement-40']);

$sheet ->getCell('A45')->setValue('To learn something new, I need to just get on and try it');
$sheet ->getCell('B45')->setValue($_POST['statement-41']);
$sheet ->getCell('A46')->setValue('I often see clear images when I close my eyes');
$sheet ->getCell('B46')->setValue($_POST['statement-42']);

$sheet ->getCell('A47')->setValue('I don’t use my fingers when I count');
$sheet ->getCell('B47')->setValue($_POST['statement-43']);
$sheet ->getCell('A48')->setValue('I often talk to myself – out loud or in my head');
$sheet ->getCell('B48')->setValue($_POST['statement-44']);

$sheet ->getCell('A49')->setValue('At school I loved / love music lessons');
$sheet ->getCell('B49')->setValue($_POST['statement-45']);
$sheet ->getCell('A50')->setValue('When I am abroad, I find it easy to pick up the basics of another language');
$sheet ->getCell('B50')->setValue($_POST['statement-46']);

$sheet ->getCell('A51')->setValue('I find ball games easy and enjoyable');
$sheet ->getCell('B51')->setValue($_POST['statement-47']);
$sheet ->getCell('A52')->setValue('My favourite subject at school is / was maths');
$sheet ->getCell('B52')->setValue($_POST['statement-48']);

$sheet ->getCell('A53')->setValue('I always know how I am feeling');
$sheet ->getCell('B53')->setValue($_POST['statement-49']);
$sheet ->getCell('A54')->setValue('I am realistic about my strengths and weaknesses');
$sheet ->getCell('B54')->setValue($_POST['statement-50']);

$sheet ->getCell('A55')->setValue('I keep a diary');
$sheet ->getCell('B55')->setValue($_POST['statement-51']);
$sheet ->getCell('A56')->setValue('I am very aware of other people’s body language');
$sheet ->getCell('B56')->setValue($_POST['statement-52']);

$sheet ->getCell('A57')->setValue('My favourite subject at school was / is art');
$sheet ->getCell('B57')->setValue($_POST['statement-53']);
$sheet ->getCell('A58')->setValue('I find pleasure in reading');
$sheet ->getCell('B58')->setValue($_POST['statement-54']);

$sheet ->getCell('A59')->setValue('I can read a map easily');
$sheet ->getCell('B59')->setValue($_POST['statement-55']);
$sheet ->getCell('A60')->setValue('It upsets me to see someone cry and not be able to help');
$sheet ->getCell('B60')->setValue($_POST['statement-56']);

$sheet ->getCell('A61')->setValue('I am good at solving disputes between others');
$sheet ->getCell('B61')->setValue($_POST['statement-57']);
$sheet ->getCell('A62')->setValue('I have always dreamed of being a musician or singer');
$sheet ->getCell('B62')->setValue($_POST['statement-58']);

$sheet ->getCell('A63')->setValue('I prefer team sports');
$sheet ->getCell('B63')->setValue($_POST['statement-59']);
$sheet ->getCell('A64')->setValue('Singing makes me feel happy');
$sheet ->getCell('B64')->setValue($_POST['statement-60']);

$sheet ->getCell('A65')->setValue('I never get lost when I am on my own in a new place');
$sheet ->getCell('B65')->setValue($_POST['statement-61']);
$sheet ->getCell('A66')->setValue('If I am learning how to do something, I like to see drawings and diagrams of how it works');
$sheet ->getCell('B66')->setValue($_POST['statement-62']);

$sheet ->getCell('A67')->setValue('I am happy spending time alone');
$sheet ->getCell('B67')->setValue($_POST['statement-63']);
$sheet ->getCell('A68')->setValue('My friends always come to me for emotional support and advice');
$sheet ->getCell('B68')->setValue($_POST['statement-64']);

$sheet ->getCell('A69')->setValue('Your strengths in each of the multiple intelligences are automatically calculated below, and also shown in graph form. The descriptions of the multiple intelligence Type are shown on the next worksheet within this file - click Intelligence Type Analysis tab below. ');

$sheet ->getCell('A70')->setValue('Intelligence type');
$sheet ->getCell('B70')->setValue('Total');
$sheet ->getCell('A71')->setValue('Linguistic');
$sheet ->getCell('B71')->setValue($_POST['Linguistic']);

$sheet ->getCell('A72')->setValue('LogicalMathematical');
$sheet ->getCell('B72')->setValue($_POST['LogicalMathematical']);
$sheet ->getCell('A73')->setValue('BodilyKinesthetic');
$sheet ->getCell('B73')->setValue($_POST['BodilyKinesthetic']);
$sheet ->getCell('A74')->setValue('SpatialVisual');
$sheet ->getCell('B74')->setValue($_POST['SpatialVisual']);
$sheet ->getCell('A75')->setValue('Interpersonal');
$sheet ->getCell('B75')->setValue($_POST['Interpersonal']);
$sheet ->getCell('A76')->setValue('Interpersonal');
$sheet ->getCell('B76')->setValue($_POST['Interpersonal1']);
// Making headers text bold and larger

//$sheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(14);

// Insert product data

// Autosize the columns

//$objWorksheet->fromArray($arr2);
$objWorksheet = $phpExcel->getActiveSheet();
$dataseriesLabels = array(
   /* new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$71', NULL, 1),   //  JAN
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$72', NULL, 1),   //  FEB
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$73', NULL, 1),   //  MAR
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$74', NULL, 1),   //  APR
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$75', NULL, 1),   //  MEI
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$76', NULL, 1),   //  JUN*/
   
);

$xAxisTickValues = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$71:$B$76', NULL, 6),	//	Q1 to Q4
);
$dataSeriesValues = array(
    new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$71:$B$76', NULL, 6),
    
    
    
);

//  Build the dataseries
$series = new PHPExcel_Chart_DataSeries(
    PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
    PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,  // plotGrouping
    range(0, count($dataSeriesValues)-1),           // plotOrder
    $dataseriesLabels,                              // plotLabel
    $xAxisTickValues,                               // plotCategory
    $dataSeriesValues                               // plotValues
);

$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_BAR);

//  Set the series in the plot area
$plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series));
//  Set the chart legend
$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title = new PHPExcel_Chart_Title('Your Strengths according to the Multiple Intelligences Model');
$yAxisLabel = new PHPExcel_Chart_Title('Intelligence Type');
$xAxisLabel = new PHPExcel_Chart_Title('Intelligence Strength');

//  Create the chart
$chart = new PHPExcel_Chart(
    'chart1',       // name
    $title,         // title
    $legend,        // legend
    $plotarea,      // plotArea
    true,           // plotVisibleOnly
    0,              // displayBlanksAs
    $xAxisLabel,           // xAxisLabel
    $yAxisLabel     // yAxisLabel
    
);

//  Set the position where the chart should appear in the worksheet
$chart->setTopLeftPosition('A78');
$chart->setBottomRightPosition('B98');

//  Add the chart to the worksheet
$objWorksheet->addChart($chart);
$phpExcel->createSheet();
$phpExcel->setActiveSheetIndex(1);
$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$phpExcel->getActiveSheet()->getRowDimension('A4:E9')->setRowHeight(60);
$phpExcel->getActiveSheet()->getStyle('A4:E9'.$phpExcel->getActiveSheet()->getHighestRow())
    ->getAlignment()->setWrapText(true); 
    $phpExcel->getActiveSheet()->getStyle("A3:E9")->applyFromArray(
    array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('rgb' => '000000')
            )
        )
    )
);
$phpExcel->getActiveSheet()->setCellValue('A1', 'Multiple Intelligences - descriptions, preferences, personal potential, suggested career path');

$phpExcel->getActiveSheet()->setCellValue('A3', 'intelligence type');
$phpExcel->getActiveSheet()->setCellValue('B3', 'intelligence description');
$phpExcel->getActiveSheet()->setCellValue('C3', 'Personal Potential');
$phpExcel->getActiveSheet()->setCellValue('D3', 'preferred learning style');
$phpExcel->getActiveSheet()->setCellValue('E3', 'Suggested Career Path');

$phpExcel->getActiveSheet()->setCellValue('A4', '1. Linguistic');
$phpExcel->getActiveSheet()->setCellValue('B4', 'words and language, written and spoken; retention, interpretation and explanation of ideas and information via language, understands relationship between communication and meaning');
$phpExcel->getActiveSheet()->setCellValue('C4', 'write a set of instructions; speak on a subject; edit a written piece or work; write a speech; commentate on an event; apply positive or negative spin to a story');
$phpExcel->getActiveSheet()->setCellValue('D4', 'words and language');
$phpExcel->getActiveSheet()->setCellValue('E4', 'writers, lawyers, journalists, speakers, trainers, copy-writers, English teachers, poets, editors, linguists, translators, PR consultants, media consultants, TV and radio presenters, voice-over artistes');

$phpExcel->getActiveSheet()->setCellValue('A5', '2. Logical - mathmatical');
$phpExcel->getActiveSheet()->setCellValue('B5', 'logical thinking, detecting patterns, scientific reasoning and deduction; analyse problems, perform mathematical calculations, understands relationship between cause and effect towards a tangible outcome or result');
$phpExcel->getActiveSheet()->setCellValue('C5', 'perform a mental arithmetic calculation; create a process to measure something difficult; analyse how a machine works; create a process; devise a strategy to achieve an aim; assess the value of a business or a proposition');
$phpExcel->getActiveSheet()->setCellValue('D5', 'numbers and logic');
$phpExcel->getActiveSheet()->setCellValue('E5', 'scientists, engineers, computer experts, accountants, statisticians, researchers, analysts, traders, bankers bookmakers, insurance brokers, negotiators, deal-makers, trouble-shooters, directors');

$phpExcel->getActiveSheet()->setCellValue('A6', '3. Bodily - Kinesthetic');
$phpExcel->getActiveSheet()->setCellValue('B6', 'body movement control, manual dexterity, physical agility and balance; eye and body coordination');
$phpExcel->getActiveSheet()->setCellValue('C6', 'juggle; demonstrate a sports technique; flip a beer-mat; create a mime to explain something; toss a pancake; fly a kite; coach workplace posture, assess work-station ');
$phpExcel->getActiveSheet()->setCellValue('D6', 'physical experience and movement, touch and feel');
$phpExcel->getActiveSheet()->setCellValue('E6', 'dancers, demonstrators, actors, athletes, divers, sports-people, soldiers, fire-fighters, PTIs, performance artistes; ergonomists, osteopaths, fishermen, drivers, crafts-people; gardeners, chefs, acupuncturists, healers, adventurers ');

$phpExcel->getActiveSheet()->setCellValue('A7', '4. Spatial - Visual');
$phpExcel->getActiveSheet()->setCellValue('B7', 'visual and spatial perception; interpretation and creation of visual images; pictorial imagination and expression; understands relationship between images and meanings, and between space and effect');
$phpExcel->getActiveSheet()->setCellValue('C7', 'design a costume; interpret a painting; create a room layout; create a corporate logo; design a building; pack a suitcase or the boot of a car');
$phpExcel->getActiveSheet()->setCellValue('D7', 'pictures, shapes, images, 3D space');
$phpExcel->getActiveSheet()->setCellValue('E7', 'artists, designers, cartoonists, story-boarders, architects, photographers, sculptors, town-planners, visionaries, inventors, engineers, cosmetics and beauty consultants ');

$phpExcel->getActiveSheet()->setCellValue('A8', '5. Interpersonal');
$phpExcel->getActiveSheet()->setCellValue('B8', 'perception of other peoples feelings; ability to relate to others; interpretation of behaviour and communications; understands the relationships between people and their situations, including other people');
$phpExcel->getActiveSheet()->setCellValue('C8', 'interpret moods from facial expressions; demonstrate feelings through body language; affect the feelings of others in a planned way; coach or counsel another person');
$phpExcel->getActiveSheet()->setCellValue('D8', 'human contact, communications, cooperation, teamwork');
$phpExcel->getActiveSheet()->setCellValue('E8', 'therapists, HR professionals, mediators, leaders, counsellors, politicians, educators, sales-people, clergy, psychologists, teachers, doctors, healers, organisers, carers, advertising professionals, coaches and mentors; (there is clear association between this type of intelligence and what is now termed Emotional Intelligence or EQ)');

$phpExcel->getActiveSheet()->setCellValue('A9', '6. Intrapersonal');
$phpExcel->getActiveSheet()->setCellValue('B9', 'self-awareness, personal cognisance, personal objectivity, the capability to understand oneself, ones relationship to others and the world, and ones own need for, and reaction to change');
$phpExcel->getActiveSheet()->setCellValue('C9', 'consider and decide ones own aims and personal changes required to achieve them (not necessarily reveal this to others); consider ones own Johari Window, and decide options for development; consider and decide ones own position in relation to the Emotional Intelligence model');
$phpExcel->getActiveSheet()->setCellValue('D9', 'self-reflection, self-discovery');
$phpExcel->getActiveSheet()->setCellValue('E9', 'arguably anyone who is self-aware and involved in the process of changing personal thoughts, beliefs and behaviour in relation to their situation, other people, their purpose and aims - in this respect there is a similarity to Maslows Self-Actualisation level, and again there is clear association between this type of intelligence and what is now termed Emotional Intelligence or EQ');
// Rename 2nd sheet
$phpExcel->getActiveSheet()->setTitle('Intelligence Type Analysis');

$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);

$objWriter->save($dirname.'Survey_f8414.xlsx');
$file_name = $dirname.'Survey_f8414.xlsx';
//$to = 'rahulmg1990@gmail.com'; // note the comma
// Subject
//$subject = 'Registration Form';

// Message
 

$email = $_POST['email-312'];
/*// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: ';
$headers[] = 'From: Registration <'.$email.'>';
//$headers[] = 'Content-Disposition: attachment; filename='.$file_name;

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));*/

// Recipient 
$to = 'frontoffice@proedworld.com,angel@proedworld.com,info@proedworld.com,ramiz@proedworld.com,shruti@mindsmetricks.com,rahulmg1990@gmail.com,gopal.rajawat85@gmail.com'; 
 //$to = 'rahulmg1990@gmail.com';
// Sender 
$from = $email; 
$fromName = $_POST['your-name']; 
 
// Email subject 
$subject = 'Student Registration';  
 
// Attachment file 
$file = $file_name; 
 
// Email body content 
$htmlContent = '
  <table>
   <tr style="text-align:center;font-wight:bold;"><td>Student Information</td></tr>
    <tr><td>Name:</td><td>'.$_POST['your-name'].' ' .$_POST['text-374']. '</td></tr>
    <tr><td>Home Address:</td><td>'.$_POST['text-218']. '&nbsp;' .$_POST['text-219']. '&nbsp;' .$_POST['text-220']. '&nbsp;' .$_POST['text-221'].'</td></tr>
    <tr><td>Student Email:</td><td>'.$_POST['email-312'].'</td></tr>
    <tr><td>Home Phone:</td><td>'.$_POST['text-222'].'</td></tr>
    <tr><td>First Language:</td><td>'.$_POST['text-223'].'</td></tr>
    <tr><td>Mobile Phone:</td><td>'.$_POST['text-224'].'</td></tr>
    <tr><td>Gender:</td><td>'.$_POST['text-225'].'</td></tr>
    <tr><td>Birth Place:</td><td>'.$_POST['text-226'].'</td></tr>
    <tr> <td>Ethnicity:</td><td>'.$_POST['text-227'].'</td></tr>
    <tr><td>Birth Date:</td><td>'.$_POST['text-228'].'</td></tr>
    <tr style="text-align:center;font-wight:bold;"><td>School Information</td></tr>
    <tr><td>School Name:</td><td>'.$_POST['text-229'].'</td></tr>
    <tr><td>Curriculum:</td><td>'.$_POST['text-230'].'</td></tr>
    <tr><td>Academic Year:</td><td>'.$_POST['text-231'].'</td></tr>
    <tr><td>Current Grades:</td><td>'.$_POST['text-232'].'</td></tr>
    <tr><td>Predicted Grades:</td><td>'.$_POST['text-233'].'</td></tr>
    <tr style="text-align:center;font-wight:bold;"><td>Test Preparations Information (The Ones You Have Taken)</td></tr>
    <tr><td>SAT/ACT:</td><td>'.$_POST['text-234'].'</td></tr>
    <tr><td>Date:</td><td>'.$_POST['text-235'].'</td></tr>
    <tr><td>Score:</td><td>'.$_POST['text-236'].'</td></tr>
    <tr> <td>IELTS/TOEFL/TESL/Pearson Test Score:</td><td>'.$_POST['text-237'].'</td></tr>
    <tr><td>Date:</td><td>'.$_POST['text-238'].'</td></tr>
    <tr><td>Score:</td><td>'.$_POST['text-239'].'</td></tr>
    <tr><td>UKCAT/BMAT/LNAT/LSAT Score:</td><td>'.$_POST['text-240'].'</td></tr>
    <tr><td>Date:</td><td>'.$_POST['text-241'].'</td></tr>
    <tr><td>Score:</td><td>'.$_POST['text-242'].'</td></tr>
    <tr style="text-align:center;font-wight:bold;"><td>Additional Information</td></tr>
    <tr><td>Course Interested:</td><td>'.$_POST['text-243'].'</td></tr>
    <tr><td>Country Interested:</td><td>'.$_POST['text-244'].'</td></tr>
    <tr><td>Write about Extra-curricular Activities/Internship/Voluntary Work:</td><td>'.$_POST['your-message'].'</td></tr>
    <tr><td>Write about Any Additional Achievements (If Any):</td><td>'.$_POST['textarea-517'].'</td></tr>
    <tr style="text-align:center;font-wight:bold;"><td>Parent / Guardian Information - Parent / Guardian - 01</td></tr>
    <tr> <td>Title</td><td>'.$_POST['text-245'].'</td></tr>
    <tr><td>Name:</td><td>'.$_POST['text-247']. ' ' .$_POST['text-249']. '</td></tr>
    <tr><td>Relationship:</td><td>'.$_POST['text-251'].'</td></tr>
	<tr><td>Home Phone:</td><td>'.$_POST['text-253'].'</td></tr>
    <tr><td>Work Phone:</td><td>'.$_POST['text-255'].'</td></tr>
    <tr><td>Mobile No.:</td><td>'.$_POST['text-257'].'</td></tr>
    <tr> <td>Email Address:</td><td>'.$_POST['text-259'].'</td></tr>
    <tr><td>Home Address:</td><td>'.$_POST['text-261']. ' ' .$_POST['text-262']. ' ' .$_POST['text-263']. '</td></tr>
    <tr style="text-align:center;font-wight:bold;"><td>Parent / Guardian Information - Parent / Guardian - 02</td></tr>
     <tr> <td>Title</td><td>'.$_POST['text-246'].'</td></tr>
    <tr><td>Name:</td><td>'.$_POST['text-248']. ' ' .$_POST['text-250']. '</td></tr>
    <tr><td>Relationship:</td><td>'.$_POST['text-252'].'</td></tr>
	<tr><td>Home Phone:</td><td>'.$_POST['text-254'].'</td></tr>
    <tr><td>Work Phone:</td><td>'.$_POST['text-256'].'</td></tr>
    <tr><td>Mobile No.:</td><td>'.$_POST['text-258'].'</td></tr>
    <tr> <td>Email Address:</td><td>'.$_POST['text-260'].'</td></tr>
    <tr><td>Home Address:</td><td>'.$_POST['text-264']. ' ' .$_POST['text-265']. ' ' .$_POST['text-266']. '</td></tr>
    <tr><td>Expectations from the Counseling Session : </td><td>'.$_POST['textarea-518'].'</td></tr>
    <tr><td>How Did You Hear About Us?:</td><td>'.$_POST['menu-39'].'</td></tr>
    <tr><td>References :</td><td>'.$_POST['textarea-519'].'</td></tr>
  </table>';
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
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
 
// Send email 
mail($to, $subject, $message, $headers, $returnpath);  
?>
<script type="text/javascript">
      document.location.href="https://www.proedworld.com/thanks/";
</script>
<?php 
}

?>
<?php get_footer(); ?>