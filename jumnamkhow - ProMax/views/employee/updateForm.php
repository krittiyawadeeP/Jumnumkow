<form method="POST" action="">

    <label>รหัส 
        <input type="text" name="eid" value="<?php echo $employee->eid; ?>" /> 
    </label><br>

    <label>ชื่อ 
        <input type="text" name="ename" value="<?php echo $employee->ename; ?>" /> 
    </label><br>

    <label>นามสกุล 
        <input type="text" name="elastName" value="<?php echo $employee->elastName; ?>" /> 
    </label><br>

    <label>สาขา 
        <select name="bid">
            <?php foreach($branch_list as $branch) { 
                $selected = ($branch->bid == $employee->bid) ? "selected" : "";
                echo "<option value='{$branch->bid}' $selected>{$branch->bname}</option>";
            } ?>
        </select>
    </label><br>

    <input type="hidden" name="controller" value="employee" />
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="update">Update</button>

</form>
