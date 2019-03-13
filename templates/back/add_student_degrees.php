<?php
    $msg = "";

    if(isset($_POST['_degreesubmit'])) {        
        if(!empty($_POST['_idvalue'])) {
            
            $row = $stdData->show_student_data($_POST['_idvalue']);
            
            if(!empty($_POST['_bacalory'])) {                
                $sql = "UPDATE student_degrees 
                            SET degree = ?,
                                specialize = ?,
                                study_year = ?,
                                grade = ?,
                                faculty = ?,
                                university = ?
                            WHERE std_id = ?";
                $result = $db->prepare($sql);
                $result->execute(array(
                                    $_POST['_bacdegree'],
                                    $_POST['_bacalory'],
                                    $_POST['_bacyear'],
                                    $_POST['_bacgrade'],
                                    $_POST['_bacfaculty'],
                                    $_POST['_bacuniv'],
                                    $_POST['_idvalue']));
            }
            if(!empty($_POST['_diploma'])) {
                $sql = "INSERT INTO student_degrees (std_id,degree,specialize,study_year,grade,faculty,university)
                                VALUES (?,?,?,?,?,?,?)";
                $result = $db->prepare($sql);
                $result->execute(array(
                                    $_POST['_idvalue'],
                                    $_POST['_dipdegree'],
                                    $_POST['_diploma'],
                                    $_POST['_dipyear'],
                                    $_POST['_dipgrade'],
                                    $_POST['_dipfaculty'],
                                    $_POST['_dipuniv']));
            }
            if(!empty($_POST['_master'])) {
                $sql = "INSERT INTO student_degrees (std_id,degree,specialize,study_year,grade,faculty,university)
                                VALUES (?,?,?,?,?,?,?)";
                $result = $db->prepare($sql);
                $result->execute(array(
                                    $_POST['_idvalue'],
                                    $_POST['_masdegree'],
                                    $_POST['_master'],
                                    $_POST['_masyear'],
                                    $_POST['_masgrade'],
                                    $_POST['_masfaculty'],
                                    $_POST['_masuniv']));
            }
            else {
                $msg = "برجاء ادخال المؤهلات";
            }
        }
        else {
            $msg = "برجاء تحديد الطالب";
        }
    }
?>
   

