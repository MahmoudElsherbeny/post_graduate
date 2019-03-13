<?php
    include "templates/back/clases/adminDB_config.php";
    
    $dbh = new db_config;
    $db = $dbh->DBconnect();

    $msg = "";
    if(isset($_POST['_login'])) {
        $sql = "SELECT * FROM users WHERE username=? and password=?";
        $result = $db->prepare($sql);
        $result->execute(array($_POST['_username'],$_POST['_password']));
        $row = $result->fetch();
        
        if($row['username']) {
            session_start();
            $_SESSION['username'] = $_POST['_username'];
            header("Location:home.php");
        }
        else {
            $msg = "خطا فى اسم المستخدم او كلمة المرور";
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <title>تسجيل الدخول</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Changa">
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/tables.css" />
        <link rel="stylesheet" href="css/grouping.css" />
    </head>
    <body>
        
        <!--  login page  -->
        <div class="login container horz-container out-hidden">
            
            <h2>تسجيل الدخول</h2>
            <form name="login" action="" method="post" class="full-width full-height out-hidden">
                <table class="tableData full-width full-height out-hidden" dir="rtl">
                    <tr>
                        <td class="label">
                            اسم المستخدم:
                        </td>
                        <td>
                            <input type="text" name="_username" class="txtBox full-width" autocomplete="off" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label">
                            كلمة المرور:
                        </td>
                        <td>
                            <input type="password" name="_password" class="txtBox full-width" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="_login" value="تسجيل دخول" class="loginBtn btn full-width" />
                        </td>
                    </tr>
                </table>
                
                <div class="msg">
                    <?php
                        echo $msg;
                    ?>
                </div>
                
            </form>
        </div>
        <!--  end login page  -->
                    
    </body>
</html>