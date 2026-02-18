<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>🌾 จัดการข้อมูลเกษตรกร</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fff8e7;
    margin: 20px;
  }

  h2 {
    text-align: center;
    color: #6b4c2d;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    margin-bottom: 20px;
  }

  form {
    text-align: center;
    margin-bottom: 20px;
  }

  input[type="text"] {
    padding: 8px 12px;
    border-radius: 10px;
    border: 1px solid #d3b89a;
    width: 200px;
    background-color: #fffaf3;
  }

  button, a.back {
    background-color: #f8b26a;
    border: none;
    color: #fff;
    padding: 8px 20px;
    border-radius: 15px;
    cursor: pointer;
    font-weight: bold;
    margin: 5px;
    text-decoration: none;
    transition: transform 0.2s;
  }

  button:hover, a.back:hover {
    background-color: #e8913f;
    transform: scale(1.05);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fffaf3;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  }

  th, td {
    padding: 12px;
    text-align: center;
  }

  th {
    background-color: #ffd591;
    color: #4a2e05;
  }

  tr:nth-child(even) {
    background-color: #fff1cc;
  }

  tr:hover {
    background-color: #ffe7b8;
    transition: 0.3s;
  }

  a.update, a.delete {
    padding: 6px 14px;
    border-radius: 12px;
    color: #fff;
    font-weight: bold;
    text-decoration: none;
  }

  a.update {
    background-color: #ff9f43;
  }

  a.update:hover {
    background-color: #ff7b00;
  }

  a.delete {
    background-color: #e74c3c;
  }

  a.delete:hover {
    background-color: #c0392b;
  }

  .footer {
    text-align: center;
    margin-top: 25px;
    color: #7c5a37;
    font-size: 14px;
  }
</style>
</head>

<body>
  <h2>🌾 รายชื่อเกษตรกรในระบบ 🌾</h2>

  <form method="POST" action="">
    <input type="text" name="key" placeholder="🔍 ค้นหาชื่อเกษตรกร,จังหวัด,อำเภอ,ตำบล">
    <input type="hidden" name="controller" value="farmer"/>
    <button type="submit" name="action" value="userSearch">ค้นหา</button>
    <a class="back" href="?controller=farmer&action=index">🔄 โหลดใหม่</a>
    <a class="back" href="?controller=pages&action=home">🏠 กลับหน้าหลัก</a>
  </form>

  <table>
    <tr>
      <th>ID</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>ที่อยู่</th>
      <th>ตำบล</th>
      <th>อำเภอ</th>
      <th>จังหวัด</th>
      <th>ธนาคาร</th>
      <th>เลขบัญชี</th>
      <th>สิทธิจำนำสูงสุด (kg)</th>
      <th>รหัสผ่าน</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
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
            <td><a class='update' href='?controller=farmer&action=updateForm&idfarmer={$farmer->idfarmer}'>📝</a></td>
            <td><a class='delete' href='?controller=farmer&action=deleteConfirm&idfarmer={$farmer->idfarmer}'>❌</a></td>
        </tr>";
    }
    ?>
  </table>

  <div class="footer">
    💛 ระบบจำนำข้าว | ออกแบบด้วยความใส่ใจโดย Krittiyawadee 💛
  </div>
</body>
</html>
