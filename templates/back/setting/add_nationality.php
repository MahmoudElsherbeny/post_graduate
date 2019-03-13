<?php
    $msg = "";

    if(isset($_POST['_natAdd'])) {
        if(!empty($_POST['_natName'])) {
            $lastID = $data->last_id('nationalities','nat_id');
            
            $sql = "INSERT INTO nationalities (nat_id,nationality) VALUES (?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_natName']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال الجنسية";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة جنسية جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_nationality_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        الجنسية:
                   </td>
                   <td>
                        <input type="text" name="_natName" class="txtBox full-width" autocomplete="off" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_natAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->