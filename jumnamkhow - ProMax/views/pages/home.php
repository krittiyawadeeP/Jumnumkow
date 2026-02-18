<?php 
// หน้า Homepage.php
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🌾 ระบบจำนำข้าว 🌾</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #fff8e7, #ffe7c6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      max-width: 500px;
      margin: 100px auto;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      text-align: center;
      background: #fff3e6;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .welcome-small {
      font-size: 20px; /* เล็กกว่า main title */
      color: #6b4c2d;
      margin-bottom: 10px;
      font-weight: 500;
    }
    .main-title {
      font-size: 36px; /* ตัวใหญ่และหนา */
      font-weight: bold;
      color: #6b4c2d;
      margin-bottom: 20px;
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    p {
      font-size: 16px;
      color: #6b4c2d;
    }
    .btn {
      border-radius: 15px;
      font-weight: bold;
      transition: transform 0.2s;
    }
    .btn:hover {
      transform: scale(1.05);
    }
    .btn-primary { background-color: #ff9f43; border: none; color: #fff; }
    .btn-primary:hover { background-color: #ff6f00; }
    .btn-success { background-color: #6ab04c; border: none; color: #fff; }
    .btn-success:hover { background-color: #3c7d12; }
    .btn-secondary { background-color: #ffd6a5; border: none; color: #333; }
    .btn-secondary:hover { background-color: #ffc080; }

    .developer {
      font-size: 14px;
      color: #a07b5b;
      margin-top: 25px;
    }
  </style>
</head>
<body>

<div class="card">
  <div class="welcome-small">ยินดีต้องรับสู่</div>
  <div class="main-title">ระบบจำนำข้าว</div>
  <p>เลือกเมนูด้านล่างเพื่อดำเนินการ 🌱😊</p>

  <div class="d-flex flex-column gap-3 mt-3">
    <a href='?controller=farmer&action=index' class="btn btn-primary">👨‍🌾 Farmer</a>
    <a href='?controller=farmer&action=newFarmer' class="btn btn-success">📝 สร้างบัญชีใหม่</a>
    <a href='?controller=farmer&action=searchPage' class="btn btn-secondary">🔑 Login</a>
  </div>

  <div class="developer">ผู้พัฒนา: กฤติยาวดี เพ็ชรทองมา 6620501281 💛</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
