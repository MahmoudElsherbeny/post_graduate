<?php
    $msg="";
    if(isset($_POST['_subSpecAdd'])) {
        $sql = "SELECT sub_id FROM subjects WHERE sub_name=?";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['_subname']));
        $row = $result->fetch();
        
        $sql = "INSERT INTO subjects_specialize (sub_id,spec_name)
                       VALUES(?,?)";
        $result = $db->prepare($sql);
        $result->execute(array($row['sub_id'], $_POST['_subSpecialize']));
        
        $msg = "تم الإضافة";
    }
?>

<!--  end connecting subjects to specialize  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة مادة إالى تخصص</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_subject_spec_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم المادة:
                   </td>
                   <td>
                        <select name="_subname" class="txtBox full-width">
                            <?php 
                                $sql = "SELECT * FROM subjects";
                                $result = $db->query($sql);
                                while($row = $result->fetch()) {
                                    echo "<option value='{$row['sub_name']}' >{$row['sub_name']}</option>";
                                }
                            ?>
                        </select>
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        التخصص:
                   </td>
                   <td>
                        <select name="_subSpecialize" class="txtBox full-width">
                            <?php 
                                $data->select_specialize();
                            ?>
                        </select>
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_subSpecAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       

    </div>
</div>
<!--  end connecting subjects to specialize  -->