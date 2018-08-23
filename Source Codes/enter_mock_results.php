<?php

require_once '../database_connection/database_connection.php';

$get_year = $_COOKIE["year"];

$input = filter_input_array(INPUT_POST);

$get_english_score = mysqli_real_escape_string($my_conn_string,$input["get_english_score"]);
$get_maths_score = mysqli_real_escape_string($my_conn_string,$input["get_maths_score"]);
$get_social_score = mysqli_real_escape_string($my_conn_string,$input["get_social_studies_score"]);
$get_science_score = mysqli_real_escape_string($my_conn_string,$input["get_science_score"]);
$get_ict_score = mysqli_real_escape_string($my_conn_string,$input["get_ict_score"]);
$get_bdt_score = mysqli_real_escape_string($my_conn_string,$input["get_bdt_score"]);
$get_rme_score = mysqli_real_escape_string($my_conn_string,$input["get_rme_score"]);
$get_french_score = mysqli_real_escape_string($my_conn_string,$input["get_french_score"]);
$get_ghanaian_language_score = mysqli_real_escape_string($my_conn_string,$input["get_ghanaian_language_score"]);


 $student_total_score = ($get_english_score+$get_maths_score+$get_social_score+$get_science_score+$get_ict_score+$get_bdt_score+$get_rme_score)/7;

if($get_english_score <=100 && $get_english_score >=90){
    $english_grade = 1;
}elseif ($get_english_score <=89 && $get_english_score >=85){
    $english_grade = 2;
}elseif ($get_english_score <=84 && $get_english_score >=80){
    $english_grade = 3;
}elseif($get_english_score <=79 && $get_english_score >=75){
    $english_grade = 4;
}elseif($get_english_score <= 74){
    $english_grade = 5;
}

// elseif ($get_english_score <=59 && $get_english_score >=50){
//     $english_grade = 5;
// }elseif ($get_english_score <=49 && $get_english_score >=40){
//     $english_grade = 6;
// }elseif ($get_english_score <=39 && $get_english_score >=30){
//     $english_grade = 7;
// }elseif ($get_english_score <=29 && $get_english_score >=0){
//     $english_grade = 8;
// }



if($get_maths_score <=100 && $get_maths_score >=90){
    $maths_grade = 1;
}elseif ($get_maths_score <=89 && $get_maths_score >=85){
    $maths_grade = 2;
}elseif ($get_maths_score <=84 && $get_maths_score >=80){
    $maths_grade = 3;
}elseif($get_maths_score <=79 && $get_maths_score >=75){
    $maths_grade = 4;
}elseif($get_maths_score < 75){
    $maths_grade = 5;
}

// elseif ($get_maths_score <=59 && $get_maths_score >=50){
//     $maths_grade = 5;
// }elseif ($get_maths_score <=49 && $get_maths_score >=40){
//     $maths_grade = 6;
// }elseif ($get_maths_score <=39 && $get_maths_score >=30){
//     $maths_grade = 7;
// }elseif ($get_maths_score <=29 && $get_maths_score >=0){
//     $maths_grade = 8;
// }


if($get_social_score <=100 && $get_social_score >=90){
    $social_grade = 1;
}elseif ($get_social_score <=89 && $get_social_score >=85){
    $social_grade = 2;
}elseif ($get_social_score <=84 && $get_social_score >=80){
    $social_grade = 3;
}elseif($get_social_score <=79 && $get_social_score >=75){
    $social_grade = 4;
}elseif($get_social_score < 75){
    $social_grade = 5;
}

// elseif ($get_social_score <=59 && $get_social_score >=50){
//     $social_grade = 5;
// }elseif ($get_social_score <=49 && $get_social_score >=40){
//     $social_grade = 6;
// }elseif ($get_social_score <=39 && $get_social_score >=30){
//     $social_grade = 7;
// }elseif ($get_social_score <=29 && $get_social_score >=0){
//     $social_grade = 8;
// }

if($get_science_score <=100 && $get_science_score >=90){
    $science_grade = 1;
}elseif ($get_science_score <=89 && $get_science_score >=85){
    $science_grade = 2;
}elseif ($get_science_score <=84 && $get_science_score >=80){
    $science_grade = 3;
}elseif($get_science_score <=79 && $get_science_score >=75){
    $science_grade = 4;
}elseif($get_science_score < 75){
    $science_grade = 5;
}

