<!--  show supervisor form  -->   
<div class="container horz-Container empty-container full-width full-height out-hidden">

   <div class="dataContainer full-width full-height out-hidden">
       <h2>اللأساتذة و المشرفين</h2>

       <form name="supervisor_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <table class="tableShowData full-width full-height out-hidden" dir="rtl">
               <tr>
                    <th>م</th>
                    <th>اسم المشرف</th>
                    <th>التخصص</th>
                    <th>كلية</th>
                    <th>جامعة</th>
                    <th></th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM supervisors";
                    $result = $db->query($sql);
                    while($row = $result->fetch()) {
                        echo "<tr>
                                <td>{$row['super_id']}</td>
                                <td>{$row['rank']}/ {$row['name']}</td>
                                <td>{$row['specialize']}</td>
                                <td>{$row['faculty']}</td>
                                <td>{$row['university']}</td>
                                <td>
                                    <input type='submit' name='_deletesuper{$row['super_id']}' value='حذف' class='deleteBtn btn full-width' />
                                </td>
                            </tr>";  
                        
                        if(isset($_POST['_deletesuper'.$row['super_id']])) {
                            $sql = "DELETE FROM supervisors WHERE super_id = ?";
                            $result = $db->prepare($sql);
                            $result->execute(array($row['super_id']));
                        }
                    }
                ?>
           </table>

       </form>


   </div>
</div>    
<!--  end show supervisor form  -->       