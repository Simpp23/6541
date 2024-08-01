<?php
include('header.php');
include('footer.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h3 class="mt-4">ฟอร์มกรอกข้อมูลนักศึกษา</h3>
        <hr>
        <form action="ex02_script_insertUser.php" method="post">

            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="fname" id="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-3">
                <label for="iastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="iname" id="iastnam" aria-describedby="iastname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role : </label>
                <input type="radio" class="form-check-input" name="role" id="role1" value="1">
                <label for="role1" class="form-label">admin</label>
                <input type="radio" class="form-check-input" name="role" id="role2" value="0" checked>
                <label for="role2" class="form-label">user</label>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </form>
        <hr>
        <p class="text-end">
            <a href="index.php">กลับมาหาฉัน สักทีได้มั้ย</a>
        </p>
    </div>
</body>

</html>