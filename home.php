<?php
    include "templates/back/clases/adminDB_config.php";
    include "templates/back/clases/basic_data_class.php";
    include "templates/back/clases/student_class.php";

    $dbh = new db_config;
    $db = $dbh->DBconnect();
    $data = new basicData($db);
    $stdData = new student($db);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <title>قسم الدراسات العليا</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Changa">
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/tables.css" />
        <link rel="stylesheet" href="css/grouping.css" />
    </head>
    <body>
        
        <?php 
            include "templates/front/head.php";
        
            if(isset($_GET['add_student'])) {
                include "templates/back/add_student.php";
            }
            else if(isset($_GET['add_student_degrees'])) {
                include "templates/back/add_student_degrees.php";
            }
            else if(isset($_GET['add_student_subjects'])) {
                include "templates/back/add_student_subjects.php";
            }
            else if(isset($_GET['add_student_supervisor'])) {
                include "templates/back/add_student_supervisor.php";
            }
            else if(isset($_GET['show_students'])) {
                include "templates/back/show_students.php";
            }
            else if(isset($_GET['student_file'])) {
                include "templates/back/student_file.php";
            }
            else if(isset($_GET['departments/كمياء'])) {
                include "templates/back/departments/chemistry.php";
            }
            else if(isset($_GET['departments/فيزياء'])) {
                include "templates/back/departments/physics.php";
            }
            else if(isset($_GET['departments/حيوان'])) {
                include "templates/back/departments/zology.php";
            }
            else if(isset($_GET['departments/نبات'])) {
                include "templates/back/departments/botany.php";
            }
            else if(isset($_GET['departments/رياضيات وعلوم الحاسب'])) {
                include "templates/back/departments/math.php";
            }
            else if(isset($_GET['departments/علوم بحار'])) {
                include "templates/back/departments/marine.php";
            }
            else if(isset($_GET['departments/رصد بيئى'])) {
                include "templates/back/departments/environment.php";
            }
            else if(isset($_GET['specialize'])) {
                include "templates/back/departments/specialize.php";
            }
            else if(isset($_GET['add_supervisor'])) {
                include "templates/back/add_supervisor.php";
            }
            else if(isset($_GET['show_supervisor'])) {
                include "templates/back/show_supervisor.php";
            }
            else if(isset($_GET['add_subject'])) {
                include "templates/back/setting/add_subject.php";
            }
            else if(isset($_GET['add_subject_specialize'])) {
                include "templates/back/setting/add_subject_specialize.php";
            }
            else if(isset($_GET['add_specialize'])) {
                include "templates/back/setting/add_specialize.php";
            }
            else if(isset($_GET['add_governorat'])) {
                include "templates/back/setting/add_governorat.php";
            }
            else if(isset($_GET['add_nationality'])) {
                include "templates/back/setting/add_nationality.php";
            }
            else if(isset($_GET['add_university'])) {
                include "templates/back/setting/add_university.php";
            }
            else if(isset($_GET['add_faculty'])) {
                include "templates/back/setting/add_faculty.php";
            }
            else if(isset($_GET['add_rank'])) {
                include "templates/back/setting/add_rank.php";
            }
            else if(isset($_GET['users'])) {
                include "templates/back/setting/users.php";
            }
            else{
                echo <<<SHOW
                    <div class="empty-container full-width full-height"></div>
SHOW;
            }
        ?>
        
        
        <!--  footer  -->
        <?php 
            include "templates/front/footer.php";
        ?>
    </body>
</html>