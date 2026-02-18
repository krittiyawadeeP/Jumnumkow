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
  <title>🌾💛 ระบบการไถ่ถอนข้าว 💛🌾</title>
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
      <h4 class="mb-4 text-center">😊🌾💛 ระบบการไถ่ถอนข้าวของคุณ</h4>

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

        ตารางงงงงงงง



      <?php else: ?>
        <div class="alert alert-warning text-center mt-4">
          ❌ คุณไม่สามารถไถ่ถอนได้ 🥹
        </div>
        <div class="text-center">
          <a href="javascript:history.back()" class="btn btn-secondary mt-3">🔙 กลับ</a>
        </div>
      <?php endif; ?>




      <div class="card mt-3">
            <div class="card-header">👩‍🌾 ประวัติการไถ่ถอนกของคุณ</div>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="text-center">
                  <tr>
                    <th>#</th>
                    <th>จำนวนข้าว</th>
                    <th>วันที่ถอน</th>
                    
                  </tr>
                </thead>
                <tbody class="align-middle text-center">
                  <?php $i = 1; foreach($history_list as $m): ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= htmlspecialchars($m->quantityKg) ?></td>
                      <td><?= htmlspecialchars($m->RedemptionDate) ?></td>
                     
          
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
