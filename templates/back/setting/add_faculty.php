<?php
    $msg = "";

    if(isset($_POST['_facAdd'])) {
        if(!empty($_POST['_facName'])) {
            $lastID = $data->last_id('faculties','fac_id');
            
            $sql = "INSERT INTO faculties (fac_id,fac_name) VALUES (?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_facName']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال اسم الكلية";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة كلية جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_faculty_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم الكلية:
                   </td>
                   <td>
                        <input type="text" name="_facName" class="txtBox full-width" autocomplete="off" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_facAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->