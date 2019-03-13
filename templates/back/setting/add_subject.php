<?php
    $msg = "";

    if(isset($_POST['_subAdd'])) {
        if(empty($_POST['_subnum'])) {
            $msg = "برجاء ادخال كود المادة";
        }
        else if(empty($_POST['_subname'])) {
            $msg = "برجاء ادخال اسم المادة";
        }
        else if(empty($_POST['_subhour'])) {
            $msg = "برجاء ادخال عدد ساعات المادة";
        }
        else {
            $sql = "INSERT INTO subjects (sub_id,sub_name,hours)
                           VALUES(?,?,?)";
            $result = $db->prepare($sql);
            $result->execute(array(
                            $_POST['_subnum'],
                            $_POST['_subname'],
                            $_POST['_subhour']));
            $msg = "تم الإضافة";
        }
    }
?>

<!--  adding new subjects  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة مادة جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_subject_form" action="home.php?add_subject" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        كود المادة:
                   </td>
                   <td>
                        <input type="text" name="_subnum" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        اسم المادة:
                   </td>
                   <td>
                        <input type="text" name="_subname" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        عدد الساعات:
                   </td>
                   <td>
                        <input type="number" name="_subhour" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_subAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       

    </div>
</div>
<!--  end adding new subjects  -->