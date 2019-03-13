<?php
    $msg = "";

    if(isset($_POST['_govAdd'])) {
        if(!empty($_POST['_govname'])) {
            $lastID = $data->last_id('governorates','gov_id');
            
            $sql = "INSERT INTO governorates (gov_id,gov_name) VALUES (?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_govname']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال اسم المحافظة";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة محافظة جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_governorat_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم المحافظة:
                   </td>
                   <td>
                        <input type="text" name="_govname" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_govAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->