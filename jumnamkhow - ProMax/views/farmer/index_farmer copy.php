<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff8f0; /* โทนสีขาวครีมอบอุ่น */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 14px;
        background-color: #fffbe6; /* สีโทนข้าวสุก */
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #4dd67dff; /* สีทองอ่อน */
        color: #333;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #fff3b0; /* สีเหลืองอ่อน */
    }

    tr:hover {
        background-color: #c3f0a4; /* สีเขียวอ่อนเวลาชี้ */
        transition: 0.3s;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
    }

    a.update {
        background-color: #ff7f50; /* สีส้ม */
    }

    a.delete {
        background-color: #ff4d4d; /* สีแดงน่ารัก */
    }

    a.back {
        display: inline-block;
        margin: 20px 0;
        background-color: #8fcf5f; /* สีเขียวใบข้าว */
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
    }

    a.update:hover {
        background-color: #ff956b;
    }

    a.delete:hover {
        background-color: #ff6666;
    }

    a.back:hover {
        background-color: #7abd52;
    }
</style>


<form method = "POST" action = "">
<input type = "text" name ="key" >
<input type = "hidden" name ="controller" value="farmer"/>
<button type ="submit" name="action" value="userSearch" >search</button>
<a class="back" href="?controller=farmer&action=index">Reload</a>
<a class="back" href="?controller=pages&action=home">Back</a>
</form>

<table>
<tr>
    <th>idfarmer</th>
    <th>firstName</th>
    <th>lastName</th>
    <th>address</th>
    <th>subdistrict</th>
    <th>district</th>
    <th>province</th>
    <th>Bank</th>
    <th>account_number</th>
    <th>limitPledge</th>
    <th>password</th>
    <th>update</th>
    <th>delete</th>
</tr>

<?php
foreach($farmer_list as $farmer) {
    echo "<tr>
        <td>{$farmer->idfarmer}</td>
        <td>{$farmer->firstName}</td>
        <td>{$farmer->lastName}</td>
        <td>{$farmer->address}</td>
        <td>{$farmer->subdistrictName}</td>
        <td>{$farmer->districtName}</td>
        <td>{$farmer->provinceName}</td>
        <td>{$farmer->name}</td>
        <td>{$farmer->account_number}</td>
        <td>{$farmer->limitPledge}</td>
        <td>{$farmer->password}</td>
        <td><a class='update' href='?controller=farmer&action=updateForm&idfarmer={$farmer->idfarmer}'>Update</a></td>
        <td><a class='delete' href='?controller=farmer&action=deleteConfirm&idfarmer={$farmer->idfarmer}'>Delete</a></td>
    </tr>";
}
?>
</table>


