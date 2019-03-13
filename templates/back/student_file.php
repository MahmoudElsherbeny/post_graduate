<!--  show student file  -->   
<div class="container horz-Container empty-container full-width full-height out-hidden">

   <div class="dataContainer full-width full-height out-hidden">
       <h2>عرض ملف الطالب</h2>
       
       <form name="std_file" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <table class="stdData tableData full-width full-height out-hidden" dir="rtl">
                <?php 
                    include "std_search_bar.php";
               
                    if(isset($_POST['_srchSubmit'])) {
                ?>
                    <tr>
                        <td class="label">عنوان الرسالة باللغة العربية:</td>
                        <td><?php echo $row['title_ar'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">عنوان الرسالة باللغة الإنجليزية:</td>
                        <td><?php echo $row['title_en'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">الجنسية:</td>
                        <td><?php echo $row['nationality'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">المحافظة:</td>
                        <td><?php echo $row['governorat'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">العنوان:</td>
                        <td><?php echo $row['address'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">رقم الهاتف:</td>
                        <td><?php echo $row['phone'] ?></td>
                    </tr>
                    <tr>
                        <td class="label">جهة العمل:</td>
                        <td><?php echo $row['work_place'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3>المؤهلات:</h3>
                        </td>
                    </tr>
                    
                    <table class="tableShowData full-width full-height out-hidden" dir="rtl">
                       <tr>
                            <th>الدرجة العلمية</th>
                            <th>التخصص</th>
                            <th>سنة</th>
                            <th>التقدير</th>
                            <th>كلية</th>
                            <th>جامعة</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM student_degrees WHERE std_id=?";
                            $result = $db->prepare($sql);
                            $result->execute(array($_POST['_srchname']));
                        
                            while($row = $result->fetch()){
                                echo <<<SHOW
                                    <tr>
                                        <td>{$row['degree']}</td>
                                        <td>{$row['specialize']}</td>
                                        <td>{$row['study_year']}</td>
                                        <td>{$row['grade']}</td>
                                        <td>{$row['faculty']}</td>
                                        <td>{$row['university']}</td>
                                    </tr>
SHOW;
                            }
                        ?>
                   </table>
                   
                   <tr>
                       <td colspan="2">
                           <h3>لجنة الإشراف</h3>
                       </td>
                   </tr>
                   
                   <table class="tableShowData full-width full-height out-hidden" dir="rtl">
                       <tr>
                            <th>اللإسم</th>
                            <th>التخصص</th>
                            <th>كلية</th>
                            <th>جامعة</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM student_supervisor, supervisors
                                            WHERE supervisor = super_id
                                            AND std_id =?";
                            $result = $db->prepare($sql);
                            $result->execute(array($_POST['_srchname']));
                        
                            while($row = $result->fetch()){
                                echo <<<SHOW
                                    <tr>
                                        <td>{$row['rank']}/ {$row['name']}</td>
                                        <td>{$row['specialize']}</td>
                                        <td>{$row['faculty']}</td>
                                        <td>{$row['university']}</td>
                                    </tr>
SHOW;
                            }
                        ?>
                   </table>
                   
                   <tr>
                       <td colspan="2">
                           <h3>المواد</h3>
                       </td>
                   </tr>
                   
                   <table class="tableShowData full-width full-height out-hidden" dir="rtl">
                       <tr>
                            <th>م</th>
                            <th>اسم المادة</th>
                            <th>التقدير</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM student_subjects ss, subjects s
                                            WHERE ss.sub_id = s.sub_id
                                            AND std_id =?";
                            $result = $db->prepare($sql);
                            $result->execute(array($_POST['_srchname']));
                            
                            $num = 1;
                            while($row = $result->fetch()){
                                echo <<<SHOW
                                    <tr>
                                        <td>{$num}</td>
                                        <td>{$row['sub_name']}</td>
                                        <td>{$row['grade']}</td>
                                    </tr>
SHOW;
                                $num++;
                            }
                        ?>
                   </table>
                
                <?php
                    }
                ?>
           </table>
       </form>
    </div>
</div>
<!--  end show student file  -->   