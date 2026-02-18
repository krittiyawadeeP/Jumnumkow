<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ยืนยันการลบข้อมูลเกษตรกร</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #fff8f0; /* โทนครีมอบอุ่น */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .confirm-box {
        max-width: 500px;
        background-color: #fffbe6; /* สีข้าวสุก */
        margin: 80px auto;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        text-align: center;
        border: 2px solid #ffe27f;
    }

    h3 {
        color: #f4a261; /* สีส้มอ่อน */
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    p {
        color: #5a4633;
        font-size: 1.1rem;
    }

    .info-box {
        background-color: #fff4cc;
        border: 1px solid #ffe27f;
        border-radius: 10px;
        padding: 10px;
        margin: 15px 0;
        font-weight: bold;
    }

    button {
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-back {
        background-color: #8fcf5f;
        color: #fff;
        margin-right: 10px;
    }

    .btn-back:hover {
        background-color: #a6e97b;
    }

    .btn-delete {
        background-color: #ff6f61;
        color: #fff;
    }

    .btn-delete:hover {
        background-color: #ff887a;
    }

    .emoji {
        font-size: 2rem;
    }
</style>
</head>
<body>

<div class="confirm-box">
    <div class="emoji">🌾⚠️</div>
    <h3>ยืนยันการลบข้อมูลเกษตรกร</h3>
    <p>คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?</p>

    <div class="info-box">
        <?= "{$farmer->idfarmer} — {$farmer->firstName} {$farmer->lastName}" ?>
    </div>

    <form method="POST" action="">
        <input type="hidden" name="controller" value="farmer"/>
        <input type="hidden" name="idfarmer" value="<?= $farmer->idfarmer ?>"/>

        <button type="submit" name="action" value="index" class="btn-back">ย้อนกลับ</button>
        <button type="submit" name="action" value="delete" class="btn-delete">ลบข้อมูล</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
