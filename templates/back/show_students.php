<!--  show students data and statics  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>عرض الطلاب والإحصائيات</h2>

        <form name="show_subject_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
            <table class="tableData full-width full-height out-hidden" dir="rtl">
                <tr>
                    <td class="label">العام الجامعى:</td>
                    <td>
                        <select name="_studyear" class="txtBox full-width">
                           <option value=""></option>
                            <?php
                                $data->select_studyear();
                            ?>
                        </select>
                    </td>
                    <td class="label">مجال التخصص:</td>
                    <td>
                        <select name="_spec" class="txtBox full-width">
                           <option value=""></option>
                            <?php
                                $data->select_specialize();
                            ?>
                        </select>
                    </td>
                    <td class="label">الدرجة العلمية:</td>
                    <td>
                        <select name="_degree" class="txtBox full-width">
                           <option value=""></option>
                            <?php
                                $data->select_degree();
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="_showstd" value="عرض" class="showBtn btn" />
                    </td>
                </tr> 
            </table>
        </form>

        <table class="tableShowData full-width out-hidden" dir="rtl">
            <tr>
                <th>م</th>
                <th>الإسم</th>
                <th>الدرجة العلمية</th>
                <th>مجال التخصص</th>
                <th>دفعة</th>
            </tr>
            <?php
                /*  when click at search btn  */
                if(isset($_POST['_showstd'])) {
                    
                    /*  
                        be sure that study year field not empty to show student by
                        thier year only or by other choices .
                    */
                    if(!empty($_POST['_studyear'])){
                        
                        /*  
                            be sure that specialize field not empty to show students by
                            thier year and specialize only or by other choices.
                        */
                        if(!empty($_POST['_spec'])){
                            
                            /*  
                                be sure that degree field not empty to show students by
                                thier year, specialize and degree .
                            */
                            if(!empty($_POST['_degree'])) {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND study_year=?
                                         AND specialize=?
                                         AND degree_study=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_studyear'],
                                                       $_POST['_spec'],
                                                       $_POST['_degree']));
                            }
                            /* if degree field empty, show students by thier year and specialize only*/
                            else {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND study_year=?
                                         AND specialize=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_studyear'],
                                                       $_POST['_spec']));
                            }
                        }
                        
                        /*  be sure to show students by thier year only or by thier degree else  */
                        else {
                            /*  
                                be sure that degree field not empty to show students by
                                thier year and degree .
                            */
                            if(!empty($_POST['_degree'])) {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND study_year=?
                                         AND degree_study=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_studyear'],
                                                       $_POST['_degree']));
                            }
                            else {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                             WHERE s.national_id = sds.std_id
                                             AND study_year=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_studyear']));
                            }
                        }
                    }
                    
                    /*  
                        be sure that specialize field not empty to show student by
                        thier specialize only or by other choices .
                    */
                    else if(!empty($_POST['_spec'])) {
                            /*  
                                be sure that degree field not empty to show students by
                                thier specialize and degree .
                            */
                            if(!empty($_POST['_degree'])) {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND specialize=?
                                         AND degree_study=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_spec'],
                                                       $_POST['_degree']));
                            }
                            /* if degree field empty, show students by thier specialize only*/
                            else {
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND specialize=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_spec']));
                            }
                    }
                    else if(!empty($_POST['_degree'])) {
                            /*  
                                be sure that degree field not empty to show students by
                                thier degree .
                            */
                                $sql = "SELECT * FROM students s,student_degree_study sds
                                         WHERE s.national_id = sds.std_id
                                         AND degree_study=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($_POST['_degree']));
                            
                    }
                    else {
                        $sql = "SELECT * FROM students s,student_degree_study sds
                                     WHERE s.national_id = sds.std_id";
                        $result = $db->query($sql);
                    }
                    
                    $num = 1;
                    while($row = $result->fetch()) {
                        echo <<<SHOW
                            <tr>
                                <td>$num</td>
                                <td>
                                    <a href="home.php?student_file&id={$row['national_id']}">{$row['std_name']}</a>
                                </td>
                                <td>{$row['degree_study']}</td>
                                <td>{$row['specialize']}</td>
                                <td>{$row['study_year']}</td>
                            </tr>
SHOW;
                        $num++;
                    }
                }
            ?>
        </table>

    </div>
</div>            
<!--  end show students data and statics  -->