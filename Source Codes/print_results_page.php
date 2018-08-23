<?php
require_once  '../database_connection/database_connection.php';
require_once '../top_header_and_footer/top_header_section.php';

if(isset($_POST["btn_print_result"])){
    $get_selected_year = $_POST["get_years"];
    $get_selected_classroom = $_POST["get_classrooms"];
    $school_name = "Bangkal Elementary School - Main";

    $text_form = "print_results.php?y=".$get_selected_year."&c=".$get_selected_classroom."&s=".$school_name;

    header("Location:$text_form");

}
?>

<?php require_once '../navigation_section/navigation_classadviser_file.php';?>

<div class="panel panel-default panel_view_customers">
    <div class="panel-body pbody">

 	<form class="navbar-form navbar-right" role="form" method="post" style="margin-top: 15%;margin-right: 40%">

       <!--  <div style="text-align: center;"><b>Enter School Name :</b>

            <input type="input" class="form-control" name="txt_school_name" required>

        </div> -->

        <br>

            <select class="form-control" name="get_classrooms" id="myclassroom" style="height: 50px;width: 200px;margin-left: auto">

                <?php

                $select_all_classroom_names_table = "SELECT * FROM classroom_names WHERE `level` LIKE '%CLASS%'";

                $execute_select_all_from_class_table = mysqli_query($my_conn_string,$select_all_classroom_names_table);

                while($row_fetch = mysqli_fetch_array($execute_select_all_from_class_table)){

                    $classroom_name = $row_fetch["level"];
           
                        echo "<option value='$classroom_name'>".$classroom_name."</option>";
                   
                }
                ?>
            </select>

            <select class="form-control" name="get_years" style=" height: 50px;width: 200px;margin-left: auto">

                <?php

                $select_all_from_years_table = "SELECT * FROM years_holder";

                $execute_select_all_from_years_table = mysqli_query($my_conn_string,$select_all_from_years_table);

                while($row_fetch = mysqli_fetch_array($execute_select_all_from_years_table)){

                    $year_name = $row_fetch["year_number"];

                        echo "<option value='$year_name'>".$year_name."</option>";
                }

                ?>

            </select>

      <div style="margin-top: 18%;margin-bottom: 20%;margin-left: 30%">
		<input type="submit" name="btn_print_result" class="btn btn-primary btn-lg" value="Print Report Card">
	 </div>
        </form>
    </div>
</div>

<?php  require_once '../top_header_and_footer/footer_section.php'; ?>

<!-- If you are done with everything  -->

<?php require '../top_header_and_footer/final_closing_tag.php' ?>