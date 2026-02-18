<?php  #maybe checked
echo"<br> are you sure to delete this ??</br>
<br> $employee->eid $employee->ename $employee->elastName<br> ";?>

<form method = "POST" action = "">
    <input type ="hidden" name="controller" value="employee"/>
    <input type ="hidden" name="eid" value="<?php echo $employee->eid; ?>"/>
    
    <button type ="submit" name="action" value="index" >Back</button>
    <button type ="submit" name="action" value="delete" >delete</button>
</form>