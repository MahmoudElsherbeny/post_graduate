<?php
    if(isset($_POST['_subsubmit'])) {
        $sql = "SELECT sub_id FROM subjects WHERE sub_name=?";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['_subname']));
        $row = $result->fetch();
        
        $sql = "INSERT INTO student_subjects (std_id,sub_id,grade)
                       VALUES(?,?,?)";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['_idvalue'],
                               $row['sub_id'],
                               $_POST['_subgrade']));
    }
?>


<!--  add student subjects  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>تسجيل مواد الطلاب</h2>

        <form name="std_subjects_form" action="home.php?add_student_subjects" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
                <?php
                    include "std_search_bar.php";
                
                        if(!empty($row['national_id'])) {
                ?>
                <tr>
                    <td class="label">اسم المادة:</td>
                    <td colspan="3">
                        <select name="_subname" class="txtBox full-width">
                            <?php 
                                $sql = "SELECT * FROM subjects s, subjects_specialize ss
                                                 WHERE s.sub_id = ss.sub_id
                                                 AND spec_name=?";
                                $result = $db->prepare($sql);
                                $result->execute(array($row['specialize']));
                                while($row = $result->fetch()) {
                                    echo "<option value='{$row['sub_name']}' >{$row['sub_name']}</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">تقدير المادة:</td>
                    <td colspan="3">
                        <select name="_subgrade" class="txtBox full-width">
                            <?php
                                $data->select_grade();
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" name="_subsubmit" value="إضافة" class="addBtn btn full-width" />
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </table>

        </form>

    </div>
</div>
<!--  end student subjects  -->