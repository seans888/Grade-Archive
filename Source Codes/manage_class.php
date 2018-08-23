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
    $select_all_from_class_table_query = "SELECT * FROM classroom_names";

    $first_year_to_be_displayed = $get_selected_year;
    $first_classroom_to_be_displayed = $get_selected_classroom;

    $populate_tables_query = "SELECT * FROM $corrected_selected_year WHERE student_class LIKE '%$classroom_name%'";

    setcookie("year",$corrected_selected_year,time() + (86400 * 30),"/");

}else{

    $get_selected_year = "";
   $get_selected_classroom  = "";

    $get_years_query = "SELECT * FROM years_holder";
    $select_all_from_class_table_query = "SELECT * FROM classroom_names";

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
    $select_all_from_class_table_query = "SELECT * FROM classroom_names";

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

        <div>
            <button id="add_row" class="btn btn-primary" style="margin-left:20px;width: 150px;height: 50px"><span class="glyphicon glyphicon-plus-sign"></span>
                Add Row
            </button>
        </div>

        <hr>

        <br>

        <form class="form" role="form" method="post">

            <table class="table table-bordered table-responsive table-hover" id="students_table">

                <thead>

                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Section</th>

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

                    echo "<tr>";

                    echo "<td>".$get_student_id."</td>";
                    echo "<td>".$get_student_first_name."</td>";
                    echo "<td>".$get_student_last_name."</td>";
                    echo "<td>".$get_student_middle_name."</td>";
                    echo "<td>".$get_student_class."</td>";

                    echo "</tr>";

                }

                ?>

                </tbody>

            </table>

            </form>


    </div>
</div>

<?php  require_once '../top_header_and_footer/footer_section.php'; ?>

<script>

    $(document).ready(function() {
        $("#students_table").dataTable();
        $("#students_table").Tabledit({
            url: "edit_manage_students.php",
            columns: {
                identifier: [0, 'id'],
                editable: [[1, 'student_first_name'], [2, 'student_last_name'], [3, 'student_middle_name'], [4, 'student_class']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                alert(data);
                if (data.action === 'delete') {
                    $('#' + data.id).remove(function () {
                        $(this).fadeOut(300);
                    });
                }
            }
        });

        $("#add_row").click(function () {

            var html = '<tr>';
            html += '<td id="data1"></td>';
            html += '<td contenteditable id="data2"></td>';
            html += '<td contenteditable id="data3"></td>';
            html += '<td contenteditable id="data4"></td>';
            html += '<td id="data5"><?php echo $first_classroom_to_be_displayed; ?></td>';
            html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button> </td>';
            html += '</tr>';

            $("#students_table tbody").prepend(html);

        });

        $(document).on('click','#insert', function(){

            var new_student_first_name = $("#data2").text();
            var new_student_last_name = $("#data3").text();
            var new_student_middle_name = $("#data4").text();
            var new_student_class = $("#data5").text();

            if(new_student_first_name != "" && new_student_last_name != "" && new_student_class != ""){

                $.ajax({
                    url : "insert_new_student.php",
                    method : "POST",
                    data : {new_student_first_name:new_student_first_name,new_student_last_name:new_student_last_name,
                        new_student_middle_name:new_student_middle_name,new_student_class:new_student_class},
                    success:function(data){
                        /*$("#students_table").DataTable().destroy(); */

                        alert(data);
                    }
                });
            }else{
                alert('Please Fill Relevant Spaces');
            }
        });
    });

</script>



<!-- If you are done with everything  -->

<?php require '../top_header_and_footer/final_closing_tag.php' ?>

