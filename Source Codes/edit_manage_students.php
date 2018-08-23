<?php

require_once '../database_connection/database_connection.php';

$get_year = $_COOKIE["year"];

$input = filter_input_array(INPUT_POST);

$get_student_first_name = mysqli_real_escape_string($my_conn_string,$input["student_first_name"]);
$get_student_last_name = mysqli_real_escape_string($my_conn_string,$input["student_last_name"]);
$get_student_middle_name = mysqli_real_escape_string($my_conn_string,$input["student_middle_name"]);
$get_class_name = mysqli_real_escape_string($my_conn_string,$input["student_class"]);

$selected_id = $input["id"];

if($input["action"] === 'edit'){

    $query = "UPDATE `$get_year` SET `student_first_name` = '$get_student_first_name', `student_last_name` = '$get_student_last_name', `student_middle_name` = '$get_student_middle_name', `student_class` = '$get_class_name' WHERE `id` = '$selected_id'";
    if(mysqli_query($my_conn_string,$query)){
    	echo "Student Record Updated";
    }
}

if($input["action"] === 'delete'){

    $query = "DELETE FROM `$get_year` WHERE `id` = '$selected_id'";
    mysqli_query($my_conn_string,$query);
}

echo json_encode($input);

?>