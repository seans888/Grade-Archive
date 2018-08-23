<?php
require_once  '../database_connection/database_connection.php';

$selected_year = $_GET["y"];
$selected_classroom = $_GET["c"];
$corrected_year = "year_".$selected_year;
$school_name = $_GET["s"];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_section.css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">

    <?php

    require '../top_header_and_footer/top_css_plugins.php';

    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php

	$get_student_data = "SELECT * FROM $corrected_year WHERE student_class LIKE '%$selected_classroom%'";
	$execute_get_student_data = mysqli_query($my_conn_string,$get_student_data);

	while($fetch_detail = mysqli_fetch_array($execute_get_student_data)){


		$student_first_name = strtoupper($fetch_detail["student_first_name"]);
            $student_last_name = strtoupper($fetch_detail["student_last_name"]);
            $student_middle_name = strtoupper($fetch_detail["student_middle_name"]);
            $student_class = $fetch_detail["student_class"];
            $student_english_score = $fetch_detail["english_subject"];
            $student_english_grade = $fetch_detail["english_grade"];
            $student_maths_score = $fetch_detail["math_subject"];
            $student_maths_grade = $fetch_detail["maths_grade"];
            $student_social_score =  $fetch_detail["social_studies_subject"];
            $student_social_grade = $fetch_detail["social_grade"];
            $student_science_score = $fetch_detail["science_subject"];
            $student_science_grade =  $fetch_detail["science_grade"];
            $student_ict_score = $fetch_detail["ict_subject"];
            $student_ict_grade =  $fetch_detail["ict_grade"];
            $student_bdt_score = $fetch_detail["bdt_subject"];
            $student_bdt_grade = $fetch_detail["bdt_grade"];
            $student_rme_score = $fetch_detail["rme_subject"];
            $student_rme_grade = $fetch_detail["rme_grade"];
            $student_french_score = $fetch_detail["french_subject"];
            $student_french_grade = $fetch_detail["french_grade"];
            $student_ghanaian_language_score = $fetch_detail["ghanaian_language_subject"];
            $student_ghanaian_language_grade = $fetch_detail["ghanaian_language_grade"];

            $student_total_score = $fetch_detail["total_score"];
            $student_total_aggregate = $fetch_detail["student_aggregate"];

?>

<table class="table table-bordered" style="width:100%">
	
<tr>

<td colspan="7">
<img src="../images/bangkal_logo.png" alt="School Logo" height="100px" width="100px">
<div id="school_name" style="margin-top: -20px"><h1><strong><?php echo $school_name; ?></strong></h1></div>
<div><h4>Malvar St., Brgy. Bangkal, Makati City</h4></div>
<div><h3>REPORT CARD</h3></div>
</td>
</tr>

<tr>
<td><strong>NAME</strong></td>
<td colspan="6" style="text-align: left;"><strong><?php echo $student_first_name." ".$student_middle_name." ".$student_last_name; ?></strong></td>
</tr>

<tr>
	<td><strong>SECTION</strong></td>
	<td colspan="6" style="text-align: left;"><strong><?php echo $student_class ?></strong></td>
</tr>

<tr>
	<td><strong>GRADE</strong></td>
	<td colspan="6" style="text-align: left;"><strong>ONE</strong></td>
</tr>

<tr>
	<td><strong>YEAR</strong></td>
	<td colspan="6" style="text-align: left;"><strong><?php echo $selected_year; ?></strong></td>
</tr>

<tr>
	<td colspan="7"><strong>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</strong></td>
</tr>

<tr>
	<td colspan="1"><strong>LEARNING AREAS</strong></td>
	<td colspan="1"><strong>Q1</strong></td>
	<td colspan="1"><strong>Q2</strong></td>
      <td colspan="1"><strong>Q3</strong></td>
      <td colspan="1"><strong>Q4</strong></td>
      <td colspan="1"><strong>FINAL RATING</strong></td>
	<td colspan="1"><strong>REMARKS</strong></td>
</tr>

<tr>
	<?php

            switch ($student_english_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }

	?>
	<td colspan="1"><strong>MOTHER TONGUE</strong></td>
	<td colspan="1"><?php echo $student_english_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_english_score; ?></td>
	<!-- <td colspan="1"><?php echo $student_english_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php  
	         switch ($student_maths_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
            ?>
	<td colspan="1"><strong>FILIPINO</strong></td>
	<td colspan="1"><?php echo $student_maths_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_maths_score; ?></td>
	<!-- <td><?php echo $student_maths_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
	         switch ($student_social_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td colspan="1"><strong>ENGLISH</strong></td>
	<td colspan="1"><?php echo $student_social_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_social_score; ?></td>
	<!-- <td><?php echo $student_social_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
	           switch ($student_science_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td colspan="1"><strong>MATHEMATICS</strong></td>
	<td colspan="1"><?php echo $student_science_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_science_score; ?></td>
	<!-- <td><?php echo $student_science_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
        switch ($student_ict_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }

	?>
	<td colspan="1"><strong>ARALING PANLIPUNAN</strong></td>
	<td colspan="1"><?php echo $student_ict_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_ict_score; ?></td>
	<!-- <td colspan="1"><?php echo $student_ict_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
 switch ($student_bdt_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td colspan="1"><strong>E.S.P.</strong></td>
	<td colspan="1"><?php echo $student_bdt_score; ?></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><strong></strong></td>
      <td colspan="1"><?php echo $student_bdt_score; ?></td>
	<!-- <td><?php echo $student_bdt_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<tr>
	<?php
          switch ($student_rme_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td colspan="1"><strong>MAPEH</strong></td>
	<td colspan="1"><?php echo $student_rme_score; ?></td>
      <td colspan="1"><strong>&nbsp;</strong></td>
      <td colspan="1"><strong>&nbsp;</strong></td>
      <td colspan="1"><strong>&nbsp;</strong></td>
      <td colspan="1"><?php echo $student_rme_score; ?></td>
	<!-- <td><?php echo $student_rme_grade; ?></td> -->
	<td colspan="1"><?php echo $remarks_holder; ?></td>
</tr>

<!-- <tr>
	<?php
          switch ($student_french_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td><strong>FRENCH</strong></td>
	<td><?php echo $student_french_score; ?></td>
	<td><?php echo $student_french_grade; ?></td>
	<td><?php echo $remarks_holder; ?></td>
</tr> -->

<!-- <tr>
	<?php
 switch ($student_ghanaian_language_grade) {
            	case '1':
            		$remarks_holder = "Outstanding";
            		break;
            	case '2':
            		$remarks_holder = "Very Satisfactory";
            		break;
            	case '3':
            		$remarks_holder = "Satisfactory";
            		break;
            	case '4':
            		$remarks_holder = "Fairly Satisfactory";
            		break;
            	case '5':
            		$remarks_holder = "Do Not Meet Expectations";
            		break;
            	case '6':
            		$remarks_holder = "Beginners Performance";
            		break;
            	case '7':
            		$remarks_holder = "Performance Below Expectation";
            		break;
            	case '8':
            		$remarks_holder = "No Grade Possible";
            		break;
            	
            	default:
            		$remarks_holder = "Error";
            		break;
            }
	?>
	<td><strong>GHA. LANGUAGE</strong></td>
	<td><?php echo $student_ghanaian_language_score; ?></td>
	<td><?php echo $student_ghanaian_language_grade; ?></td>
	<td><?php echo $remarks_holder; ?></td>
</tr> -->

<!-- <tr>
	<td>&nbsp;</td>
	<td><strong>TOTAL SCORE</strong></td>
	<td><strong>BEST SIX(6) <br>AGGREGATE</strong></td>
	<td>&nbsp;</td>
</tr> -->

<!-- <tr>
	<td>&nbsp;</td>
	<td><strong><?php echo $student_total_score."/900"; ?></strong></td>
	<td><strong><?php echo $student_total_aggregate ; ?></strong></td>
	<td>&nbsp;</td>
</tr> -->

<tr>
      
      <td colspan="1"><strong>GENERAL AVERAGE</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><strong><?php echo $student_total_score; ?></strong></td>
</tr>

<tr>
	<td colspan="1"><strong>TEACHER'S SIGNATURE</strong></td>
	<td colspan="6">&nbsp;</td>
</tr>


</table>

<?php  }; ?>


<?php  require_once '../top_header_and_footer/footer_section.php'; ?>

<!-- If you are done with everything  -->

<?php require '../top_header_and_footer/final_closing_tag.php' ?>