// elseif ($get_science_score <=59 && $get_science_score >=50){
//     $science_grade = 5;
// }elseif ($get_science_score <=49 && $get_science_score >=40){
//     $science_grade = 6;
// }elseif ($get_science_score <=39 && $get_science_score >=30){
//     $science_grade = 7;
// }elseif ($get_science_score <=29 && $get_science_score >=0){
//     $science_grade = 8;
// }

if($get_ict_score <=100 && $get_ict_score >=90){
    $ict_grade = 1;
}elseif ($get_ict_score <=89 && $get_ict_score >=85){
    $ict_grade = 2;
}elseif ($get_ict_score <=84 && $get_ict_score >=80){
    $ict_grade = 3;
}elseif($get_ict_score <=79 && $get_ict_score >=75){
    $ict_grade = 4;
}elseif($get_ict_score < 75){
    $ict_grade = 5;
}

// elseif ($get_ict_score <=59 && $get_ict_score >=50){
//     $ict_grade = 5;
// }elseif ($get_ict_score <=49 && $get_ict_score >=40){
//     $ict_grade = 6;
// }elseif ($get_ict_score <=39 && $get_ict_score >=30){
//     $ict_grade = 7;
// }elseif ($get_ict_score <=29 && $get_ict_score >=0){
//     $ict_grade = 8;
// }

if($get_bdt_score <=100 && $get_bdt_score >=90){
    $bdt_grade = 1;
}elseif ($get_bdt_score <=89 && $get_bdt_score >=85){
    $bdt_grade = 2;
}elseif ($get_bdt_score <=84 && $get_bdt_score >=80){
    $bdt_grade = 3;
}elseif($get_bdt_score <=79 && $get_bdt_score >=75){
    $bdt_grade = 4;
}elseif($get_bdt_score < 75){
    $bdt_grade = 5;
}

// elseif ($get_bdt_score <=59 && $get_bdt_score >=50){
//     $bdt_grade = 5;
// }elseif ($get_bdt_score <=49 && $get_bdt_score >=40){
//     $bdt_grade = 6;
// }elseif ($get_bdt_score <=39 && $get_bdt_score >=30){
//     $bdt_grade = 7;
// }elseif ($get_bdt_score <=29 && $get_bdt_score >=0){
//     $bdt_grade = 8;
// }

if($get_rme_score <=100 && $get_rme_score >=90){
    $rme_grade = 1;
}elseif ($get_rme_score <=89 && $get_rme_score >=85){
    $rme_grade = 2;
}elseif ($get_rme_score <=84 && $get_rme_score >=80){
    $rme_grade = 3;
}elseif($get_rme_score <=79 && $get_rme_score >=75){
    $rme_grade = 4;
}elseif($get_rme_score < 75){
    $rme_grade = 5;
}

// elseif ($get_rme_score <=59 && $get_rme_score >=50){
//     $rme_grade = 5;
// }elseif ($get_rme_score <=49 && $get_rme_score >=40){
//     $rme_grade = 6;
// }elseif ($get_rme_score <=39 && $get_rme_score>=30){
//     $rme_grade = 7;
// }elseif ($get_rme_score <=29 && $get_rme_score >=0){
//     $rme_grade = 8;
// }

if($get_french_score <=100 && $get_french_score >=90){
    $french_grade = 1;
}elseif ($get_french_score <=89 && $get_french_score >=85){
    $french_grade = 2;
}elseif ($get_french_score <=84 && $get_french_score >=80){
    $french_grade = 3;
}elseif($get_french_score <=79 && $get_french_score >=75){
    $french_grade = 4;
}elseif($get_french_score < 75){
    $french_grade = 5;
}

// elseif ($get_french_score <=59 && $get_french_score >=50){
//     $french_grade = 5;
// }elseif ($get_french_score <=49 && $get_french_score >=40){
//     $french_grade = 6;
// }elseif ($get_french_score <=39 && $get_french_score >=30){
//     $french_grade = 7;
// }elseif ($get_french_score <=29 && $get_french_score >=0){
//     $french_grade = 8;
// }

