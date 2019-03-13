   <!--  head -> title and logo  -->
    <div class="head full-width out-hidden">
        <div class="container horz-Container full-width full-height out-hidden">
            <!--  university logo  -->
            <div class="univLogo fl-right full-height">
                <img src="images/univ_logo.jpg" title="جامعة بورسعيد" class="full-width full-height" />
            </div>

            <!--  title  -->
            <div class="title fl-right">
                <h1>قــسـم الـدراسـات العـلـيـا</h1>
            </div>

            <!--  fuclty logo  -->
            <div class="fucLogo fl-right full-height">
                <img src="images/fucl_logo.jpg" title="جامعة بورسعيد" class="full-width full-height" />
            </div>
        </div>
    </div>
    <!--  end head  -->

    <!--  navbar  -->
    <nav class="navbar full-width">
        <div class="container full-width full-height">

            <ul class="navitems ls-st-none fl-right full-width full-height">

                <?php 
                    session_start();
                    if(!empty($_SESSION['username'])) {
                        $sql = "SELECT u.user_id,username,isadmin
                           FROM users u,user_admin a 
                           WHERE u.user_id = a.user_id and username=?";
                        $result = $db->prepare($sql);
                        $result->execute(array($_SESSION['username']));
                        $row = $result->fetch();

                        if($row['isadmin'] == 't' || $row['isadmin'] == 'b') {
                            echo <<<SHOW
                                <li class="fl-right full-height">الطلاب
                                    <ul class="subList ls-st-none">
                                        <li class="full-width">إضافة طالب
                                            <ul class="subList2 ls-st-none">
                                                <li class="full-width">
                                                    <a href="home.php?add_student" class="full-height full-width">البيانات الأساسية</a>
                                                </li>
                                                <li class="full-width">
                                                    <a href="home.php?add_student_degrees" class="full-height full-width">
                                                        المؤهلات
                                                    </a>
                                                </li>
                                                <li class="full-width">
                                                    <a href="home.php?add_student_subjects" class="full-height full-width">
                                                        تسجيل المواد
                                                    </a>
                                                </li>
                                                <li class="full-width">
                                                    <a href="home.php?add_student_supervisor" class="full-height full-width">
                                                        لجنة الإشراف
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?show_students" class="full-height full-width">عرض الطلاب</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?student_file" class="full-height full-width">ملف الطالب</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="fl-right full-height">الأقسام
                                    <ul class="subList depart ls-st-none">
SHOW;
                                       $sql = "select * from departments ORDER BY dep_id";
                                       $result = $db->query($sql);
                                       while($row = $result->fetch()) {
                                           echo <<<S
                                            <li class="full-width">
                                                <a href="home.php?departments/{$row['dep_name']}" class="full-width">{$row['dep_name']}</a>
                                            </li>
S;
                                       }
                            echo <<<SHOW
                                        <li class="full-width">
                                            <a href="home.php?specialize" class="full-width">عرض التخصصات</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="fl-right full-height">الأساتذة و المشرفين
                                    <ul class="subList ls-st-none">
                                        <li class="full-width">
                                            <a href="home.php?add_supervisor" class="full-width">إضافة مشرف</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?show_supervisor" class="full-width">عرض المشرفين</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="fl-right full-height">الإعدادات
                                    <ul class="subList ls-st-none">
                                        <li class="full-width">
                                            <a href="home.php?add_subject" class="full-width">إضافة مادة</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_subject_specialize" class="full-width">إضافة مواد للتخصص</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_specialize" class="full-width">إضافة تخصص</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_governorat" class="full-width">إضافة محافظة</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_nationality" class="full-width">إضافة جنسية</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_university" class="full-width">إضافة جامعة</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_faculty" class="full-width">إضافة كلية</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="home.php?add_rank" class="full-width">إضافة رتبة علمية</a>
                                        </li>
SHOW;
                                        $user = $data->select_admin($_SESSION['username']);
                                        if($user['isadmin'] == 'b') {
                                            echo<<<SH
                                                <li class="full-width">
                                                    <a href="home.php?users" class="full-width">المستخدمين</a>
                                                </li>
SH;
                                        }
                                        echo<<<SHOW
                                            </ul>
                                        </li>
SHOW;

                        }
                        else {
                            echo <<<SHOW
                                <li class="fl-right full-height">تقارير
                                    <ul class="subList ls-st-none">
                                        <li class="full-width">
                                            <a href="home.php?student_file" class="fl-right full-width">ملف الطالب</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="student_subjects.html" class="fl-right full-width">الاساتذة والمشرفين</a>
                                        </li>
                                        <li class="full-width">
                                            <a href="add_subject.html" class="fl-right full-width">التخصصات</a>
                                        </li>
                                    </ul>
                                </li>
SHOW;
                        }
                    }
                ?>
               
                <li class="fl-left full-height">
                    <a href="logout.php" class="fl-right full-width full-height">تسجيل الخروج</a>
                </li>
            </ul>

        </div>
    </nav>
    <!--  end navbar  -->