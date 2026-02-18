<br> new employee <a href=?controller=employee&action=newEmployee>click</a><br>

<form method = "POST" action = "">
<input type = "text" name ="key" >
<input type = "hidden" name ="controller" value="employee"/>
<button type ="submit" name="action" value="search" >search</button>
</form>


<table border = 1>
<tr><td>eid</td><td>ename</td><td>elastName</td><td>branch</td><td>update</td><td>delete</td></tr>

<?php
foreach($employee_list as $employee)
{
    echo "<tr><td>$employee->eid
    </td><td>$employee->ename
    </td><td>$employee->elastName
    </td><td>$employee->bname
    <td><a href='?controller=employee&action=updateForm&eid=$employee->eid'>update</a></td>
    <td><a href='?controller=employee&action=deleteConfirm&eid=$employee->eid'>delete</a></td>
 </tr>";
}
echo "</table>";
?>