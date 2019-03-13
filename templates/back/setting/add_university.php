<?php
    $msg = "";

    if(isset($_POST['_univAdd'])) {
        if(!empty($_POST['_univName'])) {
            $lastID = $data->last_id('universities','univ_id');
            
            $sql = "INSERT INTO universities (univ_id,univ_name) VALUES (?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_univName']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال اسم الجامعة";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة جامعة جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_university_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم الجامعة:
                   </td>
                   <td>
                        <input type="text" name="_univName" class="txtBox full-width" autocomplete="off" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_univAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->