<!--  add student degrees form  -->   
    <div class="container horz-Container empty-container full-width full-height out-hidden">

       <div class="dataContainer full-width full-height out-hidden">
           <h2>إضـافـة مؤهلات الطـالـب</h2>

           <form name="std_degrees_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
               <table class="stdData tableData full-width full-height out-hidden" dir="rtl">
                    <?php 
                        include "std_search_bar.php";
                    ?>
                    <tr>
                       <td colspan="4">
                           <h3>المؤهلات:</h3>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <input type="text" name="_bacdegree" value="بكالوريوس" readonly 
                                   class="readonly label full-width" />
                       </td>
                       <td>
                           <input type="text" name="_bacalory" class="txtBox full-width" />
                       </td>
                       <td class="label">تقدير:</td>
                       <td>
                           <select name="_bacgrade" class="txtBox full-width">
                               <?php $data->select_grade(); ?>
                           </select>
                       </td>
                    </tr>
                    <tr>
                        <td class="label">سنة:</td>
                       <td>
                           <select name="_bacyear" class="txtBox full-width">
                               <?php $data->select_studyear(); ?>
                           </select>
                       </td>
                       <td class="label">كلية:</td>
                       <td>
                           <select name="_bacfaculty" class="txtBox full-width">
                               <?php $data->select_faculty(); ?>
                           </select>
                       </td>
                    </tr>
                    <tr>
                        <td class="label">جامعة:</td>
                       <td>
                           <select name="_bacuniv" class="txtBox full-width">
                               <?php $data->select_university(); ?>
                           </select>
                       </td>
                    </tr>
                    <?php
                        if(!empty($row['degree_study'])) {
                            if($row['degree_study'] == 'ماجستير') {
                    ?>
                                
                                <tr>
                                    <td colspan="4">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                   <td>
                                       <input type="text" name="_dipdegree" value="دبلومة" readonly 
                                               class="readonly label full-width" />
                                   </td>
                                   <td>
                                       <input type="text" name="_diploma" class="txtBox full-width" />
                                   </td>
                                   <td class="label">تقدير:</td>
                                   <td>
                                        <select name="_dipgrade" class="txtBox full-width">
                                            <?php $data->select_grade(); ?>
                                        </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td class="label">سنة:</td>
                                   <td>
                                       <select name="_dipyear" class="txtBox full-width">
                                           <?php $data->select_studyear(); ?>
                                       </select>
                                   </td>
                                   <td class="label">كلية:</td>
                                   <td>
                                       <select name="_dipfaculty" class="txtBox full-width">
                                           <?php $data->select_faculty(); ?>
                                       </select>
                                   </td>
                                </tr>
                                <tr>
                                   <td class="label">جامعة:</td>
                                   <td>
                                       <select name="_dipuniv" class="txtBox full-width">
                                           <?php $data->select_university(); ?>
                                       </select>
                                   </td>
                                </tr>
                    <?php
                            }
                            else if($row['degree_study'] == 'دكتوراه') {
                    ?>
                                <tr>
                                    <td colspan="4">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                   <td>
                                       <input type="text" name="_dipdegree" value="دبلومة" readonly 
                                               class="readonly label full-width" />
                                   </td>
                                   <td>
                                       <input type="text" name="_diploma" class="txtBox full-width" />
                                   </td>
                                   <td class="label">تقدير:</td>
                                   <td>
                                        <select name="_dipgrade" class="txtBox full-width">
                                            <?php $data->select_grade(); ?>
                                        </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td class="label">سنة:</td>
                                   <td>
                                       <select name="_dipyear" class="txtBox full-width">
                                           <?php $data->select_studyear(); ?>
                                       </select>
                                   </td>
                                   <td class="label">كلية:</td>
                                   <td>
                                       <select name="_dipfaculty" class="txtBox full-width">
                                           <?php $data->select_faculty(); ?>
                                       </select>
                                   </td>
                                </tr>
                                <tr>
                                   <td class="label">جامعة:</td>
                                   <td>
                                       <select name="_dipuniv" class="txtBox full-width">
                                           <?php $data->select_university(); ?>
                                       </select>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="4">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                   <td>
                                       <input type="text" name="_masdegree" value="ماجستير" readonly 
                                               class="readonly label full-width" />
                                   </td>
                                   <td>
                                       <input type="text" name="_master" class="txtBox full-width" />
                                   </td>
                                   <td class="label">تقدير:</td>
                                   <td>
                                        <select name="_masgrade" class="txtBox full-width">
                                            <?php $data->select_grade(); ?>
                                        </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td class="label">سنة:</td>
                                   <td>
                                       <select name="_masyear" class="txtBox full-width">
                                           <?php $data->select_studyear(); ?>
                                       </select>
                                   </td>
                                   <td class="label">كلية:</td>
                                   <td>
                                       <select name="_masfaculty" class="txtBox full-width">
                                           <?php $data->select_faculty(); ?>
                                       </select>
                                   </td>
                                </tr>
                                <tr>
                                   <td class="label">جامعة:</td>
                                   <td>
                                       <select name="_masuniv" class="txtBox full-width">
                                           <?php $data->select_university(); ?>
                                       </select>
                                   </td>
                                </tr>
                    ?>
                    <?php
                            }
                        }
                    ?>
               </table>

               <input type="submit" name="_degreesubmit" value="إضافة" class="addBtn btn full-width" />
           </form>

           <div class="msg">
               <?php echo $msg; ?>
           </div>

       </div>
    </div>    
    <!--  end add student form  -->       