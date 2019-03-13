<?php
    $msg = "";

    if(isset($_POST['_specAdd'])) {
        if(!empty($_POST['_specName'])) {
            $lastID = $data->last_id('specialization','spec_id');
            
            $sql = "INSERT INTO specialization (spec_id,spec_name,dep_name) VALUES (?,?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1, $_POST['_specName'], $_POST['_depname']));
            $msg = "تم الإضافة";
        }
        else {
            $msg = "برجاء ادخال اسم التخصص";
        }
    }
?>

<!--  adding new governorat  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إضافة تخصص جديدة</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="add_specialize_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم التخصص:
                   </td>
                   <td>
                        <input type="text" name="_specName" class="txtBox full-width" autocomplete="off" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        اسم القسم:
                   </td>
                   <td>
                       <select name="_depname" class="txtBox full-width">
                           <?php
                                $data->select_department();
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_specAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
    </div>
</div>
<!--  end adding new governorat  -->