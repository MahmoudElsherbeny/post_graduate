<?php
    $msg = "";
    if(isset($_POST['_supvisAdd'])) {
        
            
            if (strlen($_POST['_docname']) < 15) {
                $msg = "برجاء ادخال الاسم رباعى";
            }
            else {
                $lastID = $data->last_id('supervisors','super_id');
                
                $sql = "INSERT INTO supervisors (super_id,name,rank,specialize,faculty,university) 
                               VALUES (?,?,?,?,?,?)";
                $result = $db->prepare($sql);
                $result->execute(array($lastID+1,
                                       $_POST['_docname'],
                                       $_POST['_docrank'],
                                       $_POST['_docspec'],
                                       $_POST['_docfac'],
                                       $_POST['_docuniv']
                                      ));
                
                $msg = "تمت إضافة المشرف";
                }
        }
?>
    
<!--  add supervisor form  -->   
<div class="container horz-Container empty-container full-width full-height out-hidden">

   <div class="dataContainer full-width full-height out-hidden">
       <h2>إضـافـة مشرف جديد</h2>

      <div class="msg">
           <?php echo $msg; ?>
       </div>

       <form name="supervisor_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <table class="tableData full-width full-height out-hidden" dir="rtl">
               <tr>
                   <td class="label">الاسم بالكامل:</td>
                   <td>
                       <input type="text" name="_docname" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">التخصص:</td>
                   <td>
                       <input type="text" name="_docspec" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">الرتبة العلمية:</td>
                   <td>
                       <select name="_docrank" class="txtBox full-width">
                           <?php 
                               $data->select_ranks(); 
                           ?>
                       </select>
                   </td>
                </tr>
                <tr>
                  <td class="label">الكلية:</td>
                   <td>
                       <select name="_docfac" class="txtBox full-width">
                           <?php 
                               $data->select_faculty(); 
                           ?>
                       </select>
                   </td>
                </tr>
                <tr>
                  <td class="label">الجامعة:</td>
                   <td>
                       <select name="_docuniv" class="txtBox full-width">
                           <?php 
                               $data->select_university(); 
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                       <input type="submit" name="_supvisAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
           </table>

       </form>


   </div>
</div>    
<!--  end add supervisor form  -->       