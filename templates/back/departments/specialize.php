
<!--  departments data  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>عرض التخصصات</h2>

            <table class="tableShowData full-width out-hidden" dir="rtl">
                <tr>
                    <th>م</th>
                    <th>التخصص</th>
                    <th>القسم</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM specialization ORDER BY dep_name";
                    $result = $db->query($sql);
                    $num = 1;
                    while($row = $result->fetch()) {
                        echo <<<SHOW
                            <tr>
                                <td>$num</td>
                                <td>{$row['spec_name']}</td>
                                <td>{$row['dep_name']}</td>
                            </tr>
SHOW;
                        $num++;
                    }
                ?>
            </table>

    </div>
</div>
<!--  end departments data  -->