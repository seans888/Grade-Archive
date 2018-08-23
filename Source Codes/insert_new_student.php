<?php

require_once  '../database_connection/database_connection.php';

$get_year = $_COOKIE["year"];

    $student_first_name = $_POST["new_student_first_name"];
    $student_last_name = $_POST["new_student_last_name"];
    $student_middle_name = $_POST["new_student_middle_name"];
    $student_class = $_POST["new_student_class"];

    if($student_middle_name == ""){
      $middle_post = "";
    }else{
      $middle_post = $student_middle_name;
    }

    $check_for_name_existence = "SELECT * FROM `$get_year` WHERE `student_first_name` = '$student_first_name' AND `student_last_name` = '$student_last_name' AND `student_class` = '$student_class'";

    $execute_query = mysqli_query($my_conn_string,$check_for_name_existence);

    $check_existence = mysqli_num_rows($execute_query);

    if($check_existence >= 1){
      echo "Student Already Exists";
 }else{

       $query = "INSERT INTO `$get_year` (`id`, `student_first_name`, `student_last_name`, `student_middle_name`, `student_class`, `math_subject`, `social_studies_subject`, `science_subject`, `ict_subject`, `bdt_subject`, `rme_subject`, `french_subject`, `ghanaian_language_subject`) VALUES (NULL, '$student_first_name', '$student_last_name', '$middle_post', '$student_class', '0', '0', '0', '0', '0', '0', '0', '0')";

   if(mysqli_query($my_conn_string,$query)){
    echo "Student Added Successfully";
   }else{
    echo "Failed To Add Student";
   }
    
 }
   
?>


