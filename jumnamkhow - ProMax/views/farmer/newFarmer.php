<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('connection_connect.php');

// ดึงจังหวัด
$sql_provinces = "SELECT * FROM province";
$query = mysqli_query($conn, $sql_provinces);

$sql_bank = "SELECT * FROM Bank";
$bank_list = mysqli_query($conn, $sql_bank);
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <title>ขึ้นทะเบียนเกษตรกร 🌾</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
      body {
          background-color: #fff8f0; /* โทนครีมอบอุ่น */
          font-family: 'Prompt', sans-serif;
      }
      .form-container {
          max-width: 650px;
          margin: 50px auto;
          padding: 35px 40px;
          background-color: #fffbe6; /* สีข้าวสุก */
          border-radius: 20px;
          box-shadow: 0 8px 25px rgba(0,0,0,0.1);
          border: 2px solid #ffe27f;
      }
      .form-container h2 {
          margin-bottom: 20px;
          font-weight: 700;
          text-align: center;
          color: #f4a261; /* ส้มพาสเทล */
      }
      .form-container p {
          text-align: center;
          color: #5a4633;
          margin-bottom: 25px;
      }
      label {
          font-weight: 600;
          color: #6b4226; /* สีน้ำตาลข้าว */
      }
      .form-control {
          border-radius: 10px;
          border: 1px solid #ffd27f;
          background-color: #fffaf0;
      }
      .form-control:focus {
          border-color: #f4a261;
          box-shadow: 0 0 6px rgba(244,162,97,0.4);
      }
      .btn-success {
          background-color: #8fcf5f;
          border: none;
          border-radius: 12px;
          font-weight: bold;
          padding: 8px 18px;
      }
      .btn-success:hover {
          background-color: #a6e97b;
      }
      .btn-default {
          background-color: #f7b267;
          border: none;
          border-radius: 12px;
          color: #fff;
          font-weight: bold;
          padding: 8px 18px;
      }
      .btn-default:hover {
          background-color: #f9c58c;
          color: #fff;
      }
      .btn-custom {
          min-width: 100px;
      }
      .header-icon {
          text-align: center;
          font-size: 2rem;
          margin-bottom: 10px;
      }
      select option:disabled {
          color: #bbb;
      }
  </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <div class="header-icon">🌾💛</div>
        <h2>ขึ้นทะเบียนเกษตรกร</h2>
        <p>กรุณากรอกข้อมูลให้ครบถ้วน เพื่อเข้าร่วมโครงการจำนำข้าว</p>

        <form method="POST">
            <div class="form-group mb-3">
                <label for="firstName">ชื่อ</label>
                <input type="text" name="firstName" id="firstName" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="lastName">นามสกุล</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">ตั้งค่ารหัสผ่าน</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="address">ที่อยู่</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="province">จังหวัด</label>
                <select class="form-control" name="Ref_prov_id" id="province" required>
                    <option value="" selected disabled>- กรุณาเลือกจังหวัด -</option>
                    <?php foreach ($query as $value) { ?>
                        <option value="<?=$value['provinceId']?>"><?=$value['provinceName']?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="district">อำเภอ</label>
                <select class="form-control" name="Ref_dist_id" id="district" required></select>
            </div>

            <div class="form-group mb-3">
                <label for="subdistrict">ตำบล</label>
                <select class="form-control" name="Ref_subdist_id" id="subdistrict" required></select>
            </div>

            <div class="form-group mb-3">
                <label for="limitPledge">สิทธิ์การจำนำสูงสุด (กิโลกรัม)</label>
                <input type="text" name="limitPledge" id="limitPledge" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="account_number">เลขบัญชีธนาคาร</label>
                <input type="text" name="account_number" id="account_number" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="idBank">ธนาคาร</label>
                <select class="form-control" name="idBank" id="idBank" required>
                    <option value="" selected disabled>- กรุณาเลือกธนาคาร -</option>
                    <?php foreach ($bank_list as $value) { ?>
                        <option value="<?=$value['idBank']?>"><?=$value['name']?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="hidden" name="controller" value="farmer"/>

            <div class="text-center mt-4">
                <a href="?controller=pages&action=home" class="btn btn-default btn-custom me-2">ย้อนกลับ</a>
                <button type="submit" name="action" value="addFarmer" class="btn btn-success btn-custom">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>

<?php include('script.php'); ?>
</body>
</html>
