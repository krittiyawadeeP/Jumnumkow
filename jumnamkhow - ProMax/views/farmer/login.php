<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🔑 เข้าสู่ระบบเกษตรกร</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(120deg, #fff8e7, #ffe7c6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      max-width: 500px;
      margin: 80px auto;
      padding: 35px 30px;
      border-radius: 20px;
      background: #fff3e6;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    h2 {
      color: #6b4c2d;
      font-weight: bold;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      margin-bottom: 25px;
    }
    label {
      color: #6b4c2d;
      font-weight: 500;
    }
    .form-control {
      border-radius: 10px;
      border: 1.5px solid #e0c8a0;
    }
    .form-control:focus {
      border-color: #ff9f43;
      box-shadow: 0 0 6px rgba(255,159,67,0.4);
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
    .btn-outline-primary {
      border: 2px solid #ff9f43;
      color: #6b4c2d;
    }
    .btn-outline-primary:hover {
      background-color: #ff9f43;
      color: #fff;
    }
    p.note {
      color: #6b4c2d;
      font-size: 16px;
      margin-bottom: 25px;
    }
  </style>
</head>

<body>

<div class="card text-center">
  <h2>🌾 เข้าสู่ระบบเกษตรกร</h2>
  <p class="note">กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ 👩‍🌾</p>

  <form method="POST" action="">
    <div class="row">
      <div class="col-md-6 mb-3 text-start">
        <label for="firstName" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="firstName" name="key1" required>
      </div>
      <div class="col-md-6 mb-3 text-start">
        <label for="lastName" class="form-label">นามสกุล</label>
        <input type="text" class="form-control" id="lastName" name="key2" required>
      </div>
    </div>

    <div class="mb-3 text-start">
      <label for="password" class="form-label">รหัสผ่าน</label>
      <input type="password" class="form-control" id="password" name="key3" required>
    </div>

    <input type="hidden" name="controller" value="farmer"/>

    <div class="d-flex justify-content-center gap-3 mt-4">
      <button type="submit" name="action" value="search" class="btn btn-primary">🔑 เข้าสู่ระบบ</button>
      <a href="?controller=pages&action=home" class="btn btn-outline-primary">🏡 กลับหน้าหลัก</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
