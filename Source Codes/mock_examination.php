<?php
require_once  '../database_connection/database_connection.php';
require_once '../top_header_and_footer/top_header_section.php';

if(isset($_POST["change_year_records"])){
    $get_selected_year = $_POST["get_years"];
    $get_selected_classroom = $_POST["get_classrooms"];

    $year_name = $get_selected_year;
    $classroom_name = $get_selected_classroom;

    $corrected_selected_year = "year_".$get_selected_year;

    $select_all_from_years_table_query = "SELECT * FROM years_holder";
    $select_all_from_class_table_query = "SELECT * FROM classroom_names WHERE `level` LIKE '%CLASS%'";

    $first_year_to_be_displayed = $get_selected_year;
    $first_classroom_to_be_displayed = $get_selected_classroom;

    $populate_tables_query = "SELECT * FROM $corrected_selected_year WHERE student_class LIKE '%$classroom_name%'";

    setcookie("year",$corrected_selected_year,time() + (86400 * 30),"/");

}else{

    $get_selected_year = "";
    $get_selected_classroom  = "";

    $get_years_query = "SELECT * FROM years_holder";
    $select_all_from_class_table_query = "SELECT * FROM classroom_names WHERE `level` LIKE '%CLASS%'";

    $execute_get_years_query = mysqli_query($my_conn_string,$get_years_query);
    $execute_get_classrooms_query = mysqli_query($my_conn_string,$select_all_from_class_table_query);

    while($row_fetch = mysqli_fetch_array($execute_get_years_query)){

        $year_name = $row_fetch["year_number"];

        $table_year_selected = "year_".$year_name;

        if($get_selected_year == "" ){

            $first_year_to_be_displayed = $year_name;
        }else{
            $first_year_to_be_displayed = $get_selected_year;
        }

        break;
    }

    while($row_fetch_2 = mysqli_fetch_array($execute_get_classrooms_query)){

        $classroom_name = $row_fetch_2["level"];

        if($get_selected_classroom == "" ){

            $first_classroom_to_be_displayed = $classroom_name;
        }else{
            $first_classroom_to_be_displayed = $get_selected_classroom;
        }
        break;
    }

    $populate_tables_query = "SELECT * FROM $table_year_selected WHERE student_class LIKE '%$classroom_name%'";
    $select_all_from_years_table_query = "SELECT * FROM years_holder";
    $select_all_from_class_table_query = "SELECT * FROM classroom_names WHERE `level` LIKE '%CLASS 3%'";

    setcookie("year",$table_year_selected,time() + (86400 * 30),"/");

}
?>

<?php require_once '../navigation_section/navigation_classadviser_file.php';?>

<!-- Main Content  -->

<div class="panel panel-default panel_view_customers">
    <div class="panel-heading">
        <h3 class="panel-title ptitle"><b>Manage Students</b></h3>
    </div>
    <div class="panel-body pbody">

        <form class="navbar-form navbar-right" role="form" method="post">

            <select class="form-control" name="get_classrooms" id="myclassroom">

                <?php

                echo "<option value='$classroom_name'>".$first_classroom_to_be_displayed."</option>";

                $select_all_classroom_names_table = $select_all_from_class_table_query;

                $execute_select_all_from_class_table = mysqli_query($my_conn_string,$select_all_classroom_names_table);

                while($row_fetch = mysqli_fetch_array($execute_select_all_from_class_table)){

                    $classroom_name = $row_fetch["level"];

                    if($classroom_name == $first_classroom_to_be_displayed){

                    }else {
                        echo "<option value='$classroom_name'>".$classroom_name."</option>";
                    }
                }
                ?>
            </select>

            <select class="form-control" name="get_years">

                <?php

                echo "<option value='$year_name'>".$first_year_to_be_displayed."</option>";

                $select_all_from_years_table = $select_all_from_years_table_query;

                $execute_select_all_from_years_table = mysqli_query($my_conn_string,$select_all_from_years_table);

                while($row_fetch = mysqli_fetch_array($execute_select_all_from_years_table)){

                    $year_name = $row_fetch["year_number"];

                    if($year_name == $first_year_to_be_displayed){

                    }else {
                        echo "<option value='$year_name'>".$year_name."</option>";
                    }
                }

                ?>

            </select>

            <input type="submit" name="change_year_records" class="btn btn-primary" value="Search">

        </form>

    </div>