if($get_ghanaian_language_score <=100 && $get_ghanaian_language_score >=90){
    $ghanaian_language_grade = 1;
}elseif ($get_ghanaian_language_score <=89 && $get_ghanaian_language_score >=80){
    $ghanaian_language_grade = 2;
}elseif ($get_ghanaian_language_score <=84 && $get_ghanaian_language_score >=80){
    $ghanaian_language_grade = 3;
}elseif($get_ghanaian_language_score <=79 && $get_ghanaian_language_score >=75){
    $ghanaian_language_grade = 4;
}elseif($get_ghanaian_language_score < 75){
    $ghanaian_language_grade = 5;
}

// elseif ($get_ghanaian_language_score <=59 && $get_ghanaian_language_score >=50){
//     $ghanaian_language_grade = 5;
// }elseif ($get_ghanaian_language_score <=49 && $get_ghanaian_language_score >=40){
//     $ghanaian_language_grade = 6;
// }elseif ($get_ghanaian_language_score <=39 && $get_ghanaian_language_score >=30){
//     $ghanaian_language_grade = 7;
// }elseif ($get_ghanaian_language_score <=29 && $get_ghanaian_language_score >=0){
//     $ghanaian_language_grade = 8;
// }

 if($ict_grade <= $bdt_grade && $ict_grade <= $rme_grade && $ict_grade <= $french_grade && $ict_grade <= $ghanaian_language_grade){

    $first_best_subject = "ict";

    if($bdt_grade <= $rme_grade && $bdt_grade <= $french_grade && $bdt_grade <= $ghanaian_language_grade){

        $second_best_subject = "bdt";

    }elseif ($rme_grade <= $bdt_grade && $rme_grade <= $french_grade && $rme_grade <= $ghanaian_language_grade) {
        
        $second_best_subject = "rme";

    }elseif ($french_grade <= $bdt_grade && $french_grade <= $rme_grade && $french_grade <= $ghanaian_language_grade) {
        
        $second_best_subject = "french";

    }elseif ($ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $rme_grade && $ghanaian_language_grade <= $french_grade) {
        
        $second_best_subject = "ghanaian_language";
    }

 }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $rme_grade && $bdt_grade <= $french_grade && $bdt_grade <= $ghanaian_language_grade) {
     
        $first_best_subject = "bdt";

        if($ict_grade <= $rme_grade && $ict_grade <= $french_grade && $ict_grade <= $ghanaian_language_grade){

            $second_best_subject = "ict";

        }elseif ($rme_grade <= $ict_grade && $rme_grade <= $french_grade && $rme_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "rme";

        }elseif ($french_grade <= $ict_grade && $french_grade <= $rme_grade && $french_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "french";
        
        }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $rme_grade && $ghanaian_language_grade <= $french_grade) {

            $second_best_subject = "ghanaian_language";
        }

 }elseif ($rme_grade <= $ict_grade && $rme_grade <= $bdt_grade && $rme_grade <= $french_grade && $rme_grade <= $ghanaian_language_grade) {
     
        $first_best_subject = "rme";

        if ($ict_grade <= $bdt_grade && $ict_grade <= $french_grade && $ict_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "ict";
        
        }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $french_grade && $bdt_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "bdt";
        
        }elseif ($french_grade <= $ict_grade && $french_grade <= $bdt_grade && $french_grade <= $ghanaian_language_grade) {
            
            $second_best_subject = "french";
        
        }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $french_grade) {
            
            $second_best_subject = "ghanaian_language";
        }

 }elseif ($french_grade <= $ict_grade && $french_grade <= $bdt_grade && $french_grade <= $rme_grade && $french_grade <= $ghanaian_language_grade) {

     $first_best_subject = "french";

     if ($ict_grade <= $bdt_grade && $ict_grade <= $rme_grade && $ict_grade <= $ghanaian_language_grade) {
         
         $second_best_subject = "ict";
     
     }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $rme_grade && $bdt_grade <= $ghanaian_language_grade) {
         
         $second_best_subject = "bdt";

     }elseif ($rme_grade <= $ict_grade && $rme_grade <= $bdt_grade && $ict_grade <= $ghanaian_language_grade) {
         
         $second_best_subject = "rme";
    
     }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $rme_grade) {

         $second_best_subject = "ghanaian_language";
     }

 }elseif ($ghanaian_language_grade <= $ict_grade && $ghanaian_language_grade <= $bdt_grade && $ghanaian_language_grade <= $rme_grade && $ghanaian_language_grade <= $french_grade) {

     $first_best_subject = "ghanaian_language";

     if($ict_grade <= $bdt_grade && $ict_grade <= $rme_grade && $ict_grade <= $french_grade){

        $second_best_subject = "ict";
     
     }elseif ($bdt_grade <= $ict_grade && $bdt_grade <= $rme_grade && $bdt_grade <= $french_grade) {
         
         $second_best_subject = "bdt";
     
     }elseif ($rme_grade <= $ict_grade && $rme_grade <= $bdt_grade && $rme_grade <= $french_grade) {
         
         $second_best_subject = "rme";
     
     }elseif ($french_grade <= $ict_grade && $french_grade <= $bdt_grade && $french_grade <= $rme_grade) {
        
        $second_best_subject = "french";
     }
 }


 // Getting First Best Subject

 switch ($first_best_subject) {
     case 'ict':
         $first_best_subject_grade = $ict_grade;
         $first_best_subject_text = "I.C.T";
         break;
    case 'bdt':
        $first_best_subject_grade = $bdt_grade;
        $first_best_subject_text = "B.D.T";
        break;
    case 'rme':
        $first_best_subject_grade = $rme_grade;
        $first_best_subject_text = "R.M.E";
        break;
    case 'french':
        $first_best_subject_grade = $french_grade;
        $first_best_subject_text = "FRENCH";
        break;
    case 'ghanaian_language':
        $first_best_subject_grade = $ghanaian_language_grade;
        $first_best_subject_text = "GHANAIAN LANGUAGE";
        break;
     
     default:
         $first_best_subject_grade = "0";
         break;
 }

 // Getting Second Best Subject

 switch ($second_best_subject) {
     case 'ict':
         $second_best_subject_grade = $ict_grade;
         $second_best_subject_text = "I.C.T";
         break;
    case 'bdt':
        $second_best_subject_grade = $bdt_grade;
        $second_best_subject_text = "B.D.T";
        break;
    case 'rme':
        $second_best_subject_grade = $rme_grade;
        $second_best_subject_text = "R.M.E";
        break;
    case 'french':
        $second_best_subject_grade = $french_grade;
        $second_best_subject_text = "FRENCH";
        break;
    case 'ghanaian_language':
        $second_best_subject_grade = $ghanaian_language_grade;
        $second_best_subject_text = "GHANAIAN LANGUAGE";
        break;
     
     default:
         $second_best_subject_grade = "0";
         break;
 }

