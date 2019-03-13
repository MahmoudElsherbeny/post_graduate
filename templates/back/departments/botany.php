
<!--  departments data  -->
<div class="container horz-Container empty-container full-width full-height out-hidden">
    <div class="dataContainer full-width full-height out-hidden">
        <h2>قسم نبات</h2>

            <h3>:مجالات التخصص</h3>
            <table class="tableShowData full-width out-hidden" dir="rtl">
                <tr>
                    <th>م</th>
                    <th colspan="2">التخصصات</th>
                </tr>
                <?php
                    $sql = "SELECT spec_id,spec_name,dep_name FROM specialization s,departments d 
                                    WHERE s.dep_id = d.dep_id AND dep_name = 'نبات'";
                    $result = $db->query($sql);
                    $num = 1;
                    while($row = $result->fetch()) {
                        echo <<<SHOW
                            <tr>
                                <td>$num</td>
                                <td>{$row['spec_name']}</td>
                            </tr>
SHOW;
                        $num++;
                    }
                ?>
            </table>

    </div>
</div>
<!--  end departments data  -->