</div>

<!-- Table Section -->

<div class="panel panel-default panel_view_customers">
    <div class="panel-heading">
        <h3 class="panel-title ptitle"><b>Manage Students</b></h3>
    </div>
    <div class="panel-body">

        <form class="form" role="form" method="post">

            <article style="overflow-x: auto">

            <table class="table table-bordered table-responsive table-hover" id="students_table">

                <thead>

                <th>Student ID</th>
                <th>Student Full Name</th>
                <th>Section</th>
                <th>Mother Tongue</th>
                <th>Filipino</th>
                <th>English</th>
                <th>Mathematics</th>
                <th>Araling Panlipunan</th>
                <th>E.S.P.</th>
                <th>Mapeh</th>
                <!-- <th>French</th>
                <th>GH.Lang.</th> -->
                <th>Gen. Average</th>
                <!-- <th>Aggregate</th> -->

                </thead>

                <tbody>

                <?php

                $execute_populate_tables_query = mysqli_query($my_conn_string,$populate_tables_query);

                while($fetch_data = mysqli_fetch_array($execute_populate_tables_query)){

                    $get_student_id = $fetch_data["id"];
                    $get_student_first_name = $fetch_data["student_first_name"];
                    $get_student_last_name = $fetch_data["student_last_name"];
                    $get_student_middle_name = $fetch_data["student_middle_name"];
                    $get_student_class = $fetch_data["student_class"];
                    $get_english_score = $fetch_data["english_subject"];
                    $get_maths_score = $fetch_data["math_subject"];
                    $get_social_studies_score = $fetch_data["social_studies_subject"];
                    $get_science_score = $fetch_data["science_subject"];
                    $get_ict_score = $fetch_data["ict_subject"];
                    $get_bdt_score = $fetch_data["bdt_subject"];
                    $get_rme_score = $fetch_data["rme_subject"];
                    $get_french_score = $fetch_data["french_subject"];
                    $get_ghanaian_language_score = $fetch_data["ghanaian_language_subject"];
                    $get_total_score = $fetch_data["total_score"];
                    $get_aggregate = $fetch_data["student_aggregate"];

                    echo "<tr>";

                    echo "<td style='max-width: 10px'>".$get_student_id."</td>";
                    echo "<td style='max-width: 10px'>".$get_student_first_name." ".$get_student_last_name." ".$get_student_middle_name."</td>";
                    echo "<td style='max-width: 10px'>".$get_student_class."</td>";
                    echo "<td style='max-width: 10px'>".$get_english_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_maths_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_social_studies_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_science_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_ict_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_bdt_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_rme_score."</td>";
                    // echo "<td style='max-width: 10px'>".$get_french_score."</td>";
                    // echo "<td style='max-width: 10px'>".$get_ghanaian_language_score."</td>";
                    echo "<td style='max-width: 10px'>".$get_total_score."</td>";
                    // echo "<td style='max-width: 10px'>".$get_aggregate."</td>";

                    echo "</tr>";

                }

                ?>

                </tbody>

            </table>

            </article>

        </form>

    </div>
</div>

<?php  require_once '../top_header_and_footer/footer_section.php'; ?>

<script>

    $(document).ready(function() {
        $("#students_table").dataTable();
        $("#students_table").Tabledit({
            url: "enter_mock_results.php",
            columns: {
                identifier: [0, 'id'],
                editable: [[3, 'get_english_score'], [4, 'get_maths_score'], [5, 'get_social_studies_score'], [6, 'get_science_score'], [7, 'get_ict_score'], [8,'get_bdt_score'], [9,'get_rme_score'], [10,'get_french_score'], [11,'get_ghanaian_language_score']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                if (data.action === 'delete') {
                    $('#' + data.id).remove(function () {
                        $(this).fadeOut(300);
                    });
                }
            }
        });
    });

</script>



<!-- If you are done with everything  -->

<?php require '../top_header_and_footer/final_closing_tag.php' ?>