// Getting All Core Subject Aggregate

 $all_core_subject_aggregate = $maths_grade+$science_grade+$social_grade+$english_grade;

// Adding Best Two Subjects

 $other_two_best_grade = $first_best_subject_grade+$second_best_subject_grade;

// Students Total Aggregate

 $students_total_aggregate = $all_core_subject_aggregate+$other_two_best_grade;

$selected_id = $input["id"];

if($input["action"] === 'edit'){

    $query = "UPDATE `$get_year` SET `english_subject` = '$get_english_score', `math_subject` = '$get_maths_score', `social_studies_subject` = '$get_social_score', `science_subject` = '$get_science_score', `ict_subject` = '$get_ict_score', `bdt_subject` = '$get_bdt_score', `rme_subject` = '$get_rme_score', `french_subject` = '$get_french_score', `ghanaian_language_subject` = '$get_ghanaian_language_score', `total_score` = '$student_total_score', `student_aggregate` = '$students_total_aggregate', `student_first_best_subject` = '$first_best_subject_text', `student_second_best_subject` = '$second_best_subject_text', `english_grade` = '$english_grade', `maths_grade` = '$maths_grade', `social_grade` = '$social_grade', `science_grade` = '$science_grade', `ict_grade` = '$ict_grade', `bdt_grade` = '$bdt_grade', `rme_grade` = '$rme_grade', `french_grade` = '$french_grade', `ghanaian_language_grade` = '$ghanaian_language_grade' WHERE `id` = '$selected_id'";
    mysqli_query($my_conn_string,$query);
}

if($input["action"] === 'delete'){

    $query = "DELETE FROM `$get_year` WHERE `id` = '$selected_id'";
    mysqli_query($my_conn_string,$query);
}

echo json_encode($input);

?>