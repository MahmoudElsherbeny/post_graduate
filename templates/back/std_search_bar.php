<?php 
    if(isset($_POST['_srchSubmit'])) {
        if(!empty($_POST['_srchname'])){
            $row = $stdData->show_student_data($_POST['_srchname']);
            if(empty($row['national_id'])) {
                $msg = "لا يوجد نتيجة";
            }
        }
    }
?>


<tr>
    <td class="label">
        <label>اسم الطالب:</label>
    </td>
    <td colspan="2">
        <input type="text" name="_srchname" placeholder="ادخل اسم الطالب او الرقم القومى" class="txtBox full-width" />
    </td>
    <td class="label">
        <input type="submit" name="_srchSubmit" value="بحث" class="showBtn btn">
    </td>
</tr>

<?php
    if(!empty($row['national_id'])) {
            echo <<<SH
                <tr>
                    <td class="label">اسم الطالب:</td>
                    <td colspan="2">{$row['std_name']}</td>
                </tr>
                <tr>
                    <td class="label">الرقم القومى:</td>
                    <td colspan="2">
                        <input type="text" name="_idvalue" value="{$row['national_id']}" readonly class="readonly full-width">
                    </td>
                </tr>
                <tr>
                    <td class="label">الدرجة المسجل لها:</td>
                    <td colspan="2">
                        <input type="text" name="_degreeValue" value="{$row['degree_study']}" readonly class="readonly full-width">
                    </td>
                </tr>
                <tr>
                    <td class="label">مجال التخصص:</td>
                    <td colspan="2">
                        <input type="text" name="_specValue" value="{$row['specialize']}" readonly class="readonly full-width">
                    </td>
                </tr>
                <tr>
                    <td class="label">دفعة:</td>
                    <td colspan="2">{$row['study_year']}</td>
                </tr>
SH;
        }
?>