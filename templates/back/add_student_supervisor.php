<?php
    $msg = "";
    if(isset($_POST['_supersubmit'])) {
        for($i=1; $i<=4; $i++){
            if(!empty($_POST['_supername'.$i])) {
                $sql = "SELECT * FROM supervisors WHERE name=?";
                $result = $db->prepare($sql);
                $result->execute(array($_POST['_supername'.$i]));
                while($row = $result->fetch()) {
                    if($row['name'] != $_POST['_supername'.$i]) {
                        $msg = "المشرف غير مسجل برجاء تسجيله";
                    }
                    else{
                        $sql = "INSERT INTO student_supervisor (std_id,supervisor)
                                        VALUES(?,?)";
                        $result = $db->prepare($sql);
                        $result->execute(array($_POST['_idvalue'],$row['super_id']));
                        $msg = "تم الإضافة";
                    }
                }
            }
            else {
                $msg = "برجاء ادخال المشرفين";
            }
        }
    }
?>

<!--  add student supervisors form  -->   
<div class="container horz-Container empty-container full-width full-height out-hidden">

   <div class="dataContainer full-width full-height out-hidden">
       <h2>لجنة إشراف الطـالـب</h2>

       <div class="msg">
           <?php echo $msg; ?>
       </div>

       <form name="std_supervisor_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <table class="stdData tableData full-width full-height out-hidden" dir="rtl">

               <?php 
                    include "std_search_bar.php";
               ?>

                <tr>
                   <td colspan="3">
                       <h3>اضافة مشرفين:</h3>
                   </td>
               </tr>
               
               <?php for($i=1; $i<=4; $i++){
               echo <<<SHOW
                <tr>
                   <td class="label">اسم المشرف:</td>
                   <td colspan="3">
                       <input type="text" name="_supername{$i}" class="txtBox full-width" />
                   </td>
                </tr>
SHOW;
                 } 
               ?>
                
           </table>

           <input type="submit" name="_supersubmit" value="إضافة" class="addBtn btn full-width" />
       </form>

   </div>
</div>    
<!--  end add supervisors form  -->  