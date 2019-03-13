<?php
    $msg = "";

    if(isset($_POST['_rankAdd'])) {
        if(!empty($_POST['_rankName'])) {
            $lastID = $data->last_id('doctors_rank','rank_id');
            
            $sql = "INSERT INTO doctors_rank (rank_id,rank) VALUES (?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_rankName']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال الرتبة العلمية";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة رتبة علمية جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_docranks_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم الرتبة:
                   </td>
                   <td>
                        <input type="text" name="_rankName" class="txtBox full-width" placeholder="ex: Dr" autocomplete="off" />
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_rankAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->