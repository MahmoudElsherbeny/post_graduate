<?php
    $msg = "";

    if(isset($_POST['_userAdd'])) {
        if(empty($_POST['_username']) && empty($_POST['_userpass']) && empty($_POST['_userpassc'])) {
            $msg = "برجاء ادخال البيانات";
        }
        else if($_POST['_userpass'] != $_POST['_userpassc']) {
            $msg = "كلمة المرور غير متطابقة";
        }
        else {
            $lastID = $data->last_id('users','user_id');
            
            $sql = "INSERT INTO users (user_id,username,password) VALUES (?,?,?)";
            $result = $db->prepare($sql);
            $result->execute(array($lastID+1,
                                   $_POST['_username'],
                                   $_POST['_userpass']));
            
            
            if($_POST['_userRank'] == 't') {
                $sql = "INSERT INTO user_admin (user_id,isadmin) VALUES (?,?)";
                $result = $db->prepare($sql);
                $result->execute(array($lastID+1,$_POST['_userRank']));
            }
            
            $msg = "تم الإضافة";
        }
    }

    $sql = "SELECT u.user_id,username,isadmin
               FROM users u LEFT JOIN user_admin a 
               ON (u.user_id = a.user_id) ORDER BY user_id";
    $result = $db->query($sql);
    while($row = $result->fetch()) {  

        if(isset($_POST['_deleteuser'.$row['username']])) {
            $sql = "DELETE FROM users WHERE username = ?";
            $result = $db->prepare($sql);
            $result->execute(array($row['username']));
        }
    }
?>

<!--  managing users  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>إدارة المستخدمين</h2>
        
        <div class="msg">
            <?php echo $msg; ?>
        </div>
        
        <form name="users_form" action="" method="post" class="full-width full-height out-hidden horz-Container">

            <table class="tableData full-width out-hidden" dir="rtl">
               <tr>
                   <td class="label">
                        اسم المستخدم:
                   </td>
                   <td>
                        <input type="text" name="_username" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        كلمة المرور:
                   </td>
                   <td>
                        <input type="password" name="_userpass" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        تاكيد كلمة المرور:
                   </td>
                   <td>
                        <input type="password" name="_userpassc" class="txtBox full-width" />
                   </td>
               </tr>
               <tr>
                   <td class="label">
                        رتبة المستخدم:
                   </td>
                   <td>
                        <select name="_userRank" class="txtBox full-width">
                            <option value="t">ادمن</option>
                            <option value="">دكتور</option>
                        </select>
                   </td>
               </tr>
               <tr>
                   <td colspan="2">
                        <input type="submit" name="_userAdd" value="إضافة" class="addBtn btn full-width" />
                   </td>
               </tr>
            </table>

        </form>
       
       <form name="showUsers_form" action="" method="post" class="full-width full-height out-hidden horz-Container">
           <!--  showing current users  -->
            <table class="tableShowData full-width out-hidden" dir="rtl">
                <tr>
                    <th>م</th>
                    <th>اسم المستخدم</th>
                    <th>رتبته</th>
                    <th></th>
                </tr>
                <?php 
                    $sql = "SELECT u.user_id,username,isadmin
                               FROM users u LEFT JOIN user_admin a 
                               ON (u.user_id = a.user_id) ORDER BY user_id";
                    $result = $db->query($sql);
                    while($row = $result->fetch()) {
                        echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>{$row['username']}</td>
                                <td>";
                                    if(is_null($row['isadmin'])) {
                                        echo "دكتور";
                                    }
                                    else {
                                        echo "ادمن";
                                    }
                        echo "  </td>
                                <td>
                                    <input type='submit' name='_deleteuser{$row['username']}' value='حذف' class='deleteBtn btn full-width' />
                                </td>
                            </tr>";  
                        
                        if(isset($_POST['_deleteuser'.$row['username']])) {
                            $sql = "DELETE FROM users WHERE username = ?";
                            $result = $db->prepare($sql);
                            $result->execute(array($row['username']));
                        }
                    }
                ?>

            </table>
       </form>
       <!--  end showing current users  -->

    </div>
</div>
<!--  end managing users  -->