<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ตัวแปรสมมติ
// $remain = 1000;
// $idfarmer = $_GET['idfarmer'] ?? '';
// $idpledge = $_GET['idpledge'] ?? '';
?>

<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🌾💛 ระบบการไถ่ถอนข้าว 💛🌾</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(180deg, #fff8f0 0%, #fff3e0 100%);
      font-family: 'Prompt', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      border-radius: 20px;
      background: #fffefb;
      border: 3px solid #ffebb5;
      box-shadow: 0 5px 15px rgba(255, 180, 80, 0.2);
    }
    h4 {
      font-family: 'Prompt', cursive;
      color: #e69500;
      font-weight: bold;
    }
    .btn-primary {
      background: #ffb74d;
      border: none;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: #ff9800;
      transform: scale(1.05);
    }
    .btn-secondary {
      background: #ffe0b2;
      border: none;
      color: #333;
      font-weight: 500;
      transition: 0.3s;
    }
    .btn-secondary:hover {
      background: #ffcc80;
      color: #222;
      transform: scale(1.05);
    }
    input.form-control {
      border-radius: 12px;
      border: 2px solid #ffc080;
      background: #fffdf9;
    }
    .alert {
      border-radius: 15px;
      font-weight: bold;
      font-size: 1.05rem;
    }
    .table thead {
      background: #fff3cd;
      color: #5d3d00;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #fff9e6;
    }
    .table-striped tbody tr:nth-of-type(even) {
      background-color: #fffdf5;
    }
  </style>
</head>
<body>
  <div class="container py-5">

    <div class="card shadow-sm p-4">
      <h4 class="mb-4 text-center">😊🌾💛 ระบบการไถ่ถอนข้าวของคุณ 💛🌾</h4>

      <!-- แสดงยอดคงเหลือ -->
      <div class="alert <?= $remain > 0 ? 'alert-success' : 'alert-danger' ?> text-center">
        <strong>💰 ปริมาณข้าวคงเหลือที่สามารถไถ่ถอนได้:</strong>
        <?= number_format($remain, 2) ?> กิโลกรัม
      </div>

      <?php if ($remain > 0): ?>
        <form method="post" action="?controller=redemption&action=addRedemption" class="needs-validation" novalidate>

          <input type="hidden" name="farmer_idfarmer" value="<?= htmlspecialchars($idfarmer) ?>">
          <input type="hidden" name="Pledge_idPledge" value="<?= htmlspecialchars($idpledge) ?>">

          <div class="mb-3">
            <label for="quantityKg" class="form-label">🌾 ปริมาณข้าวที่ต้องการไถ่ถอน (กก.)</label>
            <input type="number" step="0.01" name="quantityKg" id="quantityKg" class="form-control" required 
                   max="<?= $remain ?>" placeholder="ไม่เกิน <?= number_format($remain,2) ?> กก.">
            <div class="invalid-feedback">กรุณากรอกปริมาณข้าวที่ถูกต้อง 🥺</div>
          </div>

          <div class="d-flex justify-content-between">
            <a href="javascript:history.back()" class="btn btn-secondary mt-3">🔙 กลับ</a>
            <button type="submit" class="btn btn-primary mt-3">✅ บันทึกการไถ่ถอน</button>
          </div>
        </form>

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
          ❌ คุณไม่สามารถไถ่ถอนได้ 🥹
        </div>
        <div class="text-center">
          <a href="javascript:history.back()" class="btn btn-secondary mt-3">🔙 กลับ</a>
        </div>
      <?php endif; ?>


      <!-- ตารางประวัติ -->
      <div class="card mt-4 border-warning">
        <div class="card-header text-center bg-warning bg-opacity-25 fw-bold fs-5">
          👩‍🌾 ประวัติการไถ่ถอนข้าวของคุณ
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover mb-0 text-center align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>จำนวนข้าว (กก.)</th>
                <th>วันที่ถอน</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($history_list)): ?>
                <?php $i = 1; foreach($history_list as $m): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($m->quantityKg) ?></td>
                    <td><?= htmlspecialchars($m->RedemptionDate) ?: '⏳ รอดำเนินการ' ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-muted">ยังไม่มีประวัติการไถ่ถอน 🌾</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
