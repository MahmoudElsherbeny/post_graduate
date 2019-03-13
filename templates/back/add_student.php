<?php
    $msg = "";
    if(isset($_POST['_stdsubmit'])) {
        
        if (empty($_POST['_pid'])) {
            $msg = "برجاء ادخال الرقم القومى";
        }
        else {
            $row = $stdData->show_student_data($_POST['_pid']);
            
            if (strlen($_POST['_name']) < 15) {
                $msg = "برجاء ادخال الاسم رباعى";
            }
            else if (empty($_POST['_birthplace'])) {
                $msg = "برجاء ادخال جهة الميلاد";
            }
            else if (empty($_POST['_birthdate'])) {
                $msg = "برجاء ادخال تاريخ الميلاد";
            }
            elseif (empty($_POST['_address'])) {
                $msg = "برجاء ادخال العنوان";
            }
            elseif (empty($_POST['_phone'])) {
                $msg = "برجاء ادخال رقم الهاتف";
            }
            elseif (empty($_POST['_artitle'])) {
                $msg = "برجاء ادخال عنوان الرسالة";
            }
            elseif (empty($_POST['_entitle'])) {
                $msg = "برجاء ادخال عنوان الرسالة";
            }
            else if ($_POST['_pid'] == $row['national_id']) {
                $msg = "الطالب مسجل مسبقا";
            }
            else {
                $sql = "INSERT INTO students 
                               (std_name,national_id,birth_date,birth_place,nationality,governorat,address,phone,work_place)
                               VALUES (?,?,?,?,?,?,?,?,?)";
                $result = $db->prepare($sql);
                $result->execute(array($_POST['_name'],
                                       $_POST['_pid'],
                                       $_POST['_birthdate'],
                                       $_POST['_birthplace'],
                                       $_POST['_nationality'],
                                       $_POST['_governorat'],
                                       $_POST['_address'],
                                       $_POST['_phone'],
                                       $_POST['_workplace']
                                      ));
                $sql = "INSERT INTO student_degree_study
                                (std_id,degree_study,specialize,study_year,title_ar,title_en,faculty,university)
                                values (?,?,?,?,?,?,
                                        'كلية علوم',
                                        'جامعة بورسعيد')";
                $result = $db->prepare($sql);
                $result->execute(array($_POST['_pid'],
                                       $_POST['_degree'],
                                       $_POST['_specialize'],
                                       $_POST['_studyear'],
                                       $_POST['_artitle'],
                                       $_POST['_entitle']
                                      ));
                $sql = "INSERT INTO student_degrees (std_id) values (?)";
                $result = $db->prepare($sql);
                $result->execute(array($_POST['_pid']));
                
                $msg = "تمت إضافة الطالب";
                }
        }
        
    }
?>
    
<!--  add student form  -->   
<div class="container horz-Container empty-container full-width full-height out-hidden">

   <div class="dataContainer full-width full-height out-hidden">
       <h2>إضـافـة طـالـب</h2>

      <div class="msg">
           <?php echo $msg; ?>
       </div>

       <form name="std_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <table class="stdData tableData full-width full-height out-hidden" dir="rtl">
               <tr>
                   <td class="label">الاسم بالكامل:</td>
                   <td>
                       <input type="text" name="_name" class="txtBox full-width" />
                   </td>
                   <td class="label">الرقم القومى:</td>
                   <td>
                       <input type="text" name="_pid" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">تاريخ الميلاد:</td>
                   <td>
                       <input type="date" name="_birthdate" class="txtBox full-width" />
                   </td>
                   <td class="label">جهة الميلاد:</td>
                   <td>
                       <input type="text" name="_birthplace" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">الجنسية:</td>
                   <td>
                       <select name="_nationality" class="txtBox full-width">
                           <?php 
                               $data->select_nationality(); 
                           ?>
                       </select>
                   </td>
                   <td class="label">المحافظة:</td>
                   <td>
                       <select name="_governorat" class="full-width out-hidden txtBox">
                           <?php 
                                $data->select_governorat();
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td class="label">العنوان:</td>
                   <td>
                       <input type="text" name="_address" class="txtBox full-width" />
                   </td>
                   <td class="label">رقم الهاتف:</td>
                   <td>
                       <input type="text" name="_phone" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">جهة العمل:</td>
                   <td>
                       <input type="text" name="_workplace" class="txtBox full-width" />
                   </td>
                   <td class="label">الدرجة المراد التسجيل لها:</td>
                   <td>
                       <select name="_degree" class="txtBox full-width">
                           <?php 
                                $data->select_degree();
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td class="label">مجال التخصص:</td>
                   <td>
                       <select name="_specialize" class="txtBox full-width">
                           <?php
                                $data->select_specialize();
                           ?>
                       </select>
                   </td>
                   <td class="label">العام الجامعى:</td>
                   <td>
                       <select name="_studyear" class="txtBox full-width">
                           <?php
                                $data->select_studyear();
                           ?>
                       </select>
                   </td>
               </tr>
                <tr>
                    <td colspan="4">
                        <h3>عنوان الرسالة:</h3>
                    </td>
                </tr>
                <tr>
                    <td class="label">باللغة العربية:</td>
                   <td colspan="3">
                       <input type="text" name="_artitle" class="txtBox full-width" />
                   </td>
                </tr>
                <tr>
                    <td class="label">باللغة الإنجليزية:</td>
                   <td colspan="3">
                       <input type="text" name="_entitle" class="txtBox full-width" />
                   </td>
                </tr>
           </table>

           <input type="submit" name="_stdsubmit" value="إضافة" class="addBtn btn full-width" />
       </form>


   </div>
</div>    
<!--  end add student form  -->       