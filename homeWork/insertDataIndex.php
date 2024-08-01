<?php
include "header.php";
include "footer.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes</title>
</head>
<body>
    <div class="container">
        <h3 class="mt-4">กรอกข้อมูลบัตรคอนเสิร์ต</h3>
        <hr>
        <form action="HW06_insertData01.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อคอนเสิร์ต</label>
                <input type="text" class="form-control" placeholder="กรอกชื่อคอนเสิร์ต" name="name" id="name" aria-describedby="shoes_name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">ราคา</label>
                <input type="text" placeholder="กรอกราคาบัตรคอนเสิร์ต" class="form-control" name="price" id="price" aria-describedby="price">
            </div>
            <div class="mb-3">
                <label for="uploadBy" class="form-label">อัปโหลดข้อมูลโดย</label>
                <input type="text" placeholder="กรอกชื่อผู้อัปโหลดข้อมูล" class="form-control" name="uploadBy" id="uploadBy" aria-describedby="uploadBy">
            </div>
            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </form>
        <hr>
        <p class="text-end">
            <a class='btn' href="index.php">กลับหน้าหลัก</a>
        </p>
    </div>
</body>

</html>