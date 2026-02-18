<?php
// ตั้งค่าการแสดงข้อผิดพลาด PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🌾 ข้อมูลผู้รับรอง | ระบบจำนำข้าว 🌾</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(120deg, #fff8e7, #ffe7c6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #5a3e1b;
    }

    .card {
      border-radius: 15px;
      background-color: #fff3e6;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .card-header {
      background-color: #f1d599ff !important;
      /* color: #5a3e1b; */
      /* color: #ffffffff; */
      font-weight: bold;
      font-size: 18px;
    }

    .btn-primary {
      background-color: #ff9f43;
      border: none;
    }
    .btn-primary:hover {
      background-color: #ff6f00;
    }
    .btn-secondary {
      background-color: #ffd6a5;
      color: #5a3e1b;
      border: none;
    }
    .btn-secondary:hover {
      background-color: #ffc080;
    }

    .avatar {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #ffcc80;
    }

    .greet {
      font-weight: bold;
      color: #6b4c2d;
    }

    .text-muted {
      color: #8c6c49 !important;
    }

    table thead {
      background-color: #ffe0b2;
    }
    table tbody tr:hover {
      background-color: #fff7ec;
    }

    .highlight {
      background-color: #fff3cd;
      border-radius: 10px;
      padding: 10px 15px;
    }
  </style>
</head>

<body>
  <div class="container py-4">

    <!-- Greeting Section -->
    <div class="d-flex align-items-center gap-3 mb-4">
      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar" class="avatar">
      <div>
        <div class="greet fs-4">
          สวัสดีคุณ <?= htmlspecialchars($farmer_list->firstName) ?> <?= htmlspecialchars($farmer_list->lastName) ?> 🌾😊
        </div>
        <div class="text-muted">ยินดีต้อนรับกลับค่ะ 💛</div>
      </div>
    </div>

    <!-- ปุ่มควบคุม -->
    <div class="d-flex gap-2 mb-4">
      <a href="?controller=pages&action=home" class="btn btn-secondary px-4">⬅ กลับหน้าแรก</a>
      <a href="?controller=redemption&action=toRedemPage&idfarmer=<?= $farmer_list->idfarmer ?>&idpledge=<?= $farmer_list->idPledge ?>" 
        class="btn btn-primary px-4">💰 ไถ่ถอน</a>

      <a href="?controller=endorsement&action=toEndorsementPage&idfarmer=<?= $farmer_list->idfarmer ?>" 
        class="btn btn-primary px-4"> 💰 รับรองให้ผู้อื่น</a>
    </div>

    <!-- ข้อมูลเกษตรกร -->
    <div class="card mb-4">
      <div class="card-header">🌿 ข้อมูลเกษตรกร</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <p class="mb-1">
              <strong>ที่อยู่ปัจจุบัน:</strong> <?= htmlspecialchars($farmer_list->address) ?>,
              ตำบล<?= htmlspecialchars($farmer_list->subdistrictName) ?>,
              อำเภอ<?= htmlspecialchars($farmer_list->districtName) ?>,
              จังหวัด<?= htmlspecialchars($farmer_list->provinceName) ?>
            </p>
          </div>
          <div class="col-md-4 text-md-end">
            <p class="mb-1 highlight">
              <strong>สิทธิ์การจำนำสูงสุด:</strong>
              <span class="text-danger fs-5"><?= number_format($farmer_list->limitPledge) ?></span> กิโลกรัม
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- รายชื่อผู้รับรอง -->
    <div class="card">
      <div class="card-header">👩‍🌾 รายชื่อผู้รับรองในเขต <?= htmlspecialchars($farmer_list->subdistrictName) ?></div>
      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($endoser_list as $m): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($m->firstName) ?></td>
                <td><?= htmlspecialchars($m->lastName) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
