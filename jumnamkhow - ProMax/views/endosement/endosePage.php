<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ตัวอย่างค่า
//$remain = 3;
//$idfarmer = $_GET['idfarmer'] ?? '';
//$idpledge = $_GET['idpledge'] ?? '';
?>

<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>🌾💛 ระบบรับรองการลงทะเบียน 💛🌾</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to bottom right, #fff8f0, #fff3e6);
      font-family: 'Prompt', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .system-title {
      font-size: 2rem;
      font-weight: bold;
      color: #ff8c00;
      text-align: center;
      margin-bottom: 10px;
    }

    .subtitle {
      font-size: 1.2rem;
      color: #555;
      text-align: center;
      margin-bottom: 30px;
    }

    .card {
      border-radius: 25px;
      background: #fffaf4;
      box-shadow: 0 4px 15px rgba(255, 165, 0, 0.1);
      border: 2px solid #ffe0b2;
    }

    .card-header {
      background-color: #ffda79;
      font-weight: bold;
      color: #5a3e1b;
      border-radius: 20px 20px 0 0;
    }

    h4 {
      font-family: 'Comic Sans MS', cursive;
      color: #ff8f00;
      font-weight: bold;
    }

    .btn-primary {
      background: #ffa94d;
      border: none;
      border-radius: 12px;
      font-weight: bold;
    }

    .btn-primary:hover {
      background: #ff8500;
    }

    .btn-secondary {
      background: #ffe6b3;
      border: none;
      color: #4b2e05;
      font-weight: bold;
      border-radius: 12px;
    }

    .btn-secondary:hover {
      background: #ffd480;
      color: #3e2600;
    }

    .alert {
      border-radius: 20px;
      font-size: 1.1rem;
    }

    .table th {
      background-color: #fff3cd;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #fff9f1;
    }
  </style>
</head>

<body>
  <div class="container py-5">

    <div class="system-title">🌾 ระบบจำนำข้าว 💛</div>
    <div class="subtitle">✨ ยินดีต้อนรับสู่ระบบรับรองการลงทะเบียนเกษตรกร ✨</div>

    <div class="card shadow-sm p-4">
      <h4 class="mb-4 text-center">😊 รับรองให้ผู้อื่นในเขตเดียวกัน 🌸</h4>

      <!-- แสดงยอดคงเหลือ -->
      <div class="alert <?= $remain > 0 ? 'alert-success' : 'alert-danger' ?> text-center">
        <strong>💰 จำนวนคนที่คุณสามารถรับรองได้:</strong>
        <?= number_format($remain) ?> คน
      </div>

      <?php if ($remain > 0): ?>
        <form method="post" action="?controller=endorsement&action=addEndosement" class="needs-validation" novalidate>

          <input type="hidden" name="farmer_idfarmer" value="<?= htmlspecialchars($idfarmer) ?>">

          <!-- รายชื่อในเขตเดียวกัน -->
          <div class="card mt-3">
            <div class="card-header">👩‍🌾 รายชื่อผู้อยู่ในเขตเดียวกับคุณ</div>
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="text-center">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>การรับรอง</th>
                  </tr>
                </thead>
                <tbody class="align-middle text-center">
                  <?php $i = 1; foreach($farmerListinSameadress as $m): ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= htmlspecialchars($m->firstName) ?></td>
                      <td><?= htmlspecialchars($m->lastName) ?></td>
                      <td>
                        <button type="submit" name="idfarmerEndose" value="<?= htmlspecialchars($m->idfarmer) ?>" 
                          class="btn btn-primary btn-sm">🤝 รับรอง</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </form>

        <div class="text-end">
          <a href="javascript:history.back()" class="btn btn-secondary mt-4">🔙 กลับ</a>
        </div>

      <?php else: ?>
        <div class="alert alert-warning text-center mt-4">
          ❌ คุณรับรองให้ผู้อื่นครบ 5 คนแล้ว 🥹
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
