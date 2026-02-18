<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('connection_connect.php');

// สมมติข้อมูลเกษตรกรจาก Controller
// $farmer = (object)[
//     'idfarmer' => 1,
//     'firstName' => 'สมชาย',
//     'lastName' => 'ใจดี',
//     'address' => '123 หมู่ 4'
// ];
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขข้อมูลเกษตรกร</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f0; /* สีครีมอุ่น ๆ */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      max-width: 500px;
      margin: 50px auto;
      padding: 25px;
      border-radius: 15px;
      background-color: #fffbe6; /* สีโทนข้าวสุก */
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      border: 2px solid #ffe27f;
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 25px;
      color: #f4a261; /* สีส้มอ่อน */
      text-align: center;
    }

    label.form-label {
      font-weight: bold;
      color: #6b4226; /* สีน้ำตาลเข้ม ข้าวน่ารัก */
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ffd27f;
      background-color: #fffaf0;
    }

    .form-control:focus {
      border-color: #f4a261;
      box-shadow: 0 0 5px rgba(244,162,97,0.5);
    }

    .btn-primary {
      background-color: #f4a261;
      border-color: #f4a261;
      border-radius: 10px;
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #f7b18b;
      border-color: #f7b18b;
    }

    .btn-secondary {
      background-color: #8fcf5f;
      border-color: #8fcf5f;
      border-radius: 10px;
      font-weight: bold;
    }

    .btn-secondary:hover {
      background-color: #a4e17f;
      border-color: #a4e17f;
    }

    .d-flex {
      margin-top: 15px;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>แก้ไขข้อมูลเกษตรกร 🌾</h2>
  <form method="POST">
    <input type="hidden" name="idfarmer" value="<?= $farmer->idfarmer ?>">
  

    <div class="mb-3">
      <label class="form-label">ชื่อ</label>
      <input type="text" name="firstName" value="<?= $farmer->firstName ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">นามสกุล</label>
      <input type="text" name="lastName" value="<?= $farmer->lastName ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">ที่อยู่</label>
      <input type="text" name="address" value="<?= $farmer->address ?>" class="form-control">
    </div>

    <input type="hidden" name="controller" value="farmer">
    <div class="d-flex justify-content-between">
      <a href="?controller=farmer&action=index" class="btn btn-secondary">Back</a>
      <button type="submit" name="action" value="update" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
