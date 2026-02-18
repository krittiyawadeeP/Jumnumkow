<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// สมมติค่าตัวแปร
// $remain = 1000;
// $idfarmer = $_GET['idfarmer'] ?? '';
// $idpledge = $_GET['idpledge'] ?? '';
?>

<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🌾💛 ระบบรับรองการลงทะเบียน💛🌾</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #fff8f0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      border-radius: 20px;
      background: #fff3e6;
    }
    h4 {
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    .btn-primary {
      background: #ff9f43;
      border: none;
    }
    .btn-primary:hover {
      background: #ff6f00;
    }
    .btn-secondary {
      background: #ffd6a5;
      border: none;
      color: #333;
    }
    .btn-secondary:hover {
      background: #ffc080;
      color: #333;
    }
    input.form-control {
      border-radius: 10px;
      border: 2px solid #ffc080;
    }
    .alert {
      border-radius: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container py-5">

    <div class="card shadow-sm p-4">
      <h4 class="mb-4 text-center">😊🌾💛รับรองให้ผู้อื่นในเขตเดียวกัน</h4>

      <!-- แสดงยอดคงเหลือ -->
      <div class="alert <?= $remain > 0 ? 'alert-success' : 'alert-danger' ?> text-center">
        <strong>💰 จำนวนคนที่คุณสามารถรับรองได้:</strong>
        <?= number_format($remain) ?> คน
      </div>

      <?php if ($remain > 0): ?>
        <form method="post" action="?controller=endorsement&action=addEndosement" class="needs-validation" novalidate>

          <input type="hidden" name="farmer_idfarmer" value="<?= htmlspecialchars($idfarmer) ?>">
         
<!-- รายชื่อaddress ตรงกัน -->
    <div class="card">
      <div class="card-header">👩‍🌾 รายชื่อผู้อยู่ในเขตเดียวกับคุณ</div>
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
            <?php $i=1; foreach($farmerListinSameadress as $m): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($m->firstName) ?></td>
                <td><?= htmlspecialchars($m->lastName) ?></td>

              <td class="text-end">
                <button type="submit" name="idfarmerEndose" value="<?= htmlspecialchars($m->idfarmer) ?>" 
                    class="btn btn-primary px-4">👨‍🌾 รับรอง</button>
            </td> 

              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
        </form>

        <div class="text-right">
          <a href="javascript:history.back()" class="btn btn-secondary mt-3">🔙 กลับ</a>
        </div>

        <script>
          (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
              form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }
                form.classList.add('was-validated')
              }, false)
            })
          })()
        </script>

      <?php else: ?>
        <div class="alert alert-warning text-center mt-4">
          ❌ คุณรับรองให้ผู้อื่น ครบ 5 คนแล้ว 🥹
        </div>
        <div class="text-center">
          <a href="javascript:history.back()" class="btn btn-secondary mt-3">🔙 กลับ